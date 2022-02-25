<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermisstionController;
use  App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CustomerController;
use App\Http\Controllers\Home\HomeController;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ---------------------------Homeeeeeeeeeeeeeeeeeeeeeeeeeeee

route::get('/', [HomeController::class, 'index'])->name('home');
route::get('/test', function () {
    return view('home.product.test');
});
route::get('category/{slug}', [HomeController::class, 'category'])->name('home-category');
route::get('product/', [HomeController::class, 'search'])->name('home-search');
route::get('product/detail/{slug}', [HomeController::class, 'productDetail'])->name('product-detail');



// -----Giỏ Hàng
route::prefix('my-cart')->group(function () {
    route::get('/', [CartController::class, 'myCart'])->name('myCart');
    route::get('/add', [CartController::class, 'addCart'])->name('addCart');
    route::get('/remove/{id}', [CartController::class, 'cartRemove'])->name('cartRemove');
    route::get('/update/{id}', [CartController::class, 'cartUpdate'])->name('cartUpdate');
    route::get('clear', [CartController::class, 'cartClear'])->name('cartClear');
    route::get('payment', [CustomerController::class, 'payment'])->name('payment');
    route::post('paymented', [CustomerController::class, 'paymented'])->name('paymented');
    route::get('view/my-Oder/findOrder', [CustomerController::class, 'findOder'])->name('findOder');
    route::get('view/my-Oder', [CustomerController::class, 'myOredr'])->name('myOrder');
    route::get('testMail', [CustomerController::class, 'testMail'])->name('mail');
});



// ----------------------------Adminnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn

route::get('login-admin', [AdminController::class, 'login'])->name('login-admin');
route::get('dangnhap-admin', [AdminController::class, 'dangnhap']);
route::get('admin-logout', [AdminController::class, 'logout']);
route::prefix('admin')->middleware('auth')->group(function () {
    route::get('/', [AdminController::class, 'index'])->name('admin');
    //-----------------------CATEGORY
    route::get('category', [CategoryController::class, 'show'])->name('category-show')->middleware('can:categoryList');
    route::get('category/add', [CategoryController::class, 'add'])->name('category-add')->middleware('can:categoryAdd');
    route::get('category/create', [CategoryController::class, 'create'])->name('category-create')->middleware('can:categoryAdd');
    route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit')->middleware('can:categoryEdit');
    route::get('category/update', [CategoryController::class, 'update'])->name('category-update')->middleware('can:categoryEdit');
    route::delete('category/delete/{id}', [CategoryController::class, 'delete'])->name('category-delete')->middleware('can:categoryDelete');

    //-----------------------Menu
    route::get('menu', [MenuController::class, 'show'])->name('menu-show')->middleware('can:menuList');
    route::get('menu/add', [MenuController::class, 'add'])->name('menu-add')->middleware('can:menuAdd');
    route::get('menu/create', [MenuController::class, 'create'])->name('menu-create')->middleware('can:menuAdd');
    route::get('menu/edit/{id}', [MenuController::class, 'edit'])->name('menu-edit')->middleware('can:menuEdit');
    route::get('menu/update', [MenuController::class, 'update'])->name('menu-update')->middleware('can:menuEdit');
    route::delete('menu/delete/{id}', [MenuController::class, 'delete'])->name('menu-delete')->middleware('can:menuDelete');

    //-----------------------Product
    route::get('product', [ProductController::class, 'show'])->name('product-show')->middleware('can:productList');
    route::get('product/add', [ProductController::class, 'add'])->name('product-add')->middleware('can:productAdd');
    route::get('product/create', [ProductController::class, 'create'])->name('product-create')->middleware('can:productAdd');
    route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product-edit')->middleware('can:productEdit,id');
    route::get('product/update', [ProductController::class, 'update'])->name('product-update');
    route::delete('product/delete/{id}', [ProductController::class, 'delete'])->name('product-delete')->middleware('can:productDelete, abk');
    // route::delete('product/delete/{id}', [ProductController::class, 'delete'])->name('product-delete')->middleware('can:productDelete, id');

    //-----------------------Slider
    route::get('slider', [SliderController::class, 'show'])->name('slider-show')->middleware('can:sliderList');
    route::get('slider/add', [SliderController::class, 'add'])->name('slider-add')->middleware('can:sliderAdd');
    route::get('slider/create', [SliderController::class, 'create'])->name('slider-create')->middleware('can:sliderAdd');
    route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('slider-edit')->middleware('can:sliderEdit');
    route::get('slider/update', [SliderController::class, 'update'])->name('slider-update')->middleware('can:sliderEdit');
    route::delete('slider/delete/{id}', [SliderController::class, 'delete'])->name('slider-delete')->middleware('can:sliderDelete');

    //-----------------------Setting
    route::get('setting', [SettingController::class, 'show'])->name('setting-show')->middleware('can:settingList');
    route::get('setting/add', [SettingController::class, 'add'])->name('setting-add')->middleware('can:settingAdd');
    route::get('setting/create', [SettingController::class, 'create'])->name('setting-create')->middleware('can:settingAdd');
    route::get('setting/edit/{id}', [SettingController::class, 'edit'])->name('setting-edit')->middleware('can:settingEdit');
    route::get('setting/update', [SettingController::class, 'update'])->name('setting-update')->middleware('can:settingEdit');
    route::delete('setting/delete/{id}', [SettingController::class, 'delete'])->name('setting-delete')->middleware('can:settingDelete');


    //-----------------------User
    route::get('user', [UserController::class, 'show'])->name('user-show')->middleware('can:userList');
    route::get('user/add', [UserController::class, 'add'])->name('user-add')->middleware('can:userAdd');
    route::get('user/create', [UserController::class, 'create'])->name('user-create')->middleware('can:userAdd');
    route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user-edit')->middleware('can:userEdit');
    route::get('user/update', [UserController::class, 'update'])->name('user-update')->middleware('can:userEdit');
    route::delete('user/delete/{id}', [UserController::class, 'delete'])->name('user-delete')->middleware('can:userDelete');

    //-----------------------Role
    route::get('role', [RoleController::class, 'show'])->name('role-show')->middleware('can:roleList');
    route::get('role/add', [RoleController::class, 'add'])->name('role-add')->middleware('can:roleAdd');
    route::get('role/create', [RoleController::class, 'create'])->name('role-create')->middleware('can:roleAdd');
    route::get('role/edit/{id}', [RoleController::class, 'edit'])->name('role-edit')->middleware('can:roleEdit');
    route::get('role/update', [RoleController::class, 'update'])->name('role-update')->middleware('can:roleEdit');
    route::delete('role/delete/{id}', [RoleController::class, 'delete'])->name('role-delete')->middleware('can:roleDelete');

    //-----------------------Permisstion
    route::get('permisstion', [PermisstionController::class, 'show'])->name('permisstion-show')->middleware('can:permisstionList');
    route::get('permisstion/add', [PermisstionController::class, 'add'])->name('permisstion-add')->middleware('can:permisstionAdd');
    route::get('permisstion/create', [PermisstionController::class, 'create'])->name('permisstion-create')->middleware('can:permisstionAdd');
    route::get('permisstion/edit/{id}', [PermisstionController::class, 'edit'])->name('permisstion-edit')->middleware('can:permisstionEdit');
    route::get('permisstion/update', [PermisstionController::class, 'update'])->name('permisstion-update');
    route::delete('permisstion/delete/{id}', [PermisstionController::class, 'delete'])->name('permisstion-delete')->middleware('can:permisstionDelete');


    //-----------------------Order
    route::get('List-Order', [AdminOrderController::class, 'show'])->name('order-show');
    route::get('List-Order/detail/{CodeId}', [AdminOrderController::class, 'detail'])->name('order-detail');
    route::get('List-Order/detail/status/{CodeId}', [AdminOrderController::class, 'changeStatus'])->name('changeStatus');
    route::get('List-Order/customerInfomation-{CodeId}', [AdminOrderController::class, 'customerInfomation'])->name('customerInfomation');
    route::delete('List-Order/{CodeId}', [AdminOrderController::class, 'delete'])->name('order-delete');


});
