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
                        <span>Change password</span>
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
                        <h2>Doi mat khau</h2>

                        @if(session('notification'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('notification') }}
                            </div>
                        @endif

                        <form action="" method="post">
                            @csrf

                            <div class="group-input">
                                <label for="pass">Mật khẩu cũ<span>*</span></label>
                                <input type="password" id="old_password" name="old_password">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu mới<span>*</span></label>
                                <input type="password" id="new_password" name="new_password">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Nhập lại mật khẩu mới<span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation">
                            </div>
                            <button type="submit" class="site-btn register-btn">Đổi mật khẩu</button>
                        </form>
                        <div class="switch-login">
                            <a href="./account/login" class="or-login">Hủy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
