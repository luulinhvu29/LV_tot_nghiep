@extends('front.layout.master')

@section('title', 'Register')

@section('body')

    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home </a>
                        <span>Resgister</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Register section-->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Đăng ký</h2>

                        @if(session('notification'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('notification') }}
                            </div>
                        @endif

                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="name">Tên người dùng <span style="color: red">*</span></label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="group-input">
                                <label for="email">Email <span style="color: red">*</span></label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu <span style="color: red">*</span></label>
                                <input type="password" id="pass" name="password" required>
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Nhập lại mật khẩu <span style="color: red">*</span></label>
                                <input type="password" id="con-pass" name="password_confirmation" required>
                            </div>

                            <div class="group-input">
                                <label for="country">Quốc gia<span style="color: red">*</span></label>
                                <input type="text" id="country" name="country" required>
                            </div>

                            <div class="group-input">
                                <label for="phone">Số điện thoại<span style="color: red">*</span></label>
                                <input type="text" id="phone" name="phone" required>
                            </div>

                            <div class="group-input">
                                <label for="street_address">Địa chỉ</label>
                                <div class="container">
                                    <div class="col-lg-8">
                                        Tỉnh / Thành phố: <input type="text" id="city" name="city">
                                    </div>

                                    <div class="col-lg-8">
                                        Quận / Huyện: <input type="text" id="town" name="town">
                                    </div>

                                    <div class="col-lg-8">
                                        Phường / Xã: <input type="text" id="village" name="village">
                                    </div>

                                    <div class="col-lg-8">
                                        Đường, số nhà: <input type="text" id="address" name="address">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="site-btn register-btn">Đăng ký</button>
                        </form>
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">Đã có tài khoản - Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
