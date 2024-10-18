<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Citraku Admin | Dashboard</title>
        @include('layouts.components.admin.core.css')

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
        @yield('js-script')
        @include('sweetalert::alert')
    </body>

</html>