<?php

namespace App\Payments;

class Payment{
    
    /**
     * Initializes the payment provider
     * @param type $provider
     * @return ObjPayment
     * @throws \Exception
     */
    public static function init($provider){
        
        switch($provider){
            case 'placetopay':
                return new \App\Payments\PlaceToPay\PlaceToPay();
            break;
        }//switch
        
        throw new \Exception('payment provider does not exist');
    }
}//class
