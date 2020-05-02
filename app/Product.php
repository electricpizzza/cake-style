<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        "title",
        "category_id" ,
        "price" ,
        "quantity" ,
        "brand" ,
        "description" ,
        "available" ,
        "sale" ,
        "showen_as" ,
    ];

    public function detail()
    {
        return $this->hasOne(AvailableDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Product::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
    
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
