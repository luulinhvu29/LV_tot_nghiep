@extends('partner.layout.master')

@section('title', 'Partner')

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
                                                    Search
                                                </button>
                                            </span>
                            </div>
                        </form>

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
                                <th>Customer / Products</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
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
                                                            (and {{ count($order->orderDetails) - 1 }} other products)
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
                                    <td class="text-center">{{ $order->phone }}</td>
                                    <td class="text-center">${{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}</td>
                                    <td class="text-center">
                                        <div class="badge {{ $order->status<\App\Utilities\Constant::order_status_Shipping ? 'badge-dark' : 'badge-success' }}">
                                            {{ \App\Utilities\Constant::$order_status[$order->status] }}
                                        </div>
                                    </td>
                                    <td class="text-center">

                                        @if($order->status < \App\Utilities\Constant::order_status_Shipping)
                                            <form class="d-inline" action="./partner/shipping/{{ $order->id }}" method="post">

                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-hover-shine btn-outline-success border-0 btn-sm"
                                                        type="submit" data-toggle="tooltip" title="Shipping"
                                                        data-placement="bottom"
                                                        onclick="return confirm('Vận chuyển đơn hàng này ?')">
                                                                <span class="btn-icon-wrapper opacity-8">
                                                                    <i class="fa fa-shipping-fast fa-w-20"></i>
                                                                </span>
                                                </button>
                                            </form>

                                            <form class="d-inline" action="./partner/refuse/{{ $order->id }}" method="post">

                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                        type="submit" data-toggle="tooltip" title="Refuse"
                                                        data-placement="bottom"
                                                        onclick="return confirm('Từ chối đơn hàng này ?')">
                                                                    <span class="btn-icon-wrapper opacity-8">
                                                                        <i class="fa fa-window-close fa-w-20"></i>
                                                                    </span>
                                                </button>
                                            </form>
                                        @elseif($order->status < \App\Utilities\Constant::order_status_Finish)

                                            <form class="d-inline" action="./partner/finish/{{ $order->id }}" method="post">

                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-hover-shine btn-outline-success border-0 btn-sm"
                                                        type="submit" data-toggle="tooltip" title="Finish"
                                                        data-placement="bottom"
                                                        onclick="return confirm('Xác nhận hoàn thành đơn hàng này ?')">
                                                                <span class="btn-icon-wrapper opacity-8">
                                                                    <i class="fa fa-check fa-w-20"></i>
                                                                </span>
                                                </button>
                                            </form>
                                        @else

                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
{{--                        {{ $orders->links() }}--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection
