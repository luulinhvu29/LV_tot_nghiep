@extends('front.layout.master')

@section('title', 'Shop')

@section('body')
    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"></i> Home </a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Product Shop section // San pham + Bo loc -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 product-sidebar-filter">
                    @include('front.shop.components.products-sidebar-filter')
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                    <div class="select-option">
                                        <select name="sort_by" class="sorting" onchange="this.form.submit();">
                                            <option {{ request('sort_by')=='latest' ? 'selected':'' }} value="latest">Sắp xếp: Mới nhất</option>
                                            <option {{ request('sort_by')=='oldest' ? 'selected':'' }}  value="oldest">Sắp xếp: Cũ nhất</option>
                                            <option {{ request('sort_by')=='name-ascending' ? 'selected':'' }}  value="name-ascending">Sắp xếp: Tên A-Z</option>
                                            <option {{ request('sort_by')=='name-descending' ? 'selected':'' }}  value="name-descending">Sắp xếp: Tên Z-A</option>
                                            <option {{ request('sort_by')=='price-ascending' ? 'selected':'' }}  value="price-ascending">Sắp xếp: Giá tăng dần</option>
                                            <option {{ request('sort_by')=='price-descending' ? 'selected':'' }}  value="price-descending">Sắp xếp: Giá giảm dần</option>
                                        </select>
                                        <select name="show" class="p-show" onchange="this.form.submit();">
                                            @if(request('sort_by'))
                                                <option {{ request('sort_by')=='3' ? 'selected':'' }} value="3">Show: 3</option>
                                                <option {{ request('sort_by')=='9' ? 'selected':'' }} value="9">Show: 9</option>
                                                <option {{ request('sort_by')=='15' ? 'selected':'' }} value="15">Show: 15</option>
                                            @else
                                                <option value="3">Show: 3</option>
                                                <option selected value="9">Show: 9</option>
                                                <option value="15">Show: 15</option>
                                            @endif
                                        </select>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    @include('front.components.product-item', ['product' => $product])
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>



@endsection
