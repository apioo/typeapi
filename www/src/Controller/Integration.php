<?php

namespace App\Controller;

use App\Service\TypeName;
use PSX\Api\Attribute\Get;
use PSX\Api\Attribute\Path;
use PSX\Api\GeneratorFactory;
use PSX\Framework\Controller\ControllerAbstract;
use PSX\Framework\Http\Writer\Template;
use PSX\Framework\Loader\ReverseRouter;
use PSX\Http\Exception\BadRequestException;

class Integration extends ControllerAbstract
{
    private ReverseRouter $reverseRouter;

    public function __construct(ReverseRouter $reverseRouter, private GeneratorFactory $generatorFactory)
    {
        $this->reverseRouter = $reverseRouter;
    }

    #[Get]
    #[Path('/integration')]
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
            'method' => explode('::', __METHOD__),
            'title' => 'Integration | TypeAPI',
            'clientTypes' => $clientTypes,
            'serverTypes' => $serverTypes,
        ];

        $templateFile = __DIR__ . '/../../resources/template/integration.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }

    #[Get]
    #[Path('/integration/:type')]
    public function showType(string $type): Template
    {
        $registry = $this->generatorFactory->factory();
        if (!in_array($type, $registry->getPossibleTypes())) {
            throw new BadRequestException('Provided an invalid type');
        }

        $data = [
            'title' => TypeName::getDisplayName($type) . ' SDK Integration | TypeAPI',
            'method' => explode('::', __METHOD__),
            'parameters' => ['type' => $type],
            'type' => $type,
            'typeName' => TypeName::getDisplayName($type),
        ];

        $templateFile = __DIR__ . '/../../resources/template/integration/detail.php';
        return new Template($data, $templateFile, $this->reverseRouter);
    }
}
