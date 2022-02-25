@extends('admin.layout.main')
@section('css')

@endsection
@section('js')

@endsection
@section('sort-menu')

@endsection
@section('noidung')
    @include('admin/layout/alert')

    <table class="table ">
        <tr>@can('menuList')
            <a class="btn btn-outline-primary float-right" href="{{ route('menu-add') }}">Thêm menu</a>
        @endcan</tr>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Active</th>
            <th></th>
        </tr>
        <tbody>
            @foreach ($menus as $key => $menu)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>
                        @if ($menu->active == 1)
                            <span class="btn btn-success">Yes<span>
                                @else
                                    <span class="btn btn-danger">No<span>
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            @can('menuEdit')
                            <div>
                                <a href="{{route('menu-edit',['id'=>$menu->id])}}" class="btn btn-warning">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                        </div>
                            @endcan
                           
                                @can('menuDelete')
                                <div>
                                    <form action="{{route('menu-delete',['id'=>$menu->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"  type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa: {{$menu->name}}')">
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
@endsection
