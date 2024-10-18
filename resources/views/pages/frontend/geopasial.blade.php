@extends('layouts.frontend')
@vite(['resources/css/citrakucostum.css', 'resources/js/citrakucostum.js'])
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{asset('../adminlte/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
<link rel="stylesheet" href="{{asset('../../adminlte/dist/css/adminlte.min.css')}}">


@section('navbar-geopasial')
@include('layouts.components.frontend.navbarlight')
@endsection



@section('frontend-content')

<div class="container-fluid" style="padding-top: 100px;">
    <!-- Tambahkan padding-top untuk mencegah overlap dengan navbar -->
    <div id="jambi-map" style="width: 100%; min-height: 750px; z-index: 9; position: relative; outline: none;"></div>
</div>

<!-- Modal -->


<!-- Modal untuk Kelurahan -->
@foreach ($kelurahans as $kel)
<div class="modal fade" id="kelurahanModal{{$kel->id}}" tabindex="-1" role="dialog"
    aria-labelledby="kelurahanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="kelurahanModalLabel">Informasi Kelurahan {{$kel->nama}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        <b>Jumlah KK Kumuh</b> <a class="float-right">{{$kel->jumlah_kk}} KK</a>
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
                                            href="#KeLpermasalahanUtamaRT{{$kel->id}}" data-toggle="tab">Permasalahan
                                            Utama</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link"
                                            href="#KeLtimelinepermasalahanUtamaRT{{$kel->id}}" data-toggle="tab">Sub
                                            Permasalahan</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#KeLlingkupAdministrasi{{$kel->id}}"
                                            data-toggle="tab">Lingkup
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
                                            <div class="row mb-3">

                                                <div class="col-sm-6">
                                                    <img class="img-fluid"
                                                        src="{{ asset('storage/' . $permasalahan->foto_1) }}"
                                                        alt="Photo">
                                                </div>



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

                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3"
                                                                src="{{ asset('storage/' . $permasalahan->foto_4) }}"
                                                                alt="Photo">
                                                            <img class="img-fluid"
                                                                src="{{ asset('storage/' . $permasalahan->foto_5) }}"
                                                                alt="Photo">
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


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
                                            <div class="row mb-3">

                                                <div class="col-sm-6">
                                                    <img class="img-fluid"
                                                        src="https://www.generationsforpeace.org/wp-content/uploads/2018/03/empty-300x240.jpg"
                                                        alt="Photo">
                                                </div>
                                            </div>
                                            <div id="permasalahanList">
                                                <div class="permasalahan-item">
                                                    Tidak ada Permasalahan
                                                </div>

                                            </div>
                                        </div>
                                        @endforelse

                                    </div>

                                    <div class="tab-pane" id="KeLtimelinepermasalahanUtamaRT{{$kel->id}}">
                                        <!-- The timeline -->
                                        @forelse ($kel->subpermasalahan as $sps)
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-danger">{{ $sps->formatted_created_at }}</span>
                                            </div>


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
                                                            <td>{{$kel->jumlah_kk}} KK</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>




                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                <h5 class="modal-title" id="rtModalLabel">Informasi Rukun Tetangga ({{$rt->nomor}})</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                            href="#timelinepermasalahanUtamaRT{{$rt->id}}" data-toggle="tab">Timeline
                                            Permasalahan</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#lingkupAdministrasi{{$rt->id}}"
                                            data-toggle="tab">Lingkup Administrasi</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#karekteristikPemukiman{{$rt->id}}"
                                            data-toggle="tab">
                                            Kategori, Tipologi & Karekteristik</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#karekteristikPemukiman{{$rt->id}}"
                                            data-toggle="tab">
                                            Penanganan Wilayah
                                        </a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#karekteristikPemukiman{{$rt->id}}"
                                            data-toggle="tab">
                                            Penganggaran Wilayah
                                        </a>
                                    </li>

                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="permasalahanUtamaRT{{$rt->id}}">
                                        <!-- Post -->
                                        @forelse ($rt->kelurahan->permasalahan as $permasalahan)
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
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid"
                                                        src="{{ asset('storage/' . $permasalahan->foto_1) }}"
                                                        alt="Photo">
                                                </div>
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
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3"
                                                                src="{{ asset('storage/' . $permasalahan->foto_4) }}"
                                                                alt="Photo">
                                                            <img class="img-fluid"
                                                                src="{{ asset('storage/' . $permasalahan->foto_5) }}"
                                                                alt="Photo">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid"
                                                        src="https://www.generationsforpeace.org/wp-content/uploads/2018/03/empty-300x240.jpg"
                                                        alt="Photo">
                                                </div>
                                            </div>
                                            <div id="permasalahanList">
                                                <div class="permasalahan-item">
                                                    Tidak ada Permasalahan
                                                </div>

                                            </div>
                                        </div>
                                        @endforelse

                                    </div>

                                    <div class="tab-pane" id="timelinepermasalahanUtamaRT{{$rt->id}}">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- The timeline -->
                                            @forelse ($rt->kelurahan->subpermasalahan as $sps)
                                            <div class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-danger">{{ $sps->formatted_created_at }}</span>
                                                </div>



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


                                                <div>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                            </div>
                                            @endforelse

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

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

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



                                            <div id="permasalahanList">
                                                <div class="permasalahan-item">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Kategori</th>
                                                                <th>Informasi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($rt->kelurahan->permasalahan as $permasalahanItem)
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
                                                                <td>{{$rt->kelurahan->rt->sum('jumlah_jiwa')}} Jiwa</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jumlah KK di Kawasan Kumuh</td>
                                                                <td>{{$rt->kelurahan->jumlah_kk}} KK</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>

                                    </div>




                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach


<script src="{{asset('../../adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('../../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../../adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-gesture-handling/dist/leaflet.gesture.handling.js"></script>
{{-- <script src="https://unpkg.com/leaflet-google/dist/leaflet-google.js"></script>  --}}
<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>



@endsection