@extends('admin.layout.main')
@section('css')
@endsection
@section('js')
@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permisstion-show') }}">Permission</a></li>
    </ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <table class="table ">
        <thead>
            @can('permisstionAdd')
            <tr> <a class="btn btn-outline-primary " href="{{ route('permisstion-add') }}">Thêm Permisstion</a></tr>
            @endcan
           
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($per as $key => $perItem)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ ucfirst($perItem->display)}}</td>
                    <td>
                        <div class="row">
                            @can('permisstionDelete')
                                <form action="{{ route('permisstion-delete', ['id' =>  $perItem->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-outline-danger" onclick="return confirm('Bạn chắc chắn muốn xóa ')">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                            @endcan
    
                        </div>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
