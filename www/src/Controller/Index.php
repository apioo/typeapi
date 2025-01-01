<?php

namespace App\Controller;

use Psr\Cache\CacheItemPoolInterface;
use PSX\Api\ApiManagerInterface;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Api\GeneratorFactory;
use PSX\Api\Repository\LocalRepository;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;

class Index extends ControllerAbstract
{
    private CacheItemPoolInterface $cache;
    private ReverseRouter $reverseRouter;
    private ApiManagerInterface $apiManager;
    private GeneratorFactory $generatorFactory;

    public function __construct(CacheItemPoolInterface $cache, ReverseRouter $reverseRouter, ApiManagerInterface $apiManager, GeneratorFactory $generatorFactory)
    {
        $this->cache = $cache;
        $this->reverseRouter = $reverseRouter;
        $this->apiManager = $apiManager;
        $this->generatorFactory = $generatorFactory;
    }

    #[Get]
    #[Path('/')]
    public function show(): mixed
    {
        $item = $this->cache->getItem('example-cache');
        if (!$item->isHit()) {
            $examples = $this->getExamples();
            foreach ($examples as $key => $example) {
                $examples[$key]['schema'] = file_get_contents($example['file']);
                $examples[$key]['code'] = $this->convert(LocalRepository::MARKUP_CLIENT, $example['file']);
            }

            $item->expiresAfter(null);
            $item->set($examples);
            $this->cache->save($item);
        } else {
            $examples = $item->get();
        }

        $data = [
            'method' => explode('::', __METHOD__),
            'title' => 'OpenAPI alternative for type-safe code generation | TypeAPI',
            'examples' => $examples
        ];

        $templateFile = __DIR__ . '/../../resources/template/index.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }


    private function convert(string $type, string $file): string
    {
        $schema = $this->apiManager->getApi($file);
        $generator = $this->generatorFactory->factory()->getGenerator($type);

        return (string) $generator->generate($schema);
    }

    private function getExamples(): array
    {
        $examples = [];
        $examples[] = [
            'title' => 'Simple API',
            'description' => 'A simple GET endpoint which returns a hello world message.',
            'file' => __DIR__ . '/../../resources/examples/simple.json',
        ];

        $examples[] = [
            'title' => 'Argument Query',
            'description' => 'Through the arguments keyword you can map values from the HTTP request to an argument, in this example we map the HTTP query parameters to the <code>startIndex</code> and <code>count</code> argument',
            'file' => __DIR__ . '/../../resources/examples/argument_query.json',
        ];

        $examples[] = [
            'title' => 'Argument Body',
            'description' => 'In this example we map the HTTP request body to the <code>payload</code> argument',
            'file' => __DIR__ . '/../../resources/examples/argument_body.json',
        ];

        $examples[] = [
            'title' => 'Throws',
            'description' => 'Through the throws keyword you can define specific error payloads, the generated client will then also throw an exception in case the server returns such an error code',
            'file' => __DIR__ . '/../../resources/examples/exception.json',
        ];

        $examples[] = [
            'title' => 'Operation group',
            'description' => 'Through the dot notation at the operation key you can group your operations into logical units',
            'file' => __DIR__ . '/../../resources/examples/operation_group.json',
        ];

        return $examples;
    }
}
