<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index(){
        
    }
    public function store(OrderRequest $request){
        $data = $request->validated();
        foreach ($data['products'] as $productData) {
            $product = Product::find($productData['product_id']);
            $quantity = $productData['quantity'];
            $data['total_amount'] += ($product->price * $quantity);
            $vendor_id = $product->vendor_id;

            $newQuantity = $product->quantity - $quantity;
            if ($newQuantity < 0) {
                return $this->errorResponse(__('Not enough stock for product ' . $product->name));
            }
            $product->update(['quantity' => $newQuantity]);
        }

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
        return redirect()->route('orders.index')->with('success', 'Order created successfully');    }
}
