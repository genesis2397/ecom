<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\CouponUser;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function cartPageView()
    {
        $carts = Cart::content();
        if(request()->ajax())
        {
            return view('user.cartPage_ajax', compact('carts'));
        }
        else{
            return view('user.cartPage', compact('carts'));
        }
    }
    public function cartPageMinus($rowId)
    {

        $qty = Cart::get($rowId);

        if($qty->qty==1)
        {

        }
        else{
            $qty->qty -= 1;
            Cart::update($rowId, $qty->qty);
            $carts = Cart::content();
            return view('user.cartPage_ajax', compact('carts'));
        }
    }

    public function cartPageRemove($rowId)
    {
        Cart::remove($rowId);
        $carts = Cart::content();
        return view('user.cartPage_ajax', compact('carts'));
    }

    public function cartPageAdd($rowId)
    {
        $qty = Cart::get($rowId);

        $qty->qty+=1;


        Cart::update($rowId, $qty->qty);


        $carts = Cart::content();
        return view('user.cartPage_ajax', compact('carts'));
    }

    public function cartPageItemRemove($rowId)
    {
        Cart::remove($rowId);
        $carts = Cart::content();
        return view('user.cartPage_ajax', compact('carts'));
    }



    public function couponDiscountRedeem()
    {
        $data = request()->all();
        $rawAmount = str_replace(['₱',','],'',$data['cart_subtotal']);
        $data['cart_subtotal'] = $rawAmount;
        $coupon = Coupon::where('coupon_code',$data['coupon_code'])->first();

        if($data['coupon_code']==null)
        {
            foreach(Cart::content() as $cart){
                $cart->discount = 0;
            }
            Session::forget('coupon');
           return response()->json(array('failed' => "Ooppps, Seems like you didn't enter a code.", 'subtotal' => Cart::subtotal()));
        }
        elseif(!$coupon)
        {
            foreach(Cart::content() as $cart){
                $cart->discount = 0;
            }
            Session::forget('coupon');
            return response()->json(array('failed' => "Ooppps, the code was invalid.", 'subtotal' => Cart::subtotal()));
        }
        elseif($coupon->expiry_date<=Carbon::now())
        {
            foreach(Cart::content() as $cart){
                $cart->discount = 0;
            }
            Session::forget('coupon');
            return response()->json(array('failed' => 'Ooppps, the code seems already expired.', 'subtotal' => Cart::subtotal()));
        }
        elseif($coupon->status!=1)
        {
            foreach(Cart::content() as $cart){
                $cart->discount = 0;
            }
            Session::forget('coupon');
            return response()->json(array('failed' => 'Sorry, the code was already inactive.', 'subtotal' => Cart::subtotal()));
        }
        else
        {
            $usage = 1;
            $amount = 99;
            $success="Coupon is valid,.. Enjoy!";
            if($coupon->max_usage!=null)
            {
                if(Auth::check()){
                    $exist = CouponUser::whereUserId(Auth::id())->whereCouponCode($data['coupon_code'])->first();
                    if(!$exist){
                        CouponUser::create([
                          'user_id'=>Auth::id(),
                          'coupon_code'=>$data['coupon_code'],
                          'usage'=>0
                        ]);
                    }
                    else{
                         if($coupon->max_usage == $exist->usage){
                            foreach(Cart::content() as $cart){
                                $cart->discount = 0;
                            }
                            Session::forget('coupon');
                            return response()->json(array('failed'=>"Code redemption reached its limit", 'subtotal' => Cart::subtotal()));
                         }
                         else{
                            // $exist->usage+=1;
                            // $exist->save();
                         }
                    }
                }
                else{
                    foreach(Cart::content() as $cart){
                        $cart->discount = 0;
                    }
                    Session::forget('coupon');
                    return response()->json(array('failed'=>"Make sure you are logged-in \n before you redeem this code.", 'subtotal' => Cart::subtotal()));
                }
            }
            if($coupon->min_amount!=null)
            {
               if($coupon->min_amount>$rawAmount)
               {
                foreach(Cart::content() as $cart){
                    $cart->discount = 0;
                }
                Session::forget('coupon');
                   return response()->json(array('failed'=>"min.amount didn't reached", 'subtotal' => Cart::subtotal()));
               }
               else
               {
                //    $success = "Good price!";
                   $success = "Coupon is valid,.. Enjoy!";
               }
            }
            if($coupon->product_id!=null)
            {
                $ids = Cart::content()->groupBy('id');
                $count = 0;
                $exp = explode(',',$coupon->product_id);
                foreach($ids as $key => $idss)
                {
                    foreach($exp as $expp)
                    {
                        if(in_array($key,array($expp)))
                    {
                            $idss[0]->discount = $idss[0]->price * ($coupon->discount_value / 100);
                            $count+=1;
                        }
                    }
                }
                if($count>=1)
                {
                    // $success = "Product Applicable!";
                    $success = "Coupon is valid,.. Enjoy!";
                }
                else
                {           foreach(Cart::content() as $cart){
                                $cart->discount = 0;
                            }
                    Session::forget('coupon');
                    return response()->json(array('failed'=>'Coupon is not applicable for all the items in your cart.', 'subtotal' => Cart::subtotal()));
                }
            }
            if($coupon->discount_type=="percentage")
            {
                $cart_disc = $coupon->discount_value."%";

                request()->session()->put('coupon',['disc_val'=>$coupon->discount_value, 'coupon_name'=>$coupon->coupon_code]);
            }

            return response()->json([
                'success'=>$success,
                'cart_disc'=>$cart_disc
            ]);
        }
    }

    public function remove_coupon(){
        $cart = Cart::content();
        foreach($cart as $carts)
        {
            $carts->discount = 0;
        }
        Session::forget('coupon');
    }
}
