<div class="row">
    <div class="col-md-12 my-wishlist">
<div class="table-responsive">
<table class="table">
<thead>
    <tr>
        <th colspan="4" class="heading-title">My Wishlist</th>
    </tr>
</thead>
<tbody>
@foreach ($myWishlist as $wish)
<tr>
    <td class="col-md-2"><img src="{{ asset($wish->product->product_thambnail) }}" alt="imga"></td>
    <td class="col-md-7">
        <div class="product-name"><a href="#">{{ $wish->product->product_name_en }}</a></div>
        <div class="rating">
            <i class="fa fa-star rate"></i>
            <i class="fa fa-star rate"></i>
            <i class="fa fa-star rate"></i>
            <i class="fa fa-star rate"></i>
            <i class="fa fa-star non-rate"></i>
            <span class="review">( 06 Reviews )</span>
        </div>
        @if($wish->product->getRawOriginal('discount_price') == 0 || $wish->product->getRawOriginal('discount_price') == null)

            <div class="price">
                {{ money($wish->product->selling_price,'PHP',true) }}
            </div>

        @else
            <div class="price">
                {{ money($wish->product->discount_price,'PHP',true) }}
                <span>{{ money($wish->product->selling_price,'PHP',true) }}</span>
            </div>
        @endif
    </td>
    <td class="col-md-2">
        <a href="#" class="btn-upper btn btn-primary">Add to cart</a>
    </td>
    <td class="col-md-1 close-btn">
        <a class=""><i class="fa fa-times" id="{{ $wish->id }}" onclick="removeWishlist(this.id)"></i></a>
    </td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>

