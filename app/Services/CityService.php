<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityService
{
    /**
     * @param array $fields
     * @param array $filters
     * @param string|null $orderBy
     * @return Collection
     */
    public function getMany(array $fields, array $filters = [], ?string $orderBy = null): Collection
    {
        $query = City::query();

        $query->select($fields);

        if ($filters['name'] ?? null) {
            $query->where('name', $filters['name']);
        }

        if ($orderBy ?? null) {
            $query->orderBy($orderBy);
        }

        return $query->get();
    }
}
