<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=['total','status'];

    public function products() {
        return $this->belongsToMany('App\Product')->withPivot(['qty', 'total']);
    }

    public static function createOrder()
    {
        $user = Auth::user();
        $order = $user->orders()->create(['total' => Cart::total(), 'status' => 'pending']);


        $cartItems = Cart::content();

        foreach ($cartItems as $cartItem) {
            $order->products()->attach($cartItem->id, ['qty' => $cartItem->qty, 'tax' => Cart::tax(), 'total' => $cartItem->qty * $cartItem->price]);

        }
    }

}
