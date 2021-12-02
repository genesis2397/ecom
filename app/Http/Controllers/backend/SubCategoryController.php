<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {

       $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
       $categories = Category::orderBy('category_name_en','ASC')->get();
       return view('backend.subcategory.subcategory_view', compact('subcategories','categories'));
    }

    public function SubCategoryAdd()
    {
       request()->validate([
           'category_id' => 'required',
           'subcategory_name_en' => 'required',
           'subcategory_name_hin' => 'required'
       ],[
           'category_id.required' => 'Please select a Category'
       ]
    );

        $cat = Category::findOrFail(request()->category_id);
        $cat->subcategories()->create([
            'subcategory_name_en' => request()->subcategory_name_en,
            'subcategory_name_hin' => request()->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ','-','subcategory_name_en')),
            'subcategory_slug_hin' => strtolower(str_replace(' ','-','subcategory_name_hin'))
        ]);

        $notification = array(
            'message' => 'Sub-Category Added Successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub-Category Deleted Successfully.',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        $cat = Category::orderBy('category_name_en','ASC')->get();
        $subcat = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit', compact('subcat','cat'));
    }

    public function SubCategoryUpdate($id)
    {
        request()->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required'
        ]);

    SubCategory::findOrFail($id)->update([
        'category_id' => request()->category_id,
        'subcategory_name_en' => request()->subcategory_name_en,
        'subcategory_name_hin' => request()->subcategory_name_hin,
        'subcategory_slug_en' => strtolower(str_replace(' ','-',request()->subcategory_name_en)),
        'subcategory_slug_hin' => strtolower(str_replace(' ','-',request()->subcategory_name_hin))
    ]);

    $notification = array(
        'message' => 'Sub-Category Updated Successfully.',
        'alert-type' => 'info'
    );

    return back()->with($notification);

    }

    public function GetSubCategory($category_id){
        $subcat = Subcategory::where('category_id', $category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){

        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
     }

     public function GetCategory($subcategory_id){
        $cat = SubCategory::findOrFail($subcategory_id)->category;
        return json_encode($cat);
     }

}
