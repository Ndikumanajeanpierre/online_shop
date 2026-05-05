<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Electronics
            [
                'category_id' => 1,
                'name' => 'Samsung Galaxy A54',
                'slug' => 'samsung-galaxy-a54',
                'description' => 'Latest Samsung smartphone with amazing camera',
                'price' => 299.99,
                'stock' => 50,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => 'Wireless Headphones',
                'slug' => 'wireless-headphones',
                'description' => 'High quality wireless headphones with noise cancellation',
                'price' => 79.99,
                'stock' => 30,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'name' => 'Laptop Stand',
                'slug' => 'laptop-stand',
                'description' => 'Adjustable aluminum laptop stand',
                'price' => 29.99,
                'stock' => 100,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Clothing
            [
                'category_id' => 2,
                'name' => 'Classic T-Shirt',
                'slug' => 'classic-t-shirt',
                'description' => 'Comfortable cotton t-shirt for everyday wear',
                'price' => 19.99,
                'stock' => 200,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Denim Jeans',
                'slug' => 'denim-jeans',
                'description' => 'Stylish slim fit denim jeans',
                'price' => 49.99,
                'stock' => 150,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Books
            [
                'category_id' => 4,
                'name' => 'Laravel for Beginners',
                'slug' => 'laravel-for-beginners',
                'description' => 'Complete guide to learning Laravel framework',
                'price' => 24.99,
                'stock' => 75,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Sports
            [
                'category_id' => 5,
                'name' => 'Yoga Mat',
                'slug' => 'yoga-mat',
                'description' => 'Non-slip exercise yoga mat',
                'price' => 34.99,
                'stock' => 60,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'name' => 'Water Bottle',
                'slug' => 'water-bottle',
                'description' => 'Stainless steel insulated water bottle',
                'price' => 14.99,
                'stock' => 120,
                'image' => null,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}