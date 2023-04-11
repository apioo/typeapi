<?php

namespace App\Controller;

use App\Model;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Api\Attribute\Tags;
use PSX\Framework\Base;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;

class Generator extends ControllerAbstract
{
    private ReverseRouter $reverseRouter;

    public function __construct(ReverseRouter $reverseRouter)
    {
        $this->reverseRouter = $reverseRouter;
    }

    #[Get]
    #[Path('/generator')]
    public function show(): mixed
    {
        $data = [
            'method' => explode('::', __METHOD__),
        ];

        $templateFile = __DIR__ . '/../../resources/template/generator.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }
}
