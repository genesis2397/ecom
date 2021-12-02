<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>Flipmart premium HTML5 & CSS3 Template</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/lightbox.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="{{ asset('frontend/js/jquery-1.11.1.min.js') }}"></script>
<script src="https://js.stripe.com/v3/"></script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('user.body.header')

<!-- ============================================== HEADER : END ============================================== -->

<!-- /#top-banner-and-menu -->
@yield('content')
<!-- ============================================================= FOOTER ============================================================= -->
@include('user.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->

<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/echo.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.rateit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/lightbox.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/js/scripts.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

         <div class="row">
          <div class="col-md-4">

              <div class="card" style="width: 18rem;">

                <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;" id="pimage">

  </div>

          </div><!-- // end col md -->
          <div class="col-md-4">

       <ul class="list-group">
        <li class="list-group-item">Product Price: <strong id="price"></strong> </li>
        <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
        <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
        <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
        <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span><span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>
        </li>
  </ul>

          </div><!-- // end col md -->
          <div class="col-md-4">

              <div class="form-group" id="colorArea">
        <label for="color">Choose Color</label>
        <select class="form-control" id="color" name="color">

      </select>
    </div>  <!-- // end form group -->


      <div class="form-group" id="sizeArea">
        <label for="size">Choose Size</label>
        <select class="form-control" id="size" name="size">

      </select>
    </div>  <!-- // end form group -->

         <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="number" class="form-control" id="qty" value="1" min="1" >
    </div> <!-- // end form group -->

  <input type="hidden" id="product_id">
<button type="submit" class="btn btn-primary mb-2" onclick="addToCart()" >Add to Cart</button>


          </div><!-- // end col md -->


         </div> <!-- // end row -->
        </div> <!-- // end modal Body -->

      </div>
    </div>
  </div>

  <script type="text/javascript">
    $('document').ready(function(){
        miniCart();
    });
  </script>
  <script type="text/javascript">

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })

// Start Product View with Modal
function productView(id){

    // alert(id)
    $.ajax({


        type: 'GET',
        url: '/product/view/modal/'+id,
        dataType:'json',
        success:function(data){
            var selling_price = (parseInt(data.product.selling_price)).toLocaleString('en-US', {
            style: 'currency',
            currency: 'PHP',
            });
            let str = data.product.discount_price;
            var disc = str.replace('%','');

            var discount_price = (parseInt(disc)).toLocaleString('en-US', {
            style: 'currency',
            currency: 'PHP',
            });

            if(disc===null || disc==0)
            {
                $('#price').text(selling_price);
            }
            else
            {
                $('#price').text(discount_price);
            }
            $('#pname').text(data.product.product_name_en);
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.product.category.category_name_en);
            $('#pbrand').text(data.product.brand.brand_name_en);
            $('#pimage').attr('src','/'+data.product.product_thambnail);
            $('#product_id').val(id);
            $('#qty').val(1);

            $('select[name="color"]').empty();
    $.each(data.color,function(key,value){
        $('select[name="color"]').append('<option value=" '+value+' ">'+value+' </option>')
        if (data.color == "") {
            $('#colorArea').hide();
        }else{
            $('#colorArea').show();
        }
    }) // end color
     // Size
    $('select[name="size"]').empty();
    $.each(data.size,function(key,value){
        $('select[name="size"]').append('<option value=" '+value+' ">'+value+' </option>')
        if (data.size == "") {
            $('#sizeArea').hide();
        }else{
            $('#sizeArea').show();
        }
    }) // end size

    if (parseInt(data.product.product_qty) > 0 || data.product.product_qty===null) {
                $('#aviable').text('');
                $('#stockout').text('');
                $('#aviable').text('Available');
            }else{
                $('#aviable').text('');
                $('#stockout').text('');
                $('#stockout').text('Out of Stock');
            }

        }
    })

}

    function addToCart(){
        var product_name = $('#pname').text();
        var id = $('#product_id').val();
        var color = $('#color option:selected').text();
        var size = $('#size option:selected').text();
        var quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                color:color, size:size, quantity:quantity, product_name:product_name
            },
            url: "/cart/data/store/"+id,
            success:function(data){
                miniCart()
                $('#closeModel').click();
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
            }
        })
    }

    function addToWishlist(id){

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/wishlist/data/store/"+id,
            success:function(data){
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
            }
        })
    }


    function removeWishlist(id){

        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "/wishlist/data/remove/"+id,
            success:function(data){
                wishlist()
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    })

                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
            }
        })
        }
</script>


