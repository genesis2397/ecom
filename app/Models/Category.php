<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name_en',
        'category_name_hin',
        'category_slug_en',
        'category_slug_hin',
        'category_icon',
    ];

    public function subcategories(){
        return $this->hasMany('App\Models\SubCategory');
    }

    public function products(){
        return $this->hasMany('App\Models\Products');
    }

    public function getCategoryNameEnAttribute($value)
    {
        return ucwords($value);
    }
    public function getCategoryNameHinAttribute($value)
    {
        return ucwords($value);
    }
}
