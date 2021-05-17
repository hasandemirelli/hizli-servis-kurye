@extends('back.layouts.master')
@section('title') Gönderi Takip Ekranı | istekapında @endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Posts  Show-->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Alınan Gönderiler:</h1>
        </div>
        @include('back.widgets.post-list')
    </div>
@endsection