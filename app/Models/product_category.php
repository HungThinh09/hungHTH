<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    use HasFactory;
    protected $fillable=['productId','categoryId'];
    public $timestamps = false;
    public function product(){
        return $this->belongsTo(Product::class,'productId','id');
    }
  
}
