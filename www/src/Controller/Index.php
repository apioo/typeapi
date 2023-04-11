<?php

namespace App\Controller;

use Psr\Cache\CacheItemPoolInterface;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Api\GeneratorFactory;
use PSX\Api\GeneratorFactoryInterface;
use PSX\Framework\Config\Config;
use PSX\Framework\Config\ConfigInterface;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;
use PSX\Http\Client\Client;
use PSX\Api\Parser\TypeAPI;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class Index extends ControllerAbstract
{
    private CacheItemPoolInterface $cache;
    private ReverseRouter $reverseRouter;
    private ConfigInterface $config;

    public function __construct(CacheItemPoolInterface $cache, ReverseRouter $reverseRouter, ConfigInterface $config)
    {
        $this->cache = $cache;
        $this->reverseRouter = $reverseRouter;
        $this->config = $config;
    }

    #[Get]
    #[Path('/')]
    public function show(): mixed
    {
        $item = $this->cache->getItem('example-cache');
        if (!$item->isHit()) {
            $examples = $this->getExamples();
            foreach ($examples as $key => $example) {
                $examples[$key]['code'] = $this->convert(GeneratorFactoryInterface::MARKUP_CLIENT, $example['schema']);
            }

            $item->expiresAfter(null);
            $item->set($examples);
            $this->cache->save($item);
        } else {
            $examples = $item->get();
        }

        $data = [
            'method' => explode('::', __METHOD__),
            'examples' => $examples
        ];

        $templateFile = __DIR__ . '/../../resources/template/index.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }


    private function convert(string $type, string $code): string
    {
        $parser = new TypeAPI(__DIR__ . '/../../resources/examples');
        $schema = $parser->parse($code);

        $factory = new GeneratorFactory($this->config->get('psx_url'), $this->config->get('psx_dispatch'));
        $generator = $factory->getGenerator($type);

        return (string) $generator->generate($schema);
    }

    private function getExamples(): array
    {
        $examples = [];
        $examples[] = [
            'title' => 'Simple API',
            'description' => 'A simple GET endpoint which returns a hello world message.',
            'schema' => file_get_contents(__DIR__ . '/../../resources/examples/simple.json'),
        ];

        $examples[] = [
            'title' => 'Argument Query',
            'description' => 'Through the arguments keyword you can map values from the HTTP request to an argument, in this example we map the HTTP query parameters to the <code>startIndex</code> and <code>count</code> argument',
            'schema' => file_get_contents(__DIR__ . '/../../resources/examples/argument_query.json'),
        ];

        $examples[] = [
            'title' => 'Argument Body',
            'description' => 'In this example we map the HTTP request body to the <code>payload</code> argument',
            'schema' => file_get_contents(__DIR__ . '/../../resources/examples/argument_body.json'),
        ];

        $examples[] = [
            'title' => 'Throws',
            'description' => 'Through the throws keyword you can define specific error payloads, the generated client will then also throw an exception in case the server returns such an error code',
            'schema' => file_get_contents(__DIR__ . '/../../resources/examples/exception.json'),
        ];

        $examples[] = [
            'title' => 'Tags',
            'description' => 'Through a tag you can group operations',
            'schema' => file_get_contents(__DIR__ . '/../../resources/examples/tag.json'),
        ];

        return $examples;
    }
}
