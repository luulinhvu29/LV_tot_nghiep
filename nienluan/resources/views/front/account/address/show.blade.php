@extends('front.layout.master')

@section('title', 'Order Detail')

@section('body')

    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="/"><i class="fa fa-home"></i> Home </a>
                        <a href="./account/my-order"><i class="fa fa-home"></i> My Address </a>
                        <span>Address Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- My Order -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">

                        <form method="post" action="./account/address/{{ $address->id }}" enctype="multipart/form-data">

                            @csrf

                            <div class="position-relative row form-group">
                                <label for="city_id" class="col-md-3 text-md-right col-form-label">Tỉnh / Thành phố</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="city_id" id="country-dd" class="form-control">
                                        <option value="">{{ $address->city->name }}</option>
                                        @foreach($cities as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="district_id"
                                       class="col-md-3 text-md-right col-form-label">Quận / Huyện</label>
                                <div class="col-md-9 col-xl-8">
                                    <select id="state-dd" class="form-control" name="district_id">
                                        <option value="">{{ $address->district->name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="ward_id"
                                       class="col-md-3 text-md-right col-form-label">Phường / Xã</label>
                                <div class="col-md-9 col-xl-8">
                                    <select id="city-dd" class="form-control" name="ward_id">
                                        <option value="">{{ $address->ward->name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="address"
                                       class="col-md-3 text-md-right col-form-label">Tên đường, số nhà</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="address" id="address" placeholder="Address" type="text"
                                           class="form-control" value="{{ $address->address }}">
                                </div>
                            </div>


                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="./account/address" class="border-0 btn btn-outline-danger mr-1">
                                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                                            <i class="fa fa-times fa-w-20"></i>
                                                        </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit"
                                            class="btn-shadow btn-hover-shine btn btn-primary">
                                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                                            <i class="fa fa-download fa-w-20"></i>
                                                        </span>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#country-dd').change(function(event) {
                var idCountry = this.value;
                $('#state-dd').html('');

                $.ajax({
                    url: "/account/address/get-districts",
                    type: 'POST',
                    dataType: 'json',
                    data: {country_id: idCountry,_token:"{{ csrf_token() }}"},
                    success:function(response){
                        $('#state-dd').html('<option value="">Select State</option>');
                        $.each(response.districts,function(index, val){
                            $('#state-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                        });
                        $('#city-dd').html('<option value="">Select District</option>');
                    }
                })
            });
            $('#state-dd').change(function(event) {
                var idState = this.value;
                $('#city-dd').html('');
                $.ajax({
                    url: "/account/address/get-wards",
                    type: 'POST',
                    dataType: 'json',
                    data: {state_id: idState,_token:"{{ csrf_token() }}"},
                    success:function(response){
                        $('#city-dd').html('<option value="">Select State</option>');
                        $.each(response.wards,function(index, val){
                            $('#city-dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
                        });
                    }
                })
            });
        });
    </script>

@endsection
