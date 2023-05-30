<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProducts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class Order extends Controller
{
    public function __invoke(Request $request, Product $product)
    {
        /** @var User $user */
        $user = auth()->user();

        $cart = Cart::where('user_id', $user->id)->first();

        $cartProducts = CartProducts::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartProducts === null) {
            CartProducts::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'count' => $request->get('count'),
            ]);
        } else {
            $cartProducts->update([
                'count' => $cartProducts->count + (int)$request->get('count')
            ]);
        }

        return redirect()->route('products.index');
    }
}