<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

class CheckoutController extends Controller
{
    public function viewCheckout(){

        // return view('user.checkout_view');

        if(Auth::check()){
            if(Cart::subtotal() > 0){

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartDiscount = Cart::discount();
                $cartPricetotal = Cart::pricetotal();
                $cartSubtotal = Cart::subtotal();
                $shipDiv = ShipDivision::orderBy('division_name','ASC')->get();
                    return view('user.checkout_view',compact('carts','cartQty','cartSubtotal','cartPricetotal','cartDiscount','shipDiv'));
            }else{
                $notification = array(
                    'message' => 'Shopping at least one product',
                    'alert-type' => 'error'
                );
                return redirect('/')->with($notification);
            }
        }
        else{
            $notification = array(
                'message' => 'You must log-in first before you go to checkout.',
                'alert-type' => 'error'
            );
            return redirect('/login')->with($notification);
        }

    }

    public function storeCheckout(Request $request){
        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['division_id'] = $request->division_id;
    	$data['district_id'] = $request->district_id;
    	$data['state_id'] = $request->state_id;
    	$data['notes'] = $request->notes;

        $cartSubtotal = Cart::subtotal();
        $cartPricetotal = Cart::pricetotal();
        $cartDiscount = Cart::discount();

    	if ($request->payment_method == 'stripe') {
    		return view('user.payment.stripe',compact('data','cartSubtotal','cartPricetotal','cartDiscount'));
    	}elseif ($request->payment_method == 'card') {
    		return 'card';
    	}else{
            return view('user.payment.cash',compact('data','cartSubtotal'));
    	}
    }

    public function viewOrderItem($id){
        $user = User::findOrFail(Auth::id());
        $order = Order::whereId($id)->whereUserId(Auth::id())->first();
        $orderItem = OrderItem::whereOrderId($order->id)->get();
        return view('user.order.orderItem_view', compact('user','order','orderItem'));
    }

    public function district_ajax($id){
        $district = ShipDistrict::whereDivisionId($id)->orderBy('district_name','ASC')->get();
        return $district;
    }

    public function state_ajax($id){
        $state = ShipState::whereDistrictId($id)->orderBy('state_name','ASC')->get();
        return $state;
    }
}
