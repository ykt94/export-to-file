<?php

namespace App\Services;

use App\Factories\ExportFormatterFactory;
use App\Factories\ExportSourceFactory;
use Illuminate\Support\Facades\File;

class ExportService
{
    private const DIR_NAME = 'export';
    public function export(array $request, string $source, string $format): string
    {
        if (!File::exists(storage_path(self::DIR_NAME))) {
            File::makeDirectory(storage_path(self::DIR_NAME));
        }

        $exportSource = ExportSourceFactory::create($source);

        $data = $exportSource->getData($request);

        $headers = $exportSource->getHeaders();

        $formatter = ExportFormatterFactory::create($format);

        return $formatter->format($data, $headers);
    }
}
