<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Print</title>
    <!-- Favicons -->
    <link href="{{asset('/back')}}/img/favicon.png" rel="icon">
    <link href="{{asset('/back')}}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <link href="{{asset('/Back')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/Back')}}/css/sb-admin-2.min.css" rel="stylesheet">
    @toastr_css
    <!-- Barcode scripts -->
    <script src="{{asset('/back')}}/js/JsBarcode.all.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-md-12 mt-5">
            <h1>
                <a href="/cms"><img src="{{asset('/back')}}/img/favicon.png" height="60" width="60"></a>
                istekapında | Hızlı Servis Gönderi Raporu
            </h1>
            <hr>
        </div>
    </div>
    <div class="container mt-3">
        <div class="col-12">
            <h5>Gönderi NO: <span class="font-weight-bold text-primary"># {{$post->code}}</span></h5>
        </div>
        <div class="col-12 row">
            <div class="col-md-6">
                <strong>Oluşturulma Tarihi: {{$post->created_at}}</strong>
            </div>
            <div class="col-md-6">
                <strong>Son işlem Tarihi: {{$post->updated_at}}</strong>
            </div>
        </div>
        <hr>
        <div class="col-12 row">
            <div class="col-md-6">
                <h5 class="font-weight-bolder">Gönderen:</h5>
                <p><strong>Kişi/Kurum: </strong>{{\App\Models\Customers::find($post->sender)->username}}</p>
                <p><strong>TC/VKN: </strong>{{\App\Models\Customers::find($post->sender)->identification}}</p>
                <p><strong>Adres:</strong><br>{{$post->posted_address}}</p>
                <p><strong>Telefon: </strong>{{\App\Models\Customers::find($post->sender)->tel}}</p>
            </div>
            <div class="d-md-none d-lg-none">
                <p>------------------------------------</p>
            </div>
            <div class="col-md-6">
                <h5 class="font-weight-bolder">Alıcı:</h5>
                <p><strong>Kişi/Kurum: </strong>{{\App\Models\Customers::find($post->receiver)->username}}</p>
                <p><strong>TC/VKN: </strong>{{\App\Models\Customers::find($post->receiver)->identification}}</p>
                <p><strong>Adres:</strong><br>{{$post->receiver_address}}</p>
                <p><strong>Telefon: </strong>{{\App\Models\Customers::find($post->receiver)->tel}}</p>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <h5 class="font-weight-bolder">Not:</h5>
            @if($post->note)
                <p>{{$post->note}}</p>
            @else
                <p>< herhangi bir gönderi notu bulunmamaktadır. ></p>
            @endif
        </div>
        <hr>
        <div class="col-12 row">
            <div class="col-md-6">
                <h5 class="font-weight-bolder">Ödeme:</h5>
                @if($post->payment==1)
                    <label>Gönderen Öder</label>
                @elseif($post->payment==2)
                    <label>Alıcı Öder</label>
                @else
                    <label>{{$post->payment}}</label>
                @endif
                <label class="font-weight-bold">Tutar: {{sprintf('%0.2f',$post->total)}} ₺</label>
            </div>
            <div class="col-md-6">
                <h5 class="font-weight-bolder">Kurye:</h5>
                <p>{{\App\Models\Users::find($post->user_id)->name}} {{\App\Models\Users::find($post->user_id)->lastname}}</p>
            </div>
        </div>
        <hr>
        @if($post->state>=3)
            <div class="col-12 row">
               <div class="col-md-6">
                   <h5 class="font-weight-bolder">Teslim ALan:</h5>
                   @if($post->delivered)
                       <label>{{$post->delivered}}</label>
                   @endif
               </div>
                <div class="col-md-6">
                    <h5 class="font-weight-bolder">İmza:</h5>
                    @if($post->signature)
                        <label>imzalanmıştır</label>
                    @endif
                </div>
            </div>
            <hr>
        @endif
        <div class="text-center">
            <svg id="barcode"></svg>
            <script>
                JsBarcode("#barcode", {{$post->code}});
            </script>
        </div>
    </div>
</div>
<button id="print" onclick="window.print();" style="display: none;"></button>

    <script>
        document.getElementById('print').click()
    </script>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('/back')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('/back')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/back')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('/back')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{asset('/back')}}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('/back')}}/js/demo/chart-area-demo.js"></script>
<script src="{{asset('/back')}}/js/demo/chart-pie-demo.js"></script>



@toastr_js
@toastr_render
</body>
</html>