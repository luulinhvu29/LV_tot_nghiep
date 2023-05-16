@extends('admin.layout.master')

@section('title', 'User-Detail')

@section('body')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Quản lý người dùng
                        <div class="page-title-subheading">
                            Quản lý khách hàng, admin, đối tác vận chuyển.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a href="./admin/user/{{ $user->id }}/edit" class="nav-link">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-edit fa-w-20"></i>
                                    </span>
                    <span>Chỉnh sửa</span>
                </a>
            </li>

            <li class="nav-item delete">
                <form action="" method="post">
                    <button class="nav-link btn" type="submit"
                            onclick="return confirm('Do you really want to delete this item?')">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-trash fa-w-20"></i>
                                        </span>
                        <span>Xóa</span>
                    </button>
                </form>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">
                        <div class="position-relative row form-group">
                            <label for="image" class="col-md-3 text-md-right col-form-label">Hình ảnh đại diện</label>
                            <div class="col-md-9 col-xl-8">
                                <p>
                                    <img style="height: 200px;" class="rounded-circle" data-toggle="tooltip"
                                         title="Avatar" data-placement="bottom"
                                         src="front/img/user/{{ $user->avatar ?? 'default-avatar.PNG' }}" alt="Avatar">
                                </p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">
                                Tên
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $user->name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>


                        <div class="position-relative row form-group">
                            <label for="country"
                                   class="col-md-3 text-md-right col-form-label">Quốc tịch</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $user->country }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="phone" class="col-md-3 text-md-right col-form-label">Số điện thoại</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $user->phone }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="level" class="col-md-3 text-md-right col-form-label">Phân quyền</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ \App\Utilities\Constant::$user_level[$user->level] }}</p>
                            </div>
                        </div>

                        @if($user->level == \App\Utilities\Constant::user_level_admin)
                            <div class="position-relative row form-group">
                                <label for="authority"
                                       class="col-md-3 text-md-right col-form-label">Authority</label>
                                <div class="position-relative form-check">
                                    <div class="col-md-5 col-xl-2">
                                        <input disabled class="form-check-input" type="checkbox" name="authority_user" id="authority_user" @if($user->authority[0]->user == true) checked @endif >
                                        <label for="exampleCheck" class="form-check-label">User</label>
                                    </div>
                                </div>

                                <div class="position-relative form-check">
                                    <div class="col-md-5 col-xl-2">
                                        <input disabled class="form-check-input" type="checkbox" name="authority_pro" id="authority_pro" @if($user->authority[0]->pro == true) checked @endif >
                                        <label for="exampleCheck" class="form-check-label">Product</label>
                                    </div>
                                </div>

                                <div class="position-relative form-check">
                                    <div class="col-md-5 col-xl-2">
                                        <input disabled class="form-check-input" type="checkbox" name="authority_order" id="authority_order" @if($user->authority[0]->order == true) checked @endif >
                                        <label for="exampleCheck" class="form-check-label">Order</label>
                                    </div>
                                </div>

                                <div class="position-relative form-check">
                                    <div class="col-md-5 col-xl-2">
                                        <input disabled class="form-check-input" type="checkbox" name="authority_cate" id="authority_cate" @if($user->authority[0]->cate == true) checked @endif >
                                        <label for="exampleCheck" class="form-check-label">Category</label>
                                    </div>
                                </div>

                                <div class="position-relative form-check">
                                    <div class="col-md-5 col-xl-2">
                                        <input disabled class="form-check-input" type="checkbox" name="authority_brand" id="authority_brand" @if($user->authority[0]->brand == true) checked @endif >
                                        <label for="exampleCheck" class="form-check-label">Brand</label>
                                    </div>
                                </div>

                                <div class="position-relative form-check">
                                    <div class="col-md-5 col-xl-2">
                                        <input disabled class="form-check-input" type="checkbox" name="authority_enter" id="authority_enter" @if($user->authority[0]->enter == true) checked @endif >
                                        <label for="exampleCheck" class="form-check-label">Enter</label>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="position-relative row form-group">
                            <label for="description"
                                   class="col-md-3 text-md-right col-form-label">Mô tả</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $user->description }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="./admin/user" class="border-0 btn btn-outline-danger mr-1">
                                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                                            <i class="fa fa-reply fa-w-20"></i>
                                                        </span>
                                    <span>Quay về</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection



