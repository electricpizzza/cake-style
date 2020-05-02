<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourit extends Model
{
    protected $fillable=[
        'user_id',
    ];
    
    public function items()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
