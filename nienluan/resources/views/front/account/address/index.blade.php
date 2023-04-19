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


                <div class="col-lg-12">
                    <div class="cart-table">

                        <table>

                            <div class="app-main__inner">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">

                                                <form>
                                                    <select name="province" id="province">
                                                        <option value="">-- Chọn tỉnh --</option>
                                                    </select>

                                                    <select name="district" id="district">
                                                        <option value="">-- Chọn huyện --</option>
                                                    </select>

                                                    <select name="ward" id="ward">
                                                        <option value="">-- Chọn xã --</option>
                                                    </select>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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

{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        // Tạo sự kiện khi chọn Tỉnh--}}
{{--        $('#province').on('change', function() {--}}
{{--            var provinceId = $(this).val();--}}

{{--            // Gọi Ajax để lấy danh sách Huyện của Tỉnh--}}
{{--            $.ajax({--}}
{{--                url: '{{ route('districts.index') }}',--}}
{{--                type: 'GET',--}}
{{--                dataType: 'json',--}}
{{--                data: {province_id: provinceId},--}}
{{--                success: function(response) {--}}
{{--                    // Xóa danh sách huyện cũ (nếu có)--}}
{{--                    $('#district').empty();--}}
{{--                    // Hiển thị tất cả các lựa chọn huyện mới--}}
{{--                    $('#district').append('<option value="">-- Chọn huyện --</option>');--}}
{{--                    $.each(response, function(key, value) {--}}
{{--                        $('#district').append('<option value="' + key + '">' + value + '</option>');--}}
{{--                    })--}}
{{--                }--}}
{{--            })--}}
{{--        });--}}

{{--        // Tạo sự kiện khi chọn Huyện--}}
{{--        $('#district').on('change', function() {--}}
{{--            var districtId = $(this).val();--}}

{{--            // Gọi Ajax để lấy danh sách Xã của Huyện--}}
{{--            $.ajax({--}}
{{--                url: '{{ route('wards.index') }}',--}}
{{--                type: 'GET',--}}
{{--                dataType: 'json',--}}
{{--                data: {district_id: districtId},--}}
{{--                success: function(response) {--}}
{{--                    // Xóa danh sách xã cũ (nếu có)--}}
{{--                    $('#ward').empty();--}}
{{--                    // Hiển thị tất cả các lựa chọn xã mới--}}
{{--                    $('#ward').append('<option value="">-- Chọn xã --</option>');--}}
{{--                    $.each(response, function(key, value) {--}}
{{--                        $('#ward').append('<option value="' + key + '">' + value + '</option>');--}}
{{--                    })--}}
{{--                }--}}
{{--            })--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
