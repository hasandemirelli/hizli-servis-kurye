@extends('back.layouts.master')
@section('title') Gönderi Takip Ekranı | istekapında @endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Yeni Gönderi</h1>
    </div>
    <div class="container-fluid">
        <form class="needs-validation" action="/cms/add-post" method="post" novalidate>
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationType">Türü</label>
                    <div class="form-group">
                        <select class="custom-select" name="type" required>
                            <option value="">{{old('type')??'Gönderi tipi'}}</option>
                            <option value="1">Şehir içi kurye</option>
                            <option value="2">Şehir dışı kurye</option>
                            <option value="3">Alışveriş</option>
                        </select>
                        <div class="invalid-feedback">Gönderi türü seçilmeli</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Gönderen</label>
                        <div class="input-group">
                            <select class="custom-select" name="sender" required>
                                <option value="">Gönderen kişi/firma</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->username}}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomerModal"><i class="fa fa-user-plus"></i> </button>
                            </div>
                        <div class="invalid-feedback">Gönderen kişi/firma seçilmeli</div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Alıcı</label>
                    <div class="input-group">
                        <select class="custom-select" name="receiver" required>
                            <option value="">Alıcı kişi/firma</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->username}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomerModal"><i class="fa fa-user-plus"></i> </button>
                        </div>
                        <div class="invalid-feedback">Alıcı kişi/firma seçilmeli</div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="validationcourier">Kurye</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <select class="custom-select" name="courier" required>
                            <option value="">Kurye</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}} {{$user->lastname}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Kurye'yi seçin.</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationImportance">Gönderi önemi</label>
                    <div class="form-group">
                        <select class="custom-select" name="importance" required>
                            <option value="">Önem Seviyesi</option>
                            <option value="1">Acil</option>
                            <option value="2">Normal</option>
                            <option value="3">Belirli Saatte</option>
                        </select>
                        <div class="invalid-feedback">Gönderi önem derecesini seçin.</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationPayment">Ödeme</label>
                    <div class="form-group">
                        <select class="custom-select" name="payment" required>
                            <option value="">Ödeme şekli</option>
                            <option value="1">Gönderen Öder</option>
                            <option value="2">Alıcı Öder</option>
                        </select>
                        <div class="invalid-feedback">Ödeme Şeklini seçin.</div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTotal">Tutar</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="validationCustom05" placeholder="Tutar" name="total" min="0" required>
                        <div class="input-group-append">
                            <span class="input-group-text">₺</span>
                        </div>
                        <div class="invalid-feedback">Gönderi tutarını giriniz.</div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Note</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="note"></textarea>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Kaydet</button>
            </div>
        </form>
    </div>
    <!-- End of Main Content -->

    <!-- add Customer Model -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Yeni Müşteri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" action="/cms/add-customer" method="post" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="customer-name" class="col-form-label">İsim:</label>
                            <input type="text" class="form-control" id="customer-name" placeholder="Müşteri yada firma ismi" name="username" required>
                            <div class="invalid-feedback">Müşteri ismini giriniz.</div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer-id" class="col-form-label">TC/VKN:</label>
                                    <input type="text" class="form-control" id="customer-id" placeholder="TC/VKN" name="identification" required minlength="11" maxlength="11">
                                    <div class="invalid-feedback">TC veya VKN bilgisini giriniz.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer-tel" class="col-form-label">Tel:</label>
                                    <input type="tel" class="form-control" id="customer-tel" placeholder="telefon" name="tel" required minlength="10" maxlength="13">
                                    <div class="invalid-feedback">telefon numarasını giriniz.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-form-label">Adres:</label>
                            <textarea class="form-control" id="address" rows="3" placeholder="Adres bilgisi" name="address" required></textarea>
                            <div class="invalid-feedback">Adres bilgisini giriniz.</div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- validation control -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection