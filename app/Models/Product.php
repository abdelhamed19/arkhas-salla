<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function aliases()
    {
        return $this->hasMany(ProductAliase::class);
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class)->with('history');
    }

}
