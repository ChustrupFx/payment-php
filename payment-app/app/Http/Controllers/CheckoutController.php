<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    public function show()
    {
        return view('checkout.view', [
            'pageTitle' => 'Checkout'
        ]);
    }

    public function checkout(Request $request)
    {
        $authUser = Auth::user();
        $shoppingCart = $authUser->shoppingCart();
        $cartItems = $shoppingCart->items()->get();

        $lineItems = [];

        foreach($cartItems as $item) {
            array_push($lineItems, $this->buildLineItem($item));
        }

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel')
        ]);

        return response()->json(['id' => $checkoutSession->id]);
    }

    private function buildLineItem($item) {
        $product = $item->product()->first();
        return [
            'price_data' => [
                    'currency' => 'brl',
                    'unit_amount' => $product->price * 100,
                    'product_data' => [
                        'name' => $product->title,
                        'images' => [$product->image],
                    ],
                ],
                'quantity' => $item->quantity,
            ];

    }

    public function cancel()
    {
        return view('checkout.cancel', [
            'pageTitle' => 'Compra realizada'
        ]);
    }

    public function success()
    {
        return view('checkout.success', [
            'pageTitle' => 'Compra cancelada'
        ]);

    }
}
