<?php

namespace App\Repositories\EnterCoupon;

use App\Repositories\RepositoryInterface;

interface EnterCouponRepositoryInterface extends RepositoryInterface
{
    public function getEnterCouponByUserId($userId);

    public function getEnterCouponByProductId($productId);

}
