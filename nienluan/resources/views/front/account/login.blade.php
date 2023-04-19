@extends('front.layout.master')

@section('title', 'Login')

@section('body')
    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home </a>
                        <span>Login</span>
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
                    <div class="login-form">
                        <h2>Đăng nhập</h2>


                        <form action="" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="email">Email <span>*</span></label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu <span>*</span></label>
                                <input type="password" id="pass" name="password">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Lưu mật khẩu
                                        <input type="checkbox" id="save-pass" name="remember">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Quên mật khẩu ?</a>
                                </div>
                            </div>

                            @if(session('notification'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('notification') }}
                                </div>
                            @endif


                            <button type="submit" class="site-btn login-btn">Đăng nhập</button>
                        </form>
                        <div class="switch-login">
                            <h4>Hoặc</h4>
                            <a href="./account/register" class="or-login">Tạo tài khoản mới</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
