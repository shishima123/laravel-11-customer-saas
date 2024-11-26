<?php

namespace App\Repositories;

use App\Models\Subscription;

/**
 * Class SubscriptionRepository
 */
class SubscriptionRepository extends RepositoryAbstract
{
    /**
     * Function getModel
     */
    public function getModel(): string
    {
        return Subscription::class;
    }
}
