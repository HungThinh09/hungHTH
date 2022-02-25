<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='categories';
    protected $guarded=[];
    public function product(){
        return $this->belongsToMany('App\Models\Product','product_categories','categoryId','productId');
    }
    public function chilCategory(){
        return $this->hasMany(Category::class,'parent_id');
    }
}
