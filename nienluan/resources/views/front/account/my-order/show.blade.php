@extends('front.layout.master')

@section('title', 'Order Detail')

@section('body')

    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/"><i class="fa fa-home"></i> Home </a>
                        <a href="./account/my-order"><i class="fa fa-home"></i> My Order </a>
                        <span>Order Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- My Order -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">
                                Order ID:
                                <b>{{ $order->id }}</b>
                            </a>
                        </div>
                        <h4>Billing Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name</label>
                                <input disabled type="text" id="fir" value="{{ $order->first_name }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name</label>
                                <input disabled type="text" id="last" value="{{ $order->last_name }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="com">Company Name</label>
                                <input disabled type="text" id="com" value="{{ $order->company_name }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="coun">Country</label>
                                <input disabled type="text" id="coun" value="{{ $order->country }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="add">Street Address</label>
                                <input disabled type="text" id="add" class="street-first" value="{{ $address->address }}, {{ $address->village }}, {{ $address->town }}, {{ $address->city }}">
                            </div>

                            <div class="col-lg-6">
                                <label for="email">Email Address</label>
                                <input disabled type="text" id="email" value="{{ $order->email }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone Number</label>
                                <input disabled type="text" id="phone" value="{{ $order->phone }}">
                            </div>
                            <div class="col-lg-12">
                                <label for="phone">Ngày đặt hàng</label>
                                <input disabled type="text" id="created_at" value="{{ $order->created_at }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">
                                Status:
                                <b>{{ \App\Utilities\Constant::$order_status[$order->status] }}</b>
                            </a>
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">

                                    <li>Product <span>Total</span></li>

                                    @foreach($order->orderDetails as $orderDetail)
                                        <li class="fw-normal">
                                            @if( $orderDetail->size)
                                                {{ $orderDetail->product->name }} - {{ $orderDetail->size }} x {{ $orderDetail->qty }}
                                            @else
                                                {{ $orderDetail->product->name }} x {{ $orderDetail->qty }}
                                            @endif

                                            <span>${{ $orderDetail->total }}</span>
                                        </li>
                                    @endforeach

                                    <li class="total-price">Total <span>${{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}</span></li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Pay later
                                            <input disabled type="radio" name="payment_type" value="pay_later" id="pc-check"
                                                   {{ $order->payment_type == 'pay_later' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label>
                                            Online Payment
                                            <input disabled type="radio" name="payment_type" value="online_payment" id="pc-paypal"
                                                    {{ $order->payment_type == 'online_payment' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Back to HomePage</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
