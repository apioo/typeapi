<?php

namespace App\Controller;

use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;

class Specification extends ControllerAbstract
{
    private ReverseRouter $reverseRouter;

    public function __construct(ReverseRouter $reverseRouter)
    {
        $this->reverseRouter = $reverseRouter;
    }

    #[Get]
    #[Path('/specification')]
    public function show(): Template
    {
        $data = [
            'method' => explode('::', __METHOD__),
            'title' => 'Specification | TypeAPI',
        ];

        $templateFile = __DIR__ . '/../../resources/template/specification.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }
}
