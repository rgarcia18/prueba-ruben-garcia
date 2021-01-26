<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'route_image', 
        'price'
    ];

    function order(){
        return $this->belongsTo(\App\Models\Order::class);
    }//product
}