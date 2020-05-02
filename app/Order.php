<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'address_id','status','amount'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