<script type="text/javascript">
    function miniCart(){
       $.ajax({
           type: 'GET',
           url: '/product/mini/cart',
           dataType:'json',
           success:function(response){

            const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
             })

            $('span[id="cartSubTotal"]').text("₱"+response.cartTotal);
            $('span[id="sub_tot_span"]').text("₱"+response.cartTotal);
            $('span[id="grand_tot_span"]').text("₱"+response.cartTotal);
            $('#cartQty').text(response.cartQty);

            let str = $('#coup_disc_span').text();
            var kekw = str.replace("%","");

            var miniCart = ""
                $.each(response.carts, function(key,value){
                    var item_price = (parseInt(value.price)).toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'PHP',
                    });

                    miniCart += `<div class="cart-item product-summary">
                <div class="row">
            <div class="col-xs-4">
              <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
            </div>
            <div class="col-xs-7">
              <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
              <div class="price"> ${item_price} * ${value.qty} </div>
            </div>
            <div class="col-xs-1 action">
            <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
          </div>
        </div>
        <!-- /.cart-item -->
        <div class="clearfix"></div>
        <hr>`
        });
                $('#miniCart').html(miniCart);

            if(response.disc_status == "existing")
            {
            $('#coupon_alert').html(`<div class="alert alert-success" role="alert"><strong><i class="fa fa-check-circle-o" aria-hidden="true"></i> Coupon Applied!</strong> Enjoy your shopping.</div>`);
                    $('#div_coup_disc').html(`<div class="cart-sub-total"><span class="span_disc_coup">Discount</span><span class="inner-left-md" id = "coup_disc_span">${response.disc_percentage}%</span><span class="removecoup_style" onclick="removecoup()"> [Remove]</span></div>`);
                    document.getElementById("cart-design-with-disc").style.bottom="38px";
                    document.getElementById("cart-design-with-disc").style.position="relative";
                $('span[id="sub_tot_span"]').text('₱'+response.cartSub);
            }
            else if(response.disc_status == "removed"){
                            $('#coupon_alert').html(`<div class="alert alert-danger" role="alert"><strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Error!</strong> Coupon is not applicable for all the items in your cart.</div>`);
                $('#div_coup_disc').html('');
                document.getElementById("cart-design-with-disc").style.bottom="11px";
                document.getElementById("cart-design-with-disc").style.position="relative";
            }
            else{
                $('#coupon_alert').html(``);
                $('#div_coup_disc').html('');
                document.getElementById("cart-design-with-disc").style.bottom="11px";
                document.getElementById("cart-design-with-disc").style.position="relative";
            }
           }
       })
    }
    // miniCart();
    function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart()
             // Start Message
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        });
        $.ajax({
                    type: 'GET',
                    url: '/cartPage/remove/ajax',
                    success:function(dat){
                        $('#cart_items').html(dat);
                    }
                     });
    }

</script>

<script type="text/javascript">

$('input[id="qty"]').on("keypress",function (evt) {
    if (event.target.value.length == 0 && event.which == 48) {
  return false;
   }
   if (event.which == 46) {
  return false;
   }
   if (event.key == "-") {
        return false;
      }
      if (event.key == "e") {
        return false;
      }

});


$('input[id="qty"]').on("keyup",function (evt) {
    if (event.keyCode == 8 && event.target.value.length == 0 ) {
       $(this).val(1);
    }
    if (event.keyCode >= 65 && event.keyCode <= 90) {
       $(this).val(1);
    }
});


    function wishlist(){

       $.ajax({
           type: 'GET',
           url: '/my_wishlist/view',
           success:function(response){
            $('#my-wishlist-page').html('')
            $('#my-wishlist-page').html(response);

           }
       })
    }
</script>

<script type="text/javascript">
    function cartMinus(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-reduce/'+rowId,
            success:function(data){
                miniCart()
                if (!$.trim(data)){
                    Swal.fire({
                    title: 'Do you want to remove this item(s) from your cart?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove it it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Item(s) removed!',
                        'Your cart has been updated.',
                        'success'
                        )
                            $.ajax({
                            type: 'GET',
                            url: '/pagecart/product-reduce/'+rowId,
                            success:function(response){
                                miniCart()
                                $('#cart_items').html(response);
                                }
                            });
                    }
                    })
                }
                else{
                    $('#cart_items').html(data);
                }

            }
        });

    }

    function cartAdd(rowId){
        $.ajax({
            type: 'GET',
            url: '/cartPage/product-add/'+rowId,
            success:function(data){
                miniCart()
                $('#cart_items').html(data);
            }
        });

    }

    function cartRemove(rowId){
        Swal.fire({
                title: 'Do you want to remove this item(s) from your cart?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Item(s) removed!',
                    'Your cart has been updated.',
                    'success'
                    )
                    $.ajax({
                    type: 'GET',
                    url: '/cartPage/remove/'+rowId,
                    success:function(data){
                        miniCart()
                        $('#cart_items').html(data);
                    }
                     });
                }
         })
    }
</script>

<script type="text/javascript">
    $(document).ready( function(){
        $('button[name="coupon_submit"]').on('click', function(){

           var couponcode = $('input[name="coupon_code_redeem"]').val();
           var cartsubtot = $('#cartSubTotal').text();
           $.ajax({
           type: 'POST',
           url: '/cartPage/coupon/discount/redeem',
           dataType: 'json',
           data:{
                coupon_code:couponcode, cart_subtotal:cartsubtot,
            },
           success:function(resp){
                    const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if (resp.failed) {
                    Toast.fire({
                        icon: 'error',
                        title: resp.failed
                    })
                    $('#coupon_alert').html(`<div class="alert alert-danger" role="alert"><strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Error!</strong> ${resp.failed}</div>`);
                    $('#div_coup_disc').html('');
                    document.getElementById("cart-design-with-disc").style.bottom="11px";
                    document.getElementById("cart-design-with-disc").style.position="relative";
                    $('span[id="cartSubTotal"]').text("₱"+resp.subtotal);
                    $('span[id="sub_tot_span"]').text("₱"+resp.subtotal);
                    $('span[id="grand_tot_span"]').text("₱"+resp.subtotal);
                    return false;
                }else{
                    Toast.fire({
                        icon: 'success',
                        title: resp.success
                    })
                    miniCart()
                }
           }
       })
        });
    });

    function removecoup(){
        $('#coupon_alert').html('');
        $('#div_coup_disc').html('');
        document.getElementById("cart-design-with-disc").style.bottom="11px";
        document.getElementById("cart-design-with-disc").style.position="relative";
        $.ajax({
           type: 'POST',
           url: '/remove/coupon/code',
           dataType: 'json',
           success:function(resp){
           }
           });
           miniCart()
    }

</script>

</body>
</html>
