<?php

namespace App\Services\Order;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Services\BaseService;

class OrderService extends BaseService implements OrderServiceInterface
{
    public $repository;

    public function __construct(OrderRepositoryInterface $OrderRepository)
    {
        $this->repository = $OrderRepository;
    }

    public function getOrder($userId)
    {
        return $this->repository->getOrder($userId);
    }

    public function getOrderByUserId($userId, $request)
    {
        return $this->repository->getOrderByUserId($userId, $request);
    }
}
