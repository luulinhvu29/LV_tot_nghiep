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
                        <a href="./account/my-order"><i class="fa fa-home"></i> My Address </a>
                        <span>Address Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- My Order -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <form method="post" action="./account/address/{{ $address->id }}" enctype="multipart/form-data">

                            @csrf

                            <div class="position-relative row form-group">
                                <label for="city" class="col-md-3 text-md-right col-form-label">Tỉnh / Thành phố</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="city" id="city" placeholder="City" type="text"
                                           class="form-control" value="{{ $address->city }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="town"
                                       class="col-md-3 text-md-right col-form-label">Quận / Huyện</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="town" id="town" placeholder="Town" type="text"
                                           class="form-control" value="{{ $address->town }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="village"
                                       class="col-md-3 text-md-right col-form-label">Phường / Xã</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="village" id="village" placeholder="Village" type="text"
                                           class="form-control" value="{{ $address->village }}">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="address"
                                       class="col-md-3 text-md-right col-form-label">Tên đường, số nhà</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="address" id="address" placeholder="Address" type="text"
                                           class="form-control" value="{{ $address->address }}">
                                </div>
                            </div>


                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="./account/address" class="border-0 btn btn-outline-danger mr-1">
                                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                                            <i class="fa fa-times fa-w-20"></i>
                                                        </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit"
                                            class="btn-shadow btn-hover-shine btn btn-primary">
                                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                                            <i class="fa fa-download fa-w-20"></i>
                                                        </span>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
