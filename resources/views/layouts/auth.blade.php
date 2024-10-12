<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('../frontend/img/logobapeda.png')}}">
        <link rel="icon" type="image/png" href="{{asset('../frontend/img/logobapeda.png')}}">
        <title>
            Citraku Portal Login
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{asset('../auth/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
        <link href="{{asset('../auth/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{asset('../auth/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{asset('../auth/assets/css/soft-ui-dashboard.css?v=1.0.7')}}" rel="stylesheet" />


    </head>

    <body class="">
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <!-- Navbar -->
                    <nav
                        class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                        <div class="container-fluid pe-0">
                            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3" href="{{route('index')}}">
                                <img src="{{ asset('../frontend/img/logotextcitradark.png') }}" alt="Bapeda Logo"
                                    style="height: 60px; width: auto;">
                                <!-- Adjust the height as needed -->
                            </a>
                            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon mt-2">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </span>
                            </button>
                            <div class="collapse navbar-collapse" id="navigation">
                                <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                            href="{{route('blog')}}">
                                            <i class="fas fa-newspaper opacity-6 text-dark me-1"></i>
                                            <!-- Updated icon for 'Berita & Artikel' -->
                                            Berita & Artikel
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="{{route('contact')}}">
                                            <i class="fas fa-phone-alt opacity-6 text-dark me-1"></i>
                                            <!-- Updated icon for 'Contact Bappeda' -->
                                            Contact Bappeda
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link me-2" href="https://bappeda.jambikota.go.id/profil/tupoksi">
                                            <i class="fas fa-user-plus opacity-6 text-dark me-1"></i>
                                            <!-- Updated icon for 'Register' -->
                                            Profile Bappeda
                                        </a>
                                    </li>


                                </ul>
                                <li class="nav-item d-flex align-items-center">
                                    <a class="btn btn-round btn-sm mb-0 btn-outline-primary me-2"
                                        href="{{route('index')}}">Portal
                                        Citraku</a>
                                </li>
                                <ul class="navbar-nav d-lg-block d-none">
                                    <li class="nav-item">
                                        <a href="{{route('geopasial-map')}}"
                                            class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Jelajahi
                                            Geopasial</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div>
        <main class="main-content  mt-0">
            @yield('auth-content')
        </main>


        <footer class="footer py-5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 mx-auto text-center mb-4 mt-2">

                        <a href="#" target="" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-twitter"></span>
                        </a>
                        <a href="#" target="" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-instagram"></span>
                        </a>

                        <a href="#" target="" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-facebook"></span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mx-auto text-center mt-1">
                        <p class="mb-0 text-secondary">
                            <strong>Copyright &copy; TRI IWANSUTANTO, ST, ME 2024 <a
                                    href="https://bappeda.jambikota.go.id/profil/pejabat-bappeda"></a> Design By <a
                                    href="https://wepsspros.github.io/git-reyhan-portfolio/">M.Reyhan Dwi
                                    Amberta</a> & <a href="">Rifqi Alma Ramadhan</a> </strong>
                            All rights reserved.
                        </p>
                    </div>
                </div>

            </div>
        </footer>

        <script src=".{{asset('../auth/assets/js/core/popper.min.js')}}"></script>
        <script src="{{asset('../auth/assets/js/core/bootstrap.min.js')}}"></script>
        <script src="{{asset('../auth/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('../auth/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
                if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
                }
        </script>
        @include('sweetalert::alert')



        <script src="{{asset('../auth/assets/js/soft-ui-dashboard.min.js?v=1.0.7')}}"></script>
    </body>

</html>