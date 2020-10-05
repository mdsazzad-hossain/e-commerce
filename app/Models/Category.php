<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable=[
        'cat_name'
    ];
    
    public function get_child_category()
    {
        return $this->hasMany(ChildCategory::class,'category_id');
    }
}
