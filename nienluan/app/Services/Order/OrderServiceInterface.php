<?php

namespace App\Services\Order;

use App\Services\ServiceInterface;

interface OrderServiceInterface extends ServiceInterface
{
    public function getOrder($userId);
    public function getOrderByUserId($userId,$request);
}
