<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Online Shop') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">
                🛒 MyShop
            </a>
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600">Home</a>
                <a href="{{ route('shop') }}" class="text-gray-600 hover:text-blue-600">Shop</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-blue-600">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-red-500">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Register</a>
                @endauth
                <a href="{{ route('cart.index') }}" class="relative">
                    <span class="text-2xl">🛒</span>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                        {{ session('cart') ? count(session('cart')) : 0 }}
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-white shadow-inner mt-12 py-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} MyShop. All rights reserved.
    </footer>

</body>
</html>