@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('admins\all\ckeckbox.css') }}">
@endsection
@section('js')

@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('menu-show') }}">Menu</a></li>
        <li class="breadcrumb-item active"><a href="">Add menu</a></li>
    </ol>
@endsection
@section('noidung')

    <div class="row justify-content-center">
        <div class="col-10">
            @include('admin/layout/alert')

            <form action="{{ route('menu-create') }}" method="post">
                @csrf
                @method('get')
                <div class="form-group">
                    <label for="my-input">Tên menu</label>
                    <input id="name" class="form-control" placeholder="Nhập tên menu..." type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="my-select">Parent_id</label>
                    <select id="my-select" class="form-control" name="parent_id">
                        <option value="0">-----Chọn menu cha-----</option>
                        {!! $option !!}
                    </select>
                </div>
                <div id="wapper" class="form-group">
                    Hiển thị : &emsp; <input type="checkbox" value="1" name="active" checked class='switch-toggle'></td>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Thêm Menu</button>
                </div>
            </form>
        </div>
    </div>
@endsection
