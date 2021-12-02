<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Akaunting\Money;
class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

    	$product = Product::findOrFail($id);

    	if ($product->discount_price == NULL || $product->discount_price == 0)  {
    		Cart::add([
    			'id' => $id,
    			'name' => $request->product_name,
    			'qty' => $request->quantity,
    			'price' => $product->selling_price,
    			'weight' => 1,
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);

    		return response()->json(['success' => 'Successfully Added on Your Cart']);

    	}else{

    		Cart::add([
    			'id' => $id,
    			'name' => $request->product_name,
    			'qty' => $request->quantity,
    			'price' => $product->getRawOriginal('discount_price'),
    			'weight' => 1,
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);
    		return response()->json(['success' => 'Successfully Added on Your Cart']);
    	}

    }
    public function AddMiniCart(){

    	$carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::subtotal();
        $priceTot = Cart::priceTotal();
        if(Session::has('coupon')){
            if($cartTotal==$priceTot)
            {
                Session::forget('coupon');
                return response()->json(array(
                    'carts' => $carts,
                    'cartQty' => $cartQty,
                    'cartTotal' => $cartTotal,
                    'disc_status' => 'removed'
                ));
            }
            $data = request()->session()->get('coupon');
            return response()->json(array(
                'carts' => $carts,
                'cartQty' => $cartQty,
                'cartTotal' =>$cartTotal,
                'cartSub' => $priceTot,
                'disc_percentage' => $data['disc_val'],
                'disc_status' => 'existing'
            ));
        }
        else{
            return response()->json(array(
                'carts' => $carts,
                'cartQty' => $cartQty,
                'cartTotal' => $cartTotal,
                'disc_status' => 'none'
            ));
        }
        // ((float)$cartTotal - ((float)$cartTotal * ($data['disc_val']/100)))*1000,

    }

    public function RemoveMiniCart($rowId){

    	Cart::remove($rowId);
    	return response()->json(['success' => 'Product Remove from Cart']);

    }
}
