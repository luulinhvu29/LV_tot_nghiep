@extends('front.layout.master')

@section('title', 'Check out')

@section('body')
    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home </a>
                        <a href="./shop">Shop</a>
                        <span>Check-out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- checkout section-->
    <div class="checkout-section" spad>
        <div class="container">
            <form action="" method="post" href="./checkout/check" class="checkout-form">
                @csrf
                <div class="row">

                    @if(Cart::count() > 0)
                        <div class="col-lg-6">

                            <h4>Thông tin đơn hàng</h4>
                            <div class="row">

                                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? '' }}">

                                <div class="col-lg-6">
                                    <label for="fir">Tên <span>*</span></label>
                                    <input type="text" id="fir" name="first_name" value="{{ Auth::user()->name ?? '' }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="last">Họ <span>*</span></label>
                                    <input type="text" id="last" name="last_name">
                                </div>

                                <div class="col-lg-12">
                                    <label for="coun">Quốc gia<span>*</span></label>
                                    <input type="text" id="coun" name="country" value="{{ Auth::user()->country ?? '' }}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="add">Địa chỉ nhà<span>*</span></label>
                                    <select required name="address" id="address" class="form-control">
                                        <option value="">-- Address --</option>

                                        @foreach($addresses as $address)
                                            <option value={{ $address->id ? $address->id : '' }}>
                                                {{ $address->address }}, {{ $address->village }}, {{ $address->town }}, {{ $address->city }}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-lg-12">
                                    <a href="./account/address" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-plus fa-w-20"></i>
                                    </span>
                                        Thêm địa chỉ mới
                                    </a>
                                </div>

                                <div class="col-lg-6">
                                    <label for="email">Email<span>*</span></label>
                                    <input type="text" id="email" name="email" value="{{ Auth::user()->email ?? '' }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone">Số điện thoại<span>*</span></label>
                                    <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="place-order">
                                <h4>Đơn hàng của bạn</h4>
                                <div class="order-total">
                                    <ul class="order-table">

                                        <li>Sản phẩm <span>Giá tiền</span></li>

                                        @foreach($carts as $cart)
                                            <li class="fw-normal">
                                                @if($cart->size)
                                                    {{ $cart->name }} - {{ $cart->size }} x {{ $cart->qty }}
                                                @else
                                                    {{ $cart->name }} x {{ $cart->qty }}
                                                @endif

                                                <span>${{ $cart->price * $cart->qty}}</span>
                                            </li>
                                        @endforeach

                                        <li class="fw-normal">Tổng phụ<span>${{ $subtotal }}</span></li>
                                        <li class="total-price">Tổng cộng <span>${{ $total }}</span></li>
                                    </ul>
                                    <div class="payment-check">
                                        <div class="pc-item">
                                            <label for="pc-check">
                                                Trả sau
                                                <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="pc-item">
                                            <label>
                                                Thanh toán online
                                                <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="order-btn">
                                        <button type="submit" class="site-btn place-btn">Đặt hàng</button>
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
            </form>
        </div>
    </div>


@endsection


