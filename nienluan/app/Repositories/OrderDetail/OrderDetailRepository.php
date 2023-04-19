<?php

namespace App\Repositories\OrderDetail;

use App\Models\OrderDetail;
use App\Repositories\BaseRepository;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{

    public function getModel()
    {
        return OrderDetail::class;
    }

    public function getOrderDetailByOrderId($orderId){

        return $this->model->where('order_id', $orderId)
            ->get();
    }

}
