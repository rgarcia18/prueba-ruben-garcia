<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Payments\Payment;

class OrderController extends Controller{
    
    /*
     * 
     */
    public function index(){        
        $orders = OrderRepository::paginate(8);
        return view('orders.index',compact('orders'));
    }//index
    
    /**
     * Show page to create an order
     * @param Product $product
     * @return view page to create an order
     */
    public function create(Product $product){
        return view('orders.create',compact('product'));
    }//create
    
    /**
     * Create a new order and redirect to the payment provider
     * @param App\Http\Requests\StoreOrderRequest $request
     * @param App\Models\Product $product
     * @return Redirect to payment page
     */
    public function store(StoreOrderRequest $request,Product $product){
        
        try{
            $order = OrderRepository::create($request->all());
            $Payment = Payment::init('placetopay')->webCheckout();
            $response = $Payment->initPayment($order,$product,$request);

            if($response->isSuccessful()){
                OrderRepository::set_order_transaction($order,$response->requestId(),$response->processUrl());
                return redirect()->away($response->processUrl());
            }//if

            return redirect()->route('orders.create',$product->id)->with([
                'message' => $response->status()->message(),
                'typeMsg' => 'warning',
            ])->withInput();
            
        }//try
        catch(\Exception $e){
            return redirect()->route('orders.create',$product->id)->with([
                'message' => trans('orders.error_conn_provider'),
                'typeMsg' => 'danger',
            ])->withInput();            
        }//catch   
        
    }//store
    
    public function show(Order $order){
        
        $Payment = Payment::init('placetopay')->webCheckout();
        $response = $Payment->query($order);
        
        if($response->isSuccessful()){
            $objStatus = $response->status();
            OrderRepository::set_payment_status($order,$objStatus->status());            
        }//if
            
        Session::flash('message',$objStatus->message());
        Session::flash('typeMsg','info');
        
        return view('orders.show',compact('order'));
        
    }//show
    
    public function retry(Request $request,Order $order){
        
        try{
            $product = ProductRepository::find($order->product_id);
            $Payment = Payment::init('placetopay')->webCheckout();
            $response = $Payment->initPayment($order,$product,$request);

            if($response->isSuccessful()){
                OrderRepository::set_order_transaction($order,$response->requestId(),$response->processUrl());
                return redirect()->away($response->processUrl());
            }//if

            return redirect()->route('orders.show',$order->id)->with([
                'message' => $response->status()->message(),
                'typeMsg' => 'warning',
            ])->withInput();
        
        }//try
        catch(\Exception $e){
            return redirect()->route('orders.show',$order->id)->with([
                'message' => trans('orders.error_conn_provider'),
                'typeMsg' => 'danger',
            ])->withInput();            
        }//catch 
        
    }//retry
    
}//clas
