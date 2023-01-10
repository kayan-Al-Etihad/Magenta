<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRanking extends Model
{
    protected $fillable = [
        'product_ranking',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
