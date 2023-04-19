<?php

namespace App\Services\EnterCoupon;

use App\Services\ServiceInterface;

interface EnterCouponServiceInterface extends ServiceInterface
{
    public function getEnterCouponByUserId($userId);

    public function getEnterCouponByProductId($productId);
}
