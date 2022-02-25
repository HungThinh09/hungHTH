@extends('admin.layout.main')
@section('css')
@endsection
@section('js')
@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('product-show') }}">Product</a></li>
        <li class="breadcrumb-item"><a href="">Restore Product</a></li>
    </ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <table class="table" width="">
        <tr>
            @can('productList')
                <a class="btn btn-outline-primary float-right" href="{{ route('product-show') }}">
                    <ion-icon name="arrow-back-circle-outline"></ion-icon> Về danh sách sản phẩm
                </a>
            @endcan
        </tr>
        <tr>
            <th width="5%">STT</th>
            <th>Tên Sản phẩm</th>
            <th>Danh mục</th>
            <th width="">Giá (VND)</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $key => $product)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $product->productName }}</td>
                <td>
                    @foreach ($product->category as $cate)
                        <ul style="list-style-type: circle;">
                            <li> <a href="{{ route('product-show', ['slug' => $cate->slug]) }}">{{ $cate->name }}</a> </li>
                        </ul>
                    @endforeach
                </td>
                <td>{{ number_format($product->price) }}</td>
            
              
               
                <td>
                    <div class="row">
                        @can('productRestore')
                            <a href="{{ route('product-restored', ['id' => $product->id]) }}"
                                class="float-right btn btn-outline-warning" onclick="return confirm('Bạn chắc chắn muốn restore sản phẩm : {{$product->productName}}')">
                                <ion-icon name="refresh-circle-outline"></ion-icon>
                            </a>
                        @endcan


                        @can('productForceDelete')
                            <form action="{{ route('product-deleteOver', ['id' => $product->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger" onclick="return confirm('Bạn chắc chắn muốn xóa : {{$product->productName}}')">
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
