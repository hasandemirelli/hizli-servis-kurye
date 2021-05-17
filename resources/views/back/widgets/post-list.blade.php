<div class="row">
    @foreach($posts as $post)
        <div class="col-lg-3 mb-4">
            <a class="" data-toggle="modal" data-target="#postModal{{$post->id}}">
                <div class="card @if($post->importance==1)bg-danger @elseif($post->importance==2)bg-success @elseif($post->importance==3) bg-warning @endif text-white shadow">
                    <div class="card-body">
                        <span>Gönderi NO: {{$post->code}}</span>
                        <span class="text-white-50 small">{{$post->created_at}}</span>
                    </div>
                </div>
            </a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="postModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="postModal{{$post->id}}Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="postModal{{$post->id}}Title">Gönderi Detayı <span class="font-weight-bold text-primary"># {{$post->code}}</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                        <div class="col-12">
                            <h5 class="font-weight-bolder">Not:</h5>
                            @if($post->note)
                                <p>{{$post->note}}</p>
                            @else
                                <p>< herhangi bir gönderi notu bulunmamaktadır. ></p>
                            @endif
                        </div>
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
                        @if($post->state>=3)
                            <form class="needs-validation" action="/cms/delivered" method="post" novalidate>
                                @csrf
                            <div class="col-12 row">
                                <div class="col-md-6">
                                    <h5 class="font-weight-bolder">Teslim ALan:</h5>
                                    @if($post->delivered)
                                        <label>{{$post->delivered}}</label>
                                    @else
                                        <input type="text" class="form-control" name="delivered" placeholder="teslim alanının adı soyadı">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h5 class="font-weight-bolder">İmza:</h5>
                                    <input class="form-control" type="checkbox" name="signature">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <a type="button" class="btn btn-outline-dark" title="Yazdır" href="/cms/print/{{$post->id}}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 2H5a1 1 0 0 0-1 1v2H3V3a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h-1V3a1 1 0 0 0-1-1zm3 4H2a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h1v1H2a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1z"/>
                                <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM5 8a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H5z"/>
                                <path d="M3 7.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                            </svg>
                        </a>
                        @if($post->state==1)
                            <a href="/cms/received/{{$post->id}}" type="button" class="btn btn-primary text-white">Gönderi Alındı</a>
                        @endif
                        @if($post->state==2)
                            <a href="/cms/delivery/{{$post->id}}" type="button" class="btn btn-primary text-white">Dağıtıma Çıktı</a>
                        @endif
                        @if($post->state==3)
                            <input type="hidden" name="id" value="{{$post->id}}">
                            <button type="submit" class="btn btn-primary text-white">Teslim Edildi</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>