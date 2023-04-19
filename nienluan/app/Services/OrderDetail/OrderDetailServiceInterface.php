<?php

namespace App\Services\OrderDetail;

use App\Services\ServiceInterface;

interface OrderDetailServiceInterface extends ServiceInterface
{
    public function getOrderDetailByOrderId($orderId);
}
