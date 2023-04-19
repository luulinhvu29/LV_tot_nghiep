<?php

namespace App\Services\EnterCoupon;
use App\Repositories\EnterCoupon\EnterCouponRepositoryInterface;
use App\Services\BaseService;

class EnterCouponService extends BaseService implements EnterCouponServiceInterface
{
    public $repository;

    public function __construct(EnterCouponRepositoryInterface $EnterCouponRepository)
    {
        $this->repository = $EnterCouponRepository;
    }

    public function getEnterCouponByUserId($userId){
        return $this->repository->getEnterCouponByUserId($userId);
    }

    public function getEnterCouponByProductId($productId){
        return $this->repository->getEnterCouponByProductId($productId);
    }

}
