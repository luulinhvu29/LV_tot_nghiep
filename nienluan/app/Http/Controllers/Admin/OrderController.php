<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Services\Address\AddressServiceInterface;
use App\Services\Order\OrderServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    private $orderService;
    private $addressService;

    public function __construct(OrderServiceInterface $orderService,
                                AddressServiceInterface $addressService,)
    {
        $this->orderService = $orderService;
        $this->addressService = $addressService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::where('hide', false);
        $orders = $this->orderService->searchAndPaginate('first_name',$request->get('search'), 100)->where('hide', false);



        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderService->find($id);

        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->orderService->find($id);

        $users = User::all();
        $users = $users->where('level',Constant::user_level_partner);



        return view('admin.order.edit', compact('order','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();

        $this->orderService->update($data, $id);
        return redirect('admin/order/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orderService->delete($id);

        return redirect('admin/order');
    }

    public function hide($id){
        $data['hide'] = true;
        $this->orderService->update($data, $id);

        return redirect('admin/order');
    }
}
