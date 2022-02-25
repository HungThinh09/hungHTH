<?php
namespace App\Components;
use Illuminate\Support\Facades\Gate;
class Permisstion{

    public function permisstionGeta(){
        $this->permisstionDefine();
    }

    public function PermisstionDefine(){
        Gate::define('menuList', 'App\Policies\MenuPolicy@view');
        Gate::define('menuAdd', 'App\Policies\MenuPolicy@create');
        Gate::define('menuEdit', 'App\Policies\MenuPolicy@update');
        Gate::define('menuDelete', 'App\Policies\MenuPolicy@delete');
        
        Gate::define('categoryList', 'App\Policies\CategoryPolicy@view');
        Gate::define('categoryEdit', 'App\Policies\CategoryPolicy@update');
        Gate::define('categoryAdd', 'App\Policies\CategoryPolicy@create');
        Gate::define('categoryDelete', 'App\Policies\CategoryPolicy@delete');
  
        Gate::define('productList', 'App\Policies\ProductPolicy@view');
        Gate::define('productEdit', 'App\Policies\ProductPolicy@update');
        Gate::define('productAdd', 'App\Policies\ProductPolicy@create');
        Gate::define('productDelete', 'App\Policies\ProductPolicy@delete');

        Gate::define('sliderList', 'App\Policies\SliderPolicy@view');
        Gate::define('sliderEdit', 'App\Policies\SliderPolicy@update');
        Gate::define('sliderAdd', 'App\Policies\SliderPolicy@create');
        Gate::define('sliderDelete', 'App\Policies\SliderPolicy@delete');

        Gate::define('settingList', 'App\Policies\SettingPolicy@view');
        Gate::define('settingEdit', 'App\Policies\SettingPolicy@update');
        Gate::define('settingAdd', 'App\Policies\SettingPolicy@create');
        Gate::define('settingDelete', 'App\Policies\SettingPolicy@delete');

        Gate::define('userList', 'App\Policies\UserPolicy@view');
        Gate::define('userEdit', 'App\Policies\UserPolicy@update');
        Gate::define('userAdd', 'App\Policies\UserPolicy@create');
        Gate::define('userDelete', 'App\Policies\UserPolicy@delete');

        Gate::define('roleList', 'App\Policies\RolePolicy@view');
        Gate::define('roleEdit', 'App\Policies\RolePolicy@update');
        Gate::define('roleAdd', 'App\Policies\RolePolicy@create');
        Gate::define('roleDelete', 'App\Policies\RolePolicy@delete');

        Gate::define('permisstionList', 'App\Policies\PermisstionPolicy@view');
        Gate::define('permisstionEdit', 'App\Policies\PermisstionPolicy@update');
        Gate::define('permisstionAdd', 'App\Policies\PermisstionPolicy@create');
        Gate::define('permisstionDelete', 'App\Policies\PermisstionPolicy@delete');
    }
}