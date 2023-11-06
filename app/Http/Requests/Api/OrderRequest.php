<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
   
    public function rules(): array
    {
        $products = $this->input('products'); 
        $rules = [
            'shipping_address' => 'required|string',
            'billing_address' => 'required|string',
            'payment_method' => 'required|string',
        ];
        foreach ($products as $key => $product) {
            $rules["products.{$key}.product_id"] = 'required|exists:products,id';
            $rules["products.{$key}.quantity"] = 'required|numeric|min:1';
        }
        return $rules;
    }
}
