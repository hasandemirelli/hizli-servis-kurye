@extends('back.layouts.master')
@section('title') Gönderiler | istekapında @endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row col-12">
                    <div class="mr-auto">
                        <h6 class="m-0 font-weight-bold text-primary">Gönderi tablosu</h6>
                    </div>
                    <div class="text-right">
                        <a href="/cms/yeni-gonderi-ekle" type="button" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kod</th>
                            <th>Tip</th>
                            <th>Gönderen</th>
                            <th>Gönderen Adres</th>
                            <th>Alıcı</th>
                            <th>Alıcı Adres</th>
                            <th>Not</th>
                            <th>Ödeme</th>
                            <th>Tutar</th>
                            <th>Teslim Alan</th>
                            <th>Önemi</th>
                            <th>Kurye</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kod</th>
                            <th>Tip</th>
                            <th>Gönderen</th>
                            <th>Gönderen Adres</th>
                            <th>Alıcı</th>
                            <th>Alıcı Adres</th>
                            <th>Not</th>
                            <th>Ödeme</th>
                            <th>Tutar</th>
                            <th>Teslim Alan</th>
                            <th>Önemi</th>
                            <th>Kurye</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Güncelleme Tarihi</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->code}}</td>
                                <td>@if($post->type==1)Şehir içi kurye @elseif($post->type==2)Şehir dışı kurye @elseif($post->type==3)Alışveriş @endif</td>
                                <td>{{\App\Models\Customers::find($post->sender)->username}}</td>
                                <td>{{$post->posted_address}}</td>
                                <td>{{\App\Models\Customers::find($post->receiver)->username}}</td>
                                <td>{{$post->receiver_address}}</td>
                                <td>{{$post->note}}</td>
                                <td>{{$post->payment}}</td>
                                <td>{{$post->total}}</td>
                                <td>{{$post->delivered ?? ""}}</td>
                                <td>@if($post->importance==1)Acil @elseif($post->importance==2)Normal @elseif($post->importance==3)Belirli Saatte @endif</td>
                                <td>{{\App\Models\Users::find($post->user_id)->name}} {{\App\Models\Users::find($post->user_id)->lastname}}</td>
                                <td>@if($post->state==1)Oluşturuldu @elseif($post->state==2)Alındı @elseif($post->state==3)Dağıtımda @elseif($post->state==4)Teslim edildi @endif</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection