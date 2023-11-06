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
            'total_amount' => 'required',
            'customer_id' => 'required',
            'order_number' => 'required',
            'payment_method' => 'required|string',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ];
    }
}
