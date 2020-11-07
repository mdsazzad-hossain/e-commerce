<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // protected $fillable =[
    //     'brand_name',
    //     'category_id',
    //     'child_category_id',
    //     'sub_child_category_id'
    // ];
    protected $guarded =[];
    public function get_product()
    {
        return $this->hasMany(Product::class,'brand_id');
    }

    public function get_child_category()
    {
        return $this->belongsTo(ChildCategory::class,'child_category_id');
    }

    public function get_sub_child_category()
    {
        return $this->belongsTo(SubChildCategory::class,'sub_child_category_id');
    }

    public function get_category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
