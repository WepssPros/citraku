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
                        <h3 class="card-title">Operator MEMORANDUM PROGRAM DAN KEGIATAN PEREALISASIAN KUMUH KOTA JAMBI
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
                                    <th rowspan="2">Input </th>
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
                                    <th>KAB/KOTA</th>
                                    <th>PROV.</th>
                                    <th>APBN</th>
                                    <th>DAK</th>
                                    <th>SWASTA / CSR</th>
                                    <th>MASYARAKAT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($perealisasians as $perealisasian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td></td>
                                    <td>{{$perealisasian->program->program}}</td>
                                    <td>{{$perealisasian->kelurahan->nama}}</td>
                                    <td>{{$perealisasian->kelurahan->jumlah_kk }} KK</td>
                                    <td>{{$perealisasian->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td></td>

                                    <td>
                                        {{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('keb_thn1');}))}}
                                    </td>
                                    <td>
                                        {{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('keb_thn2');}))}}
                                    </td>
                                    <td>
                                        {{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('keb_thn3');}))}}
                                    </td>
                                    <td>
                                        {{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('keb_thn4');}))}}
                                    </td>
                                    <td>
                                        {{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('keb_thn5');}))}}
                                    </td>
                                    <td>
                                        {{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('keb_total');}))}}
                                    </td>


                                    <td>
                                        Rp.{{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('indikasi_thn1');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('indikasi_thn2');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('indikasi_thn3');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('indikasi_thn4');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('indikasi_thn5');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('indikasi_total');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('spb_kota');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('spb_provinsi');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format ($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('spb_apbn');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format($perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('spb_dak');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format( $perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('spb_swasta');}))}}
                                    </td>
                                    <td>
                                        Rp.{{number_format( $perealisasian->R_KegiatanPenanganans->sum(function($kegiatan) {return $kegiatan->R_subKegiatanPenanganans->sum('spb_masyarakat');}))}}
                                    </td>
                                    <td>{{$perealisasian->opd_program}}</td>

                                </tr>

                                @foreach ($perealisasian->R_kegiatanPenanganans as $kegiatan)
                                <tr>
                                    <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.perealisasian.edit', $kegiatan->id) }}"
                                            class="btn btn-success">
                                            <i class="fas fa-plus fa-xs"></i>
                                        </a>
                                    </td>
                                    <td>{{$kegiatan->kegiatan->kegiatan}}</td>
                                    <td>{{$perealisasian->kelurahan->nama}}</td>
                                    <td>{{$perealisasian->kelurahan->jumlah_kk }} KK</td>
                                    <td>{{$perealisasian->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td></td>

                                    <td>{{number_format($kegiatan->R_subKegiatanPenanganans->sum('keb_thn1'))}}</td>
                                    <td>{{number_format($kegiatan->R_subKegiatanPenanganans->sum('keb_thn2'))}}</td>
                                    <td>{{number_format($kegiatan->R_subKegiatanPenanganans->sum('keb_thn3'))}}</td>
                                    <td>{{number_format($kegiatan->R_subKegiatanPenanganans->sum('keb_thn4'))}}</td>
                                    <td>{{number_format($kegiatan->R_subKegiatanPenanganans->sum('keb_thn5'))}}</td>
                                    <td>{{number_format($kegiatan->R_subKegiatanPenanganans->sum('keb_total'))}}</td>

                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('indikasi_thn1'))}}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('indikasi_thn2'))}}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('indikasi_thn3'))}}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('indikasi_thn4'))}}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('indikasi_thn5'))}}
                                    </td>

                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('indikasi_total'))}}
                                    </td>

                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('spb_kota'))}}</td>
                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('spb_provinsi'))}}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('spb_apbn'))}}</td>
                                    <td>Rp.{{ number_format( $kegiatan->R_subKegiatanPenanganans->sum('spb_dak'))}}</td>
                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('spb_swasta'))}}
                                    </td>
                                    <td>Rp.{{ number_format($kegiatan->R_subKegiatanPenanganans->sum('spb_masyarakat'))}}
                                    </td>


                                    <td>{{$kegiatan->opd_kegiatan}}</td>
                                    <td></td>
                                </tr>

                                @foreach ($kegiatan->R_subKegiatanPenanganans as $subKegiatan)
                                <tr>
                                    <td>{{ $loop->parent->parent->iteration }}.{{ $loop->parent->iteration }}.{{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-info">
                                            <i class="fas fa-edit fa-xs"></i>
                                        </a>
                                    </td>

                                    <td>{{$subKegiatan->subkegiatan->sub_kegiatan}}</td>
                                    <td>{{$perealisasian->kelurahan->nama}}</td>
                                    <td>{{$perealisasian->kelurahan->jumlah_kk }} KK</td>
                                    <td>{{$perealisasian->kelurahan->rt->sum('luas_ha')}}(Ha)</td>
                                    <td>{{$subKegiatan->sat_sub_kegiatan}}</td>
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
                                    <td>{{$subKegiatan->opd}}</td>

                                </tr>
                                @endforeach
                                @endforeach
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