<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    }

    public function BrandAdd()
    {
        request()->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required'
        ]);

        $imageName = hexdec(uniqid()).'.'.request()->file('brand_image')->getClientOriginalExtension();
        Image::make(request()->file('brand_image'))->resize(100,100)->save('upload/brand_images/'.$imageName);
        $imagePath = "upload/brand_images/".$imageName;

        Brand::create([
            'brand_name_en' => request()->brand_name_en,
            'brand_name_hin' => request()->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ','-',request()->brand_name_en)),
            'brand_slug_hin' => strtolower(str_replace(' ','-',request()->brand_name_hin)),
            'brand_image' => $imagePath
        ]);

        $notification = array(
            'message' => 'Brand Added Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function BrandDelete($id){
        unlink(Brand::findOrFail($id)->brand_image);
        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully.',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }

    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }


    public function BrandUpdate($id){
        request()->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
        ]);

        if(request()->hasFile('brand_image'))
        {
            unlink(request()->current_image);
            $imageName = hexdec(uniqid()).'.'. request()->file('brand_image')->getClientOriginalExtension();
            request()->brand_image->move(public_path('upload/brand_images'),$imageName);

            Brand::whereId($id)->update([
                'brand_name_en'=>request()->brand_name_en,
                'brand_name_hin'=>request()->brand_name_hin,
                'brand_slug_en'=> strtolower(str_replace(' ','-',request()->brand_name_en)),
                'brand_slug_hin'=> strtolower(str_replace(' ','-',request()->brand_name_hin)),
                'brand_image' => "upload/brand_images/".$imageName
            ]);
        }
        else
        {
            Brand::whereId($id)->update([
                'brand_name_en'=>request()->brand_name_en,
                'brand_name_hin'=>request()->brand_name_hin,
                'brand_slug_en'=> strtolower(str_replace(' ','-',request()->brand_name_en)),
                'brand_slug_hin'=> strtolower(str_replace(' ','-',request()->brand_name_hin)),
            ]);
        }

        $notification = array(
            'message' => 'Brand Updated Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    }
}
