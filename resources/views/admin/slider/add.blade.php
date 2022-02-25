@extends('admin.layout.main')
@section('css')
<link rel="stylesheet" href="{{ asset('admins\all\ckeckbox.css') }}">
@endsection
@section('js')
    
@endsection
@section('sort-menu')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('slider-show') }}">Slider</a></li>
    <li class="breadcrumb-item"><a href="{{ route('slider-add') }}">Add Slider</a></li>
</ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <form action="{{route('slider-create')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('get')
        <div class="form-group">
            <label for="name">Tên slide</label>
            <input id="name" value="{{old('name')}}" class="form-control" placeholder="Nhập tên Slider..." type="text" name="name">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input id="image" class="form-control-flie" type="file" name="image">
        </div>
        <div id="wapper" class="form-group">
            Hiển thị : &emsp; <input type="checkbox" value="1" name="active" checked class='switch-toggle'></td>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Thêm Slide</button>
        </div>
    </form>
@endsection