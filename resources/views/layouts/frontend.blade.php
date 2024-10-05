<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Citraku Geopasial</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('../frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('../frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800&amp;display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700;800&amp;display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&amp;display=swap"
            rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('../frontend/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Template Stylesheet -->
        <link href="{{asset('../frontend/css/style.css')}}" rel="stylesheet">

    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Topbar Start -->
        @include('layouts.components.frontend.topbar')
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            @include('layouts.components.frontend.navbar')

            <!-- Carousel Start -->
            @include('layouts.components.frontend.carouselheader')
            <!-- Carousel End -->
        </div>

        <!-- Navbar & Hero End -->

        @yield('frontend-content')



        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Hubungi Kami</h4>
                            <a href=""><i class="fas fa-home me-2"></i> Jl. Jendral Sudirman No.23, Jambi</a>
                            <a href=""><i class="fas fa-envelope me-2"></i> info@bappeda.jambi.go.id</a>
                            <a href=""><i class="fas fa-phone me-2"></i> +62 741 123456</a>
                            <a href="" class="mb-3"><i class="fas fa-print me-2"></i> +62 741 654321</a>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-share fa-2x text-white me-2"></i>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn-square btn btn-primary rounded-circle mx-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Tentang Kami</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Visi & Misi</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Struktur Organisasi</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Program Kerja</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Laporan Tahunan</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Informasi Publik</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Artikel</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Berita</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Pengumuman</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Agenda</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="text-white mb-3">Pilih Bahasa</h4>
                            <form>
                                <div class="form-floating mb-3">
                                    <select class="form-select bg-dark border" id="select1">
                                        <option value="1">Bahasa Indonesia</option>
                                        <option value="2">English</option>
                                    </select>
                                    <label for="select1">Bahasa</label>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-end mb-md-0">
                        <i class="fas fa-copyright me-2"></i><a class="text-white"
                            href="https://bappeda.jambikota.go.id/landing">Copyrights © 2022 Bappeda
                            Kota Jambi </a>,Support by <a href="https://diskominfo.jambikota.go.id/"> Diskominfo Kota
                            Jambi</a>

                    </div>
                    <div class="col-md-6 text-center text-md-start">
                        Designed By <a href="https://wepsspros.github.io/git-reyhan-portfolio/"> M.Reyhan Dwi
                            Amberta</a>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
                class="fa fa-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('../frontend/lib/easing/easing.min.js"')}}></script>
        <script src=" {{asset('../frontend/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('../frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('../frontend/lib/lightbox/js/lightbox.min.js')}}"></script>


        <!-- Template Javascript -->
        <script src="{{asset('../frontend/js/main.js')}}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Cek URL saat ini
                var currentUrl = window.location.href;
                var targetUrl = "{{ route('geopasial-map') }}";
        
                // Jika URL saat ini adalah target URL, sembunyikan carousel
                if (currentUrl === targetUrl) {
                    document.querySelector('.carousel-header').style.display = 'none';
                }
            });
        </script>
    </body>

</html>