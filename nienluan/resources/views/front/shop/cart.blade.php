
@extends('front.layout.master')

@section('title', 'Shopping Cart')

@section('body')

    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home </a>
                        <a href="./shop">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shopping cart section-->
    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">

                @if(Cart::count() > 0)
                    <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th><i onclick="confirm('Are you sure to delete all products in your cart?') === true ? destroyCart() : '' "
                                       style="cursor: pointer" class="ti-close"></i>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($carts as $cart)
                                <tr data-rowid="{{ $cart->rowId }}">
                                    <td class="cart-pic first-row" ><img style="height: 170px" src="front/img/products/{{ $cart->options->images[0]->path }}" alt=""></td>
                                    <td class="cart-title first-row">
                                        @if($cart->size)
                                            <li hidden id="max" value="{{ \App\Models\ProductDetail::where('size',$cart->size)->where('product_id', $cart->id)->get()->first()->qty }}"></li>
                                            <h5>{{ $cart->name }} - {{ $cart->size }}</h5>
                                        @else
                                            <li hidden id="max" value="{{ \App\Models\Product::where('id', $cart->id)->get()->first()->qty }}"></li>
                                            <h5>{{ $cart->name }}</h5>
                                        @endif
                                    </td>
                                    <td class="p-price first-row">${{ number_format($cart->price, 2) }}</td>
                                    <td class="qua-col first-row">

                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input id="qty-{{ $cart->rowId }}" type="text" value="{{ $cart->qty }}" data-rowid="{{ $cart->rowId }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">${{ number_format($cart->price * $cart->qty, 2) }}</td>
                                    <td class="close-td first-row">
                                        <i class="ti-close" onclick="removeCart('{{ $cart->rowId }}')"></i>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                                <div class="discount-coupon">
                                    <h6>Discpunt codes</h6>
                                    <form action="#" class="coupon-form">
                                        <input type="text" placeholder="Enter your codes">
                                        <button type="submit" class="site-btn coupon-btn">Apply</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>${{ $total }}</span></li>
                                    <li class="cart-total">Total <span>${{ $subtotal }}</span></li>
                                </ul>
                                <a href="./checkout" class="proceed-btn">Tiến hành đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="col-lg-12">
                        <h4>Your cart is empty.</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

