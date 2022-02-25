@extends('admin.layout.main')
@section('css')
    
@endsection
@section('js')
    
@endsection
@section('sort-menu')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
</ol>
@endsection
@section('noidung')
    @include('admin/layout/alert')
@endsection