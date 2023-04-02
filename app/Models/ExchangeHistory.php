<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeHistory extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->belongsTo(Member::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
