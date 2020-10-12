<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $guarded=[];
    
    public function get_vendor_product_category()
    {
        return $this->hasMany(VendorProductCategory::class,'vendor_id');
    }
}
