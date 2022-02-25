@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('admins\all\ckeckbox.css') }}">
@endsection
@section('js')

@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('category-show') }}">Category</a></li>
        <li class="breadcrumb-item active"><a href="">Add category</a></li>
    </ol>
@endsection
@section('noidung')

    <div class="row justify-content-center">
        <div class="col-10">
            @include('admin/layout/alert')

            <form action="{{ route('category-update') }}" method="post">
                @csrf
                @method('get')
                <div class="form-group">
                    <label for="my-input">Tên danh mục</label>
                    <input id="name" class="form-control" value="{{$category->name}}" placeholder="Nhập tên danh mục..." type="text"
                        name="name">
                        <input type="hidden" name="id" value="{{$category->id}}">
                </div>
                <div class="form-group">
                    <label for="my-select">Parent_id</label>
                    <select id="my-select" class="form-control" name="parent_id">
                        <option value="0">-----Chọn danh mục cha-----</option>
                        {!! $htmlOption !!}
                    </select>
                </div>
                <div id="wapper" class="form-group">
                    <tr>
                        <td>Hiển thị :</td>
                        <td> &ensp; <input type="checkbox" value="1" name="active" {{$category->active==1?"checked":""}} class='switch-toggle'></td>
                    </tr>
                </div>
                <div id="wapper" class="form-group">
                    Add Menu : &ensp; <input type="checkbox" value="1" name="addMenu" {{$category->addMenu==1?"checked":""}} class='switch-toggle'>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Sửa danh mục</button>
                </div>
            </form>
        </div>
    </div>
@endsection
