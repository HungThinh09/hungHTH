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
        @can('userAdd')
            <tr>
                <a class="btn btn-outline-primary float-right" href="{{ route('user-add') }}">Thêm User</a>
            </tr>
        @endcan
        <tr>
            <th width='5%'>STT</th>
            <th width='30%'>Name</th>
            <th width=''>user</th>
            <th width=''>Chức vụ</th>
            <th width='15%'>Email</th>
            <th width='15%'></th>
        </tr>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + $stt }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->user }}</td>
                    <td>
                        <ul style="list-style-type: circle;">
                            @foreach ($user->roles as $role)
                                <li><a href="">{{ $role->name }}</a></li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="row">
                            @can('userEdit')
                                <div>
                                    <a href="{{ route('user-edit', ['id' => $user->id]) }}" class="btn btn-warning">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                </div>
                            @endcan
                            @can('userDelete')
                                <div>
                                    <form action="{{ route('user-delete', ['id' => $user->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa: {{ $user->name }}')">
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
    <div class="phantrang">
        {!! $users->links('custom.paginate') !!}
    </div>
@endsection
