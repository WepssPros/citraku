@extends('layouts.admin')

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                href="#KeLpermasalahanUtamaRT{{$kel->id}}"
                                                data-toggle="tab">Permasalahan Utama</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="#KeLtimelinepermasalahanUtamaRT{{$kel->id}}"
                                                data-toggle="tab">Timeline Permasalahan</a>
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
                                        <div class="tab-pane" id="KeLtimelinepermasalahanUtamaRT{{$kel->id}}">
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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                            <b>Nilai</b> <a class="float-right">{{$rt->nilai}}</a>
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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
                                                        <span class="time"><i class="far fa-clock"></i> 27 mins
                                                            ago</span>

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
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <!-- Map card -->
                <div class="card bg-gradient-primary">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Visitors
                        </h3>
                        <!-- card tools -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                <i class="far fa-calendar-alt"></i>
                            </button>
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

        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    <script>

    </script>

</section>

@endsection