<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('product.view', [
            'product' => $product,
            'pageTitle' => $product->title
        ]);
    }
}
