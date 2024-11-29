<?php

namespace App\Repositories\Repository;

use App\Models\PaymentMethod;
use App\Repositories\BaseRepository;

class PayMethodRepository extends BaseRepository
{
    public function __construct(PaymentMethod $paymentMethod)
    {
        parent::__construct($paymentMethod);
    }
}
