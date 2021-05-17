<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>@yield('title','istekapında | hızlı servis')</title>
    <!-- Favicons -->
    <link href="{{asset('/back')}}/img/favicon.png" rel="icon">
    <link href="{{asset('/back')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="{{asset('/back')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/back')}}/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('/back')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    @toastr_css
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/cms">
            <div class="sidebar-brand-icon ">
                <img src="{{asset('/back')}}/img/favicon.png" width="40" height="40"/>
            </div>
            <div class="sidebar-brand-text mx-3">istekapında</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Homepage -->
        <li class="nav-item active">
            <a class="nav-link" href="/cms">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Anasayfa</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Gönderiler
        </div>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="/cms/gelen-gonderiler">
                <i class="fas fa-fw fa-parachute-box"></i>
                <span>Gelen Gönderi Talebi</span></a>
        </li>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="/cms/alinan-gonderiler">
                <i class="fas fa-fw fa-box-open"></i>
                <span>Alınan Gönderiler</span></a>
        </li>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="/cms/dagitimdaki-gonderiler">
                <i class="fas fa-fw fa-shipping-fast"></i>
                <span>Dağıtımdaki Gönderiler</span></a>
        </li>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="/cms/teslim-edilen-gonderiler">
                <i class="fas fa-fw fa-home"></i>
                <span>Teslim edilen Gönderiler</span></a>
        </li>
    @if(Auth::user()->state<=2)
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">Tablolar</div>

        <!-- Nav Item - Customers Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/cms/musteriler">
                <i class="fas fa-fw fa-user"></i>
                <span>Müşteriler</span>
            </a>
        </li>
        <!-- Nav Item - Posts Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/cms/gonderiler">
                <i class="fas fa-fw fa-box"></i>
                <span>Gönderiler</span>
            </a>
        </li>
        @if(Auth::user()->state==1)
        <!-- Nav Item - Users Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/cms/kullanicilar">
                <i class="fas fa-fw fa-user-circle"></i>
                <span>Kullanıcılar</span>
            </a>
        </li>
        <!-- Nav Item - Customers Tables -->
        <li class="nav-item">
            <a class="nav-link" href="/cms/slaylar">
                <i class="fas fa-fw fa-sliders-h"></i>
                <span>Slaytlar</span>
            </a>
        </li>
        @endif
    @endif
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li></li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}} {{Auth::user()->lastname}}</span>
                            <img class="img-profile rounded-circle" src="{{asset('/back')}}/img/users/{{Auth::user()->image}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->