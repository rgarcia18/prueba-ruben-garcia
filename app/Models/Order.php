<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'transaction_id',
        'product_id',
        'customer_name', 
        'customer_email', 
        'customer_mobile',
        'payment_url',
        'status'
    ];

    function product(){
        return $this->hasOne(\App\Models\Product::class,'id','product_id');
    }//product
}