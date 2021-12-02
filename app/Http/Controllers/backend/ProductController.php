<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\MultiImg;
use Image;

class ProductController extends Controller
{
    //

    public function AddProduct(){
		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		return view('backend.product.product_add',compact('categories','brands'));
	}

	public function StoreProduct(Request $request){

        $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.request()->file('product_thambnail')->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name_en' => $request->product_name_en,
      	'product_name_hin' => $request->product_name_hin,
      	'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
      	'product_slug_hin' => strtolower(str_replace(' ', '-', $request->product_name_hin)),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
      	'product_tags_en' => ucwords($request->product_tags_en),
      	'product_tags_hin' => ucwords($request->product_tags_hin),
      	'product_size_en' => $request->product_size_en,
      	'product_size_hin' => $request->product_size_hin,
      	'product_color_en' => $request->product_color_en,
      	'product_color_hin' => $request->product_color_hin,

      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'short_descp_en' => $request->short_descp_en,
      	'short_descp_hin' => $request->short_descp_hin,
      	'long_descp_en' => $request->long_descp_en,
      	'long_descp_hin' => $request->long_descp_hin,

      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_offer' => $request->special_offer,
      	'special_deals' => $request->special_deals,

      	'product_thambnail' => $save_url,
      	'status' => 1,
      	'created_at' => Carbon::now(),





      ]);

            ////////// Multiple Image Upload Start ///////////

            $images = $request->file('multi_img');
            foreach ($images as $img) {
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
              Image::make($img)->resize(917,1000)->save('upload/products/multi-image/'.$make_name);
              $uploadPath = 'upload/products/multi-image/'.$make_name;
              MultiImg::insert([

                  'product_id' => $product_id,
                  'photo_name' => $uploadPath,
                  'created_at' => Carbon::now(),

              ]);

            }

            ////////// Een Multiple Image Upload Start ///////////


             $notification = array(
                  'message' => 'Product Inserted Successfully',
                  'alert-type' => 'success'
              );

              return redirect()->back()->with($notification);


	}

    public function ViewProduct()
    {

          $products = Product::latest()->get();
          $brands = Brand::latest()->get();
          $categories = Category::latest()->get();
          $subcategories = SubCategory::latest()->get();
          $subsubcategories = SubSubCategory::latest()->get();
          return view('backend.product.product_view',compact('products','brands','categories','subcategories','subsubcategories'));
    }

    public function EditProduct($id)
    {
         $product = Product::findOrFail($id);
         $brand = Brand::latest()->get();
         $category = Category::latest()->get();
         $multiImg = MultiImg::where('product_id',$id)->latest()->get();
         $subcategory = SubCategory::where('category_id',$product->category_id)->get();
         $subsubcategory = SubSubCategory::where('subcategory_id',$product->subcategory_id)->get();
         return view('backend.product.product_edit',compact('product','brand','category','subcategory','subsubcategory','multiImg'));
    }

    public function UpdateProduct(Request $request,$id)
    {
        Product::findOrFail($id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => strtolower(str_replace(' ', '-', $request->product_name_hin)),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => ucwords($request->product_tags_en),
            'product_tags_hin' => ucwords($request->product_tags_hin),
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect('/product/store')->with($notification);
    }

    public function DeleteProduct($id)
    {
        $prod = Product::findOrFail($id);
        $multis = MultiImg::whereProductId($id)->pluck('photo_name');
        foreach($multis as $mult)
        {
            unlink($mult);
        }
        $prod->delete();
        MultiImg::whereProductId($id)->delete();
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect('/product/store')->with($notification);
    }

    public function ProductPhotos()
    {
        if (request()->hasFile('multi_img')) {
            $multi = request()->multi_img;

            foreach ($multi as $id => $multiImg) {
                $delImage = MultiImg::findOrFail($id)->photo_name;
                unlink($delImage);
                $imageName = hexdec(uniqid()).'.'.$multiImg->getClientOriginalExtension();
                Image::make($multiImg)->resize(300, 300)->save('upload/products/multi-image/'.$imageName);
                $url_image="upload/products/multi-image/".$imageName;
                MultiImg::whereId($id)->update(['photo_name'=>$url_image]);
            }

            $notification = array(
            'message' => 'Product Images Updated Successfully',
            'alert-type' => 'info'
        );
            return back()->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Product Images Updated Successfully',
                'alert-type' => 'info'
            );
            return back()->with($notification);
        }
    }

    public function ThumbnailPhotos()
    {
        $image = request()->thumbnail_img;

        if(request()->hasFile('thumbnail_img'))
        {
            unlink(request()->old_thumbnail);
            $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/products/thambnail/'.$imageName);
            $urlImage = "upload/products/thambnail/".$imageName;
            Product::findOrFail(request()->prod_id)->update(['product_thambnail'=>$urlImage, 'updated_at'=>Carbon::now()]);

            $notification = array(
                'message' => 'Product Images Updated Successfully',
                'alert-type' => 'info'
            );
        return back()->with($notification);
        }
    }

    public function ActiveStatus($id)
    {

        Product::findOrFail($id)->update(['status'=>0]);
            $notification = array(
                'message' => 'Product has been Inactivated',
                'alert-type' => 'info'
            );
        return back()->with($notification);
    }

    public function InactiveStatus($id)
    {
          Product::findOrFail($id)->update(['status'=>1]);
            $notification = array(
                'message' => 'Product has been Activated Successfully',
                'alert-type' => 'success'
            );

        return back()->with($notification);
    }


}
