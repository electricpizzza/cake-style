<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'product_detail_id','quantity',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function detail()
    {
        return $this->hasOne(ProductDetail::class);
    }
}
