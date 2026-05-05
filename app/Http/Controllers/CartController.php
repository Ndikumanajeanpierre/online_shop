<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // View cart page
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('cart.index', compact('cart', 'total'));
    }

    // Add item to cart
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);
        $quantity = $request->quantity ?? 1;

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => $quantity,
                'image'    => $product->image,
                'slug'     => $product->slug,
                'category' => $product->category->slug,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')
               ->with('success', $product->name . ' added to cart!');
    }

    // Update quantity
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')
               ->with('success', 'Cart updated!');
    }

    // Remove item
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')
               ->with('success', 'Item removed from cart!');
    }

    // Clear entire cart
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')
               ->with('success', 'Cart cleared!');
    }
}