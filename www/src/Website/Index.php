<?php

namespace App\Website;

use Psr\Cache\CacheItemPoolInterface;
use PSX\Dependency\Attribute\Inject;
use PSX\Framework\Controller\ViewAbstract;
use PSX\Http\Client\Client;
use PSX\Http\Environment\HttpContextInterface;
use PSX\Schema\GeneratorFactory;
use PSX\Schema\Parser\TypeSchema;

class Index extends ViewAbstract
{
    #[Inject]
    private CacheItemPoolInterface $cache;

    public function doGet(HttpContextInterface $context): mixed
    {
        $item = $this->cache->getItem('example-cache');
        if (!$item->isHit()) {
            $examples = $this->getExamples();
            foreach ($examples as $key => $example) {
                $types = GeneratorFactory::getPossibleTypes();
                foreach ($types as $type) {
                    $examples[$key]['types'][$type] = $this->convert($type, $example['schema']);
                }
            }

            $item->expiresAfter(null);
            $item->set($examples);
            $this->cache->save($item);
        } else {
            $examples = $item->get();
        }

        return $this->render(__DIR__ . '/resource/index.php', [
            'controller' => __CLASS__,
            'examples' => $examples
        ]);
    }

    private function convert(string $type, string $code): string
    {
        $httpClient = new Client();
        $parser = new TypeSchema(TypeSchema\ImportResolver::createDefault($httpClient), __DIR__ . '/resource/examples');
        $schema = $parser->parse($code);

        $factory = new GeneratorFactory();
        $generator = $factory->getGenerator($type, null);

        return (string) $generator->generate($schema);
    }

    private function getExamples(): array
    {
        $examples = [];
        $examples[] = [
            'title' => 'Simple API',
            'description' => 'A simple API which only returns a hello world message.',
            'schema' => file_get_contents(__DIR__ . '/resource/examples/simple.json'),
        ];

        $examples[] = [
            'title' => 'Simple API',
            'description' => 'Through the throws keyword you can define specific error payloads, the generated client will then also throw an exception in case the server returns a 500 error code',
            'schema' => file_get_contents(__DIR__ . '/resource/examples/exception.json'),
        ];

        return $examples;
    }
}
