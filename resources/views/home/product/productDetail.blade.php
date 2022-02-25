@extends('home.layout.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('homes\css\detail.css') }}">
    <link rel="stylesheet" href="{{ asset('homes\owl carousel\assets\owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homes\owl carousel\assets\owl.theme.default.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('homes\owl carousel\owl.carousel.min.js') }}"></script>
    <script src="{{ asset('\homes\js\detail.js') }}"></script>
@endsection

@section('search')
    @include('home/layout/search')
@endsection

@section('content')
    <div class="content1 row contentOne">

        <div class="contentLeft col">
            <div class="formSearch">
            
                <form action="{{ route('home-search') }}" method="post">
                    @csrf
                    @method('get')
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input id="name" placeholder="Tên sản phẩm" value="{{ old('name') }}" class="form-control"
                            type="text" name="name">
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
                        <input id="price" value="0" type="number" placeholder="Giá từ... (VND)"
                            value="{{ old('price1') }}" class="form-control" type="text" name="price1">
                        <input id="" value="0" type="number" placeholder="Đến ...(VND)" value="{{ old('price2') }}"
                            class="form-control" type="text" name="price2">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="contentRight col-md-9 col-sm-12 col-sm-12">



            <div class="title">
                San pham: {{ $product->productName }}
                <hr>
            </div>

            <div class="row ">
                <div class="col col-md-4 imageProduct">
                    <img class="imageProduct-iteam" src="{{ asset('uploads/product/' . $product->image) }}" alt="">
                    @if ($product->images != '')
                        <div class="owl-carousel owl-theme">
                            @foreach (explode('!', $product->images) as $image)
                                <div class="item">
                                    <img width="100px" src="{{ asset('uploads/product/' . $image) }}" alt="">
                                </div>
                            @endforeach

                        </div>
                    @endif

                </div>

                <div class="col-md-8 col-12 infoProduct">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                aria-controls="pills-home" aria-selected="true"><b>Sản phẩm</b></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false"><b>Thông tin chi tiết</b></a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div>
                                @include('home/layout/alert')
                                <p>Tên sản phẩm: {{ $product->productName }}</p>
                                <p>Giá sản phẩm: {{ number_format($product->price) }} VNĐ</p>
                                <p>Khuyến mãi: {{ $product->sale }} %</p>
                                <p>Giá sau khuyến mãi :
                                    <x-sale :price="$product->price" :sale="$product->sale" /> VNĐ
                                </p>
                                <form action="{{route('addCart')}}" method="post">
                                    @csrf
                                    @method('get')
                                    @if(isset($cart->items[$product->id]))
                                    <p>Số lượng: <input type="number" name="quantity" max="100" min="0" value="{{$cart->items[$product->id]['quantity']}}"> <a href="{{route('myCart')}}" ><ion-icon style="color: green" name="checkbox-outline"></ion-icon></a></p>
                                    
                                    @else
                                    <p> Số lượng: <input type="number" name="quantity" max="100" min="0" value="1"></p>
                                    @endif
                                    <input type="hidden" name="id" value="{{$product->id}}">
                    
                                    <p>Thêm vào giỏ hàng  <button style="border: none" type="submit"><ion-icon class="btn btn-outline-success" name="cart-outline"></ion-icon></button></p>
                                       
                                </form>
                             
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
