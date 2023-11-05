<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\OrderStatus;

class OrderController extends Controller
{
    public function store(OrderRequest $request){
        $data = $request->validated();dd($data);
        $data->customer_id = Auth::id();
        $data->order_number = '#'.Auth::id().time();
        $data->status = OrderStatus::PENDING;
        dd($data);
        Order::create($data);
    }
}
