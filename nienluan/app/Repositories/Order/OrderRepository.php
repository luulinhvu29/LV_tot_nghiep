<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;
use App\Utilities\Constant;
use Illuminate\Http\Request;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    public function getModel()
    {
        return Order::class;
    }

    public function getOrder($userId)
    {
        $orders = $this->model->where('user_id', $userId)->get();

        return $orders;
    }

    public function getOrderByUserId($userId, $request)
    {
        $orders = $this->model->where('user_id', $userId)->get();
        $orders = $this->sortAndPagination($orders, $request);
//        $orders = $orders->ordeBy('id');
        return $orders;
    }

    public function sortAndPagination($orders, Request $request ){

        $all = $orders;

        $sortBy = $request->sort_by ?? 'all';

        switch($sortBy){
            case 'all':
                $orders = $all;
                break;
            case 'Received Order':
                $orders = $orders->where('status', Constant::order_status_ReceiveOrders);
                break;
            case 'Shipping':
                $orders = $orders->where('status', Constant::order_status_Shipping);
                break;
            case 'Finish':
                $orders = $orders->where('status', Constant::order_status_Finish);
                break;
            case 'Cancel':
                $orders = $orders->where('status', Constant::order_status_Cancel);
                break;
            default:
                $orders = $all;
        }


//        $orders->appends(['sort_by' => $sortBy]);

        return $orders;
    }
}
