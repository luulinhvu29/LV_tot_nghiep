<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use App\Cart2;

class CartController extends Controller
{
    //

    private $productService;
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function add(Request $request){
        if ($request->ajax()){
            $product = $this->productService->find($request->productId);

            $respone['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                ],
            ]);

            $respone['count'] = Cart::count();
            $respone['total'] = Cart::total();

            return $respone;
        }

        return back();
    }

    public function addToCart(Request $request){
        if ($request->ajax()){
            $product = $this->productService->find($request->productId);

            $respone['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                ],
            ]);



            $respone['count'] = Cart::count();
            $respone['total'] = Cart::total();

            return $respone;
        }

        return back();
    }

    public function addToCartS(Request $request){
        if ($request->ajax()){
            $product = $this->productService->find($request->productId);

            $respone['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                ],
            ]);

            $respone['cart']->size = 'S';

            $respone['count'] = Cart::count();
            $respone['total'] = Cart::total();

            return $respone;
        }

        return back();
    }

    public function addToCartM(Request $request){
        if ($request->ajax()){
            $product = $this->productService->find($request->productId);


            $respone['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                ],
            ]);

            $respone['cart']->size = 'M';

            $respone['count'] = Cart::count();
            $respone['total'] = Cart::total();

            return $respone;
        }

        return back();
    }

    public function addToCartL(Request $request){
        if ($request->ajax()){
            $product = $this->productService->find($request->productId);

            $respone['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                ],
            ]);

            $respone['cart']->size = 'L';

            $respone['count'] = Cart::count();
            $respone['total'] = Cart::total();

            return $respone;
        }

        return back();
    }

    public function addToCartXS(Request $request){
        if ($request->ajax()){
            $product = $this->productService->find($request->productId);

            $respone['cart'] = Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->discount ?? $product->price,
                'weight' => $product->weight ?? 0,
                'options' => [
                    'images' => $product->productImages,
                ],
            ]);

            $respone['cart']->size = 'XS';

            $respone['count'] = Cart::count();
            $respone['total'] = Cart::total();

            return $respone;
        }

        return back();
    }

    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        $products = DB::table('products')->get();

        return view('front.shop.cart', compact('carts','total','subtotal','products'));
    }

    public function delete(Request $request){
        if($request->ajax()){
            $response['cart'] = Cart::remove($request->rowId);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }

        return back();
    }

    public function destroy(){
        Cart::destroy();

    }

    public function update(Request $request){
        if($request->ajax()){
            $response['cart'] = Cart::update($request->rowId, $request->qty);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
    }


    public function AddCart2(Request $req, $id){
        $product = DB::table('products')->where('id',$id)->first();
        if($product != null){
            $oldCart = Session('Cart2') ? Session('Cart2'):null;
            $newCart = new Cart2($oldCart);
            $newCart->AddCart2($product, $id);


            $req->session()->put('Cart2', $newCart);

        }

        return view('front.layout.cart2', compact('newCart'));

    }
}
