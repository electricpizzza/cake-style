<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function detail()
    {
        return $this->hasOne(ProductDetail::class);
    }
}
