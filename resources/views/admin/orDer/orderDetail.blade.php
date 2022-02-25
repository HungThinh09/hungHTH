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
    </ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <div class="row">
        <div>
            <a class="btn btn-outline-primary" href="{{ route('customerInfomation', ['CodeId' => $order->CodeId]) }}">Thông tin khách hàng</a>
        </div>
        <div class="float-right">
            <form action="{{route('changeStatus',['CodeId'=>$order->CodeId])}}" method="post">
                @csrf
                @method('get')
                <select name="status" id="status" class="btn btn-app">
                    <option {{ $order->status == 0 ? 'selected' : '' }} value="0">Đang sử lý</option>
                    <option {{ $order->status == 1 ? 'selected' : '' }} value="1">Chuẩn bị giao hàng</option>
                    <option {{ $order->status == 2 ? 'selected' : '' }} value="2">Đang giao hàng</option>
                    <option {{ $order->status == 3 ? 'selected' : '' }} value="3">Giao hàng thành công</option>
                    <option {{ $order->status == -1 ? 'selected' : '' }} value="-1">Hủy đơn</option>
                </select>
                <button type="submit">Sửa trạng thái</button>
            </form>
        </div>
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

                @foreach ($order->carts as $stt => $item)
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
@endsection
