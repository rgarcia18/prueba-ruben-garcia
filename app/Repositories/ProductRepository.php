<?php

namespace App\Repositories;

use App\Models\Product;

/**
 * Class for product management
 */
class ProductRepository{

    /**
     * Search for product with ID
     * @param int $id
     * @return App\Models\Product
     */
    public static function find($id){
        return Product::find($id);
    }//find

    /**
     * Return all products
     * @return App\Models\Product
     */
    public static function all(){
        return Product::all();
    }//all

    /**
     * Create new product
     * @param array $data
     * @return App\Models\Product
     */
    public static function create($data){
        return Product::create($data);
    }//create
    
}//class