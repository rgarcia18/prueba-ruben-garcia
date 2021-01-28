<?php

namespace App\Payments\PlaceToPay;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

interface PlaceToPayInterface{
    
    public function initPayment(Order $order,Product $product,Request $request);
    
    public function query(Order $order);    
    
    public function setConfig(array $config);    
    
    public function getConfig();    
}
