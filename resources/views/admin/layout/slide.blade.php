<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('') }}" class="brand-link">
        <img src="{{ asset('admins/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Shop HTH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admins/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ auth::check() ? auth::user()->name : '' }}
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('categoryList')
                            <li class="nav-item">
                                <a href="{{ route('category-show') }}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh mục</p>
                                </a>
                            </li>
                        @endcan

                        @can('menuList')
                            <li class="nav-item">
                                <a href="{{ route('menu-show') }}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Menu</p>
                                </a>
                            </li>
                        @endcan



                        @can('productList')
                            <li class="nav-item">
                                <a href="{{ route('product-show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sản phẩm</p>
                                </a>
                            </li>
                        @endcan


                        @can('sliderList')
                            <li class="nav-item">
                                <a href="{{ route('slider-show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Slider</p>
                                </a>
                            </li>
                        @endcan

                        @can('settingList')
                            <li class="nav-item">
                                <a href="{{ route('setting-show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Setting</p>
                                </a>
                            </li>
                        @endcan



                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Permisstion
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('userList')
                            <li class="nav-item">
                                <a href="{{ route('user-show') }}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách nhân viên</p>
                                </a>
                            </li>
                        @endcan

                        @can('roleList')
                            <li class="nav-item">
                                <a href="{{ route('role-show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh Sách Roles</p>
                                </a>
                            </li>
                        @endcan
                        @can('permisstionList')
                            <li class="nav-item">
                                <a href="{{ route('permisstion-show') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permisstion</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Order - Khách hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('orderList')
                            <li class="nav-item">
                                <a href="{{ route('order-show') }}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách order</p>
                                </a>
                            </li>
                        @endcan

                        
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
