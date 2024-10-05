@extends('layouts.frontend')

@section('frontend-content')
<!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                    <img src="{{ asset('frontend/img/kantorbapeda.jpg') }}" class="img-fluid w-100 h-100"
                        alt="Bappeda Kota Jambi">
                </div>
            </div>
            <div class="col-lg-7"
                style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url('{{ asset('frontend/img/jambi_background.png') }}');">
                <h5 class="section-about-title pe-3">Tentang Kami</h5>
                <h1 class="mb-4">Selamat Datang di <span class="text-primary">Bappeda Kota Jambi</span></h1>
                <p class="mb-4">Badan Perencanaan Pembangunan Daerah (Bappeda) Kota Jambi merupakan lembaga yang
                    bertanggung jawab dalam perencanaan pembangunan Kota Jambi secara terpadu. Kami berkomitmen
                    untuk
                    mendorong pertumbuhan ekonomi yang berkelanjutan, peningkatan kualitas hidup masyarakat, dan
                    pembangunan infrastruktur yang mendukung kesejahteraan warga Kota Jambi.</p>
                <p class="mb-4">Dengan visi dan misi yang berfokus pada kesejahteraan masyarakat, Bappeda Kota
                    Jambi
                    terus mengembangkan berbagai program dan kebijakan strategis untuk menciptakan kota yang
                    modern,
                    inklusif, dan berkelanjutan. Kami berperan sebagai motor penggerak dalam merencanakan
                    pembangunan
                    yang berorientasi pada masa depan.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Perencanaan Terpadu
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Infrastruktur
                            Berkelanjutan
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Peningkatan Kualitas
                            Hidup
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Ekonomi Inklusif</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Program Berbasis
                            Masyarakat
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Kerja Sama
                            Multisektor</p>
                    </div>
                </div>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Services Start -->
<div class="container-fluid bg-light service py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Pelayanan Kami</h5>
            <h1 class="mb-0">Program Kawasan Kumuh Geospasial</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-12">
                        <div
                            class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                            <div class="service-content text-end">
                                <h5 class="mb-4">Bangunan Hunian</h5>
                                <p class="mb-0">Program perbaikan dan peningkatan kualitas bangunan hunian di
                                    kawasan
                                    kumuh agar layak huni dan sehat.</p>
                            </div>
                            <div class="service-icon p-4">
                                <i class="fa fa-home fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div
                            class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                            <div class="service-content text-end">
                                <h5 class="mb-4">Jalan Lingkungan</h5>
                                <p class="mb-0">Pembangunan dan rehabilitasi jalan lingkungan untuk meningkatkan
                                    aksesibilitas di kawasan kumuh.</p>
                            </div>
                            <div class="service-icon p-4">
                                <i class="fa fa-road fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div
                            class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                            <div class="service-content text-end">
                                <h5 class="mb-4">Air Minum</h5>
                                <p class="mb-0">Penyediaan akses air bersih yang aman dan memadai bagi
                                    masyarakat di
                                    kawasan kumuh.</p>
                            </div>
                            <div class="service-icon p-4">
                                <i class="fa fa-tint fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div
                            class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                            <div class="service-content text-end">
                                <h5 class="mb-4">Drainase Lingkungan</h5>
                                <p class="mb-0">Pengelolaan dan peningkatan sistem drainase untuk mengurangi
                                    banjir dan
                                    genangan di kawasan kumuh.</p>
                            </div>
                            <div class="service-icon p-4">
                                <i class="fa fa-water fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-12">
                        <div
                            class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                            <div class="service-icon p-4">
                                <i class="fa fa-recycle fa-4x text-primary"></i>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-4">Persampahan</h5>
                                <p class="mb-0">Pengelolaan sampah yang berkelanjutan untuk menciptakan
                                    lingkungan yang
                                    bersih dan sehat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div
                            class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                            <div class="service-icon p-4">
                                <i class="fa fa-fire-extinguisher fa-4x text-primary"></i>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-4">Proteksi Kebakaran</h5>
                                <p class="mb-0">Upaya mitigasi risiko kebakaran di kawasan kumuh dengan
                                    fasilitas dan
                                    pelatihan tanggap darurat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div
                            class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                            <div class="service-icon p-4">
                                <i class="fa fa-water fa-4x text-primary"></i>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-4">Air Limbah</h5>
                                <p class="mb-0">Pengelolaan air limbah untuk menjaga kualitas air tanah dan
                                    mencegah
                                    pencemaran lingkungan.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div
                            class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                            <div class="service-icon p-4">
                                <i class="fa fa-balance-scale fa-4x text-primary"></i>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-4">Legalitas & Status Lahan</h5>
                                <p class="mb-0">Mendukung penyelesaian legalitas dan status lahan masyarakat
                                    untuk
                                    meningkatkan keamanan hunian.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="text-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

