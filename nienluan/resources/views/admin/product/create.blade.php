@extends('admin.layout.master')

@section('title', 'Product-Create')

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
                        Sản phẩm
                        <div class="page-title-subheading">
                            Quản lý các sản phẩm thời trang siêu việt.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="admin/product" enctype="multipart/form-data">

                            @csrf

                            <div class="position-relative row form-group">
                                <label for="brand_id"
                                       class="col-md-3 text-md-right col-form-label">Thương hiệu</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="brand_id" id="brand_id" class="form-control">
                                        <option value="">-- Thương hiệu--</option>

                                        @foreach($brands as $brand)
                                            <option value={{ $brand->id }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="product_category_id"
                                       class="col-md-3 text-md-right col-form-label">Danh mục sản phẩm</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="product_category_id" id="product_category_id" class="form-control">
                                        <option value="">-- Danh mục sản phẩm --</option>

                                        @foreach($productCategories as $productCategory)
                                        <option value={{ $productCategory->id }}>
                                            {{ $productCategory->name }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Tên sản phẩm</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="name" id="name" placeholder="Name" type="text"
                                           class="form-control" value="">
                                </div>
                            </div>


                            <div class="position-relative row form-group">
                                <label for="price"
                                       class="col-md-3 text-md-right col-form-label">Giá</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="price" id="price"
                                           placeholder="Price" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="discount"
                                       class="col-md-3 text-md-right col-form-label">Giá giảm</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="discount" id="discount"
                                           placeholder="Discount" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="weight"
                                       class="col-md-3 text-md-right col-form-label">Trọng lượng</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="weight" id="weight"
                                           placeholder="Weight" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="sku"
                                       class="col-md-3 text-md-right col-form-label">SKU</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="sku" id="sku"
                                           placeholder="SKU" type="text" class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="tag"
                                       class="col-md-3 text-md-right col-form-label">Tag</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="tag" id="tag"
                                           placeholder="Tag" type="text" class="form-control" value="">
                                </div>
                            </div>


                            <div class="position-relative row form-group">
                                <label for="description"
                                       class="col-md-3 text-md-right col-form-label">Mô tả</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="#" class="border-0 btn btn-outline-danger mr-1">
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
