<?php

declare(strict_types = 1);

namespace App\Service;

class TypeName
{
    public static function getDisplayName(string $type): ?string
    {
        return match($type) {
            'client-csharp' => 'C# Client',
            'client-go' => 'Go Client',
            'client-java' => 'Java Client',
            'client-php' => 'PHP Client',
            'client-python' => 'Python Client',
            'client-typescript' => 'TypeScript Client',

            'server-csharp' => 'C# Server',
            'server-java' => 'Java Server',
            'server-php' => 'PHP Server',
            'server-python' => 'Python Server',
            'server-typescript' => 'TypeScript Server',

            default => null,
        };
    }
}
