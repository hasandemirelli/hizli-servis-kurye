@extends('back.layouts.master')
@section('title') Müşteriler | istekapında @endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row col-12">
                    <div class="mr-auto">
                        <h6 class="m-0 font-weight-bold text-primary">Müşteri tablosu</h6>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomerModal"><i class="fa fa-user-plus"></i> </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>İsim/Firma</th>
                            <th>TC/VKN</th>
                            <th>Adres</th>
                            <th>Telefon</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>İsim/Firma</th>
                            <th>TC/VKN</th>
                            <th>Adres</th>
                            <th>Telefon</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->username}}</td>
                            <td>{{$customer->identification}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->tel}}</td>
                            <td>{{$customer->created_at}}</td>
                            <td>{{$customer->updated_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

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