@extends('admin.layout.master')

@section('title', 'Enter Coupon-Create')

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
                        Phiếu nhập
                        <div class="page-title-subheading">
                            Quản lý nhập hàng.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="admin/enter_coupon" enctype="multipart/form-data">

                            @csrf

                            <div class="position-relative row form-group">
                                <label for="product_id"
                                       class="col-md-3 text-md-right col-form-label">Sản phẩm</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="product_id" id="product_id" class="form-control">
                                        <option value="">-- Sản phẩm --</option>

                                        @foreach($products as $product)
                                            <option value={{ $product->id }}>
                                                {{ $product->id }}: {{ $product->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="enter_qty"
                                       class="col-md-3 text-md-right col-form-label">Số lượng nhập</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="enter_qty" id="enter_qty"
                                           placeholder="Enter Qty" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="enter_price"
                                       class="col-md-3 text-md-right col-form-label">Giá nhập</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="enter_price" id="enter_price"
                                           placeholder="Enter Price" type="text" class="form-control" value="">
                                </div>
                            </div>


                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="admin/enter_coupon" class="border-0 btn btn-outline-danger mr-1">
                                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                                            <i class="fa fa-times fa-w-20"></i>
                                                        </span>
                                        <span>Hủy</span>
                                    </a>

                                    <button type="submit"
                                            class="btn-shadow btn-hover-shine btn btn-primary">
                                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                                            <i class="fa fa-download fa-w-20"></i>
                                                        </span>
                                        <span>Thêm</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

    {{-- CK Editor --}}
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('description');
    </script>

@endsection
