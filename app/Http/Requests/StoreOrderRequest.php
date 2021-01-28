<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        
        return [
            'customer_name' => 'required|max:190',
            'customer_email' => 'required|email|max:190',
            'customer_mobile' => 'required|max:50'
        ];
    }

    /**
     * Get the error messages from the validation that apply to the request.
     *
     * @return array
     */
    public function messages(){
        
        return [
            'customer_name.required' => trans('validation.required'),
            'customer_name.max' => trans('validation.max.string'),
            'customer_email.email' => trans('validation.email'),
            'customer_email.required' => trans('validation.required'),
            'customer_email.max' => trans('validation.max.string'),
            'customer_mobile.required' => trans('validation.required'),
            'customer_mobile.max' => trans('validation.max.string'),
        ];
    }

     /**
     * Get the custom names of the attributes.
     *
     * @return array
     */
    public function attributes(){
        
        return [
            'customer_name' => trans('orders.name'),
            'customer_email' => trans('orders.email'),
            'customer_mobile' => trans('orders.phone')
        ];
    }
}//class
