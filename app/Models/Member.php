<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $attributes = [
        'used_points'=>0,
        'role'=>0,
        'last_exchange_at'=>null,
    ];
    public function reacharge_histories()
    {
        return $this->hasMany(Reacharge_histori::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function password_change_histories()
    {
        return $this->hasMany(Password_change_history::class);
    }

    public function exchange_histories()
    {
        return $this->hasMany(Exchange_history::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
