<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function show()
    {
        $products = Product::all();

        return view('home.view', [
            'pageTitle' => 'Home',
            'products' => $products
        ]);

    }
}
