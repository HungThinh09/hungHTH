<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Customer_cart;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cart()
    {
        return $this->belongsToMany(Product::class, 'Customer_carts', 'customerId', 'productId');
    }
    public function carts()
    {
        return $this->hasMany(Customer_cart::class, 'customerId');
    }
}
