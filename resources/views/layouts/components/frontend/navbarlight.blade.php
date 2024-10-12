<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 navbar-geopasial">
    <a href="" class="navbar-brand p-0">
        <img id="navbar-logo" src="{{ asset('frontend/img/logotextcitradark.png') }}"
            data-scroll-logo="{{ asset('../frontend/img/logotextcitradark.png') }}"
            data-default-logo="{{ asset('../frontend/img/logotextcitradark.png') }}" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapseGeo">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapseGeo">
        <div class="navbar-nav ms-auto py-0">
            <!-- Tambahkan kelas 'active' jika berada di route 'index' -->
            <a href="{{ route('index') }}"
                class="nav-item nav-link {{ Request::routeIs('index') ? 'active' : '' }}">Beranda</a>

            <!-- Tambahkan kelas 'active' jika berada di route 'geopasial-map' -->
            <a href="{{ route('geopasial-map') }}"
                class="nav-item nav-link {{ Request::routeIs('geopasial-map') ? 'active' : '' }}">Peta</a>

            <!-- Tambahkan kelas 'active' jika berada di route 'blog' atau 'blog.details' -->
            <a href="{{ route('blog') }}"
                class="nav-item nav-link {{ Request::routeIs('blog') || Request::routeIs('blog.details') ? 'active' : '' }}">Berita
                & Artikel</a>

            <!-- Dropdown dengan dokumen perencanaan -->
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

            <!-- Tambahkan kelas 'active' jika berada di route 'contact' -->
            <a href="{{route('contact')}}"
                class="nav-item nav-link {{ Request::routeIs('contact') ? 'active' : '' }}">Contact</a>
        </div>
        <!-- Tombol kembali ke halaman utama -->
        <a href="{{ route('index') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Kembali</a>
    </div>
</nav>