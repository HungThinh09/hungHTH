@extends('admin.layout.main')
@section('css')
@endsection
@section('js')
@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="">Product</a></li>
    </ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <table class="table" width="">
        <tr>
            <form action="">
                &ensp;<input type="text" placeholder="Nhập sản phẩm cần tìm"
                    value="{{ isset(request()->search) ? request()->search : '' }}" id="search" name="search">
                <button class="">
                    <ion-icon name="search-circle-outline"></ion-icon>&nbsp;Tìm Sản phẩm
                </button>
            </form>
            <a href="{{ route('product-show') }}" {{ $showAll && $showAll != '' ? '' : 'hidden' }}><button
                    type="submit">Hiện
                    tất cả</button></a>
                    @can('productRestore')
                    <a class="btn btn-outline-primary float-right" href="{{ route('product-restore') }}">
                        <ion-icon name="arrow-forward-outline"></ion-icon> Product đã xóa
                    </a>
                    @endcan
                    
            @can('productAdd')
                <a class="btn btn-outline-primary float-right" href="{{ route('product-add') }}">
                    <ion-icon name='add-circle-outline'></ion-icon> Thêm Product
                </a>
            @endcan
            
        </tr>
        <tr>
            <th width="5%">STT</th>
            <th>Tên Sản phẩm</th>
            <th>Danh mục</th>
            <th width="10%">Giá (VND)</th>
            <th width="15%">Ảnh</th>
            <th width="10%">Hiển thị</th>
            <th width="15%">Status</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $key => $product)
            <tr>
                <td>{{ $key + $stt }}</td>
                <td>{{ $product->productName }}</td>
                <td>
                    @foreach ($product->category as $cate)
                        <ul style="list-style-type: circle;">
                            <li> <a href="{{ route('product-show', ['slug' => $cate->slug]) }}">{{ $cate->name }}</a>
                            </li>
                        </ul>
                    @endforeach
                </td>
                <td>{{ number_format($product->price) }}</td>
                <td width="15%">
                    <img width="100%" src="{{ asset('uploads/product/' . $product->image) }}" alt="Not Founds">
                </td>
                <td>
                    @if ($product->active == 1)
                        <span class="btn btn-success">Yes<span>
                            @else
                                <span class="btn btn-danger">No<span>
                    @endif
                </td>
                <td>
                    @if ($product->status == 1)
                        <span class="btn btn-success">Còn hàng<span>
                            @else
                                <span class="btn btn-danger">Hết hàng<span>
                    @endif
                </td>
                <td>
                    <div class="row">
                        @can('productEdit', $product->id)
                            <a href="{{ route('product-edit', ['id' => $product->id]) }}"
                                class="float-right btn btn-outline-warning">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                        @endcan


                        @can('productDelete', $product->id)
                            <form action="{{ route('product-delete', ['id' => $product->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger" onclick="return confirm('Bạn chắc chắn muốn xóa ')">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>
                        @endcan

                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="phantrang phantrang2">
        {!! $products->links('custom.paginate') !!}
    </div>
@endsection
