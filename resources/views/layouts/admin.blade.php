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

            /* CSS untuk kontrol peta */
            .leaflet-control-layers {
                background: rgba(255, 255, 255, 0.8);
                border-radius: 5px;
                padding: 10px;
            }

            /* CSS untuk marker */
            .leaflet-marker-icon {
                background: rgba(255, 0, 0, 0.7);
                border-radius: 50%;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
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