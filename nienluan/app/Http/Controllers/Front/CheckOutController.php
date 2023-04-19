<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Address\AddressServiceInterface;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductDetail\ProductDetailServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Models\ProductDetail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function Sodium\add;

class CheckOutController extends Controller
{
    //
    private $orderService;
    private $orderDetailService;
    private $productService;
    private $productDetailService;
    private $addressService;

    public function __construct(OrderServiceInterface $orderService,
                                OrderDetailServiceInterface $orderDetailService,
                                ProductServiceInterface $productService,
                                ProductDetailServiceInterface $productDetailService,
                                AddressServiceInterface $addressService
    )
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        $this->productService = $productService;
        $this->productDetailService = $productDetailService;
        $this->addressService = $addressService;
    }

    public function index(){

        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        $addresses = $this->addressService->getAddressByUserId(Auth::id());



        return view('front.checkout.index', compact('carts', 'total','subtotal','addresses'));
    }

    public function addOrder(Request $request){

        // 1. Them don hang
        $data = $request->all();

        $data['status'] = Constant::order_status_ReceiveOrders;
        $order = $this->orderService->create($data);

        // 2. Them chi tiet don hang
        $carts = Cart::content();

        foreach ($carts as $cart){
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'size' => $cart->size ?? '',
                'total' => $cart->qty * $cart->price,
                'created_at' => today(),
            ];

            $this->orderDetailService->create($data);

            $product = $this->productService->find($data['product_id']);

            if($product->productDetails and $product->tag == 'Clothing'){
                // Cap nhat so luong sp
                $productDetail = $this->productDetailService->getProductDetailBySize($data['size'], $data['product_id']);


                $upData = [
                    'qty' => $productDetail[0]->qty - $data['qty'],
                ];

                $this->productDetailService->update($upData, $productDetail[0]->id);
                $this->uppdateQty($data['product_id']);
            }else{
                $upData = [
                    'qty' => $product->qty - $data['qty'],
                ];

                $this->productService->update($upData, $product->id);
            }

        }

        if($request->payment_type == 'pay_later'){

            //Gui email:
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal); // Goi ham gui email

            // 3. Xoa gio hang
            Cart::destroy();



            // 4. Tra ve ket qua thong bao
            return redirect('checkout/result')
                ->with('notification', 'Đặt hàng thanhf công. Đơn hàng của bạn đang vận chuyển. Kiểm tra email bạn nhé <3');
        }
        if($request->payment_type == 'online_payment'){
            // 1. Lay URL thanh toan VNPay:
            $data_url = VNPay::vnpay_create_payment([
               'vnp_TxnRef' => $order->id, // ID don hang
                'vnp_OrderInfo' => 'Mô tả đơn hàng ở đây ... ', // Mo ta don hang (dien tuy y)
                'vnp_Amount' => Cart::total(0,'','') * 23000, //Tong gia don hang sau khi chuyen doi tien Viet
            ]);

            // 2. Chuyen huong toi URL lay duoc:
            return redirect($data_url);



        }
    }

    public function vnPayCheck(Request $request){

        // 1. Lay data tu URL (do VNPay gui ve qua $vnp_Returnurl)
        $vnp_ResponeCode = $request->get('vnp_ResponseCode'); // Ma phan hoi ket qua thanh toan: 00 = thanh cong
        $vnp_TxnRef = $request->get('vnp_TxnRef'); // order_id
        $vnp_Amount = $request->get('vnp_Amount'); // So tien thanh toan

        // 2. Kiem tra data, xem ket qua giao dich gui ve tu VNPay hop le hay khong:
        if($vnp_ResponeCode != null){
            // Neu thanh cong
            if($vnp_ResponeCode == 00){

                //Gui email:
                $order = $this->orderService->find($vnp_TxnRef);
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendEmail($order, $total, $subtotal); // Goi ham gui email

                Cart::destroy();

                // Thong bao ket qua
                return redirect('checkout/result')
                    ->with('notification', 'Thanh toán online thành công. Hãy kiểm tra email của bạn.');
            }else{
                // Neu khong thanh cong
                $this->orderService->delete($vnp_TxnRef);

                // Thong bao loi
                return redirect('checkout/result')
                    ->with('notification', 'fail r ong giao ah');
            }

        }


    }

    public function uppdateQty($product_id){
        $product = $this->productService->find($product_id);
        $productDetails = $product->productDetails;

        $totalQty = array_sum(array_column($productDetails->toArray(), 'qty'));

        $this->productService->update(['qty' => $totalQty], $product_id);
    }

    public function result(){
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
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

}
