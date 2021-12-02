@forelse ($carts as $key => $cart)
<tr>
    <td class="romove-item"><a title="cancel" class="icon" id="{{ $cart->rowId }}" onclick="cartRemove(this.id)"><i class="fa fa-trash-o"></i></a></td>
    <td class="cart-image">
        <a class="entry-thumbnail" href="detail.html">
            <img src="{{ asset($cart->options->image) }}" alt="">
        </a>
    </td>
    <td class="cart-product-name-info">
        <h4 class='cart-product-description'><a href="detail.html">{{ $cart->name }}</a></h4>
        <div class="row">
            <div class="col-sm-4">
                <div class="rating rateit-small"></div>
            </div>
            <div class="col-sm-8">
                <div class="reviews">
                    (06 Reviews)
                </div>
            </div>
        </div><!-- /.row -->
        <div class="cart-product-info">
                            <span class="product-color">COLOR:<span>Blue</span></span>
        </div>
    </td>
    <td class="cart-product-edit"><a href="#" class="product-edit">Edit</a></td>
    <td class="cart-product-quantity">
        <div class="quant-input">
                <div class="arrows">
                <div class="arrow plus gradient" id="{{ $cart->rowId }}" onclick="cartAdd(this.id)"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                <div class="arrow minus gradient" id="{{ $cart->rowId }}" onclick="cartMinus(this.id)"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                </div>
                    <div id="cart_qty" class="cart_qty">
                        <input type="text" id="cart_amount" value="{{ $cart->qty }}" readonly>
                    </div>
        </div>
    </td>
    <td class="cart-product-sub-total"><span class="cart-sub-total-price">{{ money($cart->price,'PHP',true) }}</span></td>
    @php
       $grandtotal =  $cart->price * $cart->qty;
    @endphp
    <td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ money($grandtotal,'PHP',true) }}</span></td>
</tr>

@if (Session::has('coupon'))
    <script type="text/javascript">
             $(document).ready(function (){
                $('#coupon_alert').html(`<div class="alert alert-success" role="alert"><strong><i class="fa fa-check-circle-o" aria-hidden="true"></i> Coupon Applied!</strong> Enjoy your shopping.</div>`);
            });
    </script>
@endif
@empty
@php
        $cart = Cart::content();
        foreach($cart as $carts)
        {
            $carts->discount = 0;
        }
        Session::forget('coupon');
@endphp
<script type="text/javascript">
    $('document').ready( function(){
        $('.shopping-cart').html(`<img src="/frontend/images/empty-cart.png" alt="" style="position: relative; right: -270px;"><h3 style="position: relative; right: -440px;">Your Cart is Empty...</h3>`);
        $('.shopping-cart').append('<a href="/" class="btn btn-primary go shopping">GO SHOPPING</a>')
        $('.shopping-cart').append('<br><br><br>')
    });
</script>
@endforelse
