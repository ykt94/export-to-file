<?php

namespace App\Contracts;

interface ExportSourceInterface
{
    public function getData(array $params = []): iterable;

    public function getHeaders(): array;
}
