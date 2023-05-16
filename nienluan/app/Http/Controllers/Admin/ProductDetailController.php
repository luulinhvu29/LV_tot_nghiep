<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Services\EnterCoupon\EnterCouponServiceInterface;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{

    private $productService;
    private $enterCouponService;
    private $orderService;
    private $orderDetailService;

    public function __construct(ProductServiceInterface $productService,
                                EnterCouponServiceInterface $enterCouponService,
                                OrderServiceInterface $orderService,
                                OrderDetailServiceInterface $orderDetailService,
    )
    {
        $this->productService = $productService;
        $this->enterCouponService = $enterCouponService;
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id, Request $request)
    {
        $product = $this->productService->find($product_id);

        $enter_coupon = $this->enterCouponService->getEnterCouponByProductId($product_id);
        $nk = 0;
        foreach ($enter_coupon as $enter){
            $nk = $nk + $enter->enter_qty;
        }

        $orderDetails = $this->orderDetailService->all();
        $orderDetails = $orderDetails->where('product_id', $product_id);

        $db = 0;

        foreach ($orderDetails as $orderDetail){
            $db = $db + $orderDetail->qty;
        }

        $productDetails = $product->productDetails;
        if($request->get('search')){
            $productDetails = $productDetails->where('size',$request->get('search'));
        }

        return view('admin.product.detail.index', compact('product','productDetails','nk','db'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $product = $this->productService->find($product_id);

        return view('admin.product.detail.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $data = $request->all();

        ProductDetail::create($data);

        $this->uppdateQty($product_id);

        return redirect('admin/product/' . $product_id .'/detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id, $product_detail_id)
    {
        $product = $this->productService->find($product_id);

        $enter_coupon = $this->enterCouponService->getEnterCouponByProductId($product_id);
        $nk = 0;
        foreach ($enter_coupon as $enter){
            $nk = $nk + $enter->enter_qty;
        }

        $orderDetails = $this->orderDetailService->all();
        $orderDetails = $orderDetails->where('product_id', $product_id);

        $db = 0;

        foreach ($orderDetails as $orderDetail){
            $db = $db + $orderDetail->qty;
        }

        $productDetail = ProductDetail::find($product_detail_id);

        return view('admin.product.detail.edit', compact('product','productDetail','db','nk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id, $product_detail_id)
    {
        $data = $request->all();
        ProductDetail::find($product_detail_id)->update($data);

        $this->uppdateQty($product_id);

        return redirect('admin/product/' . $product_id . '/detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $product_detail_id)
    {
        ProductDetail::find($product_detail_id)->delete();

        return redirect('admin/product/' . $product_id . '/detail');
    }

    //Common method
    public function uppdateQty($product_id){
        $product = $this->productService->find($product_id);
        $productDetails = $product->productDetails;

        $totalQty = array_sum(array_column($productDetails->toArray(), 'qty'));

        $this->productService->update(['qty' => $totalQty], $product_id);
    }
}
