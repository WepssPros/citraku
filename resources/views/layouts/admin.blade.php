<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Dashboard</title>
        @include('layouts.components.admin.core.css')
        <style>
           

            #jambi-map {
                width: 100%;
                /* Atur lebar ke 100% */
                height: 600px;
                /* Atur tinggi sesuai kebutuhan */
            }

            /* Menyembunyikan kontrol layer selector */
            .leaflet-control-layers-selector {
                display: none;
                /* Sembunyikan kontrol layer selector */
            }

            /* Kontrol layer kecil */
            .leaflet-control-layers {
                background: rgba(255, 255, 255, 0.9);
                border-radius: 5px;
                padding: 5px;
                max-width: 200px;
                max-height: 50px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
                display: flex;
                flex-direction: row;
                /* Mengatur tampilan horizontal */
                justify-content: space-between;
                /* Rata kiri dan kanan */
            }

            /* Ikon gambar di kontrol layer */
            .leaflet-control-layers img {
                width: 40px;
                /* Ukuran gambar */
                height: 40px;
                margin-bottom: 6px;
                border-radius: 5px;
                object-fit: cover;
            }

            /* Style untuk kontrol layer saat hover */
            .leaflet-control-layers img:hover {
                border-width: 10px;
                opacity: 0.7;
                /* Efek transparansi saat hover */
            }

            /* Mengatur agar kontrol layer terlihat horizontal seperti grid */
            .leaflet-control-layers-expanded {
                background: rgba(255, 255, 255, 0.9);
                border-radius: 8px;
                padding: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
                display: flex;
                flex-wrap: wrap;
                /* Agar tampil seperti grid */
                justify-content: space-around;
                /* Posisi diatur rata */
            }

            /* Mengatur label */
            .leaflet-control-layers-base label {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                cursor: pointer;
                padding: 10px;
                width: 80px;
                /* Ukuran kotak */
                height: 80px;
                background-color: white;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                margin: 5px;
            }

            .leaflet-control-layers-toggle {
                width: 36px;
                height: 36px;
                background: #4285F4;
                border-radius: 50%;
                color: white;
                font-size: 18px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .leaflet-control-layers-toggle:hover {
                background: #357AE8;
            }

            .leaflet-control-kecamatan {
                display: flex;
                flex-direction: column;
            }

            .kec-toggle {
                background-color: #4285F4;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .kec-toggle:hover {
                background-color: #357AE8;
            }

            .kec-list {
                display: none;
                /* Awalnya disembunyikan */
            }

            .kec-button {
                background-color: #f8f8f8;
                border: none;
                border-radius: 5px;
                padding: 5px;
                margin: 2px 0;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .kec-button:hover {
                background-color: #e0e0e0;
            }

            .leaflet-control-rt {
                display: flex;
                flex-direction: column;
            }

            .rt-toggle {
                background-color: #2196F3;
                /* Ubah warna sesuai preferensi */
                color: white;
                border: none;
                border-radius: 5px;
                padding: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .rt-toggle:hover {
                background-color: #1976D2;
            }

            .rt-list {
                display: none;
                /* Awalnya disembunyikan */
            }

            .rt-button {
                background-color: #f8f8f8;
                border: none;
                border-radius: 5px;
                padding: 5px;
                margin: 2px 0;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .rt-button:hover {
                background-color: #e0e0e0;
            }

        </style>
     
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            @include('layouts.components.admin.preloader')

            @include('layouts.components.admin.navbar')

            <!-- Main Sidebar Container -->
            @include('layouts.components.admin.sidebar')

            <!-- Content Wrapper. Contains page content -->

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                @yield('admin-header')
                <!-- /.content-header -->

                <!-- Main content -->
                @yield('admin-content')
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            @include('layouts.components.admin.footer')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        @include('layouts.components.admin.core.js')



        <script>
            $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
        </script>



        @yield('js-script')
    </body>

</html>