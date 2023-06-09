@extends('front.layout.master')

@section('title', 'Result')

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
            <div class="row">
                <div class="col-lg-12">
                    <h4>
                        {{ $notification }}
                    </h4>

                    <a href="./" class="primary-btn mt-5">Quay về trang chủ</a>
                </div>
            </div>
        </div>
    </div>


@endsection


