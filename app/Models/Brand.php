<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name_en',
        'brand_name_hin',
        'brand_slug_en',
        'brand_slug_hin',
        'brand_image',
    ];

    public function products(){
        return $this->hasMany('App\Models\Products');
    }

    public function getBrandNameEnAttribute($value)
    {
        return ucwords($value);
    }

    public function getBrandNameHinAttribute($value)
    {
        return ucwords($value);
    }
}
