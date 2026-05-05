 
@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">All Products</h1>
    <p class="text-gray-500">{{ $products->count() }} products found</p>
</div>

<!-- Category Filter -->
<div class="flex gap-3 mb-8 flex-wrap">
    <a href="{{ route('shop') }}"
       class="px-4 py-2 rounded-full {{ !request('category') ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 hover:bg-blue-50' }} shadow">
        All
    </a>
    @foreach($categories as $category)
    <a href="{{ route('shop', ['category' => $category->slug]) }}"
       class="px-4 py-2 rounded-full {{ request('category') == $category->slug ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 hover:bg-blue-50' }} shadow">
        {{ $category->name }}
    </a>
    @endforeach
</div>

<!-- Products Grid -->
@if($products->count() > 0)
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
            <div class="flex justify-between items-center">
                <p class="text-blue-600 font-bold text-lg">${{ number_format($product->price, 2) }}</p>
                <span class="text-sm text-gray-400">Stock: {{ $product->stock }}</span>
            </div>
        </div>
    </a>
    @endforeach
</div>
@else
<div class="text-center py-16 text-gray-400">
    <div class="text-6xl mb-4">🔍</div>
    <p class="text-xl">No products found in this category</p>
</div>
@endif

@endsection