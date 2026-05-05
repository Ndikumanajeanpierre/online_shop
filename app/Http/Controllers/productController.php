<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Homepage
    public function index()
    {
        $products = Product::where('is_active', true)
                    ->latest()
                    ->take(8)
                    ->get();

        $categories = Category::all();

        return view('shop.index', compact('products', 'categories'));
    }

    // Shop page with category filter
    public function shop(Request $request)
    {
        $categories = Category::all();
        $query = Product::where('is_active', true);

        if ($request->category) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->latest()->get();

        return view('shop.shop', compact('products', 'categories'));
    }

    // Single product page
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $related = Product::where('category_id', $product->category_id)
                    ->where('id', '!=', $product->id)
                    ->take(4)
                    ->get();

        return view('shop.show', compact('product', 'related'));
    }
}