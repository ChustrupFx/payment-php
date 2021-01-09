<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shopping_cart';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function totalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items()->get() as $cartItem) {
            $product = $cartItem->product()->first();
            $totalPrice += $product->price;
        }

        return $totalPrice;
    }

}
