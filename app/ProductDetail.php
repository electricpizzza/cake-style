<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = [
        "size","color","sexe","product_id"
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
