@extends('admin.layout.main')
@section('css')
    
@endsection
@section('js')
    
@endsection
@section('sort-menu')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permisstion-show') }}">Permission</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permisstion-add') }}">Add Permission</a></li>
</ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
    <div>
        <div class="row justify-content-center form-group">
           
            <div class="col-12">   
                <form action="{{route('permisstion-create')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('get')
                    <div class="form-group">
                        <label for="name">Tên Permission</label>
                       <select name="name" id="name" class="form-control">
                        <option value="">----Chọn Module----</option>
                        {!! $html !!}
                       </select>
                      
                    </div>
                    <div class="col-12 row">
                        @foreach ($module_childs as $module_child)
                        <div class="col-3">
                            <label for="">
                                <input checked value="{{$module_child}}" id="" name="module_child[]" type="checkbox">&nbsp;{{ Ucwords($module_child)}}
                            </label>
                         </div>
                        @endforeach
                    </div>
                    <div>
                        <input type="submit" value="Submit" class="btn btn-outline-success">
                    </div>
                </form>
            </div>
            
        </div>
        <div class="form-group">
            <b>Danh sách module đã tạo</b>
            <ul>
                @foreach ($permisstions as $permistion)
                <li>{{$permistion->display}}</li>
                @endforeach

            </ul>
        </div>
    </div>
@endsection