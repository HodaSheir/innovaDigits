<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function show($id){
        $product = Product::findOrFail($id);
        return view("products.show", compact("product"));
    }
}
