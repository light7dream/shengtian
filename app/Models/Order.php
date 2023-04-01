<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $attributes = [
        'confirmed_date' => '2100-01-01 00:00:00',
        'status'=>0,
        'deleted'=>0,
        'member_id'=>0,
    ];

    /**
     * Get all of the order_products for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    /**
     * Get the invoice associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function invoice()
    // {
    //     return $this->hasOne(Invoice::class);
    // }

    /**
     * Get the sender associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function members()
    {
        return $this->belongsTo(Member::class);
    }
}
