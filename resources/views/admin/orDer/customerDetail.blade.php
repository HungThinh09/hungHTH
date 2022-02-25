
@extends('admin.layout.main')
@section('css')
    
@endsection
@section('js')
    
@endsection
@section('sort-menu')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('order-show') }}">List Order</a></li>
    <li class="breadcrumb-item"><a href="">Order Detail</a></li>
    <li class="breadcrumb-item"><a href=""> Customer Infomation</a></li>
</ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <div>
       <a href="{{route('order-detail',['CodeId'=>$customer->CodeId])}}" class="btn btn-primary">Back</a>
      
    </div>


    <div>
        <div class="justify-content-center">
         
                <div class="form-group">
                    <label for="name">Tên khách hàng</label>
                    <input id="name" readonly  value="{{$customer->Name}}"  placeholder=" Mời nhập tên.."  class="form-control" type="text" name="name">
                  
                </div>
                <div class="form-group">
                    <label for="phone">Điện thoại</label>
                    <input id="Phone" readonly  value="{{$customer->Phone}}" maxlength="10" placeholder=" Mời Số điện thoại.."  class="form-control" type="integer"
                        name="phone">
                  
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="address" readonly value="{{$customer->Email}}" placeholder=" Mời nhập email.." class="form-control" type="email" name="email">
                   
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ nhận hàng</label>
                    <input id="address" readonly value="{{$customer->address}}" placeholder=" Mời nhập Địa chỉ.." class="form-control" type="text" name="address">
                  
                </div>
                <div class="form-group">
                    <label for="note">Ghi chú</label>
                    <textarea name="note" readonly class="form-control" id="note" cols="30"
                        rows="10">{{$customer->note}}</textarea>
                </div>
               
    
           
        </div>
    </div>

@endsection