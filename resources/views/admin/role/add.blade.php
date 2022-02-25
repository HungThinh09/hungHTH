@extends('admin.layout.main')
@section('css')
<link rel="stylesheet" href="{{asset('\admins\role\role.css')}}">
@endsection
@section('js')
<script src="{{asset('\admins\role\role.js')}}"></script>
@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('role-show') }}">Role</a></li>
        <li class="breadcrumb-item"><a href="{{ route('role-add') }}">Add Role</a></li>
    </ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <form action="{{ route('role-create') }}" method="post">
        @csrf
        @method('get')
        <div class="form-group">
            <label for="name">Role Name</label>
            <input id="name" class="form-control" type="text" placeholder="Nhập tên role..." name="name">
        </div>
        <div class="form-group">
            <label for="display">Display Name</label>
            <textarea name="display" class="form-control" id="display" cols="30" rows="5">{{ old('display') }}</textarea>
        </div>

        <div class="col-12 row">
            <div class="col-12">
                <label for="">
                    <input id="checkall" type="checkbox" class="checkall" id="" value="">
                    <label for="checkall">&nbsp Check All</label>
                </label>
            </div>
            @foreach ($permisstions as $permisstion)
                <div class="card text-white bg-info   col-12">
                    <div class="card-header">
                        <input type="checkbox" class="parentPer" id="" value="">
                        <label for="">
                            <span>Chức năng : &ensp;{{ ucfirst($permisstion->name) }}</span>
                        </label>

                    </div>
                    <div class="card-body row">
                        @foreach ($permisstion->chilPer as $chilPer)
                            <div class="col-3">
                                <h5 class="card-title">
                                    <input type="checkbox" class="chilPer" name="chilPer[]" id="" value="{{$chilPer->id}}">
                                    <label for="">
                                      {{$chilPer->name  }}
                                    </label>

                                </h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Thêm Role</button>
            </div>
    </form>
@endsection
