<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_name_en',
        'subcategory_name_hin',
        'subcategory_slug_en',
        'subcategory_slug_hin',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function subsubcategories(){
        return $this->hasMany('App\Models\SubSubCategory');
    }

    public function products(){
        return $this->hasMany('App\Models\Products');
    }

    public function getSubcategoryNameEnAttribute($value)
    {
        return ucwords($value);
    }

    public function getSubcategoryNameHinAttribute($value)
    {
        return ucwords($value);
    }
}
