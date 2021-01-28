<?php

namespace App\Repositories;

use App\Models\Order;

/**
 * Class for order management
 */
class OrderRepository{

    /**
     * Search for order with ID
     * @param int $id
     * @return App\Models\Order
     */
    public static function find($id){
        return Order::find($id);
    }//find

    /**
     * Return all orders
     * @return App\Models\Order
     */
    public static function all(){
        return Order::all();
    }//all

    /**
     * Return all orders
     * @return App\Models\Order
     */
    public static function paginate($number){
        return Order::orderBy('id','DESC')->paginate($number);
    }//all
    
    /**
     * Create new order
     * @param array $data
     * @return App\Models\Order
     */
    public static function create($data){
        return Order::create($data);
    }//create

    /**
     * 
     * @param App\Models\Order $order
     * @param int $transaction_id
     * @param string $payment_url
     */
    public static function set_order_transaction(Order $order,$transaction_id,$payment_url){
        $order->transaction_id = $transaction_id ;
        $order->payment_url = $payment_url;
        $order->save();
    }//set_order_transaction

    /**
     * 
     * @param App\Models\Order $order
     * @param string $status
     */
    public static function set_payment_status(Order &$order,string $status){
        $order->status = ($status == 'APPROVED' ? 'PAYED' : $status);
        $order->save();
    }//set_payment_status
    
}//class