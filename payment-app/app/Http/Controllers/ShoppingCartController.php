<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;
use phpDocumentor\Reflection\Types\Integer;

class ShoppingCartController extends Controller
{
    public function store(int $id)
    {
        $product = Product::find($id);
        $authUser = Auth::user();

        if (is_null($product)) return redirect()->route('home.show');

        $cart = $authUser->shoppingCart();

        $cartItem = new CartItem();
        $cartItem->product()->associate($product);
        $cartItem->shoppingCart()->associate($cart);
        $cartItem->quantity = 1;
        $cartItem->save();

        return back()->with('success', 'Produto adicionado ao carrinho com sucesso!');
    }

    public function show()
    {
        $authUser = Auth::user();
        $userCart = $authUser->shoppingCart();

        $cartContent = $userCart->items()->get();
        $cartTotalPrice = $userCart->totalPrice();

        return view('shoppingcart.view', array(
            'cartContent' => $cartContent,
            'cartTotalPrice' => $cartTotalPrice,
            'pageTitle' => 'Carrinho',
        ));
    }

    public function deleteItem(int $id)
    {
        $item = CartItem::find($id);
        $item->delete();

        return redirect()->back()->with('success', 'Item removido do carrinho de compras');
    }
}
