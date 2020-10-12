<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    protected $guarded=[];
    
    public function get_vendor_product_category()
    {
        return $this->belongsTo(VendorProductCategory::class,'vendor_product_category_id');
    }

    public function get_vendor_product_avatar()
    {
        return $this->hasMany(VendorProductAvatar::class,'vendor_product_id');
    }
}
