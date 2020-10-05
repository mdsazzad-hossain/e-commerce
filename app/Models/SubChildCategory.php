<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubChildCategory extends Model
{
    protected $fillable=[
        'sub_child_name','category_id','child_category_id'
    ];
    public function get_child_category()
    {
        return $this->belongsTo(ChildCategory::class,'child_category_id');
    }
}
