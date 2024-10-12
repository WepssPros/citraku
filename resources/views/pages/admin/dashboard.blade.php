@extends('layouts.admin')
@vite(['resources/css/citrakucostum.css'])
@section('admin-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection
@section('admin-content')
<section class="content">
    {{-- --}}
    <!-- Modal -->
    @foreach ($kecamatans as $kec)
    <div class="modal fade" id="kecamatanModal{{$kec->id}}" tabindex="-1" role="dialog"
        aria-labelledby="kecamatanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="kelurahanModalLabel">Informasi Kecamatan {{$kec->nama}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="kecModelContent">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('../../adminlte/dist/img/logopemprovjambi.png')}}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">Kelurahan </h3>

                                    <p class="text-muted text-center">Kawasan Kecamatan</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Luas (HA)</b> <a class="float-right">1,322</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>RT</b> <a class="float-right">543</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Kelurahan</b> <a class="float-right">13,287</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Kecamatan</b> <a class="float-right">13,287</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nilai</b> <a class="float-right">13,287</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tingkat</b> <a class="float-right">Kumuh Ringan</a>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active"
                                                href="#KecLpermasalahanUtamaRT{{$kec->id}}"
                                                data-toggle="tab">Permasalahan Utama</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="#KectimelinepermasalahanUtamaRT{{$kec->id}}"
                                                data-toggle="tab">Timeline Permasalahan</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="#KeclingkupAdministrasi{{$kec->id}}" data-toggle="tab">Lingkup
                                                Administrasi</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="#KeckarekteristikPemukiman{{$kec->id}}" data-toggle="tab">
                                                Kategori, Tipologi & Karekteristik</a>
                                        </li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="KecLpermasalahanUtamaRT{{$kec->id}}">
                                            <!-- Post -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('../../adminlte/dist/img/user6-128x128.jpg')}}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Admin Bapeda</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>
                                                <!-- /.user-block -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid"
                                                            src="{{asset('../../adminlte/dist/img/photo1.png')}}"
                                                            alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <img class="img-fluid mb-3"
                                                                    src="{{asset('../../adminlte/dist/img/photo2.png')}}"
                                                                    alt="Photo">
                                                                <img class="img-fluid"
                                                                    src="{{asset('../../adminlte/dist/img/photo3.jpg')}}"
                                                                    alt="Photo">
                                                            </div>
                                                            <!-- /.col -->
                                                            <div class="col-sm-6">
                                                                <img class="img-fluid mb-3"
                                                                    src="{{asset('../..//adminlte/dist/img/photo4.jpg')}}"
                                                                    alt="Photo">
                                                                <img class="img-fluid"
                                                                    src="{{asset('../../adminlte/dist/img/photo1.png')}}"
                                                                    alt="Photo">
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <div id="permasalahanList">
                                                    <div class="permasalahan-item">
                                                        <p>
                                                            • Ketidak sesuaian dengan Persyaratan Teknis Bangunan serta
                                                            Ketidak
                                                            teraturan Bangunan;
                                                        </p>
                                                        <p>• Kualitas Permukaan Jalan lingkungan;

                                                        </p>
                                                        <p>• Ketersediaan Akses Aman Air Minum serta Tidak terpenuhinya
                                                            Kebutuhan Air
                                                            Minum
                                                        </p>
                                                        <p>• Kualitas Konstruksi Drainase Serta Ketidak tersediaan
                                                            Drainase;</p>
                                                        <p>• Sistem Pengelolaan Air Limbah Tidak Sesuai Standar Teknis
                                                            serta Prasarana
                                                            dan Sarana Pengelolaan Air Limbah Tidak Sesuai dengan
                                                            Persyaratan Teknis
                                                        </p>
                                                        <p>
                                                            • Sistem Pengelolaan Persampahanyang tidak sesuai
                                                            StandarTeknis
                                                            dan
                                                        </p>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="KectimelinepermasalahanUtamaRT{{$kec->id}}">
                                            <!-- The timeline -->
                                            <div class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-danger">
                                                        10 Feb. 2014
                                                    </span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">1.</a> Bangunan Hunian
                                                        </h3>

                                                        <div class="timeline-body">
                                                            Jumlah Bangunan 202 Unit
                                                            <br>
                                                            Bangunan tidakteratur 0 Unit
                                                            <br>
                                                            bangunan tidaksesuaipersyaratan
                                                            <br>
                                                            teknis 5 Unit
                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">2.</a> Jalan Lingkungan
                                                        </h3>

                                                        <div class="timeline-body">
                                                            Panjang jalaneksisting 6.086
                                                            meter
                                                            <br>
                                                            Panjang jalandenganpermukaan
                                                            rusak 2.898 meter
                                                            <br>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">3.</a> Air Minum
                                                        </h3>

                                                        <div class="timeline-body">
                                                            175 KK tidak terakses air minum
                                                            aman

                                                            <br>
                                                            31 KK tidak terpenuhi kebutuhan air
                                                            minum minima
                                                            <br>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">4.</a> Drainase
                                                            Lingkungan
                                                        </h3>

                                                        <div class="timeline-body">
                                                            5,73 Ha kawasantergenang
                                                            <br>
                                                            100 meterdrainaseeksisting
                                                            <br>
                                                            942 meterdrainaserusak

                                                        </div>

                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">5.</a> Persampahan
                                                        </h3>

                                                        <div class="timeline-body">
                                                            223 KK sapraspengolahansampah
                                                            tidaksesuaipersyaratanteknis
                                                            <br>
                                                            73 KK sistem pengolahan sampahtidak
                                                            sesuai standar teknis

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">6.</a> . Proteksi
                                                            Kebakaran
                                                        </h3>

                                                        <div class="timeline-body">
                                                            0 Unit bangunantidakterlayani
                                                            prasaranaproteksi kebakaran
                                                            <br>
                                                            0 Unit bangunantidakterlayanisarana
                                                            proteksikebakaran

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">7.</a> Air Limbah
                                                        </h3>

                                                        <div class="timeline-body">
                                                            4 KK akses air limbahtidaksesuaistandar
                                                            teknis
                                                            <br>
                                                            4 KK sistem saprasair limbahtidaksesuai
                                                            persyaratan teknis

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-success"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">8.</a> Legalitas dan
                                                            Status Lahan
                                                        </h3>

                                                        <div class="timeline-body">
                                                            0 Unit bangunanhunian memiliki IMB
                                                            <br>
                                                            202 unit bangunantidak memiliki IMB
                                                            <br>
                                                            13 Unit bangunantidak memiliki
                                                            SHM/HGB/Surat yang diakuipemerintah
                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-success"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">9.</a> Sosial Ekonomi
                                                        </h3>

                                                        <div class="timeline-body">
                                                            Jumlah Penduduk
                                                            dikawasan Kumuh 812
                                                            Jiwa
                                                            <br>
                                                            Jumlah KK dikawasan
                                                            Kumuh 223 KK
                                                            <br>
                                                            Lokasi "memiliki" Potensi
                                                            Sosial, ekonomi, buday
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-success">
                                                        3 Jan. 2014
                                                    </span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->

                                                <!-- END timeline item -->
                                                <div>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" tab-pane" id="KeclingkupAdministrasi{{$kec->id}}">
                                            <!-- Post -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('../../adminlte/dist/img/user6-128x128.jpg')}}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Admin Bapeda</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>


                                                <div id="permasalahanList">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Lokasi</th>
                                                                <th>Luas</th>
                                                                <th>Lingkup Administrasi</th>
                                                                <th>Kekumuhan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Lokasi 1</td>
                                                                <td>100 m²</td>
                                                                <td>
                                                                    <ul>
                                                                        <li>RT: 01</li>
                                                                        <li>Kelurahan: A</li>
                                                                        <li>Kecamatan: X</li>
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul>
                                                                        <li>Nilai: 75</li>
                                                                        <li>Tingkat: Sedang</li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Lokasi 2</td>
                                                                <td>150 m²</td>
                                                                <td>
                                                                    <ul>
                                                                        <li>RT: 02</li>
                                                                        <li>Kelurahan: B</li>
                                                                        <li>Kecamatan: Y</li>
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul>
                                                                        <li>Nilai: 85</li>
                                                                        <li>Tingkat: Tinggi</li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <div class=" tab-pane" id="KeckarekteristikPemukiman{{$kec->id}}">
                                            <!-- Post -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('../../adminlte/dist/img/user6-128x128.jpg')}}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Admin Bapeda</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>
                                                <!-- /.user-block -->

                                                <!-- /.row -->

                                                <div id="permasalahanList">
                                                    <div class="permasalahan-item">
                                                        <p>Kategori Kumuh : Kumuh Ringan
                                                            Tipologi Kumuh : Permukiman kumuh
                                                            dataran rendah
                                                            Karakteristik Permukiman :Kumuh pada Perkotaan
                                                            yang terletak pada
                                                            kawasan perekonomian
                                                            Jumlah Penduduk dikawasan Kumuh 812 Jiwa
                                                            Jumlah KK dikawasan Kumuh 223 KK</p>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <!-- /.tab-pane -->


                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal untuk Kelurahan -->
    @foreach ($kelurahans as $kel)
    <div class="modal fade" id="kelurahanModal{{$kel->id}}" tabindex="-1" role="dialog"
        aria-labelledby="kelurahanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="kelurahanModalLabel">Informasi Kelurahan {{$kel->nama}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="kelurahanModalContent">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('../../adminlte/dist/img/logopemprovjambi.png')}}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{$kel->nama}} </h3>

                                    <p class="text-muted text-center">{{$kel->kecamatan->nama}}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b> Kawasan Kumuh</b> <a class="float-right">
                                                <b> {{$kel->rt->sum(function ($rt) {
                                                // Mengganti koma dengan titik dan mengonversi ke float
                                                return (float) str_replace(',', '.', $rt->luas_ha);
                                            })}} (HA)</b>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Jumlah RT Kumuh</b> <a class="float-right">{{$kel->rt->count()}} RT</a>
                                        </li>

                                        <li class="list-group-item">
                                            <b>Kecamatan</b> <a class="float-right">{{$kel->kecamatan->nama}}</a>
                                        </li>


                                    </ul>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active"
                                                href="#KeLpermasalahanUtamaRT{{$kel->id}}"
                                                data-toggle="tab">Permasalahan Utama</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="#KeLtimelinepermasalahanUtamaRT{{$kel->id}}" data-toggle="tab">Sub
                                                Permasalahan</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="#KeLlingkupAdministrasi{{$kel->id}}" data-toggle="tab">Lingkup
                                                Administrasi</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="#KeLkarekteristikPemukiman{{$kel->id}}" data-toggle="tab">
                                                Kategori, Tipologi & Karekteristik</a>
                                        </li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="KeLpermasalahanUtamaRT{{$kel->id}}">
                                            <!-- Post -->

                                            @forelse ($kel->permasalahan as $permasalahan)
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('../../adminlte/dist/img/user6-128x128.jpg')}}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Admin Bapeda</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>
                                                <!-- /.user-block -->
                                                <div class="row mb-3">

                                                    <div class="col-sm-6">
                                                        <img class="img-fluid"
                                                            src="{{ asset('storage/' . $permasalahan->foto_1) }}"
                                                            alt="Photo">
                                                    </div>


                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <img class="img-fluid mb-3"
                                                                    src="{{ asset('storage/' . $permasalahan->foto_2) }}"
                                                                    alt="Photo">
                                                                <img class="img-fluid"
                                                                    src="{{ asset('storage/' . $permasalahan->foto_3) }}"
                                                                    alt="Photo">
                                                            </div>
                                                            <!-- /.col -->
                                                            <div class="col-sm-6">
                                                                <img class="img-fluid mb-3"
                                                                    src="{{ asset('storage/' . $permasalahan->foto_4) }}"
                                                                    alt="Photo">
                                                                <img class="img-fluid"
                                                                    src="{{ asset('storage/' . $permasalahan->foto_5) }}"
                                                                    alt="Photo">
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <div id="permasalahanList">
                                                    <div class="permasalahan-item">
                                                        {!! $permasalahan->permasalahan_utama !!}

                                                    </div>

                                                </div>
                                            </div>
                                            @empty
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('../../adminlte/dist/img/user6-128x128.jpg')}}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Admin Bapeda</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>
                                                <!-- /.user-block -->
                                                <div class="row mb-3">

                                                    <div class="col-sm-6">
                                                        <img class="img-fluid"
                                                            src="https://www.generationsforpeace.org/wp-content/uploads/2018/03/empty-300x240.jpg"
                                                            alt="Photo">
                                                    </div>


                                                    <!-- /.col -->

                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <div id="permasalahanList">
                                                    <div class="permasalahan-item">
                                                        Tidak ada Permasalahan
                                                    </div>

                                                </div>
                                            </div>
                                            @endforelse
                                            <!-- /.post -->
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="KeLtimelinepermasalahanUtamaRT{{$kel->id}}">
                                            <!-- The timeline -->
                                            @forelse ($kel->subpermasalahan as $sps)
                                            <div class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-danger">{{ $sps->formatted_created_at }}</span>
                                                </div>
                                                <!-- /.timeline-label -->

                                                <!-- Timeline Items -->
                                                <div>
                                                    <i class="fas fa-home bg-warning"></i>
                                                    <!-- Ganti icon untuk Bangunan Hunian -->
                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header bg-primary"><a href="#">1.</a>
                                                            {{$sps->header_no_1}}
                                                        </h3>
                                                        <div class="timeline-body">
                                                            {!! $sps->text_1 !!}

                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-road bg-warning"></i>
                                                    <!-- Ganti icon untuk Jalan Lingkungan -->
                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header bg-primary"><a href="#">2.</a>
                                                            {{$sps->header_no_2}}
                                                        </h3>
                                                        <div class="timeline-body">
                                                            {!! $sps->text_2 !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-tint bg-warning"></i>
                                                    <!-- Ganti icon untuk Air Minum -->
                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header bg-primary"><a href="#">3.</a>
                                                            {{$sps->header_no_3}}
                                                        </h3>
                                                        <div class="timeline-body">
                                                            {!! $sps->text_3 !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-water bg-warning"></i>
                                                    <!-- Ganti icon untuk Drainase Lingkungan -->
                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header bg-primary"><a href="#">4.</a>
                                                            {{$sps->header_no_4}}
                                                        </h3>
                                                        <div class="timeline-body">
                                                            {!! $sps->text_4 !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-trash bg-warning"></i>
                                                    <!-- Ganti icon untuk Persampahan -->
                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header bg-primary"><a href="#">5.</a>
                                                            {{$sps->header_no_5}}
                                                        </h3>
                                                        <div class="timeline-body">
                                                            {!! $sps->text_5 !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-fire bg-warning"></i>
                                                    <!-- Ganti icon untuk Proteksi Kebakaran -->
                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header bg-primary"><a href="#">6.</a>
                                                            {{$sps->header_no_6}}
                                                        </h3>
                                                        <div class="timeline-body">
                                                            {!! $sps->text_7 !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-recycle bg-warning"></i>
                                                    <!-- Ganti icon untuk Air Limbah -->
                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header bg-primary"><a href="#">7.</a>
                                                            {{$sps->header_no_7}}
                                                        </h3>
                                                        <div class="timeline-body">
                                                            {!! $sps->text_7 !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-file-alt bg-success"></i>
                                                    <!-- Ganti icon untuk Legalitas dan Status Lahan -->
                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header bg-success"><a href="#">8.</a>
                                                            {{$sps->header_no_8}}
                                                        </h3>
                                                        <div class="timeline-body">
                                                            {!! $sps->text_8 !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-users bg-success"></i>
                                                    <!-- Ganti icon untuk Sosial Ekonomi -->
                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header bg-success"><a href="#">9.</a>
                                                            {{$sps->header_no_9}}
                                                        </h3>
                                                        <div class="timeline-body">
                                                            {!! $sps->text_9 !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-clipboard-list bg-success"></i>
                                                    <!-- Ganti icon untuk Pertimbangan Lain -->
                                                    <div class="timeline-item">

                                                        <h3 class="timelne-header bg-success"><a href="#">10.</a>
                                                            {{$sps->header_no_10}}
                                                        </h3>
                                                        <div class="timeline-body">
                                                            {!! $sps->text_10 !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END timeline item -->

                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-success">{{ $sps->formatted_updated_at }}</span>
                                                </div>
                                                <!-- /.timeline-label -->

                                                <div>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-danger">Maaf Data Tidak Ada.</span>
                                                </div>
                                                <!-- /.timeline-label -->

                                                <!-- Timeline Items -->


                                                <div>
                                                    <i class="fas fa-clipboard-list bg-success"></i>
                                                    <!-- Ganti icon untuk Pertimbangan Lain -->
                                                    <div class="timeline-item">

                                                        <h3 class="timeline-header bg-success"><a href="#">10.</a>
                                                            Pertimbangan Lain</h3>
                                                        <div class="timeline-body">
                                                            Belum ada Timeline Permasalahan
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END timeline item -->

                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-success">Admin CS Akan Segera Memberikan informasi
                                                        Lebih Lanjut.</span>
                                                </div>
                                                <!-- /.timeline-label -->

                                                <div>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                            </div>
                                            @endforelse
                                        </div>
                                        <div class=" tab-pane" id="KeLlingkupAdministrasi{{$kel->id}}">
                                            <!-- Post -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('../../adminlte/dist/img/user6-128x128.jpg')}}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Admin Bapeda</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>


                                                <div id="permasalahanList">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Lokasi</th>
                                                                <th>Luas (HA)</th>
                                                                <th>Lingkup Administrasi</th>
                                                                <th>Kekumuhan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($kel->rt as $index => $rtkumuh)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $rtkumuh->nomor }}</td>
                                                                <td>{{ $rtkumuh->luas_ha }}</td>
                                                                <td>
                                                                    <ul>
                                                                        <li>Kelurahan: {{ $rtkumuh->kelurahan->nama }}
                                                                        </li>
                                                                        <li>Kecamatan: {{ $rtkumuh->kecamatan->nama }}
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul>
                                                                        <li>Nilai: {{ $rtkumuh->nilai }}</li>
                                                                        <li>
                                                                            Tingkat:
                                                                            <span class="badge 
                                                                                @if($rtkumuh->tingkat_status == 'KUMUH RINGAN') 
                                                                                    bg-warning 
                                                                                @elseif($rtkumuh->tingkat_status == 'KUMUH SEDANG') 
                                                                                    bg-success 
                                                                                @elseif($rtkumuh->tingkat_status == 'KUMUH TINGGI') 
                                                                                    bg-danger 
                                                                                @else 
                                                                                    bg-secondary 
                                                                                @endif">
                                                                                {{ $rtkumuh->tingkat_status }}
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="2"><strong>Total Luas Kawasan:</strong>
                                                                </td>
                                                                <td>
                                                                    <b>
                                                                        {{$kel->rt->sum(function ($rt) {
                                                                                          return (float) str_replace(',', '.', $rt->luas_ha);
                                                                                  })}}
                                                                        (HA)
                                                                    </b>
                                                                </td>
                                                                <!-- Menjumlahkan luas_ha -->
                                                                <td colspan="2"></td>
                                                                <!-- Mengisi kolom kosong jika diperlukan -->
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <div class=" tab-pane" id="KeLkarekteristikPemukiman{{$kel->id}}">
                                            <!-- Post -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('../../adminlte/dist/img/user6-128x128.jpg')}}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Admin Bapeda</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>
                                                <!-- /.user-block -->

                                                <!-- /.row -->

                                                <div id="permasalahanList">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Kategori</th>
                                                                <th>Informasi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($kel->permasalahan as $permasalahanItem)
                                                            <tr>
                                                                <td>Kategori Kumuh</td>
                                                                <td>
                                                                    <span class="badge 
                                                                    @if($rtkumuh->tingkat_status == 'KUMUH RINGAN') 
                                                                        bg-warning 
                                                                    @elseif($rtkumuh->tingkat_status == 'KUMUH SEDANG') 
                                                                        bg-success 
                                                                    @elseif($rtkumuh->tingkat_status == 'KUMUH TINGGI') 
                                                                        bg-danger 
                                                                    @else 
                                                                        bg-secondary 
                                                                    @endif">
                                                                        {{ $rtkumuh->tingkat_status }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tipologi Kumuh</td>
                                                                <td>Permukiman Kumuh
                                                                    {{$permasalahanItem->tipologi_kumuh}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Karakteristik Permukiman</td>
                                                                <td>{!!$permasalahanItem->karakteristik!!}</td>
                                                            </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td>Jumlah Penduduk di Kawasan Kumuh</td>
                                                                <td>{{$kel->rt->sum('jumlah_jiwa')}} Jiwa</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jumlah KK di Kawasan Kumuh</td>
                                                                <td>{{$kel->rt->sum('jumlah_kk')}} KK</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <!-- /.tab-pane -->


                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal untuk RT -->
    @foreach ($rts as $rt)
    <div class="modal fade" id="rtModal{{$rt->id}}" tabindex="-1" role="dialog" aria-labelledby="rtModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rtModalLabel">Detail {{$rt->nomor}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="rtModalContent{{$rt->id}}">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('../../adminlte/dist/img/logopemprovjambi.png')}}"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{$rt->nomor}} <span
                                            class="badge bg-warning float-end">{{$rt->tingkat_status}}</span></h3>

                                    <p class="text-muted text-center">Kawasan Kelurahan <br>{{$rt->kelurahan->nama}}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Luas (HA)</b> <a class="float-right">{{$rt->luas_ha}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Jumlah KK</b> <a class="float-right">{{$rt->jumlah_kk}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Kelurahan</b> <a class="float-right">{{$rt->kelurahan->nama}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Kecamatan</b> <a class="float-right">{{$rt->kecamatan->nama}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Nilai</b> <a class="float-right">{{$rt->nilai_kekumuhan}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Tingkat</b> <a class="float-right">{{$rt->tingkat}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>prioritas</b> <a class="float-right">{{$rt->prioritas}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <strong> Legalitas</strong>
                                                <span class="badge bg-success float-end">{{$rt->legalitas}}</span>
                                                {{-- <span class="badge bg-danger float-end">Kumuh Ringan</span>
                                                <span class="badge bg-info float-end">Kumuh Ringan</span>  --}}
                                            </div>
                                        </li>
                                    </ul>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active"
                                                href="#permasalahanUtamaRT{{$rt->id}}" data-toggle="tab">Permasalahan
                                                Utama</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="#timelinepermasalahanUtamaRT{{$rt->id}}"
                                                data-toggle="tab">Timeline Permasalahan</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#lingkupAdministrasi{{$rt->id}}"
                                                data-toggle="tab">Lingkup Administrasi</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="#karekteristikPemukiman{{$rt->id}}" data-toggle="tab">
                                                Kategori, Tipologi & Karekteristik</a>
                                        </li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="permasalahanUtamaRT{{$rt->id}}">
                                            <!-- Post -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('../../adminlte/dist/img/user6-128x128.jpg')}}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Admin Bapeda</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>
                                                <!-- /.user-block -->
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid"
                                                            src="{{asset('../../adminlte/dist/img/photo1.png')}}"
                                                            alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <img class="img-fluid mb-3"
                                                                    src="{{asset('../../adminlte/dist/img/photo2.png')}}"
                                                                    alt="Photo">
                                                                <img class="img-fluid"
                                                                    src="{{asset('../../adminlte/dist/img/photo3.jpg')}}"
                                                                    alt="Photo">
                                                            </div>
                                                            <!-- /.col -->
                                                            <div class="col-sm-6">
                                                                <img class="img-fluid mb-3"
                                                                    src="{{asset('../..//adminlte/dist/img/photo4.jpg')}}"
                                                                    alt="Photo">
                                                                <img class="img-fluid"
                                                                    src="{{asset('../../adminlte/dist/img/photo1.png')}}"
                                                                    alt="Photo">
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <div id="permasalahanList">
                                                    <div class="permasalahan-item">
                                                        <p>
                                                            • Ketidak sesuaian dengan Persyaratan Teknis Bangunan serta
                                                            Ketidak
                                                            teraturan Bangunan;
                                                        </p>
                                                        <p>• Kualitas Permukaan Jalan lingkungan;

                                                        </p>
                                                        <p>• Ketersediaan Akses Aman Air Minum serta Tidak terpenuhinya
                                                            Kebutuhan Air
                                                            Minum
                                                        </p>
                                                        <p>• Kualitas Konstruksi Drainase Serta Ketidak tersediaan
                                                            Drainase;</p>
                                                        <p>• Sistem Pengelolaan Air Limbah Tidak Sesuai Standar Teknis
                                                            serta Prasarana
                                                            dan Sarana Pengelolaan Air Limbah Tidak Sesuai dengan
                                                            Persyaratan Teknis
                                                        </p>
                                                        <p>
                                                            • Sistem Pengelolaan Persampahanyang tidak sesuai
                                                            StandarTeknis
                                                            dan
                                                        </p>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="timelinepermasalahanUtamaRT{{$rt->id}}">
                                            <!-- The timeline -->
                                            <div class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-danger">
                                                        10 Feb. 2014
                                                    </span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">1.</a> Bangunan Hunian
                                                        </h3>

                                                        <div class="timeline-body">
                                                            Jumlah Bangunan 202 Unit
                                                            <br>
                                                            Bangunan tidakteratur 0 Unit
                                                            <br>
                                                            bangunan tidaksesuaipersyaratan
                                                            <br>
                                                            teknis 5 Unit
                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">2.</a> Jalan Lingkungan
                                                        </h3>

                                                        <div class="timeline-body">
                                                            Panjang jalaneksisting 6.086
                                                            meter
                                                            <br>
                                                            Panjang jalandenganpermukaan
                                                            rusak 2.898 meter
                                                            <br>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">3.</a> Air Minum
                                                        </h3>

                                                        <div class="timeline-body">
                                                            175 KK tidak terakses air minum
                                                            aman

                                                            <br>
                                                            31 KK tidak terpenuhi kebutuhan air
                                                            minum minima
                                                            <br>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">4.</a> Drainase
                                                            Lingkungan
                                                        </h3>

                                                        <div class="timeline-body">
                                                            5,73 Ha kawasantergenang
                                                            <br>
                                                            100 meterdrainaseeksisting
                                                            <br>
                                                            942 meterdrainaserusak

                                                        </div>

                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">5.</a> Persampahan
                                                        </h3>

                                                        <div class="timeline-body">
                                                            223 KK sapraspengolahansampah
                                                            tidaksesuaipersyaratanteknis
                                                            <br>
                                                            73 KK sistem pengolahan sampahtidak
                                                            sesuai standar teknis

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">6.</a> . Proteksi
                                                            Kebakaran
                                                        </h3>

                                                        <div class="timeline-body">
                                                            0 Unit bangunantidakterlayani
                                                            prasaranaproteksi kebakaran
                                                            <br>
                                                            0 Unit bangunantidakterlayanisarana
                                                            proteksikebakaran

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-warning"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">7.</a> Air Limbah
                                                        </h3>

                                                        <div class="timeline-body">
                                                            4 KK akses air limbahtidaksesuaistandar
                                                            teknis
                                                            <br>
                                                            4 KK sistem saprasair limbahtidaksesuai
                                                            persyaratan teknis

                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-success"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">8.</a> Legalitas dan
                                                            Status Lahan
                                                        </h3>

                                                        <div class="timeline-body">
                                                            0 Unit bangunanhunian memiliki IMB
                                                            <br>
                                                            202 unit bangunantidak memiliki IMB
                                                            <br>
                                                            13 Unit bangunantidak memiliki
                                                            SHM/HGB/Surat yang diakuipemerintah
                                                        </div>

                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-info bg-success"></i>
                                                    <div class="timeline-item">


                                                        <h3 class="timeline-header"><a href="#">9.</a> Sosial Ekonomi
                                                        </h3>

                                                        <div class="timeline-body">
                                                            Jumlah Penduduk
                                                            dikawasan Kumuh 812
                                                            Jiwa
                                                            <br>
                                                            Jumlah KK dikawasan
                                                            Kumuh 223 KK
                                                            <br>
                                                            Lokasi "memiliki" Potensi
                                                            Sosial, ekonomi, buday
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- END timeline item -->
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-success">
                                                        3 Jan. 2014
                                                    </span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->

                                                <!-- END timeline item -->
                                                <div>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" tab-pane" id="lingkupAdministrasi{{$rt->id}}">
                                            <!-- Post -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('../../adminlte/dist/img/user6-128x128.jpg')}}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Admin Bapeda</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>


                                                <div id="permasalahanList">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama Lokasi</th>
                                                                <th>Luas</th>
                                                                <th>Lingkup Administrasi</th>
                                                                <th>Kekumuhan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{$rt->nomor}}</td>
                                                                <td>{{$rt->luas_ha}}</td>
                                                                <td>
                                                                    <ul>
                                                                        <li>RT: {{$rt->nomor}}</li>
                                                                        <li>Kelurahan: {{$rt->kelurahan->nama}}</li>
                                                                        <li>Kecamatan: {{$rt->kecamatan->nama}}</li>
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul>
                                                                        <li>Nilai: {{$rt->nilai_kekumuhan}}</li>
                                                                        <li>Tingkat: {{$rt->tingkat_status}}</li>
                                                                    </ul>
                                                                </td>
                                                            </tr>

                                                            <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <div class=" tab-pane" id="karekteristikPemukiman{{$rt->id}}">
                                            <!-- Post -->
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                        src="{{asset('../../adminlte/dist/img/user6-128x128.jpg')}}"
                                                        alt="User Image">
                                                    <span class="username">
                                                        <a href="#">Admin Bapeda</a>
                                                        <a href="#" class="float-right btn-tool"><i
                                                                class="fas fa-times"></i></a>
                                                    </span>
                                                    <span class="description">Posted 5 photos - 5 days ago</span>
                                                </div>
                                                <!-- /.user-block -->

                                                <!-- /.row -->

                                                <div id="permasalahanList">
                                                    <div class="permasalahan-item">
                                                        <p>
                                                            <b>Kategori Kumuh : Kumuh Ringan</b>
                                                            <br>
                                                            <b>Tipologi Kumuh : Permukiman kumuh dataran rendah</b>
                                                            <br>
                                                            <b>Karakteristik Permukiman :Kumuh pada Perkotaan
                                                                yang terletak pada
                                                                kawasan perekonomian
                                                            </b>
                                                            <br>
                                                            <b>Jumlah Penduduk dikawasan Kumuh 812 Jiwa</b>
                                                            <br>
                                                            <b>Jumlah KK dikawasan Kumuh 223 KK</b>
                                                        </p>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /.post -->
                                        </div>
                                        <!-- /.tab-pane -->


                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- Modal--}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-success" style="transition: 0.15s; height: inherit; width: inherit;">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="card-refresh"
                                data-source="widgets.html" data-source-selector="#card-refresh-content"
                                data-load-on-init="false">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card card-widget widget-user-2 shadow-sm">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-green">
                                <div class="widget-user-image">
                                    <img class="img elevation-2"
                                        src="{{asset('../adminlte/dist/img/logokotajambi.png')}}" alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">Anggaran Wilayah</h3>
                                <h5 class="widget-user-desc">Wilayah A</h5>
                            </div>
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Jumlah Anggaran (Total) <span
                                                class="float-right badge bg-primary">Rp.120.000.000.000</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Total Data Anggaran <span class="float-right badge bg-info">15 Data</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Wilayah Cakupan <span class="float-right badge bg-success">12 Wilayah</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Priode <span class="float-right badge bg-danger">2024 - 2029</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-success" style="transition: 0.15s; height: inherit; width: inherit;">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="card-refresh"
                                data-source="widgets.html" data-source-selector="#card-refresh-content"
                                data-load-on-init="false">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card card-widget widget-user-2 shadow-sm">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-green">
                                <div class="widget-user-image">
                                    <img class="img elevation-2"
                                        src="{{asset('../adminlte/dist/img/logokotajambi.png')}}" alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">Penanganan Wilayah</h3>
                                <h5 class="widget-user-desc">Wilayah A</h5>
                            </div>
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Data Penanganan <span class="float-right badge bg-primary">50 Data</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Total Jenis Penanganan <span class="float-right badge bg-info">10
                                                Data</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Cakupan Wilayah Penanganan <span class="float-right badge bg-success">12
                                                Wilayah</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Priode <span class="float-right badge bg-danger">2024 - 2029</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-success" style="transition: 0.15s; height: inherit; width: inherit;">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="card-refresh"
                                data-source="widgets.html" data-source-selector="#card-refresh-content"
                                data-load-on-init="false">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card card-widget widget-user-2 shadow-sm">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-green">
                                <div class="widget-user-image">
                                    <img class="img elevation-2"
                                        src="{{asset('../adminlte/dist/img/logokotajambi.png')}}" alt="User Avatar">
                                </div>
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">Realisasi Wilayah</h3>
                                <h5 class="widget-user-desc">Wilayah A</h5>
                            </div>
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Data Realisasi <span class="float-right badge bg-primary">100 Data</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Wilayah Ter-realisasi <span class="float-right badge bg-info">20
                                                Wilayah</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Wilayah Belum Ter - realisasi <span class="float-right badge bg-success">12
                                                Wilayah</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Priode <span class="float-right badge bg-danger">2024 - 2029</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>




        </div>

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <!-- Map card -->
                <div class="card bg-gradient-primary">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Map Administrasi Kota Jambi
                        </h3>
                        <!-- card tools -->
                        <div class="card-tools">

                            <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">

                        <div id="jambi-map" style="height: 650px; width: 100%;"></div>
                    </div>
                </div>

            </section>
        </div>


        <!-- /.row (main row) -->
    </div>


</section>
@vite(['resources/js/citrakudashboard.js'])
@endsection