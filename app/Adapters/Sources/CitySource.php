<?php

namespace App\Adapters\Sources;

use App\Contracts\ExportSourceInterface;
use App\Services\CityService;

class CitySource implements ExportSourceInterface
{

    public function __construct(private CityService $service)
    {
    }

    public function getData(array $params = []): iterable
    {
        $fields = ['id', 'name', 'population', 'square'];
        return $this->service->getMany(
            fields: $fields,
            filters: $params,
            orderBy: $params['orderBy'] ?? null,
        );
    }

    public function getHeaders(): array
    {
        return ['#', 'Название', 'Население', 'Площадь'];
    }
}
