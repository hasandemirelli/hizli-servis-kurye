@extends('front.layouts.master')
@section('title') istekapında | Hızlı Servis @endsection
@section('content')
    @include('front.widgets.slides-list')
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-title">
                <h2>HİZMETLERİMİZ</h2>
                <p>Paketlerinizi hijyen ve mesafe kurallarına uygun şekilde kapınızdan alıp, güvenli ve hızlı bir şekilde teslim ediyoruz.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-yellow">
                        <div class="icon">
                            <i class="bx bxs-truck"></i>
                        </div>
                        <h4><a href="">Şehir içi Kurye Hizmeti</a></h4>
                        <p>Kargonuzu adresinizden alıp şehir içindeki istediğiniz adrese dakikalar içinde götürüyoruz.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue">
                        <div class="icon">
                            <i class="bx bx-map-alt"></i>
                        </div>
                        <h4><a href="">Şehir dışı Kurye Hizmeti</a></h4>
                        <p>Kargonuzu adresinizden alıp en kısa sürede en kestirme yol ve köprüler kullanılarak İstanbul ve İzmir şehirlerinde ki istediğiniz adrese götürüyoruz.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box iconbox-teal">
                        <div class="icon">
                            <i class="bx bxs-cart-add"></i>
                        </div>
                        <h4><a href="">istekapında Alışveriş Hizmeti</a></h4>
                        <p>İhtiyacınız olan market, manav, kasap vb. ürünlerini istediğiniz yerden sizin için alışverişinizi özenle yapıp kapınıza getiriyoruz.</p>
                        <p>Alışverişlerinize teslimat ücreti dışında hiçbir komisyon yüzde gibi ek ücret ödemezsiniz.</p>
                        <p>Alınan tüm ürünlerde fatura talebinde bulunulur ve tarafınıza teslim edilir.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Query Section ======= -->
    <section id="query" class="cta">
        <div class="container">
            <div class="text-center">
                <h3>Kargo Sorgulama</h3>
                <p>Kargo ve siparişlerinizin durumunu size verilen takip kodunu kullanarak öğrenebilirsiniz..</p>
            </div>
            <div class="align-content-center">
            <form action="/query" method="post">
                @csrf
                <input type="text" name="code">
                <input type="submit" value="Sorgula">
            </form>
            </div>
        </div>
    </section>
    <!-- End Query Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="section-title">
                <h2>Hakkımızda</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{asset('/front')}}/img/about.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>Bursa'nın yeni kurye şirketi istekapında olarak kaliteli hizmet, hızlı servis, güvenli teslimat ve uygun fiyat anlayışımızla sizlerleyiz. </p>
                    <p>Şehir içi kurye hizmetimiz aynı gün Bursa-İstanbul ve Bursa-İzmir servislerimiz mevcuttur. Bunun yanı sıra sizler için istekapında alışveriş hizmetini de sunmaktayız.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <i class="bx bx-award"></i>
                            <h4>Misyon</h4>
                            <p>Hizmette kalite müşteriye saygıdır diyerek yollara çıktık ve sizler için çalışmaya devam ediyoruz.</p>
                        </div>
                        <div class="col-md-6">
                            <i class="bx bxs-bullseye"></i>
                            <h4>Vizyon</h4>
                            <p>%100 Müşteri memnuniyeti en öncelikli amacımız bunun yanı sıra Türkiye'nin tüm sokaklarında bir istekapında aracı görmek bizleri hedefimize ulaştırıcak en net tablo olacaktır.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>İLETİŞİM</h2>
                <p>Fiyat bilgisi ve gönderileriniz için bizimle iletişime geçiniz..</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <a href="mailto:info@xn--istekapnda-3ub.com"><i class="bx bx-envelope"></i></a>
                                <h3>Email</h3>
                                <a href="mailto:info@xn--istekapnda-3ub.com">info@xn--istekapnda-3ub.com</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <a href="tel:+905301419375"><i class="bx bx-phone-call"></i></a>
                                <h3>Bizi Arayın</h3>
                                <a href="tel:+905301419375">+90 530 141 93 75</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
@endsection