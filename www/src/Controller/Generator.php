<?php

namespace App\Controller;

use App\Model;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Api\Attribute\Post;
use PSX\Api\GeneratorFactory;
use PSX\Api\Parser\TypeAPI;
use PSX\Framework\Config\Directory;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;
use PSX\Http\Environment\HttpResponse;
use PSX\Http\Writer\File;
use PSX\Schema\Generator\Code\Chunks;

class Generator extends ControllerAbstract
{
    private ReverseRouter $reverseRouter;
    private Directory $directory;

    public function __construct(ReverseRouter $reverseRouter, Directory $directory)
    {
        $this->reverseRouter = $reverseRouter;
        $this->directory = $directory;
    }

    #[Get]
    #[Path('/generator')]
    public function show(): mixed
    {
        $data = [
            'types' => GeneratorFactory::getPossibleTypes(),
            'method' => explode('::', __METHOD__),
        ];

        $templateFile = __DIR__ . '/../../resources/template/generator.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }

    #[Post]
    #[Path('/generator')]
    public function generate(Model\Generate $payload): mixed
    {
        try {
            $specification = (new TypeAPI())->parse($payload->getSchema());

            $factory = new GeneratorFactory('', '');
            $generator = $factory->getGenerator($payload->getType());
            $mime = $factory->getMime($payload->getType());

            $response = $generator->generate($specification);

            if ($response instanceof Chunks) {
                $fileName = 'client_sdk_' . substr(md5($payload->getSchema()), 0, 8) . '.zip';
                $file = $this->directory->getCacheDir() . '/' . $fileName;

                $response->writeTo($file);

                return new File($file, $fileName);
            } else {
                return new HttpResponse(200, ['Content-Type' => $mime], $response);
            }
        } catch (\Throwable $e) {
            $data = [
                'types' => GeneratorFactory::getPossibleTypes(),
                'method' => explode('::', __METHOD__),
                'error' => $e->getMessage()
            ];

            $templateFile = __DIR__ . '/../../resources/template/generator.php';
            return new Template($data, $templateFile, $this->reverseRouter);
        }
    }
}
