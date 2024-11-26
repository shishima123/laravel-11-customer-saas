<?php

namespace App\Repositories;

use App\Models\Address;

/**
 * Class AddressRepository
 */
class AddressRepository extends RepositoryAbstract
{
    /**
     * Function getModel
     */
    public function getModel(): string
    {
        return Address::class;
    }
}
