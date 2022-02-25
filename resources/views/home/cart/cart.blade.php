@extends('home.layout.main')

@section('css')
<style>

</style>
@endsection
@section('js')
@endsection

@section('search')
    @include('home/layout/search')
@endsection


@section('content')
    <hr>
    <div>
    
     
        @include('home/layout/alert')
       
        @if (count($cart->items) == 0)
         
         <a href="{{route('home')}}">Bạn chưa mua sản phẩm vào. Vào đặt hàng ngay</a>
    
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá (VNĐ)</th>
                        <th>Số lượng</th>
                        <th>Thành tiền (VNĐ)</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($cart->items as $key => $item)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['image'] }}</td>
                            <td>{{ number_format($item['priceSale']) }}</td>
                            <td>
                                <form action="{{ route('cartUpdate', ['id' => $item['id']]) }}" method="post">
                                    @csrf
                                    @method('get')
                                    <input type="number" value="{{ $item['quantity'] }}" name="quantity" min="1" max="1000">

                                    <button type="submit">Sửa</button>
                                </form>

                            </td>
                            <td>{{ number_format($item['priceSale'] * $item['quantity']) }}</td>

                            <td>
                                <a href="{{ route('cartRemove', ['id' => $item['id']]) }}"  onclick="return confirm('Are you sure?')" class="btn btn-danger">Xóa Sản phẩm</a>
                            </td>

                        </tr>
                    @endforeach
                     
                    <tr>
                        <td colspan="4">Tổng số sản phẩm</td>
                        <td colspan="3">{{ $cart->total_quantity }}</td>
                    </tr>
                    <tr>
                        <td colspan="5">Thành tiền</td>
                        <td colspan="1">{{ $cart->total_price }}</td>
                        <td>
                            <a href="{{ route('payment') }}" class="btn btn-success">Thanh toán</a>
                            <a href="{{ route('cartClear') }}" onclick="return confirm('Bạn có chắc chắn muốn xóa giỏ hàng')" class="btn btn-danger">Xóa Giỏ hàng</a>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
    @endif

@endsection
