<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('index') }}" class="brand-link">
        <img src="{{ asset('../frontend/img/logocitraku.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Citraku.Com</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ Request::is('dashboard/kecamatan*') ||  Request::is('dashboard/program*') ||  Request::is('dashboard/kelurahan*') || Request::is('dashboard/rt*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard/kecamatan*') ||  Request::is('dashboard/program*')  || Request::is('dashboard/kelurahan*') || Request::is('dashboard/rt*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-database"></i> <!-- Ganti ikon dengan database -->
                        <p>
                            Table Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.kecamatan.index') }}"
                                class="nav-link {{ Request::is('dashboard/kecamatan*') ? 'active' : '' }}">
                                <i class="far fa-building nav-icon"></i> <!-- Ikon untuk Kecamatan -->
                                <p>Data Kecamatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.kelurahan.index') }}"
                                class="nav-link {{ Request::is('dashboard/kelurahan*') ? 'active' : '' }}">
                                <i class="far fa-building nav-icon"></i> <!-- Ikon untuk Kelurahan -->
                                <p>Data Kelurahan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.rt.index') }}"
                                class="nav-link {{ Request::is('dashboard/rt*') ? 'active' : '' }}">
                                <i class="far fa-building nav-icon"></i> <!-- Ikon untuk RT -->
                                <p>Data RT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.program.index') }}"
                                class="nav-link {{ Request::is('dashboard/program*') ? 'active' : '' }}">
                                <i class="far fa-list-alt nav-icon"></i> <!-- Ikon untuk Program -->
                                <p>Data Program *</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Tematik Kumuh</li>
                <li
                    class="nav-item  {{ Request::is('dashboard/perealisasian*') || Request::is('dashboard/subpermasalahan*') || Request::is('dashboard/penanganan*') || Request::is('dashboard/tematik*') || Request::is('dashboard/permasalahan*') || Request::is('dashboard/kawasankumuh*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link  {{ Request::is('dashboard/perealisasian*') || Request::is('dashboard/subpermasalahan*') || Request::is('dashboard/penanganan*') || Request::is('dashboard/tematik*') || Request::is('dashboard/permasalahan*') || Request::is('dashboard/kawasankumuh*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-bar"></i> <!-- Ikon untuk Tematik Kumuh -->
                        <p>
                            Tematik Kumuh
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-header">Data View Tematik Kumuh</li>

                        <li class="nav-item">
                            <a href="{{route('dashboard.penanganan.index')}}"
                                class="nav-link {{ Request::is('dashboard/penanganan*') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-street-view"></i> <!-- Ikon untuk Data Penanganan -->
                                <p>Data Penanganan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.perealisasian.index')}}"
                                class="nav-link {{ Request::is('dashboard/perealisasian*') ? 'active' : '' }} ">
                                <i class="nav-icon fas fa-clipboard-check"></i> <!-- Ikon untuk Data Perealisasian -->
                                <p>Data Perealisasian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.kawasankumuh.index') }}"
                                class="nav-link {{ Request::is('dashboard/kawasankumuh*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map-marked-alt"></i> <!-- Ikon untuk Data Kawasan Kumuh -->
                                <p>Data Kawasan Kumuh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.permasalahan.index') }}"
                                class="nav-link {{ Request::is('dashboard/permasalahan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-question-circle"></i> <!-- Ikon untuk Data Survey -->
                                <p>Data Survey</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subpermasalahan.index') }}"
                                class="nav-link {{ Request::is('dashboard/subpermasalahan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-question-circle"></i> <!-- Ikon untuk Data Sub Survey -->
                                <p>Data Sub Survey</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.tematik.index') }}"
                                class="nav-link {{ Request::is('dashboard/tematik*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map"></i> <!-- Ikon untuk Data Tematik Map -->
                                <p>Data Tematik Map</p>
                            </a>
                        </li>
                        <li class="nav-header">Input Penanganan Tematik Kumuh</li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.penanganan-permasalahan.create') }}"
                                class="nav-link {{ Request::is('dashboard/penanganan-permasalahan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-square"></i> <!-- Ikon untuk Buat Penanganan -->
                                <p>Buat Penangan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.perealisasian.create') }}"
                                class="nav-link {{ Request::is('dashboard/perealisasian/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-square"></i> <!-- Ikon untuk Buat Perealisasian -->
                                <p>Buat Perealisasian</p>
                            </a>
                        </li>
                        <li class="nav-header">Operator Citraku</li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.penanganan.create') }}"
                                class="nav-link {{ Request::is('dashboard/penanganan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-square"></i> <!-- Ikon untuk Buat Penanganan -->
                                <p>Input Kebutuhan, Indikasi, Sumber Pendanaan </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.penanganan.create') }}"
                                class="nav-link {{ Request::is('dashboard/penanganan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-square"></i> <!-- Ikon untuk Buat Penanganan -->
                                <p>Input Kebutuhan, Indikasi, Sumber Pendanaan </p>
                            </a>
                        </li>

                        <li class="nav-header">Input Tematik Profile (P) Kumuh</li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.permasalahan.create') }}"
                                class="nav-link {{ Request::is('dashboard/permasalahan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-square"></i> <!-- Ikon untuk Buat Permasalahan -->
                                <p>Buat (P) Permasalahan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subpermasalahan.create') }}"
                                class="nav-link {{ Request::is('dashboard/subpermasalahan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-square"></i> <!-- Ikon untuk Buat Sub Permasalahan -->
                                <p>Buat (P) Sub Per...</p>
                            </a>
                        </li>
                        <li class="nav-header">Laporan</li>
                        <li class="nav-item {{ Request::is('dashboard/laporan*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('dashboard/laporan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Laporan(T) Kumuh
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/search/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Permasalahan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/search/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Penanganan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                </li>
            </ul>
            <li class="nav-header">Kegiatan</li>
            <li class="nav-item">
                <a href="" class="nav-link {{ Request::is('dashboard/kegiatan*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar-alt"></i> <!-- Ikon untuk Kegiatan -->
                    <p>Kegiatan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class=" nav-link
                                                {{ Request::is('dashboard/setting*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cogs"></i> <!-- Ikon untuk Pengaturan -->
                    <p>Pengaturan</p>
                </a>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>