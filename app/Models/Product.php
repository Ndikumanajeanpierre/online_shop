<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'is_active',
    ];

    // A product belongs to one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // A product can be in many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}