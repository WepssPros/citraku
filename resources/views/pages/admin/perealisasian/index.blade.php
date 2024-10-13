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
                                    <th rowspan="2">NOMOR</th>
                                    <th rowspan="2">PROGRAM / KEGIATAN / SUB KEGIATAN</th>
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
                                    <td>1</td>
                                    <td>PROGRAM PENGELOLAAN SUMBER DAYA AIR (SDA)</td>
                                    <td>Telanai</td>
                                    <td>256 KK</td>
                                    <td>2.65(Ha)</td>
                                    <td>Unit</td>
                                    <td>2506</td>
                                    <td>245</td>
                                    <td>245</td>
                                    <td>2455</td>
                                    <td>22</td>
                                    <td>Total Volume 2051</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.550.000.000</td>
                                    <td>Rp.750.000.000</td>
                                    <td>Rp.950.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.2.150.000.000</td>
                                    <td>Jambi</td>
                                    <td>Rp.10.500.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>OPD PENANGUNG JAWAB SI A.B.C</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Pengelolaan SDA dan Bangunan Pengaman Pantai pada Wilayah Sungai (WS) dalam 1
                                        (Satu) Daerah Kabupaten/Kota</td>
                                    <td>Telanai</td>
                                    <td>256 KK</td>
                                    <td>2.65(Ha)</td>
                                    <td>Unit</td>
                                    <td>2506</td>
                                    <td>245</td>
                                    <td>245</td>
                                    <td>2455</td>
                                    <td>22</td>
                                    <td>Total Volume 2051</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.550.000.000</td>
                                    <td>Rp.750.000.000</td>
                                    <td>Rp.950.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.2.150.000.000</td>
                                    <td>Jambi</td>
                                    <td>Rp.10.500.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>OPD PENANGUNG JAWAB SI A.B.C</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Pembangunan Stasiun Pompa Banjir</td>
                                    <td>Telanai</td>
                                    <td>256 KK</td>
                                    <td>2.65(Ha)</td>
                                    <td>Unit</td>
                                    <td>2506</td>
                                    <td>245</td>
                                    <td>245</td>
                                    <td>2455</td>
                                    <td>22</td>
                                    <td>Total Volume 2051</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.550.000.000</td>
                                    <td>Rp.750.000.000</td>
                                    <td>Rp.950.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.2.150.000.000</td>
                                    <td>Jambi</td>
                                    <td>Rp.10.500.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>Rp.150.000.000</td>
                                    <td>OPD PENANGUNG JAWAB SI A.B.C</td>

                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="25" style="text-align: center;">JUMLAH TOTAL ANGGARAN : <b>(Misal
                                            Rp.26.000.000.000.000)</b></td>
                                </tr>
                            </tfoot>
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
<script>
    $(function () {
    var table = $("#example3").DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
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
                            <c r="J1" s="2"><v>Penanganan</v></c>
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
        ]
    });

    table.buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

    // Menambahkan event agar print dan excel dijalankan bersama
    $('#example3_wrapper .buttons-print').on('click', function () {
        table.button('.buttons-excel').trigger();
    });
});
</script>
@endsection
@endsection