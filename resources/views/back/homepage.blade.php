@extends('back.layouts.master')
@section('title') Gönderi Takip Ekranı | istekapında @endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Anasayfa</h1>
            @if(Auth::user()->state<=2)
                <a href="/cms/yeni-gonderi-ekle" class="btn btn-warning"><i class="fas fa-plus fa-sm text-white-50"></i> Yeni Gönderi</a>
            @endif
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- incoming Posts Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="/cms/gelen-gonderiler">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Gelen Gönderi Talebi</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$incoming}} Adet</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-parachute-box fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- received  Post Card-->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="/cms/alinan-gonderiler">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Alınan Gönderi</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$received}} Adet</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-box-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- delivery  Post Card-->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="/cms/dagitimdaki-gonderiler">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Dağıtımdaki Gönderi</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$delivery}} Adet</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shipping-fast fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- delivery  Post Card-->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="/cms/teslim-edilen-gonderiler">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Teslim Edilen Gönderiler</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$delivered}} Adet</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-home fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Content Row -->
    </div>
@endsection