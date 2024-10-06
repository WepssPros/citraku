<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <img id="navbar-logo" src="{{ asset('frontend/img/logobapedalight.png') }}"
            data-scroll-logo="{{ asset('../frontend/img/logobapeda.png') }}"
            data-default-logo="{{ asset('../frontend/img/logobapedalight.png') }}" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{route('index')}}" class="nav-item nav-link active">Beranda</a>
            <a href="{{route('geopasial-map')}}" class="nav-item nav-link">Peta</a>
            <a href="blog.html" class="nav-item nav-link">Berita & Artikel</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dokumen Perencanaan Daerah</a>
                <div class="dropdown-menu m-0">
                    <a href="destination.html" class="dropdown-item">Rencana Tata Ruang Wilayah Kota Jambi (2013 -
                        2033)</a>
                    <a href="tour.html" class="dropdown-item">RPJMD Perubahan 2018-2023</a>
                    <a href="booking.html" class="dropdown-item">RIPPDA KOTA JAMBI</a>
                    <a href="gallery.html" class="dropdown-item">RIPPDA KOTA JAMBI</a>

                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
        </div>

    </div>
</nav>

@yield('navbar-geopasial')