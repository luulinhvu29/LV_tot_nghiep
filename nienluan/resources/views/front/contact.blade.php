@extends('front.layout.master')

@section('title', 'Contact')

@section('body')

    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home </a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Map section-->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9344.362620621185!2d105.76747688034617!3d10.031665349777931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBD4bqnbiBUaMah!5e0!3m2!1svi!2s!4v1664028012009!5m2!1svi!2s"
                        width="610" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
{{--                <div class="icon">--}}
{{--                    <i class="fa fa-map-marker"></i>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>



    <!-- Contact section-->
    <section class="contact-section spad">
        <section class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Liên hệ với chúng tôi</h4>
                        <p>Linh Vu Shop luôn tiên phong đi đầu trong các xu hướng thời trang</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Địa chỉ:</span>
                                <p>Ba thang Hai - Ninh Kieu - Can Tho</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Sđt:</span>
                                <p>+84 907.104.902</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>linhvu29112001@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Để lại phản hồi</h4>
                            <p></p>
                            <form action="./postContact" method="post" class="comment-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" name="name" placeholder="Your name" value="{{ Auth::user()->name ?? '' }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="email" placeholder="Your email" value="{{ Auth::user()->email ?? ''}}">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="message" placeholder="Your message"></textarea>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection
