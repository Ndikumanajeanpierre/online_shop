@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="bg-blue-600 text-white rounded-2xl p-12 mb-10 text-center">
    <h1 class="text-4xl font-bold mb-4">Welcome to MyShop 🛒</h1>
    <p class="text-xl mb-6">Find the best products at the best prices</p>
    <a href="{{ route('shop') }}" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100">
        Shop Now
    </a>
</div>

<!-- Categories -->
<h2 class="text-2xl font-bold mb-4">Shop by Category</h2>
<div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-10">
    @foreach($categories as $category)
    <a href="{{ route('shop', ['category' => $category->slug]) }}"
       class="bg-white rounded-xl p-4 text-center shadow hover:shadow-md hover:bg-blue-50 transition">
        <div class="text-3xl mb-2">
            @if($category->slug == 'electronics') 📱
            @elseif($category->slug == 'clothing') 👕
            @elseif($category->slug == 'food-drinks') 🍔
            @elseif($category->slug == 'books') 📚
            @elseif($category->slug == 'sports') ⚽
            @else 🛍️
            @endif
        </div>
        <p class="font-medium text-gray-700">{{ $category->name }}</p>
    </a>
    @endforeach
</div>

<!-- Latest Products -->
<h2 class="text-2xl font-bold mb-4">Latest Products</h2>
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    @foreach($products as $product)
    <a href="{{ route('product.show', $product->slug) }}"
       class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
        <div class="bg-gray-100 h-48 flex items-center justify-center text-6xl">
            @if($product->category->slug == 'electronics') 📱
            @elseif($product->category->slug == 'clothing') 👕
            @elseif($product->category->slug == 'food-drinks') 🍔
            @elseif($product->category->slug == 'books') 📚
            @elseif($product->category->slug == 'sports') ⚽
            @else 🛍️
            @endif
        </div>
        <div class="p-4">
            <h3 class="font-semibold text-gray-800 mb-1">{{ $product->name }}</h3>
            <p class="text-gray-500 text-sm mb-2">{{ $product->category->name }}</p>
            <p class="text-blue-600 font-bold text-lg">${{ number_format($product->price, 2) }}</p>
        </div>
    </a>
    @endforeach
</div>

@endsection