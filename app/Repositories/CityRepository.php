<?php

namespace App\Repositories;

use App\Models\City;

/**
 * Class CityRepository
 */
class CityRepository extends RepositoryAbstract
{
    /**
     * Function getModel
     */
    public function getModel(): string
    {
        return City::class;
    }
}
