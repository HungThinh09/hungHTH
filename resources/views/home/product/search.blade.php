@extends('home.layout.main')

@section('css')

<link rel="stylesheet" href="{{"homes\css\prodcutList.css"}}">
@endsection

@section('js')


@section('search')
    @include('home/layout/search')
@endsection

@section('content')
    <hr>
    <div class="content1 row contentOne">
        
        <div class="contentLeft col">
            <div class="formSearch">
                @include('home/layout/alert')
                <form action="{{route('home-search')}}" method="post">
                    @csrf
                    @method('get')
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input id="name" placeholder="Tên sản phẩm" value="{{isset($name)? $name: old('name')}}" class="form-control" type="text" name="name">
                    </div>

                    <div class="form-group">
                        <label for="my-select">Danh mục</label>
                        <select id="my-select" class="form-control" name="category">
                            <option value="0">-----Chọn danh mục -----</option>
                            {!! $htmlOption !!}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">Giá từ</label>
                        <input id="price" value="{{isset($price1)? $price1:0}}" type="number" placeholder="Giá từ... (VND)" value="{{old('price1')}}" class="form-control" type="text" name="price1">
                        <input id="" value="{{isset($price2)? $price2:0}}" type="number" placeholder="Đến ...(VND)" value="{{old('price2')}}" class="form-control" type="text" name="price2">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="contentRight col-md-9 col-sm-12 col-xs-12">
            <div class="headline">
                <h3 class="title-product">Tìm kiếm: {{ $tieude }}</h3>
            </div>
   
            <x-productlist :products="$products" :nameProduct="$tieude" :pagi="1" />
            <hr>
            <hr>
            <div class="productLienquan">
                <div class="titleLienquan">
                    <span >Có thể bạn quan tâm</span>
                </div>
                <x-productlist :products="$productLienquan" />
            </div>
        </div>
    </div>
@endsection
