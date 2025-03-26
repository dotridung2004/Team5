@php
    // dd($documentByID);
@endphp

@extends('layouts.documentSearch');

@section('content')
    <div class="search__detail--main" style="padding: 20px 0 20px 0">
        <h2 class="display-6" style="border-bottom: 1px solid #000">{{ $documentByID->tentailieu }}</h2>
    <div class="documentID-main" style=" display: flex; padding-top: 25px; padding-bottom: 25px">
        <div class="document-image" style="width: 40%">
            <img style="width:100px; height:auto" src="{{ $documentByID->hinhanh }}" alt="{{ $documentByID->hinhanh }}">
        </div>
        <div class="document-content">
            <img class="mr-3 img-fluid rounded-circle m-3" width="64" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="News Image">
            
            <p><b>Người đăng: </b>{{ $documentByID->user->tentaikhoan }}</p>
            <p><b><i>{{ $documentByID->user->gioithieu }}</i></b></p>

            <p><b>Nội dung tài liệu: </b>{{ $documentByID->noidung }}</p>
            <p><b>Tài liệu tải về: 
                <a href="{{$documentByID->path }}" download>
            </b></p>
            <b>Ngày đăng: <i>{{ $documentByID->ngaydang }} </i></b>
        </div>
    </div>
    </div>
@endsection