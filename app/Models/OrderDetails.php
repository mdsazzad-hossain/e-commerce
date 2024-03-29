<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $guarded=[];

    public function get_orders()
    {
        return $this->belongsTo(Orders::class,'order_id');
    }

    public function get_user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function get_product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function get_vendor_product()
    {
        return $this->belongsTo(VendorProduct::class,'vendor_product_id');
    }
}
