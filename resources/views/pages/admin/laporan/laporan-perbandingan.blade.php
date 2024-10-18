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
                        <h3 class="card-title">Database MEMORANDUM PROGRAM DAN KEGIATAN PENANGANAN KUMUH KOTA JAMBI
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
                                    <th rowspan="3">NOMOR</th>
                                    <th rowspan="3">PROGRAM/KEGIATAN/SUB KEGIATAN</th>
                                    <th rowspan="3">DETAIL LOKASI (Kec./Desa/Kel./Kws)</th>
                                    <th colspan="2">Estimasi Outcome</th>
                                    <th rowspan="3">SAT.</th>
                                    <th colspan="10">Perbandingan Kebutuhan Penanganan & Realisasi</th>
                                    <th colspan="1" rowspan="2">Perbandingan Volume</th>
                                    <th colspan="10">Perbandingan Indikasi Biaya Penangann & Realisasi</th>
                                    <th rowspan="2">Jumlah</th>
                                    <th colspan="12">Sumber Pendanaan / Pembiayaan</th>
                                    <th rowspan="1">OPD PENANGGUNG JAWAB</th>

                                </tr>
                                <tr>
                                    <th rowspan="2">Jml. Penduduk Terlayani</th>
                                    <th rowspan="2">Luas Wilayah Terlayani</th>
                                    <th colspan="2">2025</th>
                                    <th colspan="2">2026</th>
                                    <th colspan="2">2027</th>
                                    <th colspan="2">2028</th>
                                    <th colspan="2">2029</th>

                                    {{-- Biaya  --}}
                                    <th colspan="2">2025</th>
                                    <th colspan="2">2026</th>
                                    <th colspan="2">2027</th>
                                    <th colspan="2">2028</th>
                                    <th colspan="2">2029</th>

                                    <th colspan="2">KAB/KOTA</th>
                                    <th colspan="2">PROV.</th>
                                    <th colspan="2">APBN</th>
                                    <th colspan="2">DAK</th>
                                    <th colspan="2">SWASTA/CSR</th>
                                    <th colspan="2">MASYARAKAT</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>

                                    <th>Selisih</th>



                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>

                                    <th>Selisih Jumlah</th>

                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th>Penanganan</th>
                                    <th>Perealisasian</th>
                                    <th></th>

                                </tr>



                            </thead>
                            <tbody>

                                @foreach ($penanganans as $laporan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $laporan->program->program }}</td> <!-- Program ID dari penanganans -->
                                    <td>{{ $laporan->kelurahan->nama }}</td> <!-- Kelurahan ID dari penanganans -->
                                    <td> {{number_format($laporan->kelurahan->jumlah_kk)}}.KK</td>
                                    <td>{{$laporan->kelurahan->rt->sum('luas_ha')}} Ha</td>
                                    <!-- Luas wilayah terlayani dari RT -->
                                    <td></td>

                                    <td>Kebutuhan penanganan</td>
                                    <td>Kebutuhan Realsi</td>
                                    <td>Kebutuhan</td>
                                    <td>Kebutuhan</td>
                                    <td>Kebutuhan</td>
                                    <td>Kebutuhan</td>
                                    <td>Kebutuhan</td>
                                    <td>Kebutuhan</td>
                                    <td>Kebutuhan</td>
                                    <td>Kebutuhan</td>

                                    {{-- total kebutuhan  --}}
                                    <td>Selisih</td>


                                    {{-- Biaya  --}}
                                    <td>Biaya Penanganan</td>
                                    <td>Biaya Realaisasi</td>
                                    <td>Biaya Penanganan</td>
                                    <td>Biaya Realaisasi</td>
                                    <td>Biaya Penanganan</td>
                                    <td>Biaya Realaisasi</td>
                                    <td>Biaya Penanganan</td>
                                    <td>Biaya Realaisasi</td>
                                    <td>Biaya Penanganan</td>
                                    <td>Biaya Realaisasi</td>

                                    <td>Hasil Perbandingan</td>


                                    {{-- jumlahbiaya  --}}

                                    <td>Kota</td>
                                    <td>Kota</td>

                                    <td>prv</td>
                                    <td>prv</td>

                                    <td>APBN</td>
                                    <td>APBN</td>

                                    <td>DAK</td>
                                    <td>DAK</td>

                                    <td>SWASTA</td>
                                    <td>SWASTA</td>

                                    <td>MASYARAKAT</td>
                                    <td>MASYARAKAT</td>


                                    <td>opd</td>
                                </tr>

                                @foreach ($laporan->KegiatanPenanganans as $kegiatan)
                                <tr>
                                    <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                    <td>{{ $kegiatan->kegiatan->kegiatan }}</td> <!-- Program ID dari penanganans -->
                                    <td>{{ $laporan->kelurahan->nama }}</td> <!-- Kelurahan ID dari penanganans -->
                                    <td> {{number_format($laporan->kelurahan->jumlah_kk)}}.KK</td>

                                    <td>{{$laporan->kelurahan->rt->sum('luas_ha')}} Ha</td>
                                    <!-- Luas wilayah terlayani dari RT -->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    {{-- total kebutuhan  --}}
                                    <td></td>


                                    {{-- Biaya  --}}
                                    <td>Biaya Penanganan</td>
                                    <td>Biaya Realaisasi</td>
                                    <td>Biaya Penanganan</td>
                                    <td>Biaya Realaisasi</td>
                                    <td>Biaya Penanganan</td>
                                    <td>Biaya Realaisasi</td>
                                    <td>Biaya Penanganan</td>
                                    <td>Biaya Realaisasi</td>
                                    <td>Biaya Penanganan</td>
                                    <td>Biaya Realaisasi</td>

                                    <td>Hasil Perbandingan</td>


                                    {{-- jumlahbiaya  --}}

                                    <td>Kota</td>
                                    <td>Kota</td>

                                    <td>prv</td>
                                    <td>prv</td>

                                    <td>APBN</td>
                                    <td>APBN</td>

                                    <td>DAK</td>
                                    <td>DAK</td>

                                    <td>SWASTA</td>
                                    <td>SWASTA</td>

                                    <td>MASYARAKAT</td>
                                    <td>MASYARAKAT</td>


                                    <td>opd</td>
                                </tr>
                                @endforeach

                                @foreach ($kegiatan->SubKegiatanPenanganans as $subkegiatan)
                                <tr>
                                    <td>{{ $loop->parent->iteration }}.{{ $loop->parent->iteration }}.{{ $loop->iteration }}
                                    </td>
                                    <td>{{ $subkegiatan->subkegiatan->sub_kegiatan }}</td>
                                    <!-- Program ID dari penanganans -->
                                    <td>{{ $laporan->kelurahan->nama }}</td> <!-- Kelurahan ID dari penanganans -->
                                    <td> {{number_format($laporan->kelurahan->jumlah_kk)}}.KK</td>

                                    <td>{{$laporan->kelurahan->rt->sum('luas_ha')}} Ha</td>
                                    <!-- Luas wilayah terlayani dari RT -->

                                    @if ($subkegiatan->r_subKegiatanPenanganans->isNotEmpty())
                                    @foreach ($subkegiatan->r_subKegiatanPenanganans as $sub_realisasi)
                                    <td>{{$subkegiatan->sat_sub_kegiatan}}</td>
                                    <td>{{ $subkegiatan->keb_thn1 }}</td>
                                    <td>{{ $sub_realisasi->keb_thn1 }}</td>
                                    <td>{{ $subkegiatan->keb_thn2 }}</td>
                                    <td>{{ $sub_realisasi->keb_thn2 }}</td>
                                    <td>{{ $subkegiatan->keb_thn3 }}</td>
                                    <td>{{ $sub_realisasi->keb_thn3 }}</td>
                                    <td>{{ $subkegiatan->keb_thn4 }}</td>
                                    <td>{{ $sub_realisasi->keb_thn4 }}</td>
                                    <td>{{ $subkegiatan->keb_thn5 }}</td>
                                    <td>{{ $sub_realisasi->keb_thn5 }}</td>
                                    <td>{{$subkegiatan->keb_total - $sub_realisasi->keb_total}}</td>
                                    @endforeach
                                    @else
                                    <td>{{$subkegiatan->sat_sub_kegiatan}}</td>
                                    <td>{{ $subkegiatan->keb_thn1 }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->keb_thn2 }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->keb_thn3 }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->keb_thn4 }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->keb_thn5 }}</td>
                                    <td>0</td>
                                    <td>0</td>
                                    @endif

                                    {{-- total kebutuhan  --}}



                                    {{-- Biaya  --}}
                                    @if ($subkegiatan->r_subKegiatanPenanganans->isNotEmpty())
                                    @foreach ($subkegiatan->r_subKegiatanPenanganans as $sub_realisasi)
                                    <td>{{ $subkegiatan->indikasi_thn1 }}</td>
                                    <td>{{ $sub_realisasi->indikasi_thn1 }}</td>
                                    <td>{{ $subkegiatan->indikasi_thn2 }}</td>
                                    <td>{{ $sub_realisasi->indikasi_thn2 }}</td>
                                    <td>{{ $subkegiatan->indikasi_thn3 }}</td>
                                    <td>{{ $sub_realisasi->indikasi_thn3 }}</td>
                                    <td>{{ $subkegiatan->indikasi_thn4 }}</td>
                                    <td>{{ $sub_realisasi->indikasi_thn4 }}</td>
                                    <td>{{ $subkegiatan->indikasi_thn5 }}</td>
                                    <td>{{ $sub_realisasi->indikasi_thn5 }}</td>
                                    <td>{{$subkegiatan->indikasi_total - $sub_realisasi->indikasi_total}}</td>
                                    @endforeach
                                    @else
                                    <td>{{ $subkegiatan->indikasi_thn1 }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->indikasi_thn2 }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->indikasi_thn3 }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->indikasi_thn4 }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->indikasi_thn5 }}</td>
                                    <td>0</td>
                                    <td>0</td>
                                    @endif


                                    {{-- jumlahbiaya  --}}

                                    @if ($subkegiatan->r_subKegiatanPenanganans->isNotEmpty())
                                    @foreach ($subkegiatan->r_subKegiatanPenanganans as $sub_realisasi)
                                    <td>{{ $subkegiatan->spb_kota }}</td>
                                    <td>{{ $sub_realisasi->spb_kota }}</td>
                                    <td>{{ $subkegiatan->spb_provinsi }}</td>
                                    <td>{{ $sub_realisasi->spb_provinsi }}</td>
                                    <td>{{ $subkegiatan->spb_apbn }}</td>
                                    <td>{{ $sub_realisasi->spb_apbn }}</td>
                                    <td>{{ $subkegiatan->spb_dak }}</td>
                                    <td>{{ $sub_realisasi->spb_dak }}</td>
                                    <td>{{ $subkegiatan->spb_swasta }}</td>
                                    <td>{{ $sub_realisasi->spb_swasta }}</td>
                                    <td>{{ $subkegiatan->spb_masyarakat }}</td>
                                    <td>{{ $sub_realisasi->spb_masyarakat }}</td>

                                    @endforeach
                                    @else
                                    <td>{{ $subkegiatan->spb_kota }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->spb_provinsi }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->spb_apbn }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->spb_dak }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->spb_swasta }}</td>
                                    <td>0</td>
                                    <td>{{ $subkegiatan->spb_masyarakat }}</td>
                                    <td>0</td>

                                    @endif


                                    <td>{{$subkegiatan->opd}}</td>
                                </tr>
                                @endforeach


                                {{-- tr ini untuk mengambilk  --}}



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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {
    var table = $("#example3").DataTable({
        "responsive": false,
        "lengthChange": false,  
        "autoWidth": false,
         "footerCallback": function (row, data, start, end, display) {
            var api = this.api();

            function calculateTotal(columnIndex) {
                return api
                    .column(columnIndex, { search: 'applied' }) // Menghitung hanya untuk yang ditampilkan setelah pencarian
                    .data()
                    .reduce(function (a, b) {
                        return (parseFloat(a) || 0) + (parseFloat(b) || 0);
                    }, 0);
            }
            

            // Fungsi untuk memformat angka ke dalam format rupiah
            function formatRupiah(amount) {
                return 'Rp.' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") ;
            }

            var totalAnggaran2025 = calculateTotal(17);
            var totalAnggaran2026 = calculateTotal(18);
            var totalAnggaran2027 = calculateTotal(19);
            var totalAnggaran2028 = calculateTotal(20);
            var totalAnggaran2029 = calculateTotal(21);
            var totalAnggaran = calculateTotal(22);
            var totalAnggaranKota = calculateTotal(23);
            var totalAnggaranProv = calculateTotal(24);
            var totalAnggaranApbn = calculateTotal(25);
            var totalAnggarandak = calculateTotal(26);
            var totalAnggaranswasta = calculateTotal(27);
            var totalAnggaranmasyarakat = calculateTotal(28);

            // Hitung total keseluruhan dari semua total
            var totalKeseluruhan = totalAnggaran2025 + totalAnggaran2026 + totalAnggaran2027 +
                                totalAnggaran2028 + totalAnggaran2029 + totalAnggaran +
                                totalAnggaranKota + totalAnggaranProv + totalAnggaranApbn +
                                totalAnggarandak + totalAnggaranswasta + totalAnggaranmasyarakat;

           
            // Update footer dengan total yang dihitung dalam format rupiah
            $(api.column(17).footer()).html('<b>' + formatRupiah(totalAnggaran2025) + '</b>');
            $(api.column(18).footer()).html('<b>' + formatRupiah(totalAnggaran2026) + '</b>');
            $(api.column(19).footer()).html('<b>' + formatRupiah(totalAnggaran2027) + '</b>');
            $(api.column(20).footer()).html('<b>' + formatRupiah(totalAnggaran2028) + '</b>');
            $(api.column(21).footer()).html('<b>' + formatRupiah(totalAnggaran2029) + '</b>');
            $(api.column(22).footer()).html('<b>' + formatRupiah(totalAnggaran) + '</b>');
            $(api.column(23).footer()).html('<b>' + formatRupiah(totalAnggaranKota) + '</b>');
            $(api.column(24).footer()).html('<b>' + formatRupiah(totalAnggaranProv) + '</b>');
            $(api.column(25).footer()).html('<b>' + formatRupiah(totalAnggaranApbn) + '</b>');
            $(api.column(26).footer()).html('<b>' + formatRupiah(totalAnggarandak) + '</b>');
            $(api.column(27).footer()).html('<b>' + formatRupiah(totalAnggaranswasta) + '</b>');
            $(api.column(28).footer()).html('<b>' + formatRupiah(totalAnggaranmasyarakat) + '</b>');

            // Tambahkan footer untuk total keseluruhan dalam format rupiah
            var totalKeseluruhanIndex = 11; // Misalnya, kolom 24 untuk total keseluruhan
            $(api.column(totalKeseluruhanIndex).footer()).html('<b>JUMLAH TOTAL ANGGARAN :</b> <b>' + formatRupiah(totalKeseluruhan) + '</b>');
            // Format nilai di kolom 12 hingga 23 menjadi rupiah
            
        },

        "createdRow": function (row, data, dataIndex) {
            for (var i = 17; i <= 39; i++) {
                var cellValue = parseFloat(data[i]) || 0;
                $('td:eq(' + i + ')', row).html(formatRupiah(cellValue));
            }
        },
        "columnDefs": [
            {
                "targets": [0,1,2], 
                "searchable": true
            },
            {
                "targets": [ 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39],
                "searchable": false 
            }
        ],
        "buttons": [
            {
                extend: 'print',
                text: 'Print',
                title: 'Laporan Kegiatan',
                customize: function (win) {
                    $(win.document.body).find('table').addClass('compact').css({
                        'border-collapse': 'collapse',
                        'width': '100%',
                        'font-size': '10pt',
                    });

                    $(win.document.body).find('table, th, td').css({
                        'border': '1px solid black',
                        'padding': '5px',
                        'text-align': 'center'
                    });

                    // Hapus thead yang ada dan tambahkan thead yang baru
                    $(win.document.body).find('table thead').remove();
                    var theadContent = `
                        <thead>
                            <tr>
                                <th rowspan="2">NOMOR</th>
                                <th rowspan="2">PROGRAM / KEGIATAN / SUB KEGIATAN</th>
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
                    `;
                    $(win.document.body).find('table').prepend(theadContent);

                    // Tambahkan orientasi landscape untuk print
                    var landscapeCSS = '@page { size: landscape; margin: 20mm !important;}';
                    var style = document.createElement('style');
                    style.type = 'text/css';
                    style.media = 'print';
                    style.appendChild(document.createTextNode(landscapeCSS));
                    win.document.head.appendChild(style);
                    
                    // Tambahkan judul tabel di atas
                    $(win.document.body).prepend('<h2 style="text-align: center;">Laporan Kegiatan</h2>');
                },
                exportOptions: {
                    columns: ':visible' // Hanya ekspor kolom yang terlihat
                }
            },
            {
                extend: 'excel',
                text: 'Export Excel',
                title: 'Laporan Kegiatan',
                customize: function (xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];

                    // Hapus row pertama yang berisi thead yang ada
                    $('row:first', sheet).remove();

                    // Menambahkan thead sesuai dengan format yang diinginkan
                    var theadContent = `
                        <row>
                            <c r="A1" s="2"><v>NOMOR</v></c>
                            <c r="B1" s="2"><v>PROGRAM / KEGIATAN / SUB KEGIATAN</v></c>
                            <c r="C1" s="2"><v>DETAIL LOKASI (Kec./Desa/Kel./Kws)</v></c>
                            <c r="D1" s="2"><v>Estimasi Outcome</v></c>
                            <c r="E1" s="2"><v>Jml. Penduduk Terlayani</v></c>
                            <c r="F1" s="2"><v>Luas Wilayah Terlayani</v></c>
                            <c r="G1" s="2"><v>SAT.</v></c>
                            <c r="H1" s="2"><v>Kebutuhan Penanganan</v></c>
                            <c r="I1" s="2"><v>Total Volume</v></c>
                            <c r="J1" s="2"><v>Indikasi Biaya</v></c>
                            <c r="K1" s="2"><v>Jumlah</v></c>
                            <c r="L1" s="2"><v>Sumber Pendanaan / Pembiayaan</v></c>
                            <c r="M1" s="2"><v>OPD PENANGGUNG JAWAB</v></c>
                        </row>
                        <row>
                            <c r="D2" s="2"><v>Jml. Penduduk Terlayani</v></c>
                            <c r="E2" s="2"><v>Luas Wilayah Terlayani</v></c>
                            <c r="F2" s="2"><v>2025</v></c>
                            <c r="G2" s="2"><v>2026</v></c>
                            <c r="H2" s="2"><v>2027</v></c>
                            <c r="I2" s="2"><v>2028</v></c>
                            <c r="J2" s="2"><v>2029</v></c>
                            <c r="K2" s="2"><v>2025</v></c>
                            <c r="L2" s="2"><v>2026</v></c>
                            <c r="M2" s="2"><v>2027</v></c>
                            <c r="N2" s="2"><v>2028</v></c>
                            <c r="O2" s="2"><v>2029</v></c>
                            <c r="P2" s="2"><v>KAB / KOTA</v></c>
                            <c r="Q2" s="2"><v>PROV.</v></c>
                            <c r="R2" s="2"><v>APBN</v></c>
                            <c r="S2" s="2"><v>DAK</v></c>
                            <c r="T2" s="2"><v>SWASTA / CSR</v></c>
                            <c r="U2" s="2"><v>MASYARAKAT</v></c>
                        </row>
                    `;

                    $(sheet).find('sheetData').prepend(theadContent);

                    // Menambahkan format untuk cell header
                    $(sheet).find('row:first c, row:nth-child(2) c').attr('s', '2'); // Set style untuk header
                },
                exportOptions: {
                    columns: ':visible' // Hanya ekspor kolom yang terlihat
                }
            },
            "colvis"
        ],
        
      

        
    });
    function formatRupiah(amount) {
        return 'Rp.' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

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