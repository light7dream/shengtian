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
        return $this->hasMany(ReachargeHistory::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function password_change_histories()
    {
        return $this->hasMany(PasswordChangeHistory::class);
    }

    public function exchange_histories()
    {
        return $this->hasMany(ExchangeHistory::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
