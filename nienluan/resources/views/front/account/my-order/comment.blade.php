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
                        <a href="./account/my-order"><i class="fa fa-home"></i> My Order </a>
                        <span>Comment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- My Order -->
    <div class="container">

        <div class="customer-review-option">
            <div class="leave-comment">
                <h4>Bình luận sản phẩm</h4>
                <div class="row">
                    @foreach($order->orderDetails as $orderDetail)
                        <div class="col-lg-6">
                            <form action="./account/my-order/postOrderComment/{{ $orderDetail->id }}" method="post" class="comment-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-5">
                                        <h5>{{ $orderDetail->product->name }}</h5>
                                        <img src="front/img/products/{{ $orderDetail->product->productImages[0]->path ?? '' }}" alt="">

                                    </div>

                                    <div class="col-lg-12">
                                        <textarea placeholder="Messages" name="messages"></textarea>

                                        <div class="personal-rating">
                                            <h6>Your Rating</h6>
                                            <div class="rate">
                                                <input type="radio" id="star5" name="rating" value="5" />
                                                <label for="star5" title="text">5 stars</label>
                                                <input type="radio" id="star4" name="rating" value="4" />
                                                <label for="star4" title="text">4 stars</label>
                                                <input type="radio" id="star3" name="rating" value="3" />
                                                <label for="star3" title="text">3 stars</label>
                                                <input type="radio" id="star2" name="rating" value="2" />
                                                <label for="star2" title="text">2 stars</label>
                                                <input type="radio" id="star1" name="rating" value="1" />
                                                <label for="star1" title="text">1 star</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="site-btn">Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
