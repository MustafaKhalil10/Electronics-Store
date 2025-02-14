<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('front.products.show', compact('product'));
    }
}
