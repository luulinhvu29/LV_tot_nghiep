@extends('admin.layout.master')

@section('title', 'Product-Detail')

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
                        Product
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="position-relative row form-group">
                            <label for="" class="col-md-3 text-md-right col-form-label">Images</label>
                            <div class="col-md-9 col-xl-8">
                                <ul class="text-nowrap overflow-auto" id="images">

                                    @foreach($enter_coupon->product->productImages as $productImage)

                                    <li class="d-inline-block mr-1" style="position: relative;">
                                        <img style="height: 150px;" src="./front/img/products/{{ $productImage->path }}"
                                             alt="Image">
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>



                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $enter_coupon->product->name }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="qty"
                                   class="col-md-3 text-md-right col-form-label">Enter Qty</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $enter_coupon->enter_qty }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="price"
                                   class="col-md-3 text-md-right col-form-label">Enter Price</label>
                            <div class="col-md-9 col-xl-8">
                                <p>${{ $enter_coupon->enter_price }}</p>
                            </div>
                        </div>


                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="admin/enter_coupon" class="btn-shadow btn-hover-shine btn btn-danger">
                                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                                            <i class="fa fa-reply fa-w-20"></i>
                                                        </span>
                                    <span>Back</span>
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
