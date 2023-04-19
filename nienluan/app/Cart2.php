<?php
namespace App;
class Cart2{
    public $products = null;
    public $totalPrice = 0;
    public $totalQty = 0;



    public function __constant($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQty = $cart->totalQty;

        }
    }

    public function AddCart2($product, $id){
        $newProduct = ['qty' => 0, 'price' => $product->discount ?? $product->price, 'productInfo' => $product, 'img' => 'product-1.jpg'];
        if($this->products){
            if(array_key_exists($id, $products)){
                $newProduct = $products[$id];
                $newProduct['img'] = $products[$id]->productImages[0]->path;
            }
        }
        $newProduct['qty']++;
        $newProduct['price'] = $newProduct['qty'] * $product->discount ?? $product->price;

        $this->products[$id] = $newProduct;
        $this->totalPrice += $newProduct['price'];
        $this->totalQty += $newProduct['qty'];
    }
}
