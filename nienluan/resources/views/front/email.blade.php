<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <title>Order Notification | CodeLean eCommerce</title>
</head>

<body
    style="background-color: #e7eff8; font-family: trebuchet,sans-serif; margin-top: 0; box-sizing: border-box; line-height: 1.5;">
<div class="container-fluid">
    <div class="container" style="background-color: #e7eff8; width: 600px; margin: auto;">
        <div class="col-12 mx-auto" style="width: 580px;  margin: 0 auto;">

            <div class="row">
                <div class="container-fluid">
                    <div class="row" style="background-color: #e7eff8; height: 10px;">

                    </div>
                </div>
            </div>

            <div class="row"
                 style="height: 100px; padding: 10px 20px; line-height: 90px; background-color: white; box-sizing: border-box;">
                {{--<h1 class="pl-3"
                    style="color: orange; line-height: 00px; float: left; padding-left: 20px; padding-top: 5px;">
                    <img src="{{$message->embed(asset('front/img/logo.png'))}}"
                         height="40" alt="logo">
                </h1>--}}
                <h1 class="pl-2"
                    style="color: orange; line-height: 30px; float: left; padding-left: 20px; font-size: 40px; font-weight: 500;">
                    Linh Vu Shop
                </h1>
            </div>

            <div class="row" style="background-color: #00509d; height: 200px; padding: 35px; color: white;">
                <div class="container-fluid">
                    <h3 class="m-0 p-0 mt-4" style="margin-top: 0; font-size: 28px; font-weight: 500;">
                        <strong style="font-size: 32px;">Report</strong>
                        <br>
                        From: {{ $name }}
                        <br>

                    </h3>

                </div>
            </div>







            <div class="row mt-2 mb-4" style="margin-top: 15px; margin-bottom: 25px;">
                <div class="container-fluid">
                    <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                        <b style="color: #00509d; font-size: 18px;">Message</b>
                    </div>
                    <div class="row pl-3 py-2" style="background-color: #fff; padding: 10px 20px;">


                        <p>{{ $content }}<p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</body>

</html>
