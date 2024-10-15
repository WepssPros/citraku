@extends('layouts.admin')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">OPERATOR MEMORANDUM PROGRAM DAN KEGIATAN PENANGANAN KUMUH Kawasan
                            {{$perealisasian->kelurahan->nama}}
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
                                    <th colspan="5">Penanganan</th>
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
                                    <td>{{$perealisasian->program->program}}</td>
                                    <td>{{$perealisasian->kelurahan->nama}}</td>
                                    <td>{{$perealisasian->kelurahan->jumlah_kk}} KK</td>
                                    <td>{{$perealisasian->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td>{{$perealisasian->sat_program}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_program_2025)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_program_2026)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_program_2027)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_program_2028)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_program_2029)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_total_program)}}</td>

                                    <td>Rp.{{number_format($perealisasian->r_ind_b_program_2025)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_program_2026)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_program_2027)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_program_2028)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_program_2029)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_total_program)}}</td>

                                    <td>Rp.{{number_format($perealisasian->r_sp_kota_program)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_provinsi_program)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_apbn_program)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_dak_program)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_swasta_program)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_masyarakat_program)}}</td>
                                    <td>{{$perealisasian->r_opd_program}}</td>

                                </tr>
                                <tr>


                                    <td>{{$perealisasian->kegiatan->kegiatan}}</td>
                                    <td>{{$perealisasian->kelurahan->nama}}</td>
                                    <td>{{$perealisasian->kelurahan->jumlah_kk}} KK</td>
                                    <td>{{$perealisasian->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td>{{$perealisasian->sat_kegiatan}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_kegiatan_2025)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_kegiatan_2026)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_kegiatan_2027)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_kegiatan_2028)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_kegiatan_2029)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_total_kegiatan)}}</td>

                                    <td>Rp.{{number_format($perealisasian->r_ind_b_kegiatan_2025)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_kegiatan_2026)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_kegiatan_2027)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_kegiatan_2028)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_kegiatan_2029)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_total_kegiatan)}}</td>

                                    <td>Rp.{{number_format($perealisasian->r_sp_kota_kegiatan)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_provinsi_kegiatan)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_apbn_kegiatan)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_dak_kegiatan)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_swasta_kegiatan)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_masyarakat_kegiatan)}}</td>
                                    <td>{{$perealisasian->r_opd_kegiatan}}</td>



                                </tr>
                                <tr>


                                    <td>{{$perealisasian->subkegiatan->sub_kegiatan}}</td>
                                    <td>{{$perealisasian->kelurahan->nama}}</td>
                                    <td>{{$perealisasian->kelurahan->jumlah_kk}} KK</td>
                                    <td>{{$perealisasian->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td>{{$perealisasian->sat_sub_kegiatan}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_sub_kegiatan_2025)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_sub_kegiatan_2026)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_sub_kegiatan_2027)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_sub_kegiatan_2028)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_sub_kegiatan_2029)}}</td>
                                    <td>{{number_format($perealisasian->r_keb_p_total_sub_kegiatan)}}</td>

                                    <td>Rp.{{number_format($perealisasian->r_ind_b_sub_kegiatan_2025)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_sub_kegiatan_2026)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_sub_kegiatan_2027)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_sub_kegiatan_2028)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_sub_kegiatan_2029)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_ind_b_total_sub_kegiatan)}}</td>

                                    <td>Rp.{{number_format($perealisasian->r_sp_kota_sub_kegiatan)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_provinsi_sub_kegiatan)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_apbn_sub_kegiatan)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_dak_sub_kegiatan)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_swasta_sub_kegiatan)}}</td>
                                    <td>Rp.{{number_format($perealisasian->r_sp_masyarakat_sub_kegiatan)}}</td>
                                    <td>{{$perealisasian->r_opd_sub_kegiatan}}</td>
                                </tr>

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
                <h3 class="card-title">Perbarui Penanganan Kawasan {{$perealisasian->kelurahan->nama}}</h3>
            </div>
            <div class="card-body p-0">
                <form id="yourFormId" action="{{ route('dashboard.perealisasian.update', $perealisasian->id) }}"
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
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="r_keb_p_program_2025">Program</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_program_2025">Tahun 2025 *Program</label>
                                            <input type="text" name="r_keb_p_program_2025" id="r_keb_p_program_2025"
                                                value="{{$perealisasian->r_keb_p_program_2025}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2025">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_program_2026">Tahun 2026 *Program</label>
                                            <input type="text" name="r_keb_p_program_2026" id="r_keb_p_program_2026"
                                                value="{{$perealisasian->r_keb_p_program_2026}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2026">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_program_2027">Tahun 2027 *Program</label>
                                            <input type="text" name="r_keb_p_program_2027" id="r_keb_p_program_2027"
                                                value="{{$perealisasian->r_keb_p_program_2027}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2027">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_program_2028">Tahun 2028 *Program</label>
                                            <input type="text" name="r_keb_p_program_2028" id="r_keb_p_program_2028"
                                                value="{{$perealisasian->r_keb_p_program_2028}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2028">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_program_2029">Tahun 2029 *Program</label>
                                            <input type="text" name="r_keb_p_program_2029" id="r_keb_p_program_2029"
                                                value="{{$perealisasian->r_keb_p_program_2029}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2029">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="r_keb_p_kegiatan_2025">Kegiatan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_kegiatan_2025">Tahun 2025 *Kegiatan</label>
                                            <input type="text" name="r_keb_p_kegiatan_2025" id="r_keb_p_kegiatan_2025"
                                                value="{{$perealisasian->r_keb_p_kegiatan_2025}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Kegiatan Tahun 2025">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_kegiatan_2026">Tahun 2026 *Kegiatan </label>
                                            <input type="text" name="r_keb_p_kegiatan_2026" id="r_keb_p_kegiatan_2026"
                                                value="{{$perealisasian->r_keb_p_kegiatan_2026}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Kegiatan Tahun 2026">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_kegiatan_2027">Tahun 2027 *Kegiatan</label>
                                            <input type="text" name="r_keb_p_kegiatan_2027" id="r_keb_p_kegiatan_2027"
                                                value="{{$perealisasian->r_keb_p_kegiatan_2027}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Kegiatan Tahun 2027">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_kegiatan_2028">Tahun 2028 *Kegiatan</label>
                                            <input type="text" name="r_keb_p_kegiatan_2028" id="r_keb_p_kegiatan_2028"
                                                value="{{$perealisasian->r_keb_p_kegiatan_2028}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Kegiatan Tahun 2028">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_kegiatan_2029">Tahun 2029 *Kegiatan</label>
                                            <input type="text" name="r_keb_p_kegiatan_2029" id="r_keb_p_kegiatan_2029"
                                                value="{{$perealisasian->r_keb_p_kegiatan_2029}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Kegiatan Tahun 2029">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="r_keb_p_sub_kegiatan_2025">Sub - Kegiatan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_sub_kegiatan_2025">Tahun 2025 *Sub-Kegiatan</label>
                                            <input type="text" name="r_keb_p_sub_kegiatan_2025"
                                                value="{{$perealisasian->r_keb_p_sub_kegiatan_2025}}"
                                                id="r_keb_p_sub_kegiatan_2025" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Sub Kegiatan Tahun 2025" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_sub_kegiatan_2026">Tahun 2026 *Sub-Kegiatan</label>
                                            <input type="text" name="r_keb_p_sub_kegiatan_2026"
                                                value="{{$perealisasian->r_keb_p_sub_kegiatan_2026}}"
                                                id="r_keb_p_sub_kegiatan_2026" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Sub Kegiatan Tahun 2026" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_sub_kegiatan_2027">Tahun 2027 *Sub-Kegiatan</label>
                                            <input type="text" name="r_keb_p_sub_kegiatan_2027"
                                                value="{{$perealisasian->r_keb_p_sub_kegiatan_2027}}"
                                                id="r_keb_p_sub_kegiatan_2027" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Sub Kegiatan Tahun 2027" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_sub_kegiatan_2028">Tahun 2028 *Sub-Kegiatan</label>
                                            <input type="text" name="r_keb_p_sub_kegiatan_2028"
                                                value="{{$perealisasian->r_keb_p_sub_kegiatan_2028}}"
                                                id="r_keb_p_sub_kegiatan_2028" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Sub Kegiatan Tahun 2028" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_keb_p_sub_kegiatan_2029">Tahun 2029 *Sub-Kegiatan</label>
                                            <input type="text" name="r_keb_p_sub_kegiatan_2029"
                                                value="{{$perealisasian->r_keb_p_sub_kegiatan_2029}}"
                                                id="r_keb_p_sub_kegiatan_2029" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Sub Kegiatan Tahun 2029" required>
                                        </div>
                                    </div>

                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <!-- Tombol Save Lebih Dulu -->
                                <button type="button" class="btn btn-success" id="saveButton">Save Lebih Dulu ?</button>


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
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="r_ind_b_program_2025">Program</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_program_2025">Tahun 2025 *Program</label>
                                            <input type="text" name="r_ind_b_program_2025" id="r_ind_b_program_2025"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_program_2025, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya Program Tahun 2025"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_program_2026">Tahun 2026 *Program</label>
                                            <input type="text" name="r_ind_b_program_2026" id="r_ind_b_program_2026"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_program_2026, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya Program Tahun 2026"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_program_2027">Tahun 2027 *Program</label>
                                            <input type="text" name="r_ind_b_program_2027" id="r_ind_b_program_2027"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_program_2027, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya Program Tahun 2027"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_program_2028">Tahun 2028 *Program</label>
                                            <input type="text" name="r_ind_b_program_2028" id="r_ind_b_program_2028"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_program_2028, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya Program Tahun 2028"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_program_2029">Tahun 2029 *Program</label>
                                            <input type="text" name="r_ind_b_program_2029" id="r_ind_b_program_2029"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_program_2029, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya Program Tahun 2029"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="r_ind_b_program_2025">Kegiatan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_kegiatan_2025">Tahun 2025 *Kegiatan</label>
                                            <input type="text" name="r_ind_b_kegiatan_2025" id="r_ind_b_kegiatan_2025"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_kegiatan_2025, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya Program Tahun 2025"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_kegiatan_2026">Tahun 2026 *Kegiatan</label>
                                            <input type="text" name="r_ind_b_kegiatan_2026" id="r_ind_b_kegiatan_2026"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_kegiatan_2026, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya kegiatan Tahun 2026"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_kegiatan_2027">Tahun 2027 *Kegiatan</label>
                                            <input type="text" name="r_ind_b_kegiatan_2027" id="r_ind_b_kegiatan_2027"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_kegiatan_2027, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya kegiatan Tahun 2027"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_kegiatan_2028">Tahun 2028 *Kegiatan</label>
                                            <input type="text" name="r_ind_b_kegiatan_2028" id="r_ind_b_kegiatan_2028"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_kegiatan_2028, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya kegiatan Tahun 2028"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_kegiatan_2029">Tahun 2029 *Kegiatan</label>
                                            <input type="text" name="r_ind_b_kegiatan_2029" id="r_ind_b_kegiatan_2029"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_kegiatan_2029, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya kegiatan Tahun 2029"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="r_ind_b_program_2025">Kegiatan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_sub_kegiatan_2025">Tahun 2025 *Sub Kegiatan</label>
                                            <input type="text" name="r_ind_b_sub_kegiatan_2025"
                                                id="r_ind_b_sub_kegiatan_2025"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_sub_kegiatan_2025, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya Program Tahun 2025"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_sub_kegiatan_2026">Tahun 2026 *Sub Kegiatan</label>
                                            <input type="text" name="r_ind_b_sub_kegiatan_2026"
                                                id="r_ind_b_sub_kegiatan_2026"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_sub_kegiatan_2026, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Indikasi Biaya sub_kegiatan Tahun 2026"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_sub_kegiatan_2027">Tahun 2027 *Sub Kegiatan</label>
                                            <input type="text" name="r_ind_b_sub_kegiatan_2027"
                                                id="r_ind_b_sub_kegiatan_2027"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_sub_kegiatan_2027, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Indikasi Biaya sub_kegiatan Tahun 2027"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_sub_kegiatan_2028">Tahun 2028 *Sub Kegiatan</label>
                                            <input type="text" name="r_ind_b_sub_kegiatan_2028"
                                                id="r_ind_b_sub_kegiatan_2028"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_sub_kegiatan_2028, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Indikasi Biaya sub_kegiatan Tahun 2028"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_ind_b_sub_kegiatan_2029">Tahun 2029 *Sub Kegiatan</label>
                                            <input type="text" name="r_ind_b_sub_kegiatan_2029"
                                                id="r_ind_b_sub_kegiatan_2029"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_kegiatan_2029, 0, ',', '.') }}"
                                                class="form-control" placeholder="Indikasi Biaya kegiatan Tahun 2029"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>

                                </div>

                                <!-- Tombol Save Lebih Dulu -->
                                <button type="button" class="btn btn-danger"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <button type="button" class="btn btn-success" id="saveButtonnext">Save Lebih Dulu
                                    ?</button>
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
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="r_sp_kota_program">KAB / KOTA</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_kota_program">*Program</label>
                                            <input type="text" name="r_sp_kota_program" id="r_sp_kota_program"
                                                value="Rp {{ number_format($perealisasian->r_sp_kota_program, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Program Tahun 2025"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_kota_kegiatan">*Kegiatan</label>
                                            <input type="text" name="r_sp_kota_kegiatan" id="r_sp_kota_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_kota_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_kota_sub_kegiatan">*Sub Kegiatan</label>
                                            <input type="text" name="r_sp_kota_sub_kegiatan" id="r_sp_kota_sub_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_ind_b_program_2027, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Sub Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="r_sp_provinsi_program">PROVINSI</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_provinsi_program">*Program</label>
                                            <input type="text" name="r_sp_provinsi_program" id="r_sp_provinsi_program"
                                                value="Rp {{ number_format($perealisasian->r_sp_provinsi_program, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Program Tahun 2025"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_provinsi_kegiatan">*Kegiatan</label>
                                            <input type="text" name="r_sp_provinsi_kegiatan" id="r_sp_provinsi_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_provinsi_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_provinsi_sub_kegiatan">*Sub Kegiatan</label>
                                            <input type="text" name="r_sp_provinsi_sub_kegiatan"
                                                id="r_sp_provinsi_sub_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_provinsi_sub_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Sub Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="r_sp_apbn_program">APBN</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_apbn_program">*Program</label>
                                            <input type="text" name="r_sp_apbn_program" id="r_sp_apbn_program"
                                                value="Rp {{ number_format($perealisasian->r_sp_apbn_program, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Program Tahun 2025"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_apbn_kegiatan">*Kegiatan</label>
                                            <input type="text" name="r_sp_apbn_kegiatan" id="r_sp_apbn_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_apbn_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_apbn_sub_kegiatan">*Sub Kegiatan</label>
                                            <input type="text" name="r_sp_apbn_sub_kegiatan" id="r_sp_apbn_sub_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_apbn_sub_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Sub Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="r_sp_dak_program">DAK (Dana Alokasi Khusus)</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_dak_program">*Program</label>
                                            <input type="text" name="r_sp_dak_program" id="r_sp_dak_program"
                                                value="Rp {{ number_format($perealisasian->r_sp_dak_program, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Program Tahun 2025"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_dak_kegiatan">*Kegiatan</label>
                                            <input type="text" name="r_sp_dak_kegiatan" id="r_sp_dak_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_dak_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_dak_sub_kegiatan">*Sub Kegiatan</label>
                                            <input type="text" name="r_sp_dak_sub_kegiatan" id="r_sp_dak_sub_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_dak_sub_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Sub Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="r_sp_swasta_program">SWASTA / CAR</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_swasta_program">*Program</label>
                                            <input type="text" name="r_sp_swasta_program" id="r_sp_swasta_program"
                                                value="Rp {{ number_format($perealisasian->r_sp_swasta_program, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Program Tahun 2025"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_swasta_kegiatan">*Kegiatan</label>
                                            <input type="text" name="r_sp_swasta_kegiatan" id="r_sp_swasta_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_swasta_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_swasta_sub_kegiatan">*Sub Kegiatan</label>
                                            <input type="text" name="r_sp_swasta_sub_kegiatan"
                                                id="r_sp_swasta_sub_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_swasta_sub_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Sub Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="r_sp_masyarakat_program">MASYARAKAT</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_masyarakat_program">*Program</label>
                                            <input type="text" name="r_sp_masyarakat_program"
                                                id="r_sp_masyarakat_program"
                                                value="Rp {{ number_format($perealisasian->r_sp_masyarakat_program, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Program Tahun 2025"
                                                onkeyup="formatRupiah(this);" onfocus="this.select();">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_masyarakat_kegiatan">*Kegiatan</label>
                                            <input type="text" name="r_sp_masyarakat_kegiatan"
                                                id="r_sp_masyarakat_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_masyarakat_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                        <div class="form-group">
                                            <label for="r_sp_masyarakat_sub_kegiatan">*Sub Kegiatan</label>
                                            <input type="text" name="r_sp_masyarakat_sub_kegiatan"
                                                id="r_sp_masyarakat_sub_kegiatan"
                                                value="Rp {{ number_format($perealisasian->r_sp_masyarakat_sub_kegiatan, 0, ',', '.') }}"
                                                class="form-control"
                                                placeholder="Sumber Pendanaan / Pembiayaan Sub Kegiatan"
                                                onkeyup="formatRupiah(this);">
                                        </div>
                                    </div>
                                </div>


                                <button type="button" class="btn btn-danger"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <button type="button" class="btn btn-success" id="saveButtonnextstep">Save Lebih Dulu
                                    ?</button>
                            </div>
                            <div id="kawasan-part" class="content" role="tabpanel"
                                aria-labelledby="kawasan-part-trigger">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="r_opd_program">OPD PROGRAM</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_opd_program">OPD PENANGGUNG JAWAB</label>
                                            <input type="text" name="r_opd_program" id="r_opd_program"
                                                value="{{$perealisasian->r_opd_program}}" class="form-control"
                                                placeholder="OPD PENANGGUNG JAWAB " onfocus="this.select();">
                                        </div>

                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="r_opd_kegiatan">OPD KEGIATAN</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_opd_kegiatan">OPD PENANGGUNG JAWAB</label>
                                            <input type="text" name="r_opd_kegiatan" id="r_opd_kegiatan"
                                                value="{{$perealisasian->r_opd_kegiatan}}" class="form-control"
                                                placeholder="OPD PENANGGUNG JAWAB " onfocus="this.select();">
                                        </div>

                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="r_opd_sub_kegiatan">OPD SUB KEGIATAN</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_opd_sub_kegiatan">OPD PENANGGUNG JAWAB</label>
                                            <input type="text" name="r_opd_sub_kegiatan" id="r_opd_sub_kegiatan"
                                                value="{{$perealisasian->r_opd_sub_kegiatan}}" class="form-control"
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