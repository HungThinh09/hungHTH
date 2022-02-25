<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class permisstion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisstions')->insert([
            ['id' => '1', 'name' => 'menu', 'display' => 'Menu', 'parent_id' => '0', 'key' => ''],
            ['id' => '2', 'name' => 'menuList', 'display' => 'Danh sách menu', 'parent_id' => '1', 'key' => 'menuList'],
            ['id' => '3', 'name' => 'menuAdd', 'display' => 'Thêm Menu', 'parent_id' => '1', 'key' => 'menuAdd'],
            ['id' => '4', 'name' => 'menuEdit', 'display' => 'Sửa Menu', 'parent_id' => '1', 'key' => 'menuEdit'],
            ['id' => '5', 'name' => 'menuDelete', 'display' => 'Xóa Menu', 'parent_id' => '1', 'key' => 'menuDelete'],

            ['id' => '6', 'name' => 'category', 'display' => 'Category', 'parent_id' => '0', 'key' => ''],
            ['id' => '7', 'name' => 'categoryList', 'display' => 'Danh sách danh mục', 'parent_id' => '6', 'key' => 'categoryList'],
            ['id' => '8', 'name' => 'categoryAdd', 'display' => 'Thêm danh mục', 'parent_id' => '6', 'key' => 'categoryAdd'],
            ['id' => '9', 'name' => 'categoryEdit', 'display' => 'Sửa danh mục', 'parent_id' => '6', 'key' => 'categoryEdit'],
            ['id' => '10', 'name' => 'categoryDelete', 'display' => 'Xóa danh mục', 'parent_id' => '6', 'key' => 'categoryDelete'],

            ['id' => '11', 'name' => 'product', 'display' => 'Menu', 'parent_id' => '0', 'key' => ''],
            ['id' => '12', 'name' => 'productList', 'display' => 'Danh sách Sản phẩm', 'parent_id' => '11', 'key' => 'productList'],
            ['id' => '13', 'name' => 'productAdd', 'display' => 'Thêm sản phẩm', 'parent_id' => '11', 'key' => 'productAdd'],
            ['id' => '14', 'name' => 'productEdit', 'display' => 'Sửa sản phẩm', 'parent_id' => '11', 'key' => 'productEdit'],
            ['id' => '15', 'name' => 'productDelete', 'display' => 'Xóa sản phẩm', 'parent_id' => '11', 'key' => 'productDelete'],

            ['id' => '16', 'name' => 'slider', 'display' => 'Slider', 'parent_id' => '0', 'key' => ''],
            ['id' => '17', 'name' => 'sliderList', 'display' => 'Danh sách slider', 'parent_id' => '16', 'key' => 'sliderList'],
            ['id' => '18', 'name' => 'sliderAdd', 'display' => 'Thêm slider', 'parent_id' => '16', 'key' => 'sliderAdd'],
            ['id' => '19', 'name' => 'sliderEdit', 'display' => 'Sửa slider', 'parent_id' => '16', 'key' => 'sliderEdit'],
            ['id' => '20', 'name' => 'sliderDelete', 'display' => 'Xóa slider', 'parent_id' => '16', 'key' => 'sliderDelete'],

            ['id' => '21', 'name' => 'setting', 'display' => 'Setting', 'parent_id' => '0', 'key' => ''],
            ['id' => '22', 'name' => 'settingList', 'display' => 'Danh sách setting', 'parent_id' => '21', 'key' => 'settingList'],
            ['id' => '23', 'name' => 'settingAdd', 'display' => 'Thêm setting', 'parent_id' => '21', 'key' => 'settingAdd'],
            ['id' => '24', 'name' => 'settingEdit', 'display' => 'Sửa setting', 'parent_id' => '21', 'key' => 'settingEdit'],
            ['id' => '25', 'name' => 'settingDelete', 'display' => 'Xóa setting', 'parent_id' => '21', 'key' => 'settingDelete'],

            ['id' => '26', 'name' => 'user', 'display' => 'User', 'parent_id' => '0', 'key' => ''],
            ['id' => '27', 'name' => 'userList', 'display' => 'Danh sách user', 'parent_id' => '26', 'key' => 'userList'],
            ['id' => '28', 'name' => 'userAdd', 'display' => 'Thêm user', 'parent_id' => '26', 'key' => 'userAdd'],
            ['id' => '29', 'name' => 'userEdit', 'display' => 'Sửa user', 'parent_id' => '26', 'key' => 'userEdit'],
            ['id' => '30', 'name' => 'userDelete', 'display' => 'Xóa user', 'parent_id' => '26', 'key' => 'userDelete'],

            ['id' => '31', 'name' => 'role', 'display' => 'Role', 'parent_id' => '0', 'key' => ''],
            ['id' => '32', 'name' => 'roleList', 'display' => 'Danh sách role', 'parent_id' => '31', 'key' => 'roleList'],
            ['id' => '33', 'name' => 'roleAdd', 'display' => 'Thêm role', 'parent_id' => '31', 'key' => 'roleAdd'],
            ['id' => '34', 'name' => 'roleEdit', 'display' => 'Sửa role', 'parent_id' => '31', 'key' => 'roleEidt'],
            ['id' => '35', 'name' => 'roleDelete', 'display' => 'Xóa role', 'parent_id' => '31', 'key' => 'roleDelete'],

            ['id' => '36', 'name' => 'permisstion', 'display' => 'Permisstion', 'parent_id' => '0', 'key' => ''],
            ['id' => '37', 'name' => 'permisstionList', 'display' => 'Danh sách permisstion', 'parent_id' => '36', 'key' => 'permisstionList'],
            ['id' => '38', 'name' => 'permisstionAdd', 'display' => 'Thêm permisstion', 'parent_id' => '36', 'key' => 'permisstionAdd'],
            ['id' => '39', 'name' => 'permisstionEdit', 'display' => 'Sửa permisstion', 'parent_id' => '36', 'key' => 'permisstionEdit'],
            ['id' => '40', 'name' => 'permisstionDelete', 'display' => 'Xóa permisstion', 'parent_id' => '36', 'key' => 'permisstionDelete'],
        ]);
    }
}
