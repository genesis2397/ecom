<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;

use function PHPUnit\Framework\isEmpty;

class CouponController extends Controller
{
    public function ViewCoupon(){

        $coupons = Coupon::latest()->get();
        $products = Product::latest()->get();
        return view('backend.coupon.coupon_view', compact('coupons','products'));
    }

    public function StoreCoupon(){

            $data = request()->all();

            if(request()->product_id!=null)
            {
                $array = array($data['product_id']);
                $ho =  json_encode($array);
                $gen = str_replace(['[',']','"'],'',$ho);
                $data['product_id'] = $gen;
            }

             $date = Carbon::parse($data['expiry_date'])->format('Y-m-d');

             $data['expiry_date'] = $date;


             Coupon::create($data);

             $notification = array(
                'message' => 'Coupon Code Added Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
    }

    public function EditCoupon($id){

       $coupon = Coupon::findOrFail($id);
       $exp = $coupon->product_id;

       $plode = explode(',',$exp);
       $products = Product::latest()->get();
       return view('backend.coupon.coupon_edit', compact('coupon','products','plode'));
    }

    public function UpdateCoupon($id){
        $data = request()->all();
        if(request()->product_id != null){
            $jsonProdId = json_encode($data['product_id']);
            $data['product_id'] = str_replace(['[',']','"'],'',$jsonProdId);
        }
        else{
            $data['product_id'] = null;
        }
        Coupon::findOrFail($id)->update([
            'coupon_code'=>request()->coupon_code,
            'discount_type'=>request()->discount_type,
            'discount_value'=>request()->discount_value,
            'description'=>request()->description,
            'expiry_date'=>request()->expiry_date,
            'product_id'=>$data['product_id'],
            'min_amount'=>request()->min_amount
        ]);
        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.coupon')->with($notification);
     }
}
