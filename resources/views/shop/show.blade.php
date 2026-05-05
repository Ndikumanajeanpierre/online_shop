 
@extends('layouts.app')

@section('content')

<div class="bg-white rounded-2xl shadow p-8 mb-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-gray-100 rounded-xl h-80 flex items-center justify-center text-9xl">
            @if($product->category->slug == 'electronics') 📱
            @elseif($product->category->slug == 'clothing') 👕
            @elseif($product->category->slug == 'food-drinks') 🍔
            @elseif($product->category->slug == 'books') 📚
            @elseif($product->category->slug == 'sports') ⚽
            @else 🛍️
            @endif
        </div>
        <div>
            <p class="text-blue-600 text-sm mb-2">{{ $product->category->name }}</p>
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
            <p class="text-gray-600 mb-6">{{ $product->description }}</p>
            <p class="text-4xl font-bold text-blue-600 mb-4">${{ number_format($product->price, 2) }}</p>
            <div class="flex items-center gap-2 mb-6">
                @if($product->stock > 0)
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        ✅ In Stock ({{ $product->stock }} left)
                    </span>
                @else
                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                        ❌ Out of Stock
                    </span>
                @endif
            </div>
           <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="flex gap-4 items-center mb-4">
                    <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}"
                           class="w-20 border rounded-lg px-3 py-2 text-center">
                    <button type="submit"
                            class="flex-1 bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                        🛒 Add to Cart
                    </button>
                </div>
            </form>
            <a href="{{ route('shop') }}" class="text-gray-500 hover:text-blue-600 text-sm">
                ← Back to Shop
            </a>
        </div>
    </div>
</div>

@if($related->count() > 0)
<h2 class="text-2xl font-bold mb-4">Related Products</h2>
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    @foreach($related as $item)
    <a href="{{ route('product.show', $item->slug) }}"
       class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
        <div class="bg-gray-100 h-40 flex items-center justify-center text-5xl">
            @if($item->category->slug == 'electronics') 📱
            @elseif($item->category->slug == 'clothing') 👕
            @elseif($item->category->slug == 'food-drinks') 🍔
            @elseif($item->category->slug == 'books') 📚
            @elseif($item->category->slug == 'sports') ⚽
            @else 🛍️
            @endif
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-gray-800 mb-1">{{ $item->name }}</h3>
            <p class="text-blue-600 font-bold">${{ number_format($item->price, 2) }}</p>
        </div>
    </a>
    @endforeach
</div>
@endif

@endsection