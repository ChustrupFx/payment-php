<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function store(int $id)
    {
        $product = Product::find($id);

        if (is_null($product)) return redirect()->route('home.show');

        \Cart::session(1)->add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [],
            'associatedModel' => $product
        ]);

        return back()->with('success', 'Produto adicionado ao carrinho com sucesso!');
    }

    public function show()
    {
        $cartContent = \Card::getContent();

        return view('shoppingcart.view', array(
            'cartContent' => $cartContent
        ));
    }
}
