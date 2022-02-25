<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Permisstion extends Model
{
    use HasFactory;
    protected $guarded =[];
    public $timestamps= false;
    public function chilPer(){
        return $this->hasMany(Permisstion::class,'parent_id');
    }
}
