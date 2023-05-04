<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Services\Order\OrderServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use function GuzzleHttp\Promise\all;

class StatisticController extends Controller
{
    private $orderService;
    private $productService;

    public function __construct(OrderServiceInterface $orderService,
                                ProductServiceInterface $productService)
    {
        $this->orderService = $orderService;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $orders = $this->orderService->all();

       // $product = $this->productService->searchAndPaginate('name', $request->get('search'))->first();
        //$orderDetails = OrderDetail::where('product_id', $product->id);


       //$orders = $this->orderService->searchAndPaginate('product_id',$request->get('search'));

        $orders = $orders->where('status', Constant::order_status_Finish);

        $sum = 0;

        foreach ($orders as $order){
            foreach ($order->orderDetails as $orderDetail){
                $sum = $sum + $orderDetail->total - \App\Models\EnterCoupon::where('product_id',$orderDetail->product->id)->first()->enter_price * $orderDetail->qty;
            }

        };

        // xử lý dữ liệu và trả về trang thống kê
        return view('admin.statistics.index', compact('orders','sum'));
    }

    public function filter_day(Request $request){
        $from = $request->from;
        $to = $request->to;

        $orders = $this->orderService->all();
        //$orders = $this->orderService->searchAndPaginate('id',$request->get('search'));
        $orders = $orders->where('status', Constant::order_status_Finish);

        if($from === null){
            $from = date('d-m-Y', 1-1-1900);
        }

        if($to === null){
            $to = today();
            $orders = $orders->whereBetween('finish_day',[$from,$to]);
        }else{
            $to = Carbon::parse($to)->addDay();
            $orders = $orders->whereBetween('finish_day',[$from,$to]);
            $to = $to->subDay()->toDateString();
            $to = date('Y-m-d', strtotime($to));
        }


        $sum = 0;

        foreach ($orders as $order){
            foreach ($order->orderDetails as $orderDetail){
                $sum = $sum + $orderDetail->total - \App\Models\EnterCoupon::where('product_id',$orderDetail->product->id)->first()->enter_price * $orderDetail->qty;
            }

        };

        // xử lý dữ liệu và trả về trang thống kê
        return view('admin.statistics.index', compact('orders','sum','from','to'));
    }
}
