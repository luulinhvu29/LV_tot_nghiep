<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Authority\AuthorityServiceInterface;
use App\Services\Order\OrderServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    private $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getLogin(){
        return view('partner.login');
    }

    public function postLogin(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level'=> [Constant::user_level_host, Constant::user_level_partner], // Tai khoan cap do partner
        ];

        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended('partner'); // Mac dinh la: trang chu.
        }
        else
        {
            return back()->with('notification', 'Error: Email or password is wrong');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('partner/login');
    }

    public function index(){
        $orders = Order::where('partner_id', Auth::id())->get();

        return view('partner.index', compact('orders'));
    }

    public function shipping_index(){
        $orders = Order::where('partner_id', Auth::id())->get();
        $orders = $orders->where('status', Constant::order_status_Shipping);

        return view('partner.index', compact('orders'));
    }

    public function finish_index(){
        $orders = Order::where('partner_id', Auth::id())->get();
        $orders = $orders->where('status', Constant::order_status_Finish);


        return view('partner.index', compact('orders'));
    }

    public function shipping($id){
        $data['status'] = Constant::order_status_Shipping;

        $order = $this->orderService->find($id);

        $total = 0;

        foreach ($order->orderDetails as $orderDetail){
            $total = $total + $orderDetail->total;
        }

        $this->sendEmail($order, $total, $total);

        $this->orderService->update($data,$id);
        return back();
    }

    public function sendEmail($order, $total, $subtotal){

        $email_to = $order->email;

        Mail::send('front.checkout.email', compact('order', 'total', 'subtotal'),
            function ($message) use ($email_to) {
                $message->from('linhvu29112001@gmail.com', 'E-Comercial website');
                $message->to($email_to, $email_to);
                $message->subject('Order Notification');
            }
        );

    }

    public function refuse($id){
        $data['partner_id'] = '';

        $this->orderService->update($data,$id);
        return back();
    }

    public function finish($id){
        $data['status'] = Constant::order_status_Finish;
        $data['finish_day'] = today();

        $this->orderService->update($data,$id);
        return back();
    }
}
