<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $fillable =[
        'product_id','attribute_id','attribute_value_id'
    ];
    public function get_attribute()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }

    public function get_attribute_value()
    {
        return $this->belongsTo(AttributeValue::class,'attribute_value_id');
    }

    public function get_product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
