@extends('admin.layout.master')

@section('title', 'Statistics')

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
                        Order
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-md-5">
                <div class="main-card mb-3 card">
                    <form action="./admin/statistics/filter_day" method="post">

                        @csrf

                        <div class="input-group">

                            <div class="position-relative col form-group col-lg-5">
                                <label for="from">Từ ngày:</label>
                                <input class="form-control col-lg-12" type="date" id="from" name="from" value="{{ $from ?? '' }}">
                            </div>
                            <div class="position-relative col form-group col-lg-5">
                                <label for="to">Đến ngày:</label>
                                <input class="form-control col-lg-12" type="date" id="to" name="to" value="{{ $to ?? '' }}">
                            </div>
                            <span class="input-group-append col form-group col-lg-5">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-filter"></i>&nbsp;
                                    Lọc
                                </button>
                             </span>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">

{{--                        <form>--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="search" name="search" id="search" value="{{ request('search') }}"--}}
{{--                                       placeholder="Search everything" class="form-control">--}}
{{--                                <span class="input-group-append">--}}
{{--                                                <button type="submit" class="btn btn-primary">--}}
{{--                                                    <i class="fa fa-search"></i>&nbsp;--}}
{{--                                                    Search--}}
{{--                                                </button>--}}
{{--                                            </span>--}}
{{--                            </div>--}}
{{--                        </form>--}}

                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <button class="btn btn-focus">This week</button>
                                <button class="active btn btn-focus">Anytime</button>
                            </div>
                        </div>
                    </div>



                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Đơn giá</th>
                                <th class="text-center">Tổng cộng</th>
                                <th class="text-center">Ngày đặt</th>
                                <th class="text-center">Ngày kết thúc</th>
                                <th class="text-center">Lợi nhuận</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                @foreach($order->orderDetails as $orderDetail)

                                    <tr>
                                        <td class="text-center text-muted">#{{ $orderDetail->id }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img style="height: 60px;"
                                                                 data-toggle="tooltip" title="Image"
                                                                 data-placement="bottom"
                                                                 src="front/img/products/{{ $orderDetail->product->productImages[0]->path }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-subheading opacity-7">
                                                            {{ $orderDetail->product->name }}

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $orderDetail->qty }}
                                        </td>
                                        <td class="text-center">${{ $orderDetail->amount }}</td>
                                        <td class="text-center">
                                            ${{ $orderDetail->total }}
                                        </td>
                                        <td class="text-center">
                                            {{ $order->created_at }}
                                        </td>
                                        <td class="text-center">
                                            {{ $order->finish_day }}
                                        </td>
                                        <td class="text-center">
                                            ${{ $orderDetail->total - \App\Models\EnterCoupon::where('product_id',$orderDetail->product->id)->first()->enter_price * $orderDetail->qty }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <h1>Tổng lợi nhuận: </h1>
                                    </th>
                                    <th>
                                        <h3 style="color: green">${{ $sum }}</h3>
                                    </th>
                                </tr>
                            </thead>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection




