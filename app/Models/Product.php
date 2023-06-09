<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;

    protected $fillable=['name', 'description', 'categoryId', 'points'];
    protected $casts = [
        'colors' => 'array', 
        'sizes' => 'array', 
    ];
    protected $attributes = [
        'virtual'=>0
    ];
    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the cart for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get all of the order for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }


    /**
     * Get all of the exchangehistory for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function exchangehistories()
    {
        return $this->hasMany(ExchangeHistory::class);
    }

 
}