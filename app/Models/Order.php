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
    
    /**
     * Returns the order status
     * @param string $status Order Status
     * @return string Status name
     */
    function getStatus(){
        
        $names = [
            'APPROVED' => trans('orders.approved'),
            'CREATED' => trans('orders.created'),
            'PAYED' => trans('orders.payed'),
            'REJECTED' => trans('orders.rejected'),
            'PENDING' => trans('orders.pending'),
        ];
        
        return $this->status ? $names[$this->status] : trans('orders.undefined');
        
    }//status
}