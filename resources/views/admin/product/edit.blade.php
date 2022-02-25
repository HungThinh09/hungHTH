@extends('admin.layout.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('admins\all\ckeckbox.css') }}">
    <link href="{{asset('admins\all\select2\select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admins\product\product_css.css')}}">
@endsection
@section('js')
    <script src="{{asset('\admins\all\select2\select2.min.js')}}"></script>
    <script src="{{asset('admins\product\product_js.js')}}">   </script>
    <script src="{{asset('admins\all\ckeditor\ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('product-show') }}">Product</a></li>
        <li class="breadcrumb-item"><a>Edit Product</a></li>
    </ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <form action="{{route('product-update')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('get')
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input id="name" value="{{$product->productName}}" placeholder="nhập tên sản phẩm..." class="form-control" type="text" name="name">
            <input type="hidden" value="{{$product->id}}" name="id">
        </div>
        <div class="form-group">
            <label for="category">Chọn danh mục</label>
            <select class="form-control select2-cate"  name="category[]" id="category" multiple>
               {!!$htmlOption!!}
            </select>
        </div>
        <div class="form-group">
            <label for="description">Mô tả sản phẩm</label>
            <textarea class="form-control"  placeholder="Nhập mô tả sản phẩm..." name="description" id="decription" cols="30"
                rows="10">{{$product->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Giá sản phẩm</label>
            <input class="form-control" name="price" value="{{$product->price}}" placeholder="nhập giáo sản phẩm" id="price">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control-file" value="{{$product->image}}" type="file" name="image" id="image">
            <img src="{{asset('uploads/product/'.$product->image)}}" width="200px" alt="">
        </div>
        <div class="form-group">
            <label for="images">Image detail</label>
            <input class="form-control-file" type="file" value="{{old('image[]')}}" name="images[]" id="images" multiple>
            @foreach (explode('!',$product->images) as $image)
               <img src="{{asset('uploads/product/'.$image)}}"  width="150px" alt="">
            @endforeach
        </div>
        <div class="form-group">
            <label for="tags">TAGS</label>
            <select class="form-control select2-tag" required name="tag[]" multiple>
                @foreach (explode('!',$product->tag) as $tagItem)
                    <option selected value="{{$tagItem}}">{{$tagItem}}</option>
                @endforeach
            </select>
        </div>
        <div id="wapper" class="form-group">
            Status(Còn hàng): &emsp;<input class="switch-toggle" value="1" {{$product->status==1?"checked":""}} type="checkbox" name="status">
        </div>
        <div id="wapper" class="form-group">
            Hiển thị : &emsp; <input type="checkbox" value="1" name="active" {{$product->active==1?"checked":""}} class='switch-toggle'></td>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Sửa sản phẩm</button>
        </div>
    </form>
@endsection
