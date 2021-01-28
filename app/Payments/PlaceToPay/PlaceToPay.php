<?php

namespace App\Payments\PlaceToPay;

use \App\Payments\PlaceToPay\WebCheckOut;

/**
 * Manage objects for payment methods
 */
class PlaceToPay {
    
    /**
     * Return the object for the web Checkout method
     * @return \App\Payments\PlacetoPay\WebChekOut
     */
    public function webCheckout(){
        
        return new WebCheckOut();
        
    }//webCheckout
    
}//clas