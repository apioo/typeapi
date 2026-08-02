<?php

namespace App\Controller;

use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Http\Exception\PermanentRedirectException;

class Generator extends ControllerAbstract
{
    #[Get]
    #[Path('/generator')]
    public function show(): Template
    {
        throw new PermanentRedirectException('https://sandbox.sdkgen.app/');
    }

    #[Get]
    #[Path('/generator/:type')]
    public function showType(string $type): Template
    {
        throw new PermanentRedirectException('https://sandbox.sdkgen.app/');
    }
}
