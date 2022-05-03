@if(Session::has("Cart") != null)
<div class="select-items">
    <table>
        <tbody>
        @foreach(Session::get('Cart')->product as $item)
            <tr>
                <td class="si-pic"><img src="assets/img/product/{{$item['productInfo']-> Image}}" alt=""></td>
                <td class="si-text">
                    <div class="product-selected">
                        <p>${{number_format($item['productInfo']->Price)}} x {{$item['quanty']}}</p>
                        <h6>{{$item['productInfo']->Name}}</h6>
                    </div>
                </td>
                <td class="si-close">
                    <i class="ti-close" data-id="{{$item['productInfo']->ID}}"></i>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="select-total">
    <span>total:</span>
    <h5>${{number_format(Session::get('Cart')->totalPrice)}}</h5>
    <input hidden id="total-quanty-cart" type="number" value="{{Session::get('Cart')->totalQuanty}}">
</div>
@endif