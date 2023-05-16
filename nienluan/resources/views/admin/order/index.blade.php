@extends('admin.layout.master')

@section('title', 'Order')

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
                        Đơn hàng
                        <div class="page-title-subheading">
                            Xử lý các đơn đặt hàng
                        </div>
                    </div>
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
                                                    Tìm
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
                                <th>Khách hàng/ Sản phẩm</th>
                                <th class="text-center">Địa chỉ</th>
                                <th class="text-center">Tổng tiền</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                    <tr>
                                        <td class="text-center text-muted">#{{ $order->id }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img style="height: 60px;"
                                                                 data-toggle="tooltip" title="Image"
                                                                 data-placement="bottom"
                                                                 src="front/img/products/{{ $order->orderDetails[0]->product->productImages[0]->path }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $order->first_name . ' ' . $order->last_name }}</div>
                                                        <div class="widget-subheading opacity-7">
                                                            {{ $order->orderDetails[0]->product->name }}
                                                            @if(count($order->orderDetails)>1)
                                                                (và {{ count($order->orderDetails)-1 }} sản phẩm khác)
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ \App\Models\Address::find($order->address)->address }}, {{ \App\Models\Address::find($order->address)->ward->name }},
                                            {{ \App\Models\Address::find($order->address)->district->name }}, {{ \App\Models\Address::find($order->address)->city->name }}
                                        </td>
                                        <td class="text-center">${{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}</td>
                                        <td class="text-center">
                                            @if($order->status==\App\Utilities\Constant::order_status_Cancel)
                                                <div class="badge badge-danger">
                                                    {{ \App\Utilities\Constant::$order_status[$order->status] }}
                                                </div>
                                            @else
                                                <div class="badge {{ $order->status<\App\Utilities\Constant::order_status_Shipping ? 'badge-dark' : 'badge-success' }}">
                                                    {{ \App\Utilities\Constant::$order_status[$order->status] }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="./admin/order/{{ $order->id }}"
                                               class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                Chi tiết
                                            </a>

                                            <a href="./admin/order/{{ $order->id }}/edit" data-toggle="tooltip" title="Edit"
                                               data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-edit fa-w-20"></i>
                                                            </span>
                                            </a>

                                            <form class="d-inline" action="./admin/order/hide/{{ $order->id }}" method="post">

                                                @csrf
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

                    <div class="d-block card-footer">

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
