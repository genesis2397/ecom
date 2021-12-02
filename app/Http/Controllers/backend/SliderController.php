<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Exceptions\UnknownUnitException;
use Image;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function ViewSlider()
    {
         $sliders = Slider::latest()->get();
         return view('backend.slider.slider_view', compact('sliders'));
    }

    public function StoreSlider()
    {
        request()->validate([
            'slider_img' => 'required|mimes:png,jpg|max:10240'
        ]);

         $image = request()->slider_img;
         $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(870,370)->save('upload/slider_imgs/'.$imageName);
         $urlName = "upload/slider_imgs/".$imageName;

         $slider = new Slider();
         $slider->slider_img = $urlName;
         $slider->title = strtolower(str_replace(' ','-',request()->title));
         $slider->description = request()->description;
         $slider->status = 1;
         $slider->save();


         $notification = array(
            'message' => 'Slider Added Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function EditSlider($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('slider'));
    }

    public function UpdateSlider($id)
    {
        if(request()->hasFile('slider_img'))
        {
            unlink(request()->old_img);
            $fileSlider = request()->slider_img;
            $FileName = hexdec(uniqid()).'.'.$fileSlider->getClientOriginalExtension();
            Image::make($fileSlider)->resize(870,370)->save('upload/slider_imgs/'.$FileName);
            $UrlName = "upload/slider_imgs/".$FileName;
            Slider::findOrFail($id)->update([
                'slider_img'=>$UrlName,
                'title'=>request()->title,
                'description'=>request()->description
            ]);
        }
        else
        {
            Slider::findOrFail($id)->update([
                'title'=>request()->title,
                'description'=>request()->description
            ]);
        }

        $notification = array(
            'message' => 'Slider Updated Successfully.',
            'alert-type' => 'info'
        );

        return back()->with($notification);

    }

    public function DeleteSlider($id)
    {
        $slider = Slider::findOrFail($id);
        unlink($slider->slider_img);
        $slider->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully.',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }
}
