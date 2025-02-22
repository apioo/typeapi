<?php

namespace App\Controller;

use App\Model\Generate;
use App\Service\CaptchaVerifier;
use App\Service\TypeName;
use PSX\Api\Attribute\Body;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Param;
use PSX\Api\Attribute\Path;
use PSX\Api\Attribute\Post;
use PSX\Api\GeneratorFactory;
use PSX\Api\Parser\TypeAPI;
use PSX\Api\SpecificationInterface;
use PSX\Framework\Config\ConfigInterface;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;
use PSX\Http\Environment\HttpResponse;
use PSX\Http\Exception\BadRequestException;
use PSX\Http\Writer\File;
use PSX\Schema\Generator\Code\Chunks;
use PSX\Schema\Generator\Config;
use PSX\Schema\SchemaManagerInterface;

class Generator extends ControllerAbstract
{
    private const MAX_SCHEMA_LENGTH = 2048;

    public function __construct(private ReverseRouter $reverseRouter, private SchemaManagerInterface $schemaManager, private ConfigInterface $config, private CaptchaVerifier $captchaVerifier, private GeneratorFactory $generatorFactory)
    {
    }

    #[Get]
    #[Path('/generator')]
    public function show(): Template
    {
        $clientTypes = [];
        $serverTypes = [];
        foreach ($this->generatorFactory->factory()->getPossibleTypes() as $type) {
            $displayName = TypeName::getDisplayName($type);
            if ($displayName === null) {
                continue;
            }

            if (str_starts_with($type, 'client-')) {
                $clientTypes[$type] = $displayName;
            } elseif (str_starts_with($type, 'server-')) {
                $serverTypes[$type] = $displayName;
            }
        }

        ksort($clientTypes);
        ksort($serverTypes);

        $data = [
            'title' => 'SDK Generator | TypeAPI',
            'method' => explode('::', __METHOD__),
            'clientTypes' => $clientTypes,
            'serverTypes' => $serverTypes,
        ];

        $templateFile = __DIR__ . '/../../resources/template/generator.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }

    #[Get]
    #[Path('/generator/:type')]
    public function showType(string $type): Template
    {
        $registry = $this->generatorFactory->factory();
        if (!in_array($type, $registry->getPossibleTypes())) {
            throw new BadRequestException('Provided an invalid type');
        }

        $data = [
            'title' => TypeName::getDisplayName($type) . ' SDK Generator | TypeAPI',
            'method' => explode('::', __METHOD__),
            'parameters' => ['type' => $type],
            'schema' => $this->getSchema(),
            'type' => $type,
            'typeName' => TypeName::getDisplayName($type),
            'js' => ['https://www.google.com/recaptcha/api.js'],
            'recaptcha_key' => $this->config->get('recaptcha_key'),
        ];

        $templateFile = __DIR__ . '/../../resources/template/generator/form.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }

    #[Post]
    #[Path('/generator/:type')]
    public function generate(string $type, Generate $generate): Template
    {
        [$schema, $config, $parsedSchema] = $this->parse($type, $generate);

        try {
            $registry = $this->generatorFactory->factory();
            $generator = $registry->getGenerator($type, $config);
            $result = $generator->generate($parsedSchema);

            if ($result instanceof Chunks) {
                $output = $this->buildArray($result);
            } else {
                $output = $result;
            }
        } catch (\Throwable $e) {
            $output = $e->getMessage();
        }

        $data = [
            'title' => TypeName::getDisplayName($type) . ' SDK Generator | TypeAPI',
            'method' => explode('::', __METHOD__),
            'parameters' => ['type' => $type],
            'namespace' => $config->get(Config::NAMESPACE),
            'schema' => $schema,
            'type' => $type,
            'typeName' => TypeName::getDisplayName($type),
            'output' => $output,
            'js' => ['https://www.google.com/recaptcha/api.js'],
            'recaptcha_key' => $this->config->get('recaptcha_key'),
        ];

        $templateFile = __DIR__ . '/../../resources/template/generator/form.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }

    #[Post]
    #[Path('/generator/:type/download')]
    public function download(#[Param] string $type, #[Body] Generate $generate): mixed
    {
        [$schema, $config, $parsedSchema] = $this->parse($type, $generate);

        try {
            $zipFile = $this->config->get('psx_path_cache') . '/typeapi_' . $type . '_' . sha1($schema) . '.zip';
            if (is_file($zipFile)) {
                return new File($zipFile, 'typeapi_' . $type . '.zip', 'application/zip');
            }

            $registry = $this->generatorFactory->factory();
            $generator = $registry->getGenerator($type, $config);
            $result = $generator->generate($parsedSchema);

            if ($result instanceof Chunks) {
                $result->writeToZip($zipFile);

                return new File($zipFile, 'typeapi_' . $type . '.zip', 'application/zip');
            } else {
                return new HttpResponse(200, ['Content-Type' => 'text/plain'], $result);
            }
        } catch (\Throwable $e) {
            return new HttpResponse(500, ['Content-Type' => 'text/plain'], $e->getMessage());
        }
    }

    private function buildArray(Chunks $result, ?string $prefix = null): array
    {
        $chunks = [];
        foreach ($result->getChunks() as $fileName => $code) {
            if (is_string($code)) {
                $chunks[$fileName] = $code;
            } else {
                $chunks = array_merge($chunks, $this->buildArray($code, isset($prefix) ? $prefix . '/' . $fileName : $fileName));
            }
        }

        return $chunks;
    }

    /**
     * @return array{string, Config, SpecificationInterface}
     */
    private function parse(string $type, Generate $generate): array
    {
        $recaptchaSecret = $this->config->get('recaptcha_secret');
        if (!empty($recaptchaSecret) && !$this->captchaVerifier->verify($generate->getGRecaptchaResponse())) {
            throw new BadRequestException('Invalid captcha');
        }

        $namespace = $generate->getNamespace();
        $schema = $generate->getSchema() ?? throw new \RuntimeException('Provided no schema');

        if (strlen($schema) > self::MAX_SCHEMA_LENGTH) {
            throw new BadRequestException('Provided schema is too large, allowed max ' . self::MAX_SCHEMA_LENGTH . ' characters');
        }

        $config = new Config();
        if ($namespace !== null && $namespace !== '') {
            $config->put(Config::NAMESPACE, $namespace);
        }

        $registry = $this->generatorFactory->factory();
        if (!in_array($type, $registry->getPossibleTypes())) {
            throw new BadRequestException('Provided an invalid type');
        }

        $result = (new TypeAPI($this->schemaManager))->parse($schema);

        return [$schema, $config, $result];
    }

    private function getSchema(): string
    {
        return <<<'JSON'
{
  "operations": {
    "getMessage": {
      "description": "Returns a hello world message",
      "method": "GET",
      "path": "/hello/world",
      "return": {
        "schema": {
          "type": "reference",
          "target": "Hello_World"
        }
      }
    }
  },
  "definitions": {
    "Hello_World": {
      "type": "object",
      "properties": {
        "message": {
          "type": "string"
        }
      }
    }
  }
}
JSON;
    }
}
