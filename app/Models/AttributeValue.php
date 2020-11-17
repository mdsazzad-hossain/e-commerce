<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $fillable =[
        'value','attribute_id','slug'
    ];
    public function get_attribute()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }

    public function get_product_by_color()
    {
        return $this->hasMany(Product::class,'color');
    }

    public function get_product_by_size()
    {
        return $this->hasMany(Product::class,'size');
    }
}
