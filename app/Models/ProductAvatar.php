<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAvatar extends Model
{
    protected $fillable =[
        'product_id',
        'avatar'
    ];

    public function get_product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
