<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function orderItems(){
        return $this->hasMany('App\Models\OrderItem');
    }


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function division(){
        return $this->belongsTo('App\Models\ShipDivision' ,'division_id', 'id');
    }

    public function district(){
        return $this->belongsTo('App\Models\ShipDistrict');
    }

    public function state(){
        return $this->belongsTo('App\Models\ShipState');
    }
}
