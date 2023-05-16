<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EnterCoupon;

use App\Models\Product;
use App\Services\EnterCoupon\EnterCouponServiceInterface;
use App\Services\Product\ProductServiceInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function React\Promise\all;

class EnterCouponController extends Controller
{

    private $productService;
    private $enterCouponService;

    public function __construct(ProductServiceInterface $productService,
                                EnterCouponServiceInterface $enterCouponService,
                                )
    {
        $this->productService = $productService;
        $this->enterCouponService = $enterCouponService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $enter_coupons = $this->enterCouponService->all();
        if($request->get('search')!=null){
            $product = $this->productService->searchAndPaginate('name', $request->get('search'))->first();
            $enter_coupons = $this->enterCouponService->searchAndPaginate('product_id', $product->id);
        }
//        $product = Product::where('id',$request->get('search'))->first();
//        if($product) {
//            $enter_coupons = $this->enterCouponService->searchAndPaginate('product_id', $product->id);
//        }else{
//            $enter_coupons = $this->enterCouponService->searchAndPaginate()
//        }

        return view('admin.enter_coupon.index', compact('enter_coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->productService->all();

        return view('admin.enter_coupon.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();

        $this->enterCouponService->create($data);

        return redirect('admin/enter_coupon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EnterCoupon  $enterCoupon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enter_coupon = $this->enterCouponService->find($id);

        return view('admin.enter_coupon.show', compact('enter_coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EnterCoupon  $enterCoupon
     * @return \Illuminate\Http\Response
     */
    public function edit(EnterCoupon $enterCoupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EnterCoupon  $enterCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnterCoupon $enterCoupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EnterCoupon  $enterCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnterCoupon $enterCoupon)
    {
        //
    }
}
