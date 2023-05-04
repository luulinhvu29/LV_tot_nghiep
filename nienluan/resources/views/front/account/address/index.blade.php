@extends('front.layout.master')

@section('title', 'My-Address')

@section('body')

    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/"><i class="fa fa-home"></i> Home </a>
                        <span>My-Address</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h3 style="color: #0a66b7">Thêm địa chỉ mới</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="cart-table">

                        <table>

                            <div class="app-main__inner">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">

                                                <form method="post" action="./account/address" enctype="multipart/form-data" id="CreateForm">

                                                    @csrf

                                                    <div class="position-relative row form-group">
                                                        <label for="city" class="col-md-3 text-md-right col-form-label">Tỉnh / Thành phố</label>
                                                        <div class="col-md-9 col-xl-8">
                                                            <input required name="city" id="city" placeholder="City" type="text"
                                                                   class="form-control" >
                                                        </div>
                                                    </div>

                                                    <div class="position-relative row form-group">
                                                        <label for="town"
                                                               class="col-md-3 text-md-right col-form-label">Quận / Huyện</label>
                                                        <div class="col-md-9 col-xl-8">
                                                            <input required name="town" id="town" placeholder="Town" type="text"
                                                                   class="form-control" >
                                                        </div>
                                                    </div>

                                                    <div class="position-relative row form-group">
                                                        <label for="village"
                                                               class="col-md-3 text-md-right col-form-label">Phường / Xã</label>
                                                        <div class="col-md-9 col-xl-8">
                                                            <input required name="village" id="village" placeholder="Village" type="text"
                                                                   class="form-control" >
                                                        </div>
                                                    </div>

                                                    <div class="position-relative row form-group">
                                                        <label for="address"
                                                               class="col-md-3 text-md-right col-form-label">Tên đường, số nhà</label>
                                                        <div class="col-md-9 col-xl-8">
                                                            <input required name="address" id="address" placeholder="Address" type="text"
                                                                   class="form-control" >
                                                        </div>
                                                    </div>


                                                    <div class="position-relative row form-group mb-1">


                                                        <div class="col-md-9 col-xl-8 offset-md-2">
                                                            <a href="javascript:myFunction()" class="border-0 btn btn-outline-danger mr-1">
                                                                                <span class="btn-icon-wrapper pr-1 opacity-8">
                                                                                    <i class="fa fa-repeat fa-w-20"></i>
                                                                                </span>
                                                                <span>Reset</span>
                                                            </a>


                                                            <button type="submit"
                                                                    class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                                                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                                                                    <i class="fa fa-plus fa-w-20"></i>
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

                        </table>


                    </div>
                </div>

                {{--                <div class="col-lg-12">--}}
                {{--                    <div class="row">--}}
                {{--                        <div class="col-md-12">--}}
                {{--                            <div class="main-card mb-3 card">--}}
                {{--                                <div class="card-body">--}}
                {{--                                    <form method="post" action="admin/enter_coupon" enctype="multipart/form-data">--}}

                {{--                                        @csrf--}}

                {{--                                        <div class="position-relative row form-group">--}}
                {{--                                            <label for="product_id"--}}
                {{--                                                   class="col-md-3 text-md-right col-form-label">Product</label>--}}
                {{--                                            <div class="col-md-9 col-xl-8">--}}
                {{--                                                <select required name="product_id" id="product_id" class="form-control form-control-sm js_location" data-type="city">--}}
                {{--                                                    <option value="">-- Product --</option>--}}

                {{--                                                    @foreach($addresses as $address)--}}
                {{--                                                        <option value={{ $address->id }}>--}}
                {{--                                                            {{ $address->id }}: {{ $address->city }}--}}
                {{--                                                        </option>--}}
                {{--                                                    @endforeach--}}

                {{--                                                </select>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}

                {{--                                        <div class="position-relative row form-group">--}}
                {{--                                            <label for="product_id"--}}
                {{--                                                   class="col-md-3 text-md-right col-form-label">Product</label>--}}
                {{--                                            <div class="col-md-9 col-xl-8">--}}
                {{--                                                <select required name="product_detail_id" id="product_detail_id" class="form-control form-control-sm js_location" data-type="district">--}}
                {{--                                                    <option value="">-- Product Detail id --</option>--}}

                {{--                                                </select>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}


                {{--                                    </form>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

            </div>
        </div>
    </section>

    <!-- My Order -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">

                        <table>
                            <thead>
                                <tr>
                                    <th>Địa chỉ</th>
                                    <th>Chi tiết</th>
                                    <th>Xóa</th>

                                </tr>
                            </thead>
                            <tbody>

                            @foreach($addresses as $address)
                                <tr>
                                    <td class="first-row">
                                        {{ $address->address }}, {{ $address->village }}, {{ $address->town }}, {{ $address->city }}
                                    </td>

                                    <td class="text-center first-row">
                                        <a class="btn btn-hover-shine btn-outline-primary border-0 btn-sm" href="./account/address/{{ $address->id }}">Details</a>
                                    </td>

                                    <td class="text-center first-row">
                                        <form class="d-inline" action="./account/address/delete/{{ $address->id }}" method="post">

                                            @csrf
                                            @method('POST')

                                            <button class="border-0 btn btn-outline-danger mr-1"
                                                    type="submit" data-toggle="tooltip" title="Update"
                                                    data-placement="bottom"
                                                    onclick="return confirm('Bạn thật sự muốn xóa địa chỉ này ?')">
                                            <span class="btn-icon-wrapper pr-1 opacity-8">
                                                  <i class="fa fa-times fa-w-20"></i>
                                            </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach



                            </tbody>

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection

<script>
    function myFunction() {
        document.getElementById("CreateForm").reset();
    }
</script>




