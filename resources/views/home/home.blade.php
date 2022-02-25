@extends('home.layout.main')
@section('carousel')
@include('home/layout/carousel')
@endsection

@section('search')
@include('home/layout/search')
@endsection
@section('content')
    <div class="content1">
        <div class="headline">
            <h3 class="title-product">Sản phẩm bán chạy</h3>
        </div>
        <x-productlist :products="$products" :nameProduct="123"  />
    </div>
    <hr>
    <div class="content2">
        <div class="headline">
            <h3 class="title-product">Sản phẩm Moi</h3>
        </div>
        <x-productlist :products="$products" :nameProduct="123"  />
    </div>
@endsection
