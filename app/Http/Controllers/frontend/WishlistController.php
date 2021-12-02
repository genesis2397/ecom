<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class WishlistController extends Controller
{
    public function WishlistView()
    {
        if(request()->ajax())
        {
            $myWishlist = Wishlist::where('user_id',Auth::id())->latest()->get();
            return view('user.wishlistView_ajax',compact('myWishlist'));
        }
        else
        {
            $myWishlist = Wishlist::where('user_id',Auth::id())->latest()->get();
            return view('user.wishlistView',compact('myWishlist'));
        }
    }

    public function addToWishlist($id)
    {
        if(Auth::check())
        {
            $exist = Wishlist::where('user_id',Auth::id())->where('product_id',$id)->first();

            if(!$exist)
            {
                Wishlist::create([
                    'user_id'=>Auth::id(),
                    'product_id'=>$id,
                    'created_at'=>Carbon::now(),
                ]);
                return response()->json(['success' => 'Product added to Wishlist']);
            }
            else
            {
                return response()->json(['error' => 'Product already in the Wishlist']);
            }


        }
        else
        {
            return response()->json(['error' => 'Please, Login first to proceed']);
        }

    }

    public function removeToWishlist($id)
    {

        Wishlist::findOrFail($id)->delete();
        return response()->json(['success' => 'Product removed from theWishlist']);

    }

}
