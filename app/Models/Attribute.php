<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable =[
        'name','slug'
    ];
    public function get_attribute_value()
    {
        return $this->hasMany(AttributeValue::class,'attribute_id');
    }

    public function get_product_attribute_value()
    {
        return $this->hasMany(ProductAttributeValue::class,'attribute_id');
    }
}
