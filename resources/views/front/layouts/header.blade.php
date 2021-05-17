<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title','istekapında | hızlı servis')</title>
    <meta name="description" content="Bursa'nın yeni kurye şirketi istekapında olarak kaliteli hizmet, hızlı servis, güvenli teslimat ve uygun fiyat anlayışımızla sizlerleyiz.">
    <meta name="keywords" content="Kurye, Bursa, Bursa kurye, iste kapında, Hızlı servis, Güvenli teslimat, Hızlı kurye, Hijeynik Teslimat, Uygun fiyat, Alışveriş, Şehir içi kurye, Şehir dışı kurye,">
    <meta name="author" content="Doğukan Yükselen">
    <meta name="csrf-token" content="{{ csrf_token()}}">

    <!-- Favicons -->
    <link href="{{asset('/front')}}/img/favicon.png" rel="icon">
    <link href="{{asset('/front')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('/front')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/front')}}/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="{{asset('/front')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('/front')}}/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{asset('/front')}}/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('/front')}}/css/style.css" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177871098-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-177871098-1');
    </script>

</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top @if(route('homepage')==url()->current())header-transparent @endif">
    <div class="container d-flex align-items-center">
        <a href="/" class="logo mr-3"><img src="{{asset('/front')}}/img/logo.png" alt="" class="img-fluid"></a>
        <h1 class="logo mr-auto"><a href="/">istekapında | Hızlı Servis</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <nav class="nav-menu d-none d-lg-block">
            <ul>
            @if(route('homepage')==url()->current())
                <li class="active"><a href="#intro">Anasayfa</a></li>
                <li><a href="#services">Hizmetlerimiz</a></li>
                <li><a href="#query">Kargo Sorgulama</a></li>
                <li><a href="#about">Hakkımızda</a></li>
                <li><a href="#contact">İletişim</a></li>
            @endif
            </ul>
        </nav>
        <!-- .nav-menu -->
    </div>
</header>
<!-- End Header -->