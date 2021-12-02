<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubSubCategoryController extends Controller
{
    public function SubSubCategoryView()
    {
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::orderBy('subsubcategory_name_en','ASC')->get();
        return view('backend.subsubcategory.subsubcategory_view', compact('category','subcategory','subsubcategory'));
    }

    public function SubSubCategoryAdd()
    {
        request()->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required'
        ],[
            'category_id.required' => 'Please select a Category',
            'subcategory_id.required' => 'Please select a SubCategory'
        ]
     );

         SubSubCategory::create([
             'category_id' => request()->category_id,
             'subcategory_id' => request()->subcategory_id,
             'subsubcategory_name_en' => request()->subsubcategory_name_en,
             'subsubcategory_name_hin' => request()->subsubcategory_name_hin,
             'subsubcategory_slug_en' => strtolower(str_replace(' ','-',request()->subsubcategory_name_en)),
             'subsubcategory_slug_hin' => strtolower(str_replace(' ','-',request()->subsubcategory_name_hin))
         ]);

         $notification = array(
             'message' => 'Sub-SubCategory Added Successfully.',
             'alert-type' => 'success'
         );

         return back()->with($notification);
    }

    public function SubSubCategoryEdit($id)
    {
        $cat = Category::orderBy('category_name_en','ASC')->get();
        $subcat = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcat = SubSubCategory::findOrFail($id);
        return view('backend.subsubcategory.subsubcategory_edit', compact('subsubcat','subcat','cat'));
    }

    public function SubSubCategoryUpdate($id)
    {
        request()->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required'
        ]);

    SubSubCategory::findOrFail($id)->update([
        'category_id' => request()->category_id,
        'subcategory_id' => request()->subcategory_id,
        'subsubcategory_name_en' => request()->subsubcategory_name_en,
        'subsubcategory_name_hin' => request()->subsubcategory_name_hin,
        'subsubcategory_slug_en' => strtolower(str_replace(' ','-',request()->subsubcategory_name_en)),
        'subsubcategory_slug_hin' => strtolower(str_replace(' ','-',request()->subsubcategory_name_hin))
    ]);

    $notification = array(
        'message' => 'Sub-SubCategory Updated Successfully.',
        'alert-type' => 'info'
    );

    return back()->with($notification);
    }

    public function SubSubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully.',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }

}
