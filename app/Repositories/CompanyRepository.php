<?php

namespace App\Repositories;

use App\Models\Company;

/**
 * Class CompanyRepository
 */
class CompanyRepository extends RepositoryAbstract
{
    /**
     * Function getModel
     */
    public function getModel(): string
    {
        return Company::class;
    }
}
