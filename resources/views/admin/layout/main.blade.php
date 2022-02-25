<!DOCTYPE html>
<!--
This is a starter admins page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
@include('admin.layout.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('admin')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('admin/category')}}" class="nav-link">Danh mục sản phẩm</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('admin/product')}}" class="nav-link">Sản phẩm</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-user"> @if(Auth::check()){{Auth::user()->name}} @endif</i>
                </a>
            </li>
            <li class="nav-item">
                <form action="{{url('admin-logout')}}" method="POST">
                    @csrf
                    @method('get')
                    <input type="submit" class="btn btn-outline-success" value="Logout">
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
  @include('admin.layout.slide')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{isset($tieude)?$tieude:"Trang chủ"}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                       @yield('sort-menu')
                    </div><!-- /.col -->
                </div><!-- /.row -->                 <hr>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

              @yield('noidung')
              
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        
        <div class="float-right d-none d-sm-inline">
            Anything you want  BUY
        </div>
       
        {{-- <strong>Copyright &copy; 2014-2021 <a href="{{url('')}}">Shop HTH</a>.</strong> All rights reserved. --}}
    </footer>
</div>
<!-- ./wrapper -->

@include('admin.layout.footer')
</body>
</html>
