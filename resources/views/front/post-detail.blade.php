@extends('front.layouts.master')
@section('title') Gönderi Durumu | istekapında @endsection
@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Gönderi Detay:</h2>
                <ol>
                    <li><a href="/">Anasayfa</a></li>
                    <li>Gönderi detay</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    <section class="Shipment-detail">
        <div class="container">
            <div class="px-1 px-md-4 py-5 mx-auto">
                <div class="card">
                    <div class="row d-flex justify-content-between px-3 top">
                        <div class="d-flex">
                            <h5>Gönderi no: <span class="text-primary font-weight-bold"># {{$post->code ??''}}</span></h5>
                        </div>
                        <div class="d-flex flex-column text-sm-right">
                            <p class="mb-0">Güncelleme Tarihi : <span class="font-weight-bolder">{{$post->updated_at}}</span></p>
                            <p class="mb-0">Gönderi Oluşturma Tarihi : <span class="font-weight-bolder">{{$post->created_at}}</span></p>
                        </div>
                    </div> <!-- Add class 'active' to progress -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <ul id="progressbar" class="text-center">
                                <li class="@if($post->state>=1)active @endif step0"><strong>Talep Oluşturuldu</strong></li>
                                <li class="@if($post->state>=2)active @endif step0"><strong>Alındı</strong></li>
                                <li class="@if($post->state>=3)active @endif step0"><strong>Dağıtımda</strong></li>
                                <li class="@if($post->state>=4)active @endif step0"><strong>Teslim edildi</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row col-12 justify-content-between top">
                        <div class="col-lg-6 col-sm-12">
                            <div class="d-flex flex-column">
                                <h5><strong>Gönderen:</strong></h5>
                                <p><strong>İsim/Ünvan:</strong> {{mb_substr(\App\Models\Customers::find($post->sender)->username,0,2, 'utf8').str_repeat('*',strlen(\App\Models\Customers::find($post->sender)->username)-5).mb_substr(\App\Models\Customers::find($post->sender)->username,strlen(\App\Models\Customers::find($post->sender)->username)-3,strlen(\App\Models\Customers::find($post->sender)->username), 'utf8')}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="d-flex flex-column">
                                <h5><strong>Alıcı:</strong></h5>
                                <p><strong>İsim/Ünvan:</strong> {{mb_substr(\App\Models\Customers::find($post->receiver)->username,0,2, 'utf8').str_repeat('*',strlen(\App\Models\Customers::find($post->receiver)->username)-5).mb_substr(\App\Models\Customers::find($post->receiver)->username,strlen(\App\Models\Customers::find($post->receiver)->username)-3,strlen(\App\Models\Customers::find($post->receiver)->username), 'utf8')}}</p>
                            </div>
                        </div>
                        <p>*Tüm hizmetlerimizde önceliğimiz sizin güvenliğiniz bu yüzden bu sayfada görüntülenen bilgiler son derce kısıtlıdır detaylı bilgi için bizimle iletişime geçebilirsiniz. @istekapında | Hızlı Servis</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection
