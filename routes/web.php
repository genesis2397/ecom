<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\IndexController;
use App\Models\User;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\SubSubCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\OrderStatusController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Models\Product;
use Akaunting\Money\Currency;
use Akaunting\Money\Money;
use Illuminate\Support\Collection;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CashController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\frontend\CartPageController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\StripeController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test2', function(){

    // foreach(Cart::content()->groupBy('id') as $key => $row) {
    //    $row[0]->price = $row[0]->price * 5;
    // }
    //  request()->session()->push('session_detail', [
    //      'id'=>1,
    //      'name'=>'Genesis'
    //  ]);

    //  $data = request()->session()->get('session_detail');
    //  dd($data[0]['name']);

    // $coupon = Coupon::whereCouponCode('LURMAG')->first();
    // $coup =  explode(',',$coupon->product_id);
    // foreach(Cart::content()->groupBy('id') as $key => $row){
    //       if(in_array($row[0]->id,$coup)){
    //           echo $row[0]->name . " is in array!" . '<br>';
    //       }
    //       else{
    //           echo $row[0]->name . " is not in array!" . '<br>';
    //       }
    // }
    // $tot = Cart::subtotal();
    // dd(Cart::subtotal());
    // dd(Carbon::parse(Carbon::now())->timestamp);

   $char = '*';
   $data = 5;
   for($i = 0; $i <= $data; $i++) {
    for($j = 1; $j <= $i; $j++) {
        echo " $char &nbsp";
    }
    echo "<br>";
}
});


Route::get('/test1', function(){

    $data = 5;

    for ($row=1; $row <= $data; $row++) {
		echo "<br> \n";
		for ($col=1; $col <= $data; $col++) {
		   $p = $col * $row;
		   echo "$p \n";
		   	}
	  	    echo "<br>";
		}

});

Route::get('/test3', function(){

    echo (" Prime Numbers from 1 to 99 are: \n");
    for($number = 1; $number <=1000; $number++)
    {
    $count = 0;
    //Conditon to check find prime numbers
    for ( $i = 2; $i <= $number/2; $i++ )
    {
    if($number%$i == 0 )
    {
    $count++;
    break;
    }
    }
    if( $count == 0 && $number != 1 )
    {
    echo $number. "   ";
    }
    }

});

Route::get('/test4', function(){

    $a = "HELLO";

    // echo strlen($a);
    echo "HELLO" . "<br>";
    for($i = 1; strlen($a)>=$i; $i++){
        echo substr($a,0,-$i) . "<br>";
    }
});



Route::get('/', [IndexController::class, 'index']);


Route::get('/price', function(){
    $productlike = Product::where('status',1)->where('product_tags_en', 'like', '%Lorem%')->orderByRaw('CONVERT(selling_price, UNSIGNED) desc')->pluck('product_name_en');
    dd($productlike);
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::group(['middleware'=>['auth:admin']], function(){


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware(['auth:admin']);

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::get('/admin/profile', [AdminProfileController::class, 'viewProfile'])->name('admin.profile');
Route::get('/admin/profile', [AdminProfileController::class, 'viewProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'editProfile'])->name('admin.profile_edit');


    Route::post('/admin/profile/update/', [AdminProfileController::class, 'updateProfile'])->name('admin.profileSave');
    Route::post('/admin/password_change', [AdminProfileController::class, 'updatePassword'])->name('admin.updatepw');

Route::get('/admin/password_change', [AdminProfileController::class, 'changePassword'])->name('admin.changepassword');


});

//User's Profile
Route::get('/profile/view', [IndexController::class, 'profileUser'])->name('profile.user');
Route::post('/profile/update', [IndexController::class, 'profileUpdate'])->name('profile.update');
Route::get('/profile/logout', [IndexController::class, 'profileLogout'])->name('profile.logout');

Route::get('/profile/changepw', [IndexController::class, 'profileChangepw'])->name('profile.changepw');
Route::post('/profile/changepw', [IndexController::class, 'profileUpdatePw'])->name('profile.updatepw');
Route::get('/profile/my_order', [IndexController::class, 'myOrder'])->name('view.order');
Route::get('/ajax/get/order', [IndexController::class, 'myOrder'])->name('tbl_orderAjax');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $user = User::findOrFail(Auth::id());
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::prefix('brand')->group(function(){
     Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
     Route::post('/add', [BrandController::class, 'BrandAdd'])->name('store.brand');
     Route::get('/{id}/delete', [BrandController::class, 'BrandDelete'])->name('delete.brand');
     Route::get('/{id}/edit', [BrandController::class, 'BrandEdit'])->name('edit.brand');
     Route::post('/{id}/update', [BrandController::class, 'BrandUpdate'])->name('update.brand');
});


Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/add', [CategoryController::class, 'CategoryAdd'])->name('store.category');
    Route::get('/{id}/delete', [CategoryController::class, 'CategoryDelete'])->name('delete.category');
    Route::get('/{id}/edit', [CategoryController::class, 'CategoryEdit'])->name('edit.category');
    Route::post('/{id}/update', [CategoryController::class, 'CategoryUpdate'])->name('update.category');

    //Sub Category
    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/add', [SubCategoryController::class, 'SubCategoryAdd'])->name('store.subcategory');
    Route::get('/sub/{id}/delete', [SubCategoryController::class, 'SubCategoryDelete'])->name('delete.subcategory');
    Route::get('/sub/{id}/edit', [SubCategoryController::class, 'SubCategoryEdit'])->name('edit.subcategory');
    Route::post('/sub/{id}/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('update.subcategory');

    //Sub-Sub Category
    Route::get('/sub/sub/view', [SubSubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::post('/sub/sub/add', [SubSubCategoryController::class, 'SubSubCategoryAdd'])->name('store.subsubcategory');
    Route::get('/sub/sub/{id}/edit', [SubSubCategoryController::class, 'SubSubCategoryEdit'])->name('edit.subsubcategory');
    Route::post('/sub/sub/{id}/update', [SubSubCategoryController::class, 'SubSubCategoryUpdate'])->name('update.subsubcategory');
    Route::get('/sub/sub/{id}/delete', [SubSubCategoryController::class, 'SubSubCategoryDelete'])->name('delete.subsubcategory');
    //ajax request
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
    Route::get('/getcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetCategory']);
});

Route::prefix('product')->group(function(){
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('store.product');
    Route::get('/store', [ProductController::class, 'ViewProduct'])->name('view.product');
    Route::get('/{id}/product', [ProductController::class, 'EditProduct'])->name('edit.product');
    Route::post('/{id}/update', [ProductController::class, 'UpdateProduct'])->name('update.product');
    Route::get('/{id}/delete', [ProductController::class, 'DeleteProduct'])->name('delete.product');
    Route::post('/photos', [ProductController::class, 'ProductPhotos'])->name('edit.photos');
    Route::post('edit/thumbnail', [ProductController::class, 'ThumbnailPhotos'])->name('edit.thumbnail');
    Route::get('/status/{id}', [ProductController::class, 'ActiveStatus'])->name('status.productActive');
    Route::get('/inactivestatus/{id}', [ProductController::class, 'InactiveStatus'])->name('status.productInactive');
});

Route::prefix('slider')->group(function(){
    Route::get('/all', [SliderController::class, 'ViewSlider'])->name('view.slider');
    Route::post('/store', [SliderController::class, 'StoreSlider'])->name('store.slider');
    Route::get('/{id}/edit', [SliderController::class, 'EditSlider'])->name('edit.slider');
    Route::post('/{id}/update', [SliderController::class, 'UpdateSlider'])->name('update.slider');
    Route::get('/{id}/delete', [SliderController::class, 'DeleteSlider'])->name('delete.slider');
});

Route::prefix('coupon')->group(function(){
    Route::get('/all', [CouponController::class, 'ViewCoupon'])->name('view.coupon');
    Route::post('/store/coupon', [CouponController::class, 'StoreCoupon'])->name('store.coupon');
    Route::get('/edit/coupon/{id}', [CouponController::class, 'EditCoupon'])->name('edit.coupon');
    Route::post('/update/{id}', [CouponController::class, 'UpdateCoupon'])->name('update.coupon');
});

Route::prefix('order')->group(function(){
    Route::get('/view/pending', [OrderStatusController::class, 'ViewPending'])->name('view.pending');
    Route::get('/view/confirmed', [OrderStatusController::class, 'ViewConfirmed'])->name('view.confirmed');
    Route::get('/view/processing', [OrderStatusController::class, 'ViewProcessing'])->name('view.processing');
    Route::get('/view/picked', [OrderStatusController::class, 'ViewPicked'])->name('view.picked');
    Route::get('/view/shipped', [OrderStatusController::class, 'ViewShipped'])->name('view.shipped');
    Route::get('/view/delivered', [OrderStatusController::class, 'ViewDelivered'])->name('view.delivered');
    Route::get('/view/cancel', [OrderStatusController::class, 'ViewCanceled'])->name('view.canceled');

    Route::get('/details/pending/{id}', [OrderStatusController::class, 'DetailsPending'])->name('details.pending');
    Route::get('/details/confirmed/{id}', [OrderStatusController::class, 'DetailsConfirmed'])->name('details.confirmed');
    Route::get('/details/processing/{id}', [OrderStatusController::class, 'DetailsProcessing'])->name('details.processed');
    Route::get('/details/picked/{id}', [OrderStatusController::class, 'DetailsPicked'])->name('details.picked');
    Route::get('/details/shipped/{id}', [OrderStatusController::class, 'DetailsShipped'])->name('details.shipped');
    Route::get('/details/delivered/{id}', [OrderStatusController::class, 'DetailsDelivered'])->name('details.delivered');

    Route::get('/update/pending/{id}', [OrderStatusController::class, 'UpdatePending'])->name('update.pending');
    Route::get('/update/confirmed/{id}', [OrderStatusController::class, 'UpdateConfirmed'])->name('update.confirmed');
    Route::get('/update/processed/{id}', [OrderStatusController::class, 'UpdateProcessed'])->name('update.processed');
    Route::get('/update/picked/{id}', [OrderStatusController::class, 'UpdatePicked'])->name('update.picked');
    Route::get('/update/shipped/{id}', [OrderStatusController::class, 'UpdateShipped'])->name('update.shipped');
});

Route::prefix('shipping')->group(function(){

    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');
    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');

    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');
    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

    Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage-state');
    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');
    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');
    Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');
    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');
    });


Route::prefix('tag')->group( function(){
    Route::get('/popular/view/{key}', [IndexController::class, 'ViewPopularTags'])->name('popular.tags');
    Route::get('/popular/view/ajax/{key}', [IndexController::class, 'ViewPopularTagsAjax'])->name('mode.tags');
});

Route::prefix('detail')->group( function(){
    Route::get('/product/view/{id}', [IndexController::class, 'DetailProductView'])->name('view.detail');
});

Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

Route::get('/my_wishlist/view', [WishlistController::class, 'WishlistView'])->name('wishlist.view');
Route::get('/checkout/view', [WishlistController::class, 'CheckoutView'])->name('checkout.view');
Route::post('/wishlist/data/store/{id}', [WishlistController::class, 'addToWishlist']);
Route::get('/wishlist/data/remove/{id}', [WishlistController::class, 'removeToWishlist']);
Route::get('/cart_page/view/', [CartPageController::class, 'cartPageView'])->name('cartpage.view');
Route::get('/cartPage/remove/ajax', [CartPageController::class, 'cartPageView']);
Route::get('/minicart/product-reduce/{rowId}', [CartPageController::class, 'cartPageMinus']);
Route::get('/pagecart/product-reduce/{rowId}', [CartPageController::class, 'cartPageRemove']);

Route::get('/cartPage/product-add/{rowId}', [CartPageController::class, 'cartPageAdd']);
Route::get('/cartPage/remove/{rowId}', [CartPageController::class, 'cartPageItemRemove']);
Route::post('/cartPage/coupon/discount/redeem', [CartPageController::class, 'couponDiscountRedeem']);
Route::post('/remove/coupon/code', [CartPageController::class, 'remove_coupon']);

Route::get('/view/checkout', [CheckoutController::class, 'viewCheckout'])->name('checkout.view');
Route::get('/view/order_item/{id}', [CheckoutController::class, 'viewOrderItem'])->name('view.orderitem');
Route::post('/store/checkout', [CheckoutController::class, 'storeCheckout'])->name('checkout.store');
Route::post('/stripe/order', [StripeController::class, 'stripeOrder'])->name('stripe.order');
Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
//ajax div, dist, state

Route::get('/division/district/ajax/{id}', [CheckoutController::class, 'district_ajax']);
Route::get('/district/state/ajax/{id}', [CheckoutController::class, 'state_ajax']);

//PDF Download
Route::get('/get/invoice/{order_id}', [IndexController::class, 'generatePDF'])->name('get.invoice');

