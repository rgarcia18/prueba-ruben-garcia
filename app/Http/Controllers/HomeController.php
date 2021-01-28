<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class HomeController extends Controller{
    
    /**
     * Display the home page
     * @return view home page
     */
    public function index(){
        
        $products = ProductRepository::all();
        return view('welcome',compact('products'));
        
    }//index
    
}//class
