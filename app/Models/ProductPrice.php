<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function history()
    {
        return $this->hasMany(PriceHistory::class, 'price_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
