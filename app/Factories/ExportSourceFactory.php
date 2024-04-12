<?php

namespace App\Factories;

use App\Adapters\Sources\CitySource;
use App\Contracts\ExportSourceInterface;

class ExportSourceFactory
{
    public static function create(string $source): ExportSourceInterface
    {
        $sourceClass = match ($source) {
            'City' => CitySource::class,
//          'Organization' => OrganizationSource::class,
            default => null,
        };
        if (!$sourceClass) {
            throw new \RuntimeException("Unknown export source $source");
        }

        return app($sourceClass);
    }
}
