@extends('admin.layout.main')
@section('css')
@endsection
@section('js')
@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('role-show') }}">Role</a></li>
    </ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <table class="table ">
        @can('roleAdd')
            <a class="btn btn-outline-primary float-right" href="{{ route('role-add') }}">Thêm Role</a>
        @endcan
        <tr>
            <th width='5%'>STT</th>
            <th width=''>Role Name</th>
            <th width=''>DisPlay</th>
            <th width='15%'></th>
        </tr>
        <tbody>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $key + $stt }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>
                        <div class="row">
                            @can('roleEdit')
                                <div>
                                    <a href="{{ route('role-edit', ['id' => $role->id]) }}" class="btn btn-warning">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                </div>
                            @endcan
                            @can('roleDelete')
                                <div>
                                    <form action="{{ route('role-delete', ['id' => $role->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa: {{ $role->name }}')">
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
        {!! $roles->links('custom.paginate') !!}
    </div>
@endsection
