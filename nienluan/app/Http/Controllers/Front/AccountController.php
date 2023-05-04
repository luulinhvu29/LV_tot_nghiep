<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Services\Address\AddressServiceInterface;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductComment\ProductCommentServiceInterface;
use App\Services\ProductDetail\ProductDetailServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Common;
use App\Utilities\Constant;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class AccountController extends Controller
{
    //

    private $userService;
    private $orderService;
    private $orderDetailService;
    private $productService;
    private $productDetailService;
    private $addressService;
    private $productCommentService;

    public function __construct(UserServiceInterface $userService,
                                OrderServiceInterface $orderService,
                                OrderDetailServiceInterface $orderDetailService,
                                ProductServiceInterface $productService,
                                ProductDetailServiceInterface $productDetailService,
                                AddressServiceInterface $addressService,
                                ProductCommentServiceInterface $productCommentService,
    )
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        $this->productService = $productService;
        $this->productDetailService = $productDetailService;
        $this->addressService = $addressService;
        $this->productCommentService = $productCommentService;

    }

    public function login()
    {
        return view('front.account.login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level'=> Constant::user_level_client, // Muc do khach hang bth
        ];

        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)){
           // return redirect(''); //trang chu
            return redirect()->intended(''); // Mac dinh la: trang chu.
        }
        else
        {
            return back()->with('notification', 'Error: Email or password is wrong');
        }

    }


    public function logout(){
        Auth::Logout();

        return back();
    }

    public function register(){
        return view('front.account.register');
    }

    public function postRegister(Request $request){

        if($request->password != $request->password_confirmation){
            return back()
                ->with('notification', 'ERROR: Confirm password does not match');
        }

        $users = $this->userService->all();

        foreach ($users as $user){
            if($request->email == $user->email){
                return back()
                    ->with('notification', 'ERROR: Email has already existed');
            }
        };


        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'country' => $request->country,
            'phone' => $request->phone,
            'level' => Constant::user_level_client, // Dang ky tai khoan cap khach hang
        ];

        $this->userService->create($data);

        $i = 0;

        $users = $this->userService->all();

        foreach ($users as $user){
            $i =  $user->id;
        };

        $add = [
            'city' =>$request->city,
            'town' => $request->town,
            'village' => $request->village,
            'address' => $request->address,
            'user_id' => $i,
        ];

        $this->addressService->create($add);


        return redirect('account/login')
            ->with('notification', 'Register success! Please Login.');

    }

    public function myOrderIndex(Request $request){

        $all = $this->orderService->getOrder(Auth::id());

        $orders = $this->orderService->getOrderByUserId(Auth::id(), $request);

        $orderCancel = $all->where('status', Constant::order_status_Cancel);

        $orderShipping = $all->where('status', Constant::order_status_Shipping);

        $orderReceivedOrder = $all->where('status', Constant::order_status_ReceiveOrders);

        $orderFinish = $all->where('status', Constant::order_status_Finish);



        return view('front.account.my-order.index', compact('orders', 'orderCancel','orderShipping','orderReceivedOrder','orderFinish','all'));
    }

    public function myOrderShow($id){

        $order = $this->orderService->find($id);

        $address = $this->addressService->find($order->address);

        return view('front.account.my-order.show', compact('order', 'address'));
    }

    public function myOrderComment($id){

        $order = $this->orderService->find($id);


        return view('front.account.my-order.comment', compact('order'));
    }

    public function postOrderComment(Request $request, $id){

        $orderDetail = $this->orderDetailService->find($id);

        $data = [
            'rating' => $request->rating,
            'user_id' => Auth::id(),
            'name' => User::find(Auth::id())->name,
            'email' => User::find(Auth::id())->email,
            'messages' => $request->messages,
            'product_id' => $orderDetail->product->id,
        ];

        $this->productCommentService->create($data);

        return back();
    }

    public function myOrderCancel($id){

        $order = $this->orderService->find($id);

        $st = [
          'status' => 0,
        ];

        $this->orderService->update($st, $order->id);

        $orderDetails=$this->orderDetailService->getOrderDetailByOrderId($order->id);

        foreach ($orderDetails as $orderDetail){
            $product = $this->productService->find($orderDetail->product_id);

            if($product->tag =='Clothing') {

                $productDetail = $this->productDetailService->getProductDetailBySize($orderDetail->size, $product->id);

                $qty = [
                    'qty' => $productDetail[0]->qty + $orderDetail->qty,
                ];

                $this->productDetailService->update($qty, $productDetail[0]->id);
            }




            $qty = [
                'qty' => $product->qty + $orderDetail->qty,
            ];

            $this->productService->update($qty,$product->id);
        }

        return redirect('account/my-order');
    }

    public function myOrderDelete($id){

        $this->orderService->delete($id);
        $orderDetails = $this->orderDetailService->getOrderDetailByOrderId($id);

        foreach ($orderDetails as $orderDetail){
            $this->orderDetailService->delete($orderDetail->id);
        }

        return redirect('account/my-order');

    }


    public function info(){
        $user = $this->userService->find(Auth::id());

        return view('front.account.info', compact('user'));
    }

    public function change_password(){


        return view('front.account.change_password');
    }

    public function post_change_password(Request $request){

        $user = $this->userService->find(Auth::id());

        $data = [
          'password' => bcrypt($request->get('new_password')),
        ];

        if(Hash::check($request->old_password, $user->password)!=1){
            return back()
                ->with('notification', 'ERROR: Mat khau cu khong dung');
        }elseif($request->new_password != $request->password_confirmation){
            return back()
                ->with('notification', 'ERROR: Confirm password does not match');
        }else{
            $this->userService->update($data,$user->id);
            return redirect('account/info/'.$user->id)
                ->with('notification', 'Change password successful!');
        }

    }

    public function change_info(){
        $user = $this->userService->find(Auth::id());

        return view('front.account.change_info', compact('user'));
    }

    public function post_change_info(Request $request){

        $user = $this->userService->find(Auth::id());

        $data = $request->all();

        if($request->hasFile('image')){
            //Them file moi:
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');

            //Xoa file cu:
            $file_name_old = $request->get('image_old');
            if($file_name_old != ''){
                unlink('front/img/user/' . $file_name_old);
            }
        }

        $this->userService->update($data,$user->id);

        return redirect('account/info/'.$user->id)
            ->with('notification', 'Change infomation successful!');
    }

    public function myAddressIndex(){
        $addresses = $this->addressService->getAddressByUserId(Auth::id());

        return view('front.account.address.index', compact('addresses'));

    }

    public function myAddressCreate(){

        return view('front.account.address.create');
    }

    public function myAddressShow($id){
        $address = $this->addressService->find($id);

        return view('front.account.address.show', compact('address'));
    }



    public function postAddress(Request $request){
        $data = $request->all();
        $data['user_id'] = Auth::id();

        $this->addressService->create($data);

        return back();
    }

    public function myAddressDelete($id){

        $this->addressService->delete($id);

        return redirect('account/address');
    }

    public function myAddressUpdate(Request $request, $id){

        $data = $request->all();

        $this->addressService->update($data, $id);

        return redirect('account/address');
    }


}
