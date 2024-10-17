@extends('layouts.admin')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">OPERATOR MEMORANDUM PROGRAM DAN KEGIATAN PENANGANAN KUMUH Kawasan
                            {{$kegiatanPenanganan->penanganan->kelurahan->nama}}
                            TAHUN 2025 - 2029
                        </h3>

                    </div>
                    <style>
                        .table th {
                            background-color: #f8f9fa;
                            /* Warna latar belakang header */
                            text-align: center;
                            font-size: 13px;
                            /* Rata tengah */
                        }

                        .table td {
                            vertical-align: middle;
                            /* Rata tengah secara vertikal */
                            text-align: center;
                            font-size: 14px;
                            font-weight: 500;
                        }

                    </style>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped compact table-responsive"
                            border="1" style="">
                            <thead>
                                <tr>


                                    <th rowspan="2">PROGRAM/KEGIATAN/SUB KEGIATAN</th>
                                    <th rowspan="2">DETAIL LOKASI (Kec./Desa/Kel./Kws)</th>
                                    <th colspan="2">Estimasi Outcome</th>
                                    <th rowspan="2">SAT.</th>
                                    <th colspan="5">Kebutuhan Penanganan</th>
                                    <th rowspan="2">Total Volume</th>
                                    <th colspan="5">Indikasi Biaya</th>
                                    <th rowspan="2">Jumlah</th>
                                    <th colspan="6">Sumber Pendanaan / Pembiayaan</th>
                                    <th rowspan="2">OPD PENANGGUNG JAWAB</th>

                                </tr>
                                <tr>
                                    <th>Jml. Penduduk Terlayani</th>
                                    <th>Luas Wilayah Terlayani</th>
                                    <th>2025</th>
                                    <th>2026</th>
                                    <th>2027</th>
                                    <th>2028</th>
                                    <th>2029</th>
                                    <th>2025</th>
                                    <th>2026</th>
                                    <th>2027</th>
                                    <th>2028</th>
                                    <th>2029</th>
                                    <th>KAB / KOTA</th>
                                    <th>PROV.</th>
                                    <th>APBN</th>
                                    <th>DAK</th>
                                    <th>SWASTA / CSR</th>
                                    <th>MASYARAKAT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$kegiatanPenanganan->penanganan->program->program}}</td>
                                    <td>{{$kegiatanPenanganan->penanganan->kelurahan->nama}}</td>
                                    <td>{{$kegiatanPenanganan->penanganan->kelurahan->jumlah_kk}} KK</td>
                                    <td>{{$kegiatanPenanganan->penanganan->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td>{{$kegiatanPenanganan->penanganan->sat_program}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_thn1')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_thn2')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_thn3')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_thn4')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_thn5')) }}
                                    </td>

                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_total')) }}
                                    </td>

                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_kota')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_provinsi')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_apbn')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_dak')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_swasta')) }}
                                    </td>

                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_masyarakat')) }}
                                    </td>

                                    <td>{{$kegiatanPenanganan->penanganan->opd_program}}</td>

                                </tr>
                                <tr>
                                    <td>{{$kegiatanPenanganan->kegiatan->kegiatan}}</td>
                                    <td>{{$kegiatanPenanganan->penanganan->kelurahan->nama}}</td>
                                    <td>{{$kegiatanPenanganan->penanganan->kelurahan->jumlah_kk}} KK</td>
                                    <td>{{$kegiatanPenanganan->penanganan->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td>{{$kegiatanPenanganan->penanganan->sat_program}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_thn1')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_thn2')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_thn3')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_thn4')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_thn5')) }}
                                    </td>

                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('indikasi_total')) }}
                                    </td>

                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_kota')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_provinsi')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_apbn')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_dak')) }}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_swasta')) }}
                                    </td>

                                    <td>Rp.{{ number_format($kegiatanPenanganan->subKegiatanPenanganans->sum('spb_masyarakat')) }}
                                    </td>

                                    <td>{{$kegiatanPenanganan->opd_kegiatan}}</td>

                                </tr>
                                @foreach ($kegiatanPenanganan->subKegiatanPenanganans as $subKegiatan)
                                <tr>
                                    <td>{{$subKegiatan->subkegiatan->sub_kegiatan}}</td>
                                    <td>{{$kegiatanPenanganan->penanganan->kelurahan->nama}}</td>
                                    <td>{{$kegiatanPenanganan->penanganan->kelurahan->jumlah_kk}} KK</td>
                                    <td>{{$kegiatanPenanganan->penanganan->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td>{{$kegiatanPenanganan->penanganan->sat_program}}</td>
                                    <td>{{number_format($subKegiatan->keb_thn1)}}</td>
                                    <td>{{number_format($subKegiatan->keb_thn2)}}</td>
                                    <td>{{number_format($subKegiatan->keb_thn3)}}</td>
                                    <td>{{number_format($subKegiatan->keb_thn4)}}</td>
                                    <td>{{number_format($subKegiatan->keb_thn5)}}</td>
                                    <td>{{number_format($subKegiatan->keb_total)}}</td>

                                    <td>Rp.{{number_format($subKegiatan->indikasi_thn1)}}</td>
                                    <td>Rp.{{number_format($subKegiatan->indikasi_thn2)}}</td>
                                    <td>Rp.{{number_format($subKegiatan->indikasi_thn3)}}</td>
                                    <td>Rp.{{number_format($subKegiatan->indikasi_thn4)}}</td>
                                    <td>Rp.{{number_format($subKegiatan->indikasi_thn5)}}</td>
                                    <td>Rp.{{number_format($subKegiatan->indikasi_total)}}</td>

                                    <td>Rp.{{number_format($subKegiatan->spb_kota)}}</td>
                                    <td>Rp.{{number_format($subKegiatan->spb_provinsi)}}</td>
                                    <td>Rp.{{number_format($subKegiatan->spb_apbn)}}</td>
                                    <td>Rp.{{number_format($subKegiatan->spb_dak)}}</td>
                                    <td>Rp.{{number_format($subKegiatan->spb_swasta)}}</td>
                                    <td>Rp.{{number_format($subKegiatan->spb_masyarakat)}}</td>
                                    </td>
                                    <td>{{$subKegiatan->opd}}</td>

                                </tr>
                                @endforeach



                            </tbody>

                        </table>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Perbarui Penanganan Kawasan {{$kegiatanPenanganan->penanganan->kelurahan->nama}}
                </h3>
            </div>
            <div class="card-body p-0">
                <form id="yourFormId"
                    action="{{ route('dashboard.penanganan.update', $kegiatanPenanganan->penanganan->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#program-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="program-part"
                                    id="program-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Kebutuhan Penanganan </span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#kegiatan-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="kegiatan-part"
                                    id="kegiatan-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Indikasi Biaya</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#subKegiatan-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="subKegiatan-part"
                                    id="subKegiatan-part-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Sumber Pendanaan / Pembiayaan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#kawasan-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="kawasan-part"
                                    id="kawasan-part-trigger">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">OPD PENANGGUNG JAWAB</span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <!-- Step 1: Info Artikel -->
                            <div id="program-part" class="content" role="tabpanel"
                                aria-labelledby="program-part-trigger">
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                                    Data Boleh Di Kosongkan * Optional.
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="keb_p_program_2025">Program / Kegiatan / Sub Kegiatan Dan
                                                Unit</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="program_id">Program Terdata</label>
                                            <select name="program_id" id="program_id" readyonly
                                                class="form-control selectprogram">

                                                <option
                                                    value="{{ $kegiatanPenanganan->penanganan->program->program_id }}">
                                                    {{ $kegiatanPenanganan->penanganan->program->header }}/{{ $kegiatanPenanganan->penanganan->program->kode }}/{{ $kegiatanPenanganan->penanganan->program->program }}
                                                </option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kegiatan_id">Keghiatan Terdata</label>
                                            <select name="kegiatan_penanganan_id" id="kegiatan_penanganan_id" readyonly
                                                class="form-control selectprogram">

                                                <option value="{{ $kegiatanPenanganan->id }}">
                                                    {{ $kegiatanPenanganan->penanganan->program->header }}/{{ $kegiatanPenanganan->kegiatan->kode }}/{{ $kegiatanPenanganan->kegiatan->kegiatan }}
                                                </option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="sub_kegiatan_id">Pilih Sub Kegiatan </label>
                                            <select name="sub_kegiatan_id" id="sub_kegiatan_id" readyonly
                                                class="form-control selectprogram">
                                                @foreach ($subkegiatans as $subkegiatan)
                                                <option value="{{ $subkegiatan->id }}">
                                                    /{{$subkegiatan->kegiatan->kode}}/{{ $subkegiatan->kode }}/{{ $subkegiatan->sub_kegiatan }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="sat_sub_kegiatan">Pilih Satuan</label>
                                            <select name="sat_sub_kegiatan" id="sat_sub_kegiatan"
                                                class="form-control select3" required>
                                                <option value="">Pilih Satuan</option>
                                                <optgroup label="Pengukuran Unit">
                                                    <option value="Liter/Detik">Liter/Detik</option>
                                                    <option value="MÂ³/Hari">MÂ³/Hari</option>
                                                    <option value="Ton/hari">Ton/hari</option>
                                                    <option value="Orang">Orang</option>
                                                    <option value="Rumah Tangga">Rumah Tangga</option>
                                                    <option value="KM">KM</option>
                                                    <option value="M">M</option>
                                                </optgroup>

                                                <!-- Jenis Dokumen -->
                                                <optgroup label="Jenis Dokumen">
                                                    <option value="Dokumen">Dokumen</option>
                                                    <option value="Laporan">Laporan</option>
                                                    <option value="Publikasi">Publikasi</option>
                                                    <option value="Berita Acara">Berita Acara</option>
                                                    <option value="Peta">Peta</option>
                                                    <option value="Sistem informasi">Sistem informasi</option>
                                                    <option value="Rekomendasi">Rekomendasi</option>
                                                    <option value="Pengaduan">Pengaduan</option>
                                                </optgroup>

                                                <!-- Berdasarkan Geografi/Lokasi -->
                                                <optgroup label="Berdasarkan Geografi/Lokasi">
                                                    <option value="Kawasan">Kawasan</option>
                                                    <option value="Kawasan Genangan">Kawasan Genangan</option>
                                                    <option value="Kawasan Rawa">Kawasan Rawa</option>
                                                    <option value="Titik">Titik</option>
                                                    <option value="Bendungan">Bendungan</option>
                                                    <option value="Flyover">Flyover</option>
                                                    <option value="Jembatan">Jembatan</option>
                                                    <option value="Terowongan / Tunel">Terowongan / Tunel</option>
                                                    <option value="Underpass">Underpass</option>
                                                </optgroup>

                                                <!-- Kelembagaan/Organisasi -->
                                                <optgroup label="Kelembagaan/Organisasi">
                                                    <option value="Lembaga">Lembaga</option>
                                                    <option value="Badan Usaha">Badan Usaha</option>
                                                </optgroup>

                                                <!-- Kegiatan dan Dukungan -->
                                                <optgroup label="Kegiatan dan Dukungan">
                                                    <option value="Kegiatan">Kegiatan</option>
                                                    <option value="Bantuan Teknis">Bantuan Teknis</option>
                                                    <option value="Prangkat Pendukung">Prangkat Pendukung</option>
                                                    <option value="Layanan Informasi">Layanan Informasi</option>
                                                    <option value="Layanan">Layanan</option>
                                                    <option value="Unit">Unit</option>
                                                    <option value="Unit Rumah">Unit Rumah</option>
                                                </optgroup>

                                                <!-- Tipe Subjek -->
                                                <optgroup label="Tipe Subjek">
                                                    <option value="Orang">Orang</option>
                                                    <option value="Keluarga">Keluarga</option>
                                                    <option value="Rumah Tangga">Rumah Tangga</option>
                                                    <option value="Unit Rumah">Unit Rumah</option>
                                                    <option value="Entitas">Entitas</option>
                                                </optgroup>

                                                <!-- Data Numerik -->
                                                <optgroup label="Data Numerik">
                                                    <option value="Persentase">Persentase</option>
                                                    <option value="Ton">Ton</option>
                                                    <option value="Ha">Ha</option>
                                                    <option value="M2">M2</option>
                                                </optgroup>

                                                <!-- Terkait Proyek -->
                                                <optgroup label="Terkait Proyek">
                                                    <option value="Paket Pekerjaan">Paket Pekerjaan</option>
                                                    <option value="Bangunan Kontruksi">Bangunan Kontruksi</option>
                                                    <option value="Sistem Drainase Lingkungan">Sistem Drainase
                                                        Lingkungan
                                                    </option>
                                                    <option value="Sistem Drainase Perkotaan">Sistem Drainase Perkotaan
                                                    </option>
                                                </optgroup>

                                                <!-- Lainnya -->
                                                <optgroup label="Lainnya">
                                                    <option value="Kasus">Kasus</option>
                                                </optgroup>


                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="keb_thn1">Kebutuhan Penanganan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_thn1">Tahun 2025 </label>
                                            <input type="text" name="keb_thn1" id="keb_thn1" value=""
                                                class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2025">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_thn2">Tahun 2026 </label>
                                            <input type="text" name="keb_thn2" id="keb_thn2" value=""
                                                class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2026">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_thn3">Tahun 2027 </label>
                                            <input type="text" name="keb_thn3" id="keb_thn3" value=""
                                                class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2027">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_thn4">Tahun 2028 </label>
                                            <input type="text" name="keb_thn4" id="keb_thn4" value=""
                                                class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2028">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_thn5">Tahun 2029 </label>
                                            <input type="text" name="keb_thn5" id="keb_thn5" value=""
                                                class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2029">
                                        </div>
                                    </div>




                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <!-- Tombol Save Lebih Dulu -->
                                <a href="{{route('dashboard.penanganan.index')}}" type="button"
                                    class="btn btn-info">Kembali Ke Halaman Penanganan ?</a>


                            </div>

                            <!-- Step 2: Detail Konten -->
                            <div id="kegiatan-part" class="content" role="tabpanel"
                                aria-labelledby="kegiatan-part-trigger">
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                                    Indikasi Biaya Salah Satu Data Boleh Di Kosongkan * Optional. Sesuai Kebutuhan
                                </div>
                                <div class="row">



                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="indikasi_thn1">Kegiatan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="indikasi_thn1">Tahun 2025 *Sub Kegiatan</label>
                                            <input type="text" name="indikasi_thn1" id="indikasi_thn1" value="Rp "
                                                class="form-control" placeholder="Indikasi Biaya Program Tahun 2025"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="indikasi_thn2">Tahun 2026 *Sub Kegiatan</label>
                                            <input type="text" name="indikasi_thn2" id="indikasi_thn2" value="Rp "
                                                class="form-control"
                                                placeholder="Indikasi Biaya sub_kegiatan Tahun 2026"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="indikasi_thn3">Tahun 2027 *Sub Kegiatan</label>
                                            <input type="text" name="indikasi_thn3" id="indikasi_thn3" value="Rp "
                                                class="form-control"
                                                placeholder="Indikasi Biaya sub_kegiatan Tahun 2027"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="indikasi_thn4">Tahun 2028 *Sub Kegiatan</label>
                                            <input type="text" name="indikasi_thn4" id="indikasi_thn4" value="Rp "
                                                class="form-control"
                                                placeholder="Indikasi Biaya sub_kegiatan Tahun 2028"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="indikasi_thn5">Tahun 2029 *Sub Kegiatan</label>
                                            <input type="text" name="indikasi_thn5" id="indikasi_thn5" value="Rp "
                                                class="form-control" placeholder="Indikasi Biaya kegiatan Tahun 2029"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>

                                </div>

                                <!-- Tombol Save Lebih Dulu -->
                                <button type="button" class="btn btn-danger"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>

                            </div>

                            <!-- Step 3: Konfirmasi -->
                            <div id="subKegiatan-part" class="content" role="tabpanel"
                                aria-labelledby="subKegiatan-part-trigger">
                                <div class="alert alert-info alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                                    Sumber Pendanaan / Pembiayaan Memperbolehkan Salah Satu Data Boleh Di Kosongkan *
                                    Optional. Sesuai Kebutuhan
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="spb_kota">Sumber Pendanaan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="spb_kota">*Sumber Pendanaan / Kota</label>
                                            <input type="text" name="spb_kota" id="spb_kota" value="Rp "
                                                class="form-control" placeholder="Sumber Pendanaan / Kota"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="spb_provinsi">*Sumber Pendanaan / Provinsi</label>
                                            <input type="text" name="spb_provinsi" id="spb_provinsi" value="Rp "
                                                class="form-control" placeholder="Sumber Pendanaan / Provinsi"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="spb_apbn">*Sumber Pendanaan / Anggaran Pendapatan dan Belanja
                                                Negara.</label>
                                            <input type="text" name="spb_apbn" id="spb_apbn" value="Rp "
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Anggaran Pendapatan dan Belanja Negara. "
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="spb_dak">*Sumber Pendanaan / Dana Alokasi Khusus</label>
                                            <input type="text" name="spb_dak" id="spb_dak" value="Rp "
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Dana Alokasi Khusus"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="spb_swasta">*Sumber Pendanaan / SWASTA / CSA</label>
                                            <input type="text" name="spb_swasta" id="spb_swasta" value="Rp "
                                                class="form-control" placeholder="Sumber Pendanaan / SWASTA / CSA"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="spb_masyarakat">*Sumber Pendanaan / Masyarakat</label>
                                            <input type="text" name="spb_masyarakat" id="spb_masyarakat" value="Rp "
                                                class="form-control" placeholder="Sumber Pendanaan / Masyarakat"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>

                            </div>
                            <div id="kawasan-part" class="content" role="tabpanel"
                                aria-labelledby="kawasan-part-trigger">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="opd">OPD SUB KEGIATAN</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="header">OPD Header</label>
                                            <select name="header" id="header" class="form-control">
                                                <option value="PUPR">PUPR</option>
                                                <option value="PERKIM">PERKIM</option>
                                                <option value="LH">LH</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="opd">OPD PENANGGUNG JAWAB</label>
                                            <input type="text" name="opd" id="opd" value="" class="form-control"
                                                placeholder="OPD PENANGGUNG JAWAB " onfocus="this.select();">
                                        </div>
                                    </div>


                                </div>
                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-success" id="saveButtonnextlast">Selesai Pengisian
                                    Data
                                    ?</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>


@section('js-script')
<script>
    function formatRupiah(angka, prefix) {
    let number_string = angka.value.replace(/[^,\d]/g, '').toString();
    let split = number_string.split(',');
    let sisa = split[0].length % 3;
    let rupiah = split[0].substr(0, sisa);
    let ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    
    // Tambahkan ribuan
    if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    angka.value = prefix === undefined ? 'Rp ' + rupiah : rupiah;
}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('saveButton').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah form dari pengiriman langsung
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Ingin menyimpan sebelum melanjutkan?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, kirim form
                document.getElementById('yourFormId').submit(); // Ganti 'yourFormId' dengan ID form Anda
            }
        });
    });
</script>

<script>
    document.getElementById('saveButtonnext').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah form dari pengiriman langsung
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Ingin menyimpan sebelum melanjutkan?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, kirim form
                document.getElementById('yourFormId').submit(); // Ganti 'yourFormId' dengan ID form Anda
            }
        });
    });
</script>

<script>
    document.getElementById('saveButtonnextstep').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah form dari pengiriman langsung
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Ingin menyimpan sebelum melanjutkan?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, kirim form
                document.getElementById('yourFormId').submit(); // Ganti 'yourFormId' dengan ID form Anda
            }
        });
    });
</script>

<script>
    document.getElementById('saveButtonnextlast').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah form dari pengiriman langsung
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Telah Melakukan Pengisian Data Dengan Akurat ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, kirim form
                document.getElementById('yourFormId').submit(); // Ganti 'yourFormId' dengan ID form Anda
            }
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the stepper
        window.stepper = new Stepper(document.querySelector('.bs-stepper'));

        // Update the custom file input label
        document.querySelectorAll('.custom-file-input').forEach(function(input) {
            input.addEventListener('change', function(e) {
                var fileName = e.target.files[0] ? e.target.files[0].name : "Choose file";
                var nextSibling = e.target.nextElementSibling;
                nextSibling.innerText = fileName;
            });
        });
    });
</script>

<script>
    $(function () {
    // Initialize Select2 Elements
    $('.selectprogram').select2();
    $('.selectkegiatan').select2();
    $('.selectsubkegiatan').select2();
    $('.selectkelurahan').select2();
    $('.selectsat_program').select2();
    $('.selectsat_kegiatan').select2();
    $('.selectsat_sub_kegiatan').select2();

    // Handle change event for program selection
    $('#program_id').change(function() {
    var programId = $(this).val();
            if (programId) {
                $.ajax({
                    url: "{{ route('dashboard.getKegiatan', ':program_id') }}".replace(':program_id', programId),
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#kegiatan_id').empty();
                        $('#kegiatan_id').append('<option value="">Pilih Kegiatan Terdata</option>');
                        $.each(data, function(key, value) {
                            $('#kegiatan_id').append('<option value="' + value.id + '">' + value.kode + ' - ' + value.kegiatan + '</option>');
                        });
                    }
                });
            } else {
                $('#kegiatan_id').empty();
            }
        });


    // Handle change event for kegiatan selection
        $('#kegiatan_id').change(function() {
        var kegiatanId = $(this).val();
        if (kegiatanId) {
            $.ajax({
                url: "{{ route('dashboard.getSubKegiatan', ':kegiatan_id') }}".replace(':kegiatan_id', kegiatanId),
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#sub_kegiatan_id').empty();
                    $('#sub_kegiatan_id').append('<option value="">Pilih Sub Kegiatan Terdata</option>');
                    $.each(data, function(key, value) {
                        $('#sub_kegiatan_id').append('<option value="' + value.id + '">' + value.kode + ' - ' + value.sub_kegiatan + '</option>');
                    });
                }
            });
        } else {
            $('#sub_kegiatan_id').empty();
        }
    });

});

  // DropzoneJS Demo Code End
</script>
@endsection

@endsection