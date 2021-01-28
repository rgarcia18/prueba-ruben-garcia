<?php

namespace Tests\Unit\Payment;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Payments\Payment;

class PlaceToPayWebChekOutTest extends TestCase
{            
    /** @test */
    public function its_verify_transaction()
    { 
        
        $request = Request::create('/order/1/create','GET');
        
        $order = Order::create([
            'customer_name' => 'RUBEN GARCIA',
            'customer_mobile' => '3156261860',
            'customer_email' => 'ruga-18@hotmail.com',
            'product_id' => 1,
        ]);
        
        $product = Product::find($order->product_id);
        
        $Payment = Payment::init('placetopay')->webCheckout();
        
        $response = $Payment->initPayment($order,$product,$request);

        $this->assertEquals('Dnetix\Redirection\Message\RedirectResponse',get_class($response));
        
        $order->transaction_id = $response->requestId() ;
        
        $order->payment_url = $response->processUrl();
        
        $order->save();
        
        return $order;
        
    }
    
    /** @test 
    @depends its_verify_transaction */
    public function its_verify_transaction_query($order)
    { 
                        
        $Payment = Payment::init('placetopay')->webCheckout();
        
        $response = $Payment->query($order);
                        
        $this->assertTrue($response->isSuccessful());
        
    }    
    
}
