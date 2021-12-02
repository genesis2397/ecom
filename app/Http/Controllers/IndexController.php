<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Slider;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use PDF;

class IndexController extends Controller
{
    public function index()
    {
        $tags = Product::where('status', 1)->pluck('product_tags_en')->toArray();

        $collection = collect([
           $tags
        ]);

        $collapsed = $collection->collapse();
        $values = explode(',',$collapsed);
        $gen = str_replace(['[',']','"'],'',$values);
        $count_values = array_count_values($gen);
        arsort($count_values);
        $slice = array_slice($count_values,0,8);


        $products = Product::where('status',1)->latest()->take(6)->get();
        $categories = Category::latest()->orderBy('category_name_en','ASC')->get();
        $hot_deals = Product::where('status',1)->where('hot_deals','1')->where('discount_price','!=',''||0)->latest()->get();
        $special_offer = Product::where('status',1)->where('special_offer','1')->latest()->get();
        return view('user.index', compact('categories','products','slice','hot_deals','special_offer'));
    }


    public function profileUser()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.profile_view',compact('user'));
    }


    public function profileLogout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function profileUpdate()
    {
        $user = User::findOrFail(Auth::id());
        $user->name = request()->name;
        $user->email = request()->email;
        $user->phone = request()->phone;

        if(request()->hasFile('image'))
        {
            $image = hexdec(uniqid()) .'.'. request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/user_images'),$image);
            $user->profile_photo_path = $image;
        }
        $user->save();
        return back();
    }

    public function profileChangepw()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.changepw',compact('user'));
    }

    public function profileUpdatePw()
    {
        $validated = request()->validate([
            'current_password' => 'required|max:255',
            'password' => 'required|confirmed',
        ]);

        $userData = User::findOrFail(Auth::id());

        if(Hash::check(request()->input('current_password'), $userData->password))
        {
           $userData->password = Hash::make(request()->input('password'));
           $userData->save();
           Auth::logout();
           return redirect('/login');
        }

    }

    public function ViewPopularTags($key)
    {

            $tags = Product::where('status', 1)->pluck('product_tags_en')->toArray();

            $collection = collect([
               $tags
            ]);

            $collapsed = $collection->collapse();
            $values = explode(',',$collapsed);
            $gen = str_replace(['[',']','"'],'',$values);
            $count_values = array_count_values($gen);
            arsort($count_values);
            $slice = array_slice($count_values,0,8);

            $productlike = Product::where('status', 1)->where('product_tags_en', 'like', '%'. $key .'%')->get();
        // ->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
            return view('user.populartags_view',compact('slice','productlike','key'));


    }

    public function ViewPopularTagsAjax($key){

        if(request()->ajax())
        {
            $data = request()->all();

            $tags = Product::where('status', 1)->pluck('product_tags_en')->toArray();

            $collection = collect([
               $tags
            ]);

            $collapsed = $collection->collapse();
            $values = explode(',',$collapsed);
            $gen = str_replace(['[',']','"'],'',$values);
            $count_values = array_count_values($gen);
            arsort($count_values);
            $slice = array_slice($count_values,0,8);
           if($data['grid']=='1')
           {
                if($data['sort']=='Default')
                {
                    $sortBy = 'Default';
                    $productlike = Product::where('status', 1)->where('product_tags_en', 'like', '%'. $key .'%')->get();
                }
                if($data['sort']=='Price:Highest first')
                {
                    $sortBy = 'Price:Highest first';
                    $productlike = Product::where('status', 1)->where('product_tags_en', 'like', '%'. $key .'%')->orderByRaw('CONVERT(selling_price, SIGNED) desc')->get();
                }

                if($data['sort']=='Price:Lowest first')
                {
                    $sortBy = 'Price:Lowest first';
                    $productlike = Product::where('status', 1)->where('product_tags_en', 'like', '%'. $key .'%')->orderByRaw('CONVERT(selling_price, SIGNED) asc')->get();
                }

                if($data['sort']=='Product Name:A to Z')
                {
                    $sortBy = 'Product Name:A to Z';
                    $productlike = Product::where('status', 1)->where('product_tags_en', 'like', '%'. $key .'%')->orderBy('product_name_en','asc')->get();
                }

                return view('user.populartags_view_ajax',compact('slice','productlike','key','sortBy'));
           }
           else
           {
                if($data['sort']=='Default')
                {
                    $sortBy = 'Default';
                    $productlike = Product::where('status', 1)->where('product_tags_en', 'like', '%'. $key .'%')->get();
                }
                if($data['sort']=='Price:Highest first')
                {
                    $sortBy = 'Price:Highest first';
                    $productlike = Product::where('status', 1)->where('product_tags_en', 'like', '%'. $key .'%')->orderByRaw('CONVERT(selling_price, SIGNED) desc')->get();
                }

                if($data['sort']=='Price:Lowest first')
                {
                    $sortBy = 'Price:Lowest first';
                    $productlike = Product::where('status', 1)->where('product_tags_en', 'like', '%'. $key .'%')->orderByRaw('CONVERT(selling_price, SIGNED) asc')->get();
                }

                if($data['sort']=='Product Name:A to Z')
                {
                    $sortBy = 'Product Name:A to Z';
                    $productlike = Product::where('status', 1)->where('product_tags_en', 'like', '%'. $key .'%')->orderBy('product_name_en','asc')->get();
                }

                return view('user.populartags_view_ajaxlist',compact('slice','productlike','key','sortBy'));
           }
        }

    }

    public function DetailProductView($id)
    {
        $product = Product::findOrFail($id);
        $multi = MultiImg::where('product_id',$product->id)->get();

        $productSize = Product::findOrFail($id);
        $size_values = explode(',',$productSize->product_size_en);

        $productColor = Product::findOrFail($id);
        $color_values = explode(',',$productColor->product_color_en);

        return view('user.productdetails_view',compact('product','multi','size_values','color_values'));
    }

    public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);
		$color = $product->product_color_en;
		$product_color = explode(',', $color);

		$size = $product->product_size_en;
		$product_size = explode(',', $size);

		return response()->json(array(
            'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));

	}

    public function myOrder(){
        $user = User::findOrFail(Auth::id());
        $order = Order::whereUserId(Auth::id())->latest()->paginate(5);
        if(request()->ajax()){
            return view('user.order.tbl_order_ajax',compact('user','order'))->render();
        }
        else{
            return view('user.order.myorder_view',compact('user','order'));
        }
    }

    public function generatePDF($order_id)
    {
        $order = Order::where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::where('order_id',$order_id)->latest()->get();
        $pdf = PDF::loadView('user.order.invoice_template',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
