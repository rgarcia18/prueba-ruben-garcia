<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Placetopay payment provider
    |--------------------------------------------------------------------------
    |
    | Placetopay payment provider settings
    |
    */
        
    'placetopay' => [
        'webCheckOut' => [
            'login' => env('PLACETOPAY_LOGIN'),
            'tranKey' => env('PLACETOPAY_TRANKEY'),
            'url' => env('PLACETOPAY_URL'),                        
            'rest' => [
                'timeout' => 45,
                'connect_timeout' => 30,
            ],
        ],
    ],

];
