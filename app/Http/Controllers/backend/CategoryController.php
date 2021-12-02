<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categories = Category::latest()->get();
        return view('backend.category.category_view', compact('categories'));
    }

    public function CategoryAdd(){
        request()->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required'
        ]);

        // if(Category::where('category_name_en', request()->category_name_en )->exists())
        // {
        //     return 'exist!';
        // }
        //     return 'oops';
        Category::create([
            'category_name_en' => request()->category_name_en,
            'category_name_hin' => request()->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ','-',request()->category_name_en)),
            'category_slug_hin' => strtolower(str_replace(' ','-',request()->category_name_hin)),
            'category_icon' => "fa ".request()->category_icon
        ]);

        $notification = array(
            'message' => 'Category Added Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);

    }

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully.',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);

        return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate($id)
    {
       request()->validate([
           'category_name_en'=>'required',
           'category_name_hin'=>'required',
           'category_icon'=>'required'
       ]);

       Category::findOrFail($id)->update([
          'category_name_en'=> request()->category_name_en,
          'category_name_hin'=> request()->category_name_hin,
          'category_slug_en'=> strtolower(str_replace(' ','-',request()->category_name_en)),
          'category_slug_hin'=> strtolower(str_replace(' ','-',request()->category_name_hin)),
          'category_icon'=> request()->category_icon
       ]);

       $notification = array(
        'message' => 'Category Updated Successfully.',
        'alert-type' => 'info'
    );

       return redirect('/category/view')->with($notification);
    }
}
