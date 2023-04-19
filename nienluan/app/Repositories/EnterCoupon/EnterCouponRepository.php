<?php

namespace App\Repositories\EnterCoupon;

use App\Models\EnterCoupon;
use App\Repositories\BaseRepository;

class EnterCouponRepository extends BaseRepository implements EnterCouponRepositoryInterface
{

    public function getModel()
    {
        return EnterCoupon::class;
    }

    public function getEnterCouponByUserId($userId){

        return $this->model->where('user_id', $userId)
            ->get();
    }

    public function getEnterCouponByProductId($productId){

        return $this->model->where('product_id', $productId)
            ->get();
    }

}
