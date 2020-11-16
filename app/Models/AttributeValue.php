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

    public function get_product()
    {
        return $this->hasMany(Product::class,'attribute_value_id');
    }

    public function get_product_attribute_value()
    {
        return $this->hasMany(ProductAttributeValue::class,'attribute_value_id');
    }
}
