<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Customer_cart extends Model
{
    use HasFactory;
    protected $guarded =[];
    public $timestamps = false;
    public function product(){
        return $this->hasOne(Product::class,'id','productId');
    }
    
}