<!-- Artikel & Berita Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Bappeda Kota Jambi Berita</h5>
            <h1 class="mb-4">Artikel & Berita </h1>
            <p class="mb-0">Berita terkini dan artikel dari Bappeda Kota Jambi untuk meningkatkan pemahaman dan
                kesadaran publik mengenai program
                dan kebijakan yang diambil.
            </p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-img">
                        <div class="blog-img-inner">
                            <img class="img-fluid w-100 rounded-top" src="{{asset('../frontend/img/blog-1.jpg')}}"
                                alt="Image">
                            <div class="blog-icon">
                                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                        <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-calendar-alt text-primary me-2"></i>28 Sep 2024</small>
                            <a href="#" class="btn-hover flex-fill text-center text-white border-end py-2"><i
                                    class="fa fa-thumbs-up text-primary me-2"></i>1.7K</a>
                            <a href="#" class="btn-hover flex-fill text-center text-white py-2"><i
                                    class="fa fa-comments text-primary me-2"></i>1K</a>
                        </div>
                    </div>
                    <div class="blog-content border border-top-0 rounded-bottom p-4">
                        <p class="mb-3">Posted By: Bappeda Jambi</p>
                        <a href="#" class="h4">Pengembangan Infrastruktur Kota</a>
                        <p class="my-3">Dampak dari pembangunan infrastruktur yang berkelanjutan terhadap
                            kesejahteraan
                            masyarakat Kota Jambi.</p>
                        <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-img">
                        <div class="blog-img-inner">
                            <img class="img-fluid w-100 rounded-top" src="{{asset('../frontend/img/blog-2.jpg')}}"
                                alt="Image">
                            <div class="blog-icon">
                                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                        <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-calendar-alt text-primary me-2"></i>27 Sep 2024</small>
                            <a href="#" class="btn-hover flex-fill text-center text-white border-end py-2"><i
                                    class="fa fa-thumbs-up text-primary me-2"></i>1.5K</a>
                            <a href="#" class="btn-hover flex-fill text-center text-white py-2"><i
                                    class="fa fa-comments text-primary me-2"></i>800</a>
                        </div>
                    </div>
                    <div class="blog-content border border-top-0 rounded-bottom p-4">
                        <p class="mb-3">Posted By: Bappeda Jambi</p>
                        <a href="#" class="h4">Strategi Pengelolaan Lingkungan Hidup</a>
                        <p class="my-3">Inisiatif dan kebijakan yang diambil untuk melestarikan lingkungan hidup
                            di Kota
                            Jambi.</p>
                        <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="blog-img">
                        <div class="blog-img-inner">
                            <img class="img-fluid w-100 rounded-top" src="{{asset('../frontend/img/blog-3.jpg')}}"
                                alt="Image">
                            <div class="blog-icon">
                                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                        <div class="blog-info d-flex align-items-center border border-start-0 border-end-0">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-calendar-alt text-primary me-2"></i>26 Sep 2024</small>
                            <a href="#" class="btn-hover flex-fill text-center text-white border-end py-2"><i
                                    class="fa fa-thumbs-up text-primary me-2"></i>1.2K</a>
                            <a href="#" class="btn-hover flex-fill text-center text-white py-2"><i
                                    class="fa fa-comments text-primary me-2"></i>500</a>
                        </div>
                    </div>
                    <div class="blog-content border border-top-0 rounded-bottom p-4">
                        <p class="mb-3">Posted By: Bappeda Jambi</p>
                        <a href="#" class="h4">Kebijakan Pembangunan Ekonomi Lokal</a>
                        <p class="my-3">Pembangunan ekonomi yang berkelanjutan untuk meningkatkan kesejahteraan
                            masyarakat.</p>
                        <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Artikel & Berita End -->
@endsection