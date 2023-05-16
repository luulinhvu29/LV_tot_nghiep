<!DOCTYPE html>
<html lang="zxx">

<head>

    <base href="{{ asset('/') }}">


    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | CodeLean eCommerce</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">


    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Css Styles -->

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">


{{--    <link rel="stylesheet" href="front/css/alertify.min.css" type="text/css">--}}

{{--    <link rel="stylesheet" href="front/css/alertify.rtl.min.css" type="text/css">--}}

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

{{--    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">--}}
</head>

<body>
    <!-- Start coding here -->

    <!-- Page reloader -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope"></i>
                        linhvu29112001@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i>
                        +84 907.104.902
                    </div>
                </div>

                <div class="ht-right">

                    @if(Auth::check())
                        <a href="./account/logout" class="login-panel">
                            <i class="fa fa-user"></i>
                            {{ Auth::user()->name }} - Đăng xuất
                        </a>
                    @else
                        <a href="./account/login" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>
                    @endif

                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="#">
                                <img src="front/img/logo.png" height="25px" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-7">

                        <form action="shop">
                            <div class="advanced-search">
                                <button type="button" class="category-btn">Tìm kiếm</button>
                                <div class="input-group" id="input-container">
                                    <input name="search" type="text" placeholder="Nhập sản phẩm cần tìm" value="" id="convert_text" style="color: black">
                                    <button type="submit"><i class="ti-search"></i> </button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <a id="click_to_convert" class="btn">
                        <img src="front/img/voice-search.png" alt="Google" style="height: 40px"/>
                    </a>

                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="./cart">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count">{{ Cart::count() }}</span>
                                </a>
                                <div class="cart-hover">
                                    <div id="change-item-cart">
                                        <div class="select-items">
                                            <table>
                                                <tbody>

                                                @foreach(Cart::content() as $cart)
                                                    <tr data-rowId="{{ $cart->rowId }}">
                                                        <td class="si-pic"><img style="height: 70px" src="front/img/products/{{ $cart->options->images[0]->path }}"></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>${{ $cart->price }} x {{ $cart->qty }}</p>
                                                                @if($cart->size)
                                                                    <h6>{{ $cart->name }} - {{ $cart->size }}</h6>
                                                                @else
                                                                    <h6>{{ $cart->name }}</h6>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <i onclick="removeCart('{{ $cart->rowId }}')" class="ti-close"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>${{ Cart::total() }}</h5>
                                        </div>
                                        <div class="select-button">
                                            <a href="./cart" class="primary-btn view-card">Xem giỏ hàng</a>
                                            <a href="./checkout" class="primary-btn checkout-btn">Đặt hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">${{ Cart::total() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-item">
            <div class="container">
{{--                <div class="nav-depart">--}}
{{--                    <div class="depart-btn">--}}
{{--                        <i class="ti-menu"></i>--}}
{{--                        <span>All departments</span>--}}
{{--                        <ul class="depart-hover">--}}
{{--                            <li><a href="#">Women's Clothing</a></li>--}}
{{--                            <li><a href="#">Men's Clothing</a></li>--}}
{{--                            <li><a href="#">Underwear</a></li>--}}
{{--                            <li><a href="#">Kid's Clothing</a></li>--}}
{{--                            <li><a href="#">Brand codeleanon</a></li>--}}
{{--                            <li><a href="#">Accessorries/Shoes</a></li>--}}
{{--                            <li><a href="#">Luxury Breands</a></li>--}}
{{--                            <li><a href="#">Brand Outdoor apparel</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Trang chủ</a> </li>
                        <li class="{{ (request()->segment(1) == 'shop') ? 'active' : '' }}"><a href="./shop">Mua sắm</a> </li>
                        <li><a>Bộ sưu tập</a>
                            <ul class="dropdown">
                                <li><a href="shop/men">Men's</a></li>
                                <li><a href="shop/women">Women's</a></li>
                                <li><a href="shop/kids">Kid's</a></li>
                            </ul>
                        </li>
                        <li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}"><a href=./contact>Liên hệ</a> </li>
                        @if(Auth::check())
                            <li class="{{ (request()->segment(1) == 'account') ? 'active' : '' }}"><a href=./account/info/{{ Auth::user()->id }}>Tài khoản của tôi</a> </li>
                        @else
                            <li ><a href=./account/login>Tài khoản của tôi</a> </li>
                        @endif



                        <li><a>Khác</a>
                            <ul class="dropdown">
                                <li><a href="./account/my-order">Đơn hàng của tôi</a></li>
                                <li><a href="./cart">Giỏ hàng</a></li>
                                <li><a href="./checkout">Đặt hàng</a></li>
                                <li><a href="./faq">FAQ</a></li>
                                <li><a href="./account/register">Đăng ký</a></li>
                                <li><a href="./account/login">Đăng nhâp</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>


    {{--Body here--}}
    @yield('body')


    <!-- Partner Logo section -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-1.png">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-2.png">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-3.png">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-4.png">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-5.png">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer-->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="">
                                <img src="front/img/logo.png" height="25" alt="">
                            </a>
                        </div>
                        <ul>
                            <li>9A Nguyen Van Linh - Can Tho</li>
                            <li>Phone: +84 907.104.902</li>
                            <li>Email: linhvu29112001@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Checkout</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="">My Account</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Shopping Cart</a></li>
                            <li><a href="">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://CodeLean.vn" target="_blank">CodeLean</a>
                        </div>
                        <div class="payment-pic">
                            <img src="front/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Js Plugins -->
    <script src="front/js/jquery-3.3.1.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery-ui.min.js"></script>
    <script src="front/js/jquery.countdown.min.js"></script>
    <script src="front/js/jquery.nice-select.min.js"></script>
    <script src="front/js/jquery.zoom.min.js"></script>
    <script src="front/js/jquery.dd.min.js"></script>
    <script src="front/js/jquery.slicknav.js"></script>
    <script src="front/js/owl.carousel.min.js"></script>

    <script src="front/js/owlcarousel2-filter.min.js"></script>

    <script src="front/js/main.js"></script>

{{--    <script src="front/js/alertify.min.js"></script>--}}

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script type="text/javascript" src="./dashboard/assets/scripts/my_script.js"></script>



    <script>
        var mess = 'Hello {{ Auth::check() ?  Auth::user()->name : ''}}';

        var botmanWidget = {
            aboutText:'Linh Vu Fashion Shop',
            introMessage: mess +  ' Chào mừng đến với Linh Vu Shop',
            placeholderText: 'Send a message',
            mainColor: '#00dd1c',
            bubbleBackground: '#ffffff',
            bubbleAvatarUrl: 'front/img/products/chat2.jpg',

        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>




</body>

</html>

