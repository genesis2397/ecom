<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $per = "%";
    public $pcs = "pc(s).";
    public $php = "₱";
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand','brand_id','id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory','subcategory_id','id');
    }
    public function subsubcategory()
    {
        return $this->belongsTo('App\Models\SubSubCategory','subsubcategory_id','id');
    }

    public function getDiscountPriceAttribute($value)
    {

        return $value.$this->per;
    }



    public function getProductQtyAttribute($value)
    {

        return $value." ".$this->pcs;
    }

    public function getProductNameEnAttribute($value)
    {
        return ucwords($value);
    }

    public function getProductNameHinAttribute($value)
    {
        return ucwords($value);
    }
}
