<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }
}
