@extends('admin.layout.main')
@section('css')
@endsection
@section('js')
@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('category-show') }}">Category</a></li>
        <li class="breadcrumb-item active"><a href="">Restore category</a></li>
    </ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <table class="table ">
        <tr>
            @can('categoryList')
                <a class="btn btn-outline-primary float-right" href="{{ route('category-show') }}">
                    <ion-icon name="arrow-back-circle-outline"></ion-icon> Về danh sách Category
                </a>
            @endcan
        </tr>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Slug</th>
            <th></th>
        </tr>
        <tbody>
            @if (count($category) > 0)
                @foreach ($category as $key => $cate)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $cate->name }}</td>
                        <td>{{ $cate->slug }}</td>
                        <td>
                            <div class="row">

                                <div>
                                    <a href="{{ route('category-restored', ['id' => $cate->id]) }}" class="btn btn-warning"
                                        onclick="return confirm('Bạn có chắc chắn muốn restore: {{ $cate->name }}')">
                                        <ion-icon name="refresh-circle-outline"></ion-icon>
                                    </a>
                                </div>


                                <div>
                                    @can('categoryForceDelete')
                                        <form action="{{ route('category-deleteOver', ['id' => $cate->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa: {{ $cate->name }}')">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </button>
                                        </form>
                                    @endcan

                                </div>


                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>
                        <div>
                            <b> Không có danh mục nào bị xóa</b>
                        </div>
                    </td>
                </tr>
            @endif


        </tbody>
    </table>
    <div class="phantrang phantrang2">
        {!! $category->links('custom.paginate') !!}
    </div>
@endsection
