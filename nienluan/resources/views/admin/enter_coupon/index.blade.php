@extends('admin.layout.master')

@section('title', 'Enter_coupon')

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

                <div class="page-title-actions">
                    <a href="./admin/enter_coupon/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-plus fa-w-20"></i>
                                    </span>
                        Thêm mới
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">

                        <form>
                            <div class="input-group">
                                <input type="search" name="search" id="search" value="{{ request('search') }}"
                                       placeholder="Search everything" class="form-control">
                                <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-search"></i>&nbsp;
                                                    Tìm kiếm
                                                </button>
                                            </span>
                            </div>
                        </form>

{{--                        <div class="btn-actions-pane-right">--}}
{{--                            <div role="group" class="btn-group-sm btn-group">--}}
{{--                                <button class="btn btn-focus">This week</button>--}}
{{--                                <button class="active btn btn-focus">Anytime</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Sản phẩm</th>
                                <th class="text-center">Người thực hiện</th>
                                <th class="text-center">Giá nhập</th>
                                <th class="text-center">Số lượng nhập</th>
                                <th class="text-center">Tổng cộng</th>
                                <th class="text-center">Ngày tạo</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($enter_coupons as $enter_coupon)

                            <tr>
                                <td class="text-center text-muted">#{{ $enter_coupon->id }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img style="height: 60px;"
                                                         data-toggle="tooltip" title="Image"
                                                         data-placement="bottom"
                                                         src="./front/img/products/{{ $enter_coupon->product->productImages[0]->path ?? '' }}" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">{{ $enter_coupon->product->name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $enter_coupon->user->name }}</td>
                                <td class="text-center">${{ $enter_coupon->enter_price }}</td>
                                <td class="text-center">{{ $enter_coupon->enter_qty }}</td>
                                <td class="text-center">
                                    ${{ $enter_coupon->enter_price * $enter_coupon->enter_qty }}
                                </td>
                                <td class="text-center">
                                    {{ date('d/m/Y H:m', strtotime($enter_coupon->created_at)) }}
                                </td>
                                <td class="text-center">
                                    <a href="./admin/enter_coupon/{{ $enter_coupon->id }}"
                                       class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                        Chi tiết
                                    </a>

                                    <form class="d-inline" action="./admin/enter_coupon/{{ $enter_coupon->id }}" method="post">

                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                type="submit" data-toggle="tooltip" title="Delete"
                                                data-placement="bottom"
                                                onclick="return confirm('Do you really want to delete this item?')">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>

{{--                    <div class="d-block card-footer">--}}
{{--                        {{ $enter_coupons->links() }}--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
