<?php

namespace App\Payments\PlaceToPay;

use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use App\Models\Product;
use App\Models\Order;

class WebCheckOut implements PlaceToPayInterface{

    private $config;

    public function __construct(){
        $this->config = config('payments.placetopay.webCheckOut');
    }
     
    private function connect(){

        $placetopay = new PlacetoPay([
            'login' => $this->config['login'],
            'tranKey' => $this->config['tranKey'],
            'url' => $this->config['url'],
            'rest' => [
                'timeout' => $this->config['rest']['timeout'],
                'connect_timeout' => $this->config['rest']['connect_timeout'],
            ],
        ]);
        
        return $placetopay;
    }

    public function initPayment(Order $order,Product $product,Request $request){

        $placetopay = $this->connect();
        $order_id = $order->id;
        
        $info = [
            'payment' => [
                'reference' => $order_id,
                'description' => $product->name,
                'amount' => [
                    'currency' => 'COP',
                    'total' => $product->price,
                ]
            ],
            'expiration' => date('c',strtotime('+7 days')),
            'returnUrl' => route('orders.show',$order_id),
            'ipAddress' => $request->ip(),
            'userAgent' => $request->header('User-Agent')
        ];

        return $placetopay->request($info);

    }

    public function query(Order $order){
        $placetopay = $this->connect();
        return $placetopay->query($order->transaction_id);
    }

    public function setConfig(array $config){
        
        $this->config = $config;
    }

    public function getConfig(){
        
        return $this->config;
    }    

    
}