<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{    
    /** @test */
    public function it_display_page_home()
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
    }
    
}
