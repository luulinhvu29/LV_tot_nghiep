@if($newCart != null)
    <div class="select-items">
        <table>
            <tbody>

            @foreach($newCart->products as $item)
            <tr>
                <td class="si-pic"><img style="height: 70px" src="front/img/products/{{ $item['img'] }}"></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>${{ number_format($item['price']) }} x {{ $item['qty'] }}</p>
                        <h6>{{ $item['productInfo']->name }}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="ti-close"></i>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="select-total">
        <span>total:</span>
        <h5>${{ number_format($newCart->totalPrice) }}</h5>
    </div>
@endif
{{--<div class="select-button">--}}
{{--    <a href="./cart" class="primary-btn view-card">VIEW CARD</a>--}}
{{--    <a href="./checkout" class="primary-btn checkout-btn">CHECK OUT</a>--}}
{{--</div>--}}
