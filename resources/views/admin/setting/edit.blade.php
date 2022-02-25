@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('admins\all\ckeckbox.css') }}">
@endsection
@section('js')
@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('setting-show') }}">Setting</a></li>
        <li class="breadcrumb-item"><a href="">Edit Setting</a></li>
    </ol>
@endsection
@section('noidung')
    <div class="row float-right ">
        <!-- Example single danger button -->
        <div class="btn-group ">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                {{ request()->type == null ? $setting->type : request()->type }}
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('setting-edit',['id'=>$setting->id]) . '?type=text' }}">Text</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('setting-edit',['id'=>$setting->id]) . '?type=textarea' }}">Textarea</a>
            </div>
        </div>
    </div>

    @include('admin/layout/alert')
    <form action="{{ route('setting-update') . '?type=' . request()->type }}" method="post">
        @csrf
        @method('get')
        <div class="form-group">
            <label for="key">Key</label>
            <input id="key" value="{{ $setting->key }}" class="form-control" placeholder="Mời nhập Key..." type="text"
                name="key">
            <input id="id" value="{{ $setting->id }}" class="form-control" placeholder="Mời nhập Key..." type="hidden"
                name="id">
        </div>
        <div class="form-group">
            <label for="value_key">Value Key</label>
            @php
             $request= request()->type==''?$setting->type: request()->type;
            @endphp
            @if ( $request == 'text')
                <input id="value_key" value="{{ $setting['value_key'] }}" class="form-control"
                    placeholder="Mời nhập Value..." type="text" name="value_key">
            @else
                <textarea name="value_key" id="value_key" cols="30" class="form-control" rows="10"
                    placeholder="Mời nhập Value...">{{ $setting['value_key'] }}</textarea>
            @endif
        </div>
        <div id="wapper" class="form-group">
            Hiển thị : &emsp; <input type="checkbox" value="1" name="active" {{ $setting->active ? 'checked' : '' }}
                class='switch-toggle'></td>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Sửa Cài đặt</button>
        </div>
    </form>
@endsection
