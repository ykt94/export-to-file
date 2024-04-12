<?php

namespace App\Factories;

use App\Adapters\Formatters\CsvFormatter;
use App\Contracts\ExportFormatterInterface;

class ExportFormatterFactory
{
    public static function create(string $format): ExportFormatterInterface
    {
        $formatterClass = match ($format) {
            'csv' => CsvFormatter::class,
//            'xls' => XlsFormatter::class,
            default => null,
        };
        if (!$formatterClass) {
            throw new \RuntimeException("Unknown export format $format");
        }

        return app($formatterClass);
    }

}
