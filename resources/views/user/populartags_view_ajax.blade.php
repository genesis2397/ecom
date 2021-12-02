<div class="category-product">
    <div class="row">
      @foreach ($productlike as $product)
      <div class="col-sm-6 col-md-4 wow fadeInUp">
          <div class="products">
            <div class="product">
              <div class="product-image">
                <div class="image"> <a href="detail.html"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                <!-- /.image -->
                 @if($product->getRawOriginal('discount_price') == null || $product->getRawOriginal('discount_price') == '0')
                <div class="tag new"><span>new</span></div>
                  @else
                  @php
                     $discount = $product->selling_price - $product->getRawOriginal('discount_price');
                     $amount = ($discount/$product->selling_price) * 100;
                  @endphp
                <div class="tag hot"><span>-{{ round($amount,2) }}%</span></div>
                @endif
              </div>
              <!-- /.product-image -->
              @if($product->getRawOriginal('discount_price') == null || $product->getRawOriginal('discount_price') == '0')
              <div class="product-info text-left">
                <h3 class="name"><a href="detail.html">{{ $product->product_name_en }}</a></h3>
                <div class="rating rateit-small"></div>
                <div class="description"></div>
                <div class="product-price"> <span class="price"> {{ money($product->selling_price,'PHP',true) }} </span> </div>
                <!-- /.product-price -->
              </div>
              @else
              <div class="product-info text-left">
                  <h3 class="name"><a href="detail.html">{{ $product->product_name_en }}</a></h3>
                  <div class="rating rateit-small"></div>
                  <div class="description"></div>
                  <div class="product-price"> <span class="price"> {{ money($product->discount_price,'PHP',true) }} </span> <span class="price-before-discount">{{ money($product->selling_price,'PHP',true) }}</span> </div>
                  <!-- /.product-price -->
                </div>
              @endif
              <!-- /.product-info -->
              <div class="cart clearfix animate-effect">
                <div class="action">
                  <ul class="list-unstyled">
                    <li class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                    </li>
                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                    <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                  </ul>
                </div>
                <!-- /.action -->
              </div>
              <!-- /.cart -->
            </div>
            <!-- /.product -->

          </div>
          <!-- /.products -->
        </div>
      @endforeach
      <!-- /.item -->
    </div>
    <!-- /.row -->
  </div>
