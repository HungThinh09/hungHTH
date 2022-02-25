@extends('admin.layout.main')
@section('css')

@endsection
@section('js')

@endsection
@section('sort-menu')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Slider</a></li>
</ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')

    <table class="table ">
        <tr>@can('sliderAdd')
            <a class="btn btn-outline-primary float-right" href="{{ route('slider-add') }}">Thêm Slider</a>
        @endcan</tr>
        <tr>
            <th width='5%'>STT</th>
            <th width='30%'>Name</th>
            <th width=''>Image</th>
            <th width='10%'>Hiển thị</th>
            <th width='15%'></th>
        </tr>
        <tbody>
            @foreach ($slider as $key => $slide)
                <tr>
                    <td>{{ $key + $stt }}</td>
                    <td>{{ $slide->name }}</td>
                    <td>
                     
                      <div class="row ">
                        <img src="{{asset('uploads/slider/'.$slide->image)}}" height="150px" width="100%" alt="">
                       </div>
                    </td>
                    <td>
                        @if ($slide->active == 1)
                            <span class="btn btn-success">Yes<span>
                                @else
                                    <span class="btn btn-danger">No<span>
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            @can('sliderEdit')
                            <div>
                                <a href="{{route('slider-edit',['id'=>$slide->id])}}" class="btn btn-warning">
                                    <ion-icon name="create-outline"></ion-icon>
                                </a>
                            </div>
                            @endcan
                            
                            @can('sliderDelete')
                            <div>
                                <form action="{{route('slider-delete',['id'=>$slide->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"  type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa: {{$slide->name}}')">
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
        {!! $slider->links('custom.paginate') !!}
    </div>
@endsection
