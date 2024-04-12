<?php

namespace App\Adapters\Formatters;

use App\Contracts\ExportFormatterInterface;
use Illuminate\Contracts\Support\Arrayable;

class CsvFormatter implements ExportFormatterInterface
{
    public function format(iterable $records, array $headers): string
    {
        $path = storage_path('export/' . bin2hex(random_bytes(5)) . '.csv');
        $handle = fopen($path, 'wb');

        fputcsv($handle, $headers, ';');

        foreach ($records as $record) {
            fputcsv($handle, $record instanceof Arrayable ? $record->toArray() : (array)$record, ';');
        }
        fclose($handle);
        return $path;
    }
}
