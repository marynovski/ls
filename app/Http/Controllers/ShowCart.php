<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ShowCart extends Controller
{
    public function __invoke()
    {
        /** @var User $user */
        $user = auth()->user();

        $cart = Cart::where('user_id', $user->id)->first();

        return view('client.cart', ['cart' => $cart]);
    }
}