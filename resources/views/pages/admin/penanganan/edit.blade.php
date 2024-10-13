@extends('layouts.admin')

@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">OPERATOR MEMORANDUM PROGRAM DAN KEGIATAN PENANGANAN KUMUH Kawasan
                            {{$penanganan->kelurahan->nama}}
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
                                    <td>{{$penanganan->program->program}}</td>
                                    <td>{{$penanganan->kelurahan->nama}}</td>
                                    <td>{{$penanganan->kelurahan->rt->sum('jumlah_kk')}} KK</td>
                                    <td>{{$penanganan->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td>{{$penanganan->sat_program}}</td>
                                    <td>{{number_format($penanganan->keb_p_program_2025)}}</td>
                                    <td>{{number_format($penanganan->keb_p_program_2026)}}</td>
                                    <td>{{number_format($penanganan->keb_p_program_2027)}}</td>
                                    <td>{{number_format($penanganan->keb_p_program_2028)}}</td>
                                    <td>{{number_format($penanganan->keb_p_program_2029)}}</td>
                                    <td>{{number_format($penanganan->keb_p_total_program)}}</td>

                                    <td>Rp.{{number_format($penanganan->ind_b_program_2025)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_program_2026)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_program_2027)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_program_2028)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_program_2029)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_total_program)}}</td>

                                    <td>Rp.{{number_format($penanganan->sp_kota_program)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_provinsi_program)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_apbn_program)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_dak_program)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_swasta_program)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_masyarakat_program)}}</td>
                                    <td>{{$penanganan->opd_program}}</td>

                                </tr>
                                <tr>


                                    <td>{{$penanganan->kegiatan->kegiatan}}</td>
                                    <td>{{$penanganan->kelurahan->nama}}</td>
                                    <td>{{$penanganan->kelurahan->rt->sum('jumlah_kk')}} KK</td>
                                    <td>{{$penanganan->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td>{{$penanganan->sat_kegiatan}}</td>
                                    <td>{{number_format($penanganan->keb_p_kegiatan_2025)}}</td>
                                    <td>{{number_format($penanganan->keb_p_kegiatan_2026)}}</td>
                                    <td>{{number_format($penanganan->keb_p_kegiatan_2027)}}</td>
                                    <td>{{number_format($penanganan->keb_p_kegiatan_2028)}}</td>
                                    <td>{{number_format($penanganan->keb_p_kegiatan_2029)}}</td>
                                    <td>{{number_format($penanganan->keb_p_total_kegiatan)}}</td>

                                    <td>Rp.{{number_format($penanganan->ind_b_kegiatan_2025)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_kegiatan_2026)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_kegiatan_2027)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_kegiatan_2028)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_kegiatan_2029)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_total_kegiatan)}}</td>

                                    <td>Rp.{{number_format($penanganan->sp_kota_kegiatan)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_provinsi_kegiatan)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_apbn_kegiatan)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_dak_kegiatan)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_swasta_kegiatan)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_masyarakat_kegiatan)}}</td>
                                    <td>{{$penanganan->opd_kegiatan}}</td>



                                </tr>
                                <tr>


                                    <td>{{$penanganan->subkegiatan->sub_kegiatan}}</td>
                                    <td>{{$penanganan->kelurahan->nama}}</td>
                                    <td>{{$penanganan->kelurahan->rt->sum('jumlah_kk')}} KK</td>
                                    <td>{{$penanganan->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td>{{$penanganan->sat_sub_kegiatan}}</td>
                                    <td>{{number_format($penanganan->keb_p_sub_kegiatan_2025)}}</td>
                                    <td>{{number_format($penanganan->keb_p_sub_kegiatan_2026)}}</td>
                                    <td>{{number_format($penanganan->keb_p_sub_kegiatan_2027)}}</td>
                                    <td>{{number_format($penanganan->keb_p_sub_kegiatan_2028)}}</td>
                                    <td>{{number_format($penanganan->keb_p_sub_kegiatan_2029)}}</td>
                                    <td>{{number_format($penanganan->keb_p_total_sub_kegiatan)}}</td>

                                    <td>Rp.{{number_format($penanganan->ind_b_sub_kegiatan_2025)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_sub_kegiatan_2026)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_sub_kegiatan_2027)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_sub_kegiatan_2028)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_sub_kegiatan_2029)}}</td>
                                    <td>Rp.{{number_format($penanganan->ind_b_total_sub_kegiatan)}}</td>

                                    <td>Rp.{{number_format($penanganan->sp_kota_sub_kegiatan)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_provinsi_sub_kegiatan)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_apbn_sub_kegiatan)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_dak_sub_kegiatan)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_swasta_sub_kegiatan)}}</td>
                                    <td>Rp.{{number_format($penanganan->sp_masyarakat_sub_kegiatan)}}</td>
                                    <td>{{$penanganan->opd_sub_kegiatan}}</td>
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
                <h3 class="card-title">Perbarui Penanganan Kawasan {{$penanganan->kelurahan->nama}}</h3>
            </div>
            <div class="card-body p-0">
                <form id="yourFormId" action="{{ route('dashboard.penanganan.update', $penanganan->id) }}" method="POST"
                    enctype="multipart/form-data">
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
                                            <label for="keb_p_program_2025">Program</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_program_2025">Tahun 2025 *Program</label>
                                            <input type="text" name="keb_p_program_2025" id="keb_p_program_2025"
                                                value="{{$penanganan->keb_p_program_2025}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2025">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_program_2026">Tahun 2026 *Program</label>
                                            <input type="text" name="keb_p_program_2026" id="keb_p_program_2026"
                                                value="{{$penanganan->keb_p_program_2026}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2026">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_program_2027">Tahun 2027 *Program</label>
                                            <input type="text" name="keb_p_program_2027" id="keb_p_program_2027"
                                                value="{{$penanganan->keb_p_program_2027}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2027">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_program_2028">Tahun 2028 *Program</label>
                                            <input type="text" name="keb_p_program_2028" id="keb_p_program_2028"
                                                value="{{$penanganan->keb_p_program_2028}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2028">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_program_2029">Tahun 2029 *Program</label>
                                            <input type="text" name="keb_p_program_2029" id="keb_p_program_2029"
                                                value="{{$penanganan->keb_p_program_2029}}" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Program Tahun 2029">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="keb_p_kegiatan_2025">Kegiatan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_kegiatan_2025">Tahun 2025 *Kegiatan</label>
                                            <input type="text" name="keb_p_kegiatan_2025" id="keb_p_kegiatan_2025"
                                                class="form-control"
                                                placeholder="Kebutuhhan Penanganan Kegiatan Tahun 2025">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_kegiatan_2026">Tahun 2026 *Kegiatan </label>
                                            <input type="text" name="keb_p_kegiatan_2026" id="keb_p_kegiatan_2026"
                                                class="form-control"
                                                placeholder="Kebutuhhan Penanganan Kegiatan Tahun 2026">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_kegiatan_2027">Tahun 2027 *Kegiatan</label>
                                            <input type="text" name="keb_p_kegiatan_2027" id="keb_p_kegiatan_2027"
                                                class="form-control"
                                                placeholder="Kebutuhhan Penanganan Kegiatan Tahun 2027">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_kegiatan_2028">Tahun 2028 *Kegiatan</label>
                                            <input type="text" name="keb_p_kegiatan_2028" id="keb_p_kegiatan_2028"
                                                class="form-control"
                                                placeholder="Kebutuhhan Penanganan Kegiatan Tahun 2028">
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_kegiatan_2029">Tahun 2029 *Kegiatan</label>
                                            <input type="text" name="keb_p_kegiatan_2029" id="keb_p_kegiatan_2029"
                                                class="form-control"
                                                placeholder="Kebutuhhan Penanganan Kegiatan Tahun 2029">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="keb_p_sub_kegiatan_2025">Sub - Kegiatan</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_sub_kegiatan_2025">Tahun 2025 *Sub-Kegiatan</label>
                                            <input type="text" name="keb_p_sub_kegiatan_2025"
                                                id="keb_p_sub_kegiatan_2025" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Sub Kegiatan Tahun 2025" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_sub_kegiatan_2026">Tahun 2026 *Sub-Kegiatan</label>
                                            <input type="text" name="keb_p_sub_kegiatan_2026"
                                                id="keb_p_sub_kegiatan_2026" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Sub Kegiatan Tahun 2026" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_sub_kegiatan_2027">Tahun 2027 *Sub-Kegiatan</label>
                                            <input type="text" name="keb_p_sub_kegiatan_2027"
                                                id="keb_p_sub_kegiatan_2027" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Sub Kegiatan Tahun 2027" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_sub_kegiatan_2028">Tahun 2028 *Sub-Kegiatan</label>
                                            <input type="text" name="keb_p_sub_kegiatan_2028"
                                                id="keb_p_sub_kegiatan_2028" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Sub Kegiatan Tahun 2028" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="keb_p_sub_kegiatan_2029">Tahun 2029 *Sub-Kegiatan</label>
                                            <input type="text" name="keb_p_sub_kegiatan_2029"
                                                id="keb_p_sub_kegiatan_2029" class="form-control"
                                                placeholder="Kebutuhhan Penanganan Sub Kegiatan Tahun 2029" required>
                                        </div>
                                    </div>

                                </div>

                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                <!-- Tombol Save Lebih Dulu -->
                                <button type="button" class="btn btn-primary" id="saveButton">Save Lebih Dulu ?</button>


                            </div>

                            <!-- Step 2: Detail Konten -->
                            <div id="kegiatan-part" class="content" role="tabpanel"
                                aria-labelledby="kegiatan-part-trigger">

                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>

                            <!-- Step 3: Konfirmasi -->
                            <div id="subKegiatan-part" class="content" role="tabpanel"
                                aria-labelledby="subKegiatan-part-trigger">



                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                            </div>
                            <div id="kawasan-part" class="content" role="tabpanel"
                                aria-labelledby="kawasan-part-trigger">

                                <button type="button" class="btn btn-primary"
                                    onclick="stepper.previous()">Previous</button>
                                <button type="submit" class="btn btn-primary">Kirim Penanganan</button>
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
    $(function () {
        // Summernote
        $('#summernote').summernote({
            height: 400 // Atur tinggi summernote pertama
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