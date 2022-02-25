<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // db::seed --class=Role
       DB::table('roles')->insert([
        ['name'=>'admin', 'display_name'=>'Quản trị hệ thông'],
        ['name'=>'content', 'display_name'=>'Viết bài'],
        ['name'=>'sale', 'display_name'=>'Sale'],
        ['name'=>'developer', 'display_name'=>'Phát triển web '],
       ]);
    }
}
