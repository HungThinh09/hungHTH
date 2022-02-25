@extends('admin.layout.main')
@section('css')
@endsection
@section('js')
@endsection
@section('sort-menu')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Order</a></li>
    </ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <div>
        <table class="table ">
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Status</th>
                    <th>Ngày mua hàng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $key => $customer)
                    <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{ $customer->CodeId }}</td>
                        <td><x-status-cart :status="$customer->status" :quantity="1" /></td>
                        <td>{{ $customer->created_at }}</td>
                        <td>
                            <div class="row">

                                <div>
                                    <a href="{{route('order-detail',['CodeId'=> $customer->CodeId])}}" class="btn btn-warning">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </a>
                                </div>
                                <div>
                                    @can('orderDelete')
                                    <form action="{{route('order-delete',['CodeId'=> $customer->CodeId])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa: {{ $customer->CodeId }}')">
                                           <ion-icon name="trash-outline"></ion-icon>
                                        </button>
                                    </form>
                                    @endcan
                                </div>


                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div>
        {!! $customers -> links() !!}
    </div>
@endsection
