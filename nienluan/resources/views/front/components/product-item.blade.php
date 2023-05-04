<div class="product-item item {{ $product->tag }}">
    <div class="pi-pic">
        <img src="front/img/products/{{ $product->productImages[0]->path ?? ''}}" alt="">

        @if($product->discount != null)
            <div class="sale">Sale</div>
        @endif

        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>
        <ul>
            <li class="w-icon active"><a href="javascript:addCart({{ $product->id}})"><i class="icon_bag_alt"></i> </a></li>
            <li class="quick-view">
                @if($product->productDetails == null or $product->tag != 'Clothing')
                    <a href="shop/product/{{ $product->id }}">+ Xem ngay</a>

                @else
                    @if(count($product->productDetails)!=0)
                        @for($i = 0 ; $i < count($product->productDetails);$i++)
                            @if($product->productDetails[$i]->qty > 0)
                                @if($product->productDetails[$i]->size == 'S' and $product->productDetails[$i]->qty>0)
                                    <a href="shop/product/{{ $product->id }}/1">+ Xem ngay</a>
                                    @break
                                @elseif($product->productDetails[$i]->size == 'M' and $product->productDetails[$i]->qty>0)
                                    <a href="shop/product/{{ $product->id }}/2">+ Xem ngay</a>
                                    @break
                                @elseif($product->productDetails[$i]->size == 'L' and $product->productDetails[$i]->qty>0)
                                    <a href="shop/product/{{ $product->id }}/3">+ Xem ngay</a>
                                    @break
                                @elseif($product->productDetails[$i]->size == 'XS' and $product->productDetails[$i]->qty>0)
                                    <a href="shop/product/{{ $product->id }}/4">+ Xem ngay</a>
                                    @break
                                @else
                                    <a href="shop/product/{{ $product->id }}">+ Xem ngay</a>
                                @endif
                            @endif
                        @endfor
                    @else
                        <a href="shop/product/{{ $product->id }}">+ Xem ngay</a>
                    @endif
                @endif
            </li>
            <li class="w-icon"><a href=""><i class="fa fa-random"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="category-name">{{ $product->tag}}</div>
        <a href="shop/product/{{ $product->id }}">
            <h5>{{ $product->name}}</h5>
        </a>
        <div class="product-price">
            @if($product->discount != null)
                ${{ $product->discount}}
                <span>${{ $product->price}}</span>
            @else
                ${{ $product->price}}
            @endif
        </div>
    </div>
</div>





