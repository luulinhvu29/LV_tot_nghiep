@extends('front.layout.master')

@section('title', 'Product')

@section('body')

    <!-- Breadcrumb section // dinh vi, dieu huong ban dang o dau VD: Home->Shop-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="../index.blade.php"><i class="fa fa-home"></i> Home </a>
                        <a href="../shop.blade.php">Shop </a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Product shop section-->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('front.shop.components.products-sidebar-filter')
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="front/img/products/{{ $product->productImages[0]->path }}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">

                                    @foreach($product->productImages as $productImage)
                                        <div class="pt active" data-imgbigurl="front/img/products/{{ $productImage->path }}">
                                            <img src="front/img/products/{{ $productImage->path }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $product->tag }}</span>
                                    <h3>{{ $product->name }} - M</h3>
                                    <a href="#" class="heart-icon active"><i class="icon_heart_alt active"></i> </a>
                                </div>
                                <div class="pd-rating">

                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $product->avgRating)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor

                                    <span>({{ count($product->productComments) }})</span>
                                </div>
                                <div class="pd-desc">

                                    @if($product->discount != null)
                                        <h4>${{ $product->discount }} <span>{{ $product->price }}</span></h4>
                                    @else
                                        <h4>${{ $product->price }}</h4>
                                    @endif
                                </div>
                                {{--                                <div class="pd-color">--}}
                                {{--                                    <h6>Color</h6>--}}
                                {{--                                    <div class="pd-color-choose">--}}

                                {{--                                        @foreach(array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)--}}
                                {{--                                            <div class="cc-item">--}}
                                {{--                                                <input type="radio" id="cc-{{$productColor}}">--}}
                                {{--                                                <label for="cc-{{$productColor}}" class="cc-{{ $productColor }}"></label>--}}
                                {{--                                            </div>--}}
                                {{--                                        @endforeach--}}

                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="pd-size-choose">
                                    @if($product->tag === 'Clothing')



                                        @for($i = 0; $i < count($product->productDetails); $i++)
                                            @if($product->productDetails[$i]->size == 'S' and $product->productDetails[$i]->qty > 0)
                                                <div class="sc-item">
                                                    <a href="./shop/product/{{ $product->id }}/1">
                                                        <input id="sm-S">
                                                        <label for="sm-S" id="sm-S">S</label>
                                                    </a>
                                                </div>

                                            @endif
                                        @endfor

                                        <div class="sc-item">
                                            <a href="./shop/product/{{ $product->id }}/2">
                                                <input id="sm-M">
                                                <label for="sm-M" id="sm-M" class="active">M</label>
                                            </a>
                                        </div>

                                        @for($i = 0; $i < count($product->productDetails); $i++)
                                            @if($product->productDetails[$i]->size == 'L' and $product->productDetails[$i]->qty > 0)
                                                <div class="sc-item">
                                                    <a href="./shop/product/{{ $product->id }}/3">
                                                        <input id="sm-L">
                                                        <label for="sm-L" id="sm-L">L</label>
                                                    </a>
                                                </div>

                                            @endif
                                        @endfor

                                        @for($i = 0; $i < count($product->productDetails); $i++)
                                            @if($product->productDetails[$i]->size == 'XS' and $product->productDetails[$i]->qty > 0)
                                                <div class="sc-item">
                                                    <a href="./shop/product/{{ $product->id }}/4">
                                                        <input   id="sm-XS">
                                                        <label for="sm-XS" id="sm-XS">XS</label>
                                                    </a>
                                                </div>

                                            @endif
                                        @endfor

                                        @for($i = 0; $i < count($product->productDetails); $i++)
                                            @if($product->productDetails[$i]->size == 'M' )
                                                <ul class="pd-tags">
                                                    @if($cart)
                                                        <li id="max" value="{{ $product->productDetails[$i]->qty - $cart->qty }}"><span>Số lượng:</span> {{ $product->productDetails[$i]->qty }} </li>
                                                    @else
                                                        <li id="max" value="{{ $product->productDetails[$i]->qty }}"><span>Số lượng:</span> {{ $product->productDetails[$i]->qty}} </li>
                                                    @endif
                                                </ul>

                                            @endif
                                        @endfor

                                    @endif


                                </div>
                                <div class="quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1" id="qty-addtocart-M-{{ $product->id }}" name="qty">
                                        </div>
                                        <a href="javascript:addToCartM({{ $product->id }})" class="primary-btn pd-cart">Add To Cart</a>
                                    </div>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>DANH MỤC</span>: {{ $product->productCategory->name }}</li>
                                    <li><span>TAGS</span>: {{ $product->tag }}</li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku: {{ $product->sku }}</div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i> </a>
                                        <a href="#"><i class="ti-twitter-alt"></i> </a>
                                        <a href="#"><i class="ti-linkedin"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li><a class="active" href="#tab-1" data-toggle="tab" role="tab">MÔ TẢ</a></li>
                                <li><a href="#tab-2" data-toggle="tab" role="tab">THÔNG TIN</a></li>
                                <li><a href="#tab-3" data-toggle="tab" role="tab">BÌNH LUẬN({{ count($product->productComments) }})</a></li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Đánh giá</td>
                                                <td>
                                                    <div class="pd-rating">

                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $product->avgRating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor

                                                        <span>({{ count($product->productComments) }})</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Giá</td>
                                                <td>
                                                    <div class="p-price">${{ $product->price }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Thêm vào giỏ hàng</td>
                                                <td>
                                                    <div class="cart-add">+ thêm vào giỏ hàng</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Còn</td>
                                                <td>
                                                    <div class="p-stock">{{ $product->qty }} sản phẩm</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Trọng lượng</td>
                                                <td>
                                                    <div class="p-weight">{{ $product->weight }}kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Kích thước</td>
                                                <td>
                                                    <div class="p-size">
                                                        @foreach(array_unique(array_column($product->productDetails->toArray(), 'size')) as $productSize)
                                                            {{ $productSize }},
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            {{--                                            <tr>--}}
                                            {{--                                                <td class="p-catagory">Color</td>--}}
                                            {{--                                                <td>--}}
                                            {{--                                                    @foreach(array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)--}}
                                            {{--                                                        <span class="cs-{{ $productColor }}"></span>--}}
                                            {{--                                                    @endforeach--}}
                                            {{--                                                </td>--}}
                                            {{--                                            </tr>--}}
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">{{ $product->sku }}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{ count($product->productComments) }} bình luận</h4>
                                        <div class="comment-option">
                                            @foreach($product->productComments as $productComment)
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="front/img/user/{{ $productComment->user->avatar ?? 'default-avatar.png'}}">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            @for($i = 1; $i <=5; $i++)
                                                                @if($i <= $productComment->rating)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <h5>{{ $productComment->name }} <span>{{ date('M d, Y',strtotime($productComment->created_at)) }}</span></h5>
                                                        <div class="at-reply">{{ $productComment->messages }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        {{--                                        <div class="leave-comment">--}}
                                        {{--                                            <h4>Leave a Comment</h4>--}}
                                        {{--                                            <form action="" method="post" class="comment-form">--}}
                                        {{--                                                @csrf--}}
                                        {{--                                                <input type="hidden" name="product_id" value="{{ $product->id }}">--}}
                                        {{--                                                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}">--}}
                                        {{--                                                <div class="row">--}}
                                        {{--                                                    <div class="col-lg-6">--}}
                                        {{--                                                        <input type="text" placeholder="Name" name="name">--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                    <div class="col-lg-6">--}}
                                        {{--                                                        <input type="text" placeholder="Email" name="email">--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                    <div class="col-lg-12">--}}
                                        {{--                                                        <textarea placeholder="Messages" name="messages"></textarea>--}}

                                        {{--                                                        <div class="personal-rating">--}}
                                        {{--                                                            <h6>Your Rating</h6>--}}
                                        {{--                                                            <div class="rate">--}}
                                        {{--                                                                <input type="radio" id="star5" name="rating" value="5" />--}}
                                        {{--                                                                <label for="star5" title="text">5 stars</label>--}}
                                        {{--                                                                <input type="radio" id="star4" name="rating" value="4" />--}}
                                        {{--                                                                <label for="star4" title="text">4 stars</label>--}}
                                        {{--                                                                <input type="radio" id="star3" name="rating" value="3" />--}}
                                        {{--                                                                <label for="star3" title="text">3 stars</label>--}}
                                        {{--                                                                <input type="radio" id="star2" name="rating" value="2" />--}}
                                        {{--                                                                <label for="star2" title="text">2 stars</label>--}}
                                        {{--                                                                <input type="radio" id="star1" name="rating" value="1" />--}}
                                        {{--                                                                <label for="star1" title="text">1 star</label>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </div>--}}

                                        {{--                                                        <button type="submit" class="site-btn">Send message</button>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </form>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Related product section-->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($relatedProducts as $product)
                    <div class="col-lg-3 col-sm-6">
                        @include('front.components.product-item', ['product' => $product])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
