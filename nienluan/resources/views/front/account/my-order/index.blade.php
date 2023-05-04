@extends('front.layout.master')

@section('title', 'My-Order')

@section('body')

    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/"><i class="fa fa-home"></i> Home </a>
                        <span>My Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- My Order -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                    <div class="select-option">
                                        <select name="sort_by" class="sorting" onchange="this.form.submit();">
                                            <option {{ request('sort_by')=='all' ? 'selected':'' }} value="all">Tất cả đơn hàng ({{ count($all) }})</option>
                                            <option {{ request('sort_by')=='Received Order' ? 'selected':'' }}  value="Received Order">Đang xử lý ({{ count($orderReceivedOrder) }})</option>
                                            <option {{ request('sort_by')=='Shipping' ? 'selected':'' }}  value="Shipping">Đang vận chuyển ({{ count($orderShipping) }})</option>
                                            <option {{ request('sort_by')=='Finish' ? 'selected':'' }}  value="Finish">Kết thúc ({{ count($orderFinish) }})</option>
                                            <option {{ request('sort_by')=='Cancel' ? 'selected':'' }}  value="Cancel">Đã hủy ({{ count($orderCancel) }})</option>
                                        </select>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                    <div class="cart-table">

                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="p-name">Sản phẩm</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Chi tiết</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td class="cart-pic first-row">
                                        <img style="height: 150px"
                                        src="front/img/products/{{ $order->orderDetails[0]->product->productImages[0]->path }}" alt="">
                                    </td>
{{--                                    <td class="first-row">{{ $order->id }}</td>--}}
                                    <td class="cart-title first-row">
                                        <h5>
                                            @if($order->orderDetails[0]->size)
                                                {{ $order->orderDetails[0]->product->name }} - {{ $order->orderDetails[0]->size }}
                                            @else
                                                {{ $order->orderDetails[0]->product->name }}
                                            @endif


                                            @if(count($order->orderDetails) > 1)
                                                (và {{ count($order->orderDetails) }} sản phẩm khác)
                                            @endif
                                        </h5>
                                    </td>
                                    <td class="first-row">
                                        {{ date('d/m/Y', strtotime($order->created_at))  }}
                                    </td>
                                    <td class="total-price first-row">
                                        ${{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}
                                    </td>
                                    <td class="first-row">
                                        {{ \App\Utilities\Constant::$order_status[$order->status] }}
                                    </td>
                                    <td class="text-center first-row">
                                        <a class="btn btn-hover-shine btn-outline-primary border-0 btn-sm" href="./account/my-order/{{ $order->id }}">Chi tiết</a>
                                    </td>

                                    @if($order->status==0 or ($order->status>3 and $order->status<\App\Utilities\Constant::order_status_Finish))
                                        <td></td>
                                    @elseif($order->status === \App\Utilities\Constant::order_status_Finish)
                                        <td class="text-center first-row">
                                            <a class="btn btn-hover-shine btn-outline-primary border-0 btn-sm" href="./account/my-order/comment/{{ $order->id }}">Bình luận</a>
                                        </td>
                                    @else
                                        <td class="text-center first-row">
                                            <form class="d-inline" action="./account/my-order/cancel/{{ $order->id }}" method="post">

                                                @csrf
                                                @method('POST')

                                                <button class="border-0 btn btn-outline-danger mr-1"
                                                        type="submit" data-toggle="tooltip" title="Update"
                                                        data-placement="bottom"
                                                        onclick="return confirm('Bạn thật sự muốn hủy đơn hàng này ?')">
                                                <span class="btn-icon-wrapper pr-1 opacity-8">
                                                      <i class="fa fa-times fa-w-20"></i>
                                                </span>
                                                    <span>Hủy</span>
                                                </button>
                                            </form>
                                        </td>
                                    @endif

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection



