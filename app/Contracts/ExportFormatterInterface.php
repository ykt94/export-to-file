<?php

namespace App\Contracts;

interface ExportFormatterInterface
{
    public function format(iterable $records, array $headers): string;
}
