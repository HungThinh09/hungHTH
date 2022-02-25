@extends('home.layout.main')

@section('css')
@endsection

@section('search')
    @include('home/layout/search')
@endsection

@section('content')
    <hr>
    <form action="{{ route('myOrder') }}" method="post">
        @csrf
        @method('get')
        <input class="" placeholder="Nhập Mã đơn hàng" value="{{ isset($customer) ? $customer->CodeId : ""}}" type="text" name="maId">
        <button type="submit">Tìm Kiếm</button>
        {{-- @error('maId')
            <small class="">{{ $message }}</small>
        @enderror --}}
    </form>
    @include('home/layout/alert')
    @if (isset($customer))
    <div>

        <x-status-cart :status='$customer->status' />
  
      </div>
      <div>
          <table class="table">
              <thead>
                  <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Hình ảnh</th>
                      <th>Đơn giá (VNĐ)</th>
                      <th>Số lượng</th>
                      <th>Thành tiền (VNĐ)</th>
  
                  </tr>
              </thead>
              <tbody>
                  @php
                      $quantity = $price = 0;
                  @endphp
  
                  @foreach ($customer->carts as $stt => $item)
                      <tr>
                          <td>{{ $stt + 1 }}</td>
                          <td>{{ $item->product->productName }}</td>
                          <td width="30%"><img width="100%" src="{{ asset('uploads/product/' . $item->product->image) }}"
                                  alt=""></td>
                          <td>{{ number_format($item->price) }} </td>
                          <td>{{ $item->quantity }}</td>
                          <td>{{ number_format($item->price * $item->quantity) }}</td>
                      </tr>
                      @php
                          $quantity += $item->quantity;
                          $price += $item->price * $item->quantity;
                      @endphp
                  @endforeach
  
                  <tr>
                      <th colspan="4">Tổng số sản phẩm</th>
                      <th colspan="1">{{ $quantity }}</th>
                      <td></td>
                  </tr>
                  <tr>
                      <th colspan="5">Thành tiền</th>
                      <th colspan="1">{{ number_format($price) }}</th>
                  </tr>
              </tbody>
          </table>
      </div> 
    @else
      <div>
          <a href="{{'home'}}">Quay lại mua hàng</a>
      </div>
    @endif
   
@endsection
