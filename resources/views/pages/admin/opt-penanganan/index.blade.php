@extends('layouts.admin')
<style>
    @media print {
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
            /* Pastikan ada border */
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        /* Sesuaikan ukuran font jika diperlukan */
        body {
            font-size: 12px;
        }

        /* Hapus elemen yang tidak diperlukan dalam print seperti tombol */
        .buttons-print,
        .no-print {
            display: none !important;
        }

        /* Atur tampilan responsive di print */
        .table-responsive {
            overflow: visible !important;
        }
    }

</style>
@section('admin-content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Operator MEMORANDUM PROGRAM DAN KEGIATAN PENANGANAN KUMUH KOTA JAMBI
                            TAHUN 2025 - 2029</h3>

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
                                    <th rowspan="2">NOMOR</th>
                                    <th rowspan="2">Input Kebutuhan /Indikasi /SumberPendaan</th>
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
                                    <th rowspan="2">Action</th>
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

                                @foreach ($penanganans as $penanganan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> </td>
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
                                    <td></td>

                                </tr>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{route('dashboard.penanganan.edit', $penanganan->id)}}"
                                            class="btn btn-primary">+</a></td>
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
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('dashboard.penanganan-permasalahan.edit', $penanganan->id) }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item text-danger"
                                                        onclick="confirmDeletePenanganan({{ $penanganan->id }})">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                    <form id="delete-form-penanganan{{ $penanganan->id }}"
                                                        action="{{ route('dashboard.penanganan-permasalahan.destroy', $penanganan->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>


                                </tr>
                                <tr>
                                    <td>{{ $loop->iteration }}
                                    </td>
                                    <td></td>
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
                                    <td></td>


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

@section('js-script')
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
    var table = $("#example3").DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        
    });

    table.buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

    // Menambahkan event agar print dan excel dijalankan bersama
    $('#example3_wrapper .buttons-print').on('click', function () {
        table.button('.buttons-excel').trigger();
    });
});
</script>
<script>
    function confirmDeletePenanganan(id) {
        // Panggil SweetAlert
        Swal.fire({
            title: 'Apakah kamu yakin ingin menghapus Penanganan ini ?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna menekan tombol 'Ya, hapus!'
                document.getElementById('delete-form-penanganan' + id).submit();
            }
        });
    }
</script>
@endsection
@endsection