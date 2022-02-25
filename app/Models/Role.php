<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function user(){
        return $this->belongsToMany('App\Models\User','role_users','roleId','userId');
    }
    public function permisstion(){
        return $this->belongsToMany('App\Models\Permisstion','permisstion_roles','roleId','permisstionId');
    }
}
