@extends('admin.layout.main')
@section('css')
<link rel="stylesheet" href="{{asset('admins/all/checkbox')}}">
@endsection
@section('js')
@endsection
@section('sort-menu')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('setting-show')}}">Setting</a></li>
</ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <table class="table ">
        <tr>
            @can('settingAdd')
            <div class="row ">
                <!-- Example single danger button -->
                <div class="btn-group ">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        Thêm Cài đặt
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('setting-add') . '?type=text' }}">Text</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('setting-add') . '?type=textarea' }}">Textarea</a>
                    </div>
                </div>
            </div> 
            @endcan
          
        </tr>
        <tr>
            <th width='5%'>STT</th>
            <th width='30%'>Key</th>
            <th width=''>Value_key</th>
            <th width='10%'>Hiển thị</th>
            <th width='15%'></th>
        </tr>
        <tbody>
            @foreach ($settings as $key => $setting)
                <tr>
                    <td>{{ $key + $stt }}</td>
                    <td>{{ $setting->key }}</td>
                    <td> {{ $setting->value_key }}
                    </td>
                    <td>
                        @if ($setting->active == 1)
                            <span class="btn btn-success">Yes<span>
                                @else
                                    <span class="btn btn-danger">No<span>
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            @can('settingEdit')
                            <div>
                                <a href="{{ route('setting-edit', ['id' => $setting->id]) }}" class="btn btn-warning">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </div>
                            @endcan
                           
                            @can('settingDelete')
                            <div>
                                <form action="{{ route('setting-delete', ['id' => $setting->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa: {{ $setting->key }}')">
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
    <div class="phantrang2 phantrang">
        {!! $settings->links('custom.paginate') !!}
    </div>
@endsection
