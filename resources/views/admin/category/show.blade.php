@extends('admin.layout.main')
@section('css')
@endsection
@section('js')
@endsection
@section('sort-menu')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('category-show') }}">Category</a></li>
</ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')

    <table class="table ">
        <tr>
           @can('categoryRestore')
           <a class="btn btn-outline-primary float-right" href="{{ route('category-restore') }}"><ion-icon name="arrow-back-circle-outline"></ion-icon> Danh mục đã xóa</a>
           @endcan
            @can('categoryAdd')
            <a class="btn btn-outline-primary float-right" href="{{ route('category-add') }}"><ion-icon name="add-circle-outline"></ion-icon> Thêm danh mục</a></tr>
            @endcan
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Active</th>
            <th>Add Menu</th>
            <th></th>
        </tr>
        <tbody>
            @foreach ($category as $key => $cate)
                <tr>
                    <td>{{ $key + $stt }}</td>
                    <td>{{ $cate->name }}</td>
                    <td>{{ $cate->slug }}</td>
                    <td>
                        @if ($cate->active == 1)
                            <span class="btn btn-success">Yes<span>
                                @else
                                    <span class="btn btn-danger">No<span>
                        @endif
                    </td>
                    <td>
                        @if ($cate->addMenu == 1)
                            <span class="btn btn-success">Yes<span>
                                @else
                                    <span class="btn btn-danger">No<span>
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            @can('categoryEdit')
                                <div>
                                    <a href="{{ route('category-edit', ['id' => $cate->id]) }}" class="btn btn-warning">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                </div>
                            @endcan
                            @can('categoryDelete')
                                <div>
                                    <form action="{{ route('category-delete', ['id' => $cate->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa: {{ $cate->name }}')">
                                            <ion-icon name="trash-outline"></ion-icon>
                                        </button>
                                    </form>
                                </div>
                            @endcan

                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div class="phantrang phantrang2">
        {!! $category->links('custom.paginate') !!}
    </div>
@endsection
