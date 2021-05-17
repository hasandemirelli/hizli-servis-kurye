@extends('back.layouts.master')
@section('title') Kullanıcılar | istekapında @endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row col-12">
                    <div class="mr-auto">
                        <h6 class="font-weight-bold text-primary">Kullanıcı tablosu</h6>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal"><i class="fa fa-user-plus"></i> </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Ad</th>
                            <th>Soyad</th>
                            <th>E-posta</th>
                            <th>Resim</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Ad</th>
                            <th>Soyad</th>
                            <th>E-posta</th>
                            <th>Resim</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->image}}</td>
                                <td>@if($user->state==1)Admin @elseif($user->state==2)Satış Sorumlusu @elseif($user->state==3)Kurye @endif</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
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
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Yeni Müşteri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" action="/cms/add-user" method="post" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer-id" class="col-form-label">Ad:</label>
                                    <input type="text" class="form-control" id="customer-id" placeholder="Ad" name="name" required>
                                    <div class="invalid-feedback">Ad bilgisini giriniz.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer-tel" class="col-form-label">Soyad:</label>
                                    <input type="text" class="form-control" id="customer-tel" placeholder="Soyad" name="lastname" required>
                                    <div class="invalid-feedback">Soyad bilgisini giriniz.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer-id" class="col-form-label">E-posta:</label>
                                    <input type="email" class="form-control" id="customer-id" placeholder="email" name="email" required>
                                    <div class="invalid-feedback">eposta bilgisini giriniz.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer-tel" class="col-form-label">Şifre:</label>
                                    <input type="password" class="form-control" id="customer-tel" placeholder="şifre" name="password" required>
                                    <div class="invalid-feedback">şifre giriniz.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Resim:</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                    <div class="invalid-feedback">resim yükleyin.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address" class="col-form-label">Görev:</label>
                                    <select class="form-control" id="state" name="state" required>
                                        <option value="">Görev...</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Satış Sorumlusu</option>
                                        <option value="3">Kurye</option>
                                    </select>
                                    <div class="invalid-feedback">Görev bilgisini seçiniz.</div>
                                </div>
                            </div>
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