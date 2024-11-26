<?php

namespace App\Repositories;

use App\Models\Payment;

/**
 * Class PaymentRepository
 */
class PaymentRepository extends RepositoryAbstract
{
    /**
     * Function getModel
     */
    public function getModel(): string
    {
        return Payment::class;
    }

    public function getPaymentHistory($params, $customer, $shouldGetDataForDatatable = false)
    {
        $sql = $this->model
            ->where('customer_id', $customer->id);

        if ($shouldGetDataForDatatable) {
            return $this->returnDataTable($params, $sql, 'payments.created_at', true);
        }
        $length = $params['length'] ?? 5;

        return $sql->orderBy('payments.created_at', 'desc')->paginate($length);
    }
}
