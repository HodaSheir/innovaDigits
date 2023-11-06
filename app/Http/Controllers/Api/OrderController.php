<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Mail\OrderNotification;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\Mail;
use App\Models\Vendor;
class OrderController extends Controller
{
    public function store(OrderRequest $request){
        $data = $request->validated();
        $data['customer_id'] = Auth::id();
        $data['order_number'] = '#'.Auth::id().time();
        $data['status'] = OrderStatus::PENDING;
        $data['total_amount'] = 0;
        foreach ($data['products'] as $productData) {
            $product = Product::find($productData['product_id']);
            $quantity = $productData['quantity'];
            $data['total_amount'] += ($product->price * $quantity);
            $vendor_id = $product->vendor_id;
        }
        $vendor = Vendor::findOrFail($vendor_id);
        $vendor_mail = $vendor->user->email;
        $order_data = collect($data)->except(['products'])->toArray();
        $order = Order::create($order_data);
        $productsData = collect($data)->only(['products'])->flatten(1)->mapWithKeys(function ($product) { 
            return [
              $product['product_id'] => [
                'quantity' => $product['quantity'],
              ],
            ];
          })->toArray();
        $order->products()->sync($productsData);
          //send mail with the new order 
        Mail::to($vendor_mail)->send(new OrderNotification($order));

        return $this->successResponse(null, __('order added successfully'));
    }
}
