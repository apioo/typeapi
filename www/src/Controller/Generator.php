<?php

namespace App\Controller;

use App\Model;
use App\Service\CaptchaVerifier;
use PSX\Api\ApiManagerInterface;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Api\Attribute\Post;
use PSX\Api\GeneratorFactory;
use PSX\Api\Parser\TypeAPI;
use PSX\Framework\Config\ConfigInterface;
use PSX\Framework\Config\Directory;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;
use PSX\Http\Environment\HttpResponse;
use PSX\Http\Exception\BadRequestException;
use PSX\Http\Writer\File;
use PSX\Schema\Generator\Code\Chunks;
use PSX\Schema\SchemaManagerInterface;

class Generator extends ControllerAbstract
{
    private ReverseRouter $reverseRouter;
    private Directory $directory;
    private GeneratorFactory $generatorFactory;
    private SchemaManagerInterface $schemaManager;
    private CaptchaVerifier $captchaVerifier;
    private ConfigInterface $config;

    public function __construct(ReverseRouter $reverseRouter, Directory $directory, GeneratorFactory $generatorFactory, SchemaManagerInterface $schemaManager, CaptchaVerifier $captchaVerifier, ConfigInterface $config)
    {
        $this->reverseRouter = $reverseRouter;
        $this->directory = $directory;
        $this->generatorFactory = $generatorFactory;
        $this->schemaManager = $schemaManager;
        $this->captchaVerifier = $captchaVerifier;
        $this->config = $config;
    }

    #[Get]
    #[Path('/generator')]
    public function show(): mixed
    {
        $data = [
            'types' => $this->generatorFactory->factory()->getPossibleTypes(),
            'method' => explode('::', __METHOD__),
            'title' => 'SDK Code Generator | TypeAPI',
            'js' => ['https://www.google.com/recaptcha/api.js'],
            'recaptcha_key' => $this->config->get('recaptcha_key')
        ];

        $templateFile = __DIR__ . '/../../resources/template/generator.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }

    #[Post]
    #[Path('/generator')]
    public function generate(Model\Generate $payload): mixed
    {
        $repository = $this->generatorFactory->factory();

        try {
            if (!$this->captchaVerifier->verify($payload->getGRecaptchaResponse())) {
                throw new BadRequestException('Invalid captcha');
            }

            $type = $payload->getType() ?? throw new BadRequestException('Provided no type');
            $schema = $payload->getSchema() ?? throw new BadRequestException('Provided no schema');

            $specification = (new TypeAPI($this->schemaManager))->parse($schema);

            $generator = $repository->getGenerator($type);
            $mime = $repository->getMime($type);
            $response = $generator->generate($specification);

            if ($response instanceof Chunks) {
                $fileName = 'client_sdk_' . substr(md5($schema), 0, 8) . '.zip';
                $file = $this->directory->getCacheDir() . '/' . $fileName;

                $response->writeTo($file);

                return new File($file, $fileName);
            } else {
                return new HttpResponse(200, ['Content-Type' => $mime], $response);
            }
        } catch (\Throwable $e) {
            $data = [
                'types' => $repository->getPossibleTypes(),
                'method' => explode('::', __METHOD__),
                'title' => 'SDK Code Generator | TypeAPI',
                'js' => ['https://www.google.com/recaptcha/api.js'],
                'recaptcha_key' => $this->config->get('recaptcha_key'),
                'error' => $e->getMessage(),
            ];

            $templateFile = __DIR__ . '/../../resources/template/generator.php';
            return new Template($data, $templateFile, $this->reverseRouter);
        }
    }
}
