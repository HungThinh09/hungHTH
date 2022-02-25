@extends('admin.layout.main')
@section('css')
    <link href="{{ asset('admins\all\select2\select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admins\user\user.css') }}">
@endsection
@section('js')
    <script src="{{ asset('\admins\all\select2\select2.min.js') }}"></script>
    <script src="{{ asset('admins\user\user.js') }}"> </script>
@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user-show') }}">User</a></li>
        <li class="breadcrumb-item"><a href="#">Edit User</a></li>
    </ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <div class="col-10">
        <form action="{{ route('user-update') }}" method="post">
            @csrf
            @method('get')
            <div class="form-group">
                <label for="name">Tên </label>
                <input id="name" required class="form-control" placeholder="please enter name here..." type="text"
                    value="{{ $user->name }}" name="name">
                <input type="hidden" value="{{ $user->id }}" name="id">
            </div>
            <div class="form-group">
                <label for="user">User</label>
                <input id="user" required class="form-control" value="{{ $user->user }}"
                    placeholder="please enter user here..." type="text" name="user">
            </div>
            <div class="form-group">
                <label for="role">Vai trò</label>
                <select class="form-control select2-role" name="role[]" id="role" multiple>
                    @foreach ($roles as $role)
                        <option  
                        {{$roleItem->contains('id',$role->id)? "selected": ""}}
                        value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" value="{{ $user->email }}" required class="form-control"
                    placeholder="please enter email here..." type="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" placeholder="please enter password here..." type="password"
                    name="password">
            </div>
            <div class="form-group">
                <label for="password">Re-Password</label>
                <input id="re-password" class="form-control" placeholder="please enter password here..." type="password"
                    name="re-password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Sửa User</button>
            </div>
        </form>
    </div>
@endsection
