@extends('front.layout.master')

@section('title', 'Info')

@section('body')

    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home </a>
                        <span>My-Account</span>
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
                        @if(session('notification'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('notification') }}
                            </div>
                        @endif

                        <h2>Thông tin của tôi</h2>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body display_data">
                                        <div class="position-relative row form-group">
                                            <label for="image" class="col-md-3 text-md-right col-form-label">Ảnh đại diện</label>
                                            <div class="col-md-6 col-form-label">
                                                <p>
                                                    <img style="height: 200px;" class="rounded-circle" data-toggle="tooltip"
                                                         title="Avatar" data-placement="bottom"
                                                         src="front/img/user/{{ $user->avatar ?? 'default-avatar.PNG'}}" alt="Avatar">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                                Tên
                                            </label>
                                            <div class="col-md-6 col-form-label">
                                                <p>{{ $user->name }}</p>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                            <div class="col-md-6 col-form-label">
                                                <p>{{ $user->email }}</p>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="country"
                                                   class="col-md-3 text-md-right col-form-label">Quốc gia</label>
                                            <div class="col-md-6 col-form-label">
                                                <p>{{ $user->country }}</p>
                                            </div>
                                        </div>


                                        <div class="position-relative row form-group">
                                            <label for="phone" class="col-md-3 text-md-right col-form-label">Số điện thoại</label>
                                            <div class="col-md-6 col-form-label">
                                                <p>{{ $user->phone }}</p>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label for="description"
                                                   class="col-md-3 text-md-right col-form-label">Mô tả</label>
                                            <div class="col-md-6 col-form-label">
                                                <p>{{ $user->description }}</p>
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <div class="col-md-6 text-center col-form-label">
                                                <a class="site-btn register-btn" href="./account/address">Quản lý địa chỉ</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <a class="site-btn register-btn" href="./account/info/{{ $user->id }}/change_password">Đổi mật khẩu</a>
                        <a class="site-btn register-btn" href="./account/info/{{ $user->id }}/change_info">Sửa thông tin</a>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


