@extends('home.layout.main')


@section('search')
    @include('home/layout/search')
@endsection

@section('content')
    <hr>
    <div class="justify-content-center">
        <form action="{{ route('paymented') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Tên khách hàng</label>
                <input id="name" value="{{old('name')}}"  placeholder=" Mời nhập tên.."  class="form-control" type="text" name="name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Điện thoại</label>
                <input id="Phone" value="{{old('phone')}}" maxlength="10" placeholder=" Mời Số điện thoại.."  class="form-control" type="integer"
                    name="phone">
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="address" value="{{old('email')}}" placeholder=" Mời nhập email.." class="form-control" type="email" name="email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ nhận hàng</label>
                <input id="address" value="{{old('address')}}" placeholder=" Mời nhập Địa chỉ.." class="form-control" type="text" name="address">
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="note">Ghi chú</label>
                <textarea name="note" placeholder=" Mời nhập note.." class="form-control" id="note" cols="30"
                    rows="10">{{old('note')}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Xác nhận đặt hàng')">Đặt
                    hàng</button>
            </div>

        </form>
    </div>
@endsection
