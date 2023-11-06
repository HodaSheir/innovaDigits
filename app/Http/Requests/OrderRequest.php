<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'shipping_address' => 'required|string',
            'billing_address' => 'required|string',
            'total_amount' => 'required', //only for test feature
            'customer_id' => 'required', //only for test feature
            'order_number' => 'required', //only for test feature
            'payment_method' => 'required|string',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ];
    }
}
