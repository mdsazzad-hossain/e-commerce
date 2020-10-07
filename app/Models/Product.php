<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $fillable =[
    //     'brand_id',
    //     'product_name',
    //     'color',
    //     'size',
    //     'qty',
    //     'pur_price',
    //     'sale_price',
    // ];
        protected $guarded =[];
    public function get_brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function get_product_avatars()
    {
        return $this->hasMany(ProductAvatar::class,'product_id');
    }
}
