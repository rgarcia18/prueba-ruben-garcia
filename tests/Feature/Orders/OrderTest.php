<?php

namespace Tests\Feature;

use Tests\TestCase;
use DB;

class OrderTest extends TestCase
{    
    /** @test */
    public function it_create_new_order()
    {
        $this->post('/order',[
            'customer_name' => 'RUBEN GARCIA',
            'customer_mobile' => '3156261860',
            'customer_email' => 'ruga-18@hotmail.com',
            'product_id' => 1,
        ])->assertRedirect();

        return DB::table('orders')->orderBy('id','DESC')->first()->id;
    }
    
    /** @test */
    public function it_display_list_orders()
    {
        $response = $this->get('/orders');
        
        $response->assertStatus(200);
    }
    
    /** @test */
    public function it_display_order()
    {
        $response = $this->get('/orders?product=1');
        
        $response->assertStatus(200);
    }
}
