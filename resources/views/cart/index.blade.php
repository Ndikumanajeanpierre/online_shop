 
@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">🛒 Your Cart</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
        ✅ {{ session('success') }}
    </div>
@endif

@if(count($cart) > 0)

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- Cart Items -->
    <div class="lg:col-span-2 space-y-4">
        @foreach($cart as $id => $item)
        <div class="bg-white rounded-xl shadow p-4 flex gap-4 items-center">

            <!-- Product Icon -->
            <div class="bg-gray-100 rounded-lg w-20 h-20 flex items-center justify-center text-4xl flex-shrink-0">
                @if($item['category'] == 'electronics') 📱
                @elseif($item['category'] == 'clothing') 👕
                @elseif($item['category'] == 'food-drinks') 🍔
                @elseif($item['category'] == 'books') 📚
                @elseif($item['category'] == 'sports') ⚽
                @else 🛍️
                @endif
            </div>

            <!-- Product Info -->
            <div class="flex-1">
                <h3 class="font-semibold text-gray-800">{{ $item['name'] }}</h3>
                <p class="text-blue-600 font-bold">${{ number_format($item['price'], 2) }}</p>
            </div>

            <!-- Quantity Update -->
            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                @csrf
                <input type="hidden" name="product_id" value="{{ $id }}">
                <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                       min="1" max="100"
                       class="w-16 border rounded-lg px-2 py-1 text-center text-sm">
                <button type="submit"
                        class="bg-blue-100 text-blue-600 px-3 py-1 rounded-lg text-sm hover:bg-blue-200">
                    Update
                </button>
            </form>

            <!-- Subtotal -->
            <div class="text-right min-w-20">
                <p class="font-bold text-gray-800">${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                <p class="text-xs text-gray-400">subtotal</p>
            </div>

            <!-- Remove -->
            <form action="{{ route('cart.remove') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $id }}">
                <button type="submit" class="text-red-400 hover:text-red-600 text-xl">✕</button>
            </form>

        </div>
        @endforeach

        <!-- Clear Cart -->
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button type="submit"
                    class="text-red-500 hover:text-red-700 text-sm underline">
                Clear entire cart
            </button>
        </form>
    </div>

    <!-- Order Summary -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow p-6 sticky top-24">
            <h2 class="text-xl font-bold mb-4">Order Summary</h2>

            <div class="space-y-3 mb-4">
                @foreach($cart as $item)
                <div class="flex justify-between text-sm text-gray-600">
                    <span>{{ $item['name'] }} x{{ $item['quantity'] }}</span>
                    <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                </div>
                @endforeach
            </div>

            <div class="border-t pt-4 mb-6">
                <div class="flex justify-between font-bold text-lg">
                    <span>Total</span>
                    <span class="text-blue-600">${{ number_format($total, 2) }}</span>
                </div>
            </div>

            <a href="{{ route('shop') }}"
               class="block text-center bg-gray-100 text-gray-700 py-3 rounded-xl mb-3 hover:bg-gray-200">
                ← Continue Shopping
            </a>

            <a href="#"
               class="block text-center bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700">
                Proceed to Checkout →
            </a>
        </div>
    </div>

</div>

@else

<!-- Empty Cart -->
<div class="text-center py-20">
    <div class="text-8xl mb-6">🛒</div>
    <h2 class="text-2xl font-bold text-gray-700 mb-2">Your cart is empty!</h2>
    <p class="text-gray-500 mb-6">Looks like you haven't added anything yet.</p>
    <a href="{{ route('shop') }}"
       class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-blue-700">
        Start Shopping
    </a>
</div>

@endif

@endsection