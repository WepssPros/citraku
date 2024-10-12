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
                    class="nav-item {{ Request::is('dashboard/kecamatan*') || Request::is('dashboard/kelurahan*') || Request::is('dashboard/rt*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard/kecamatan*') || Request::is('dashboard/kelurahan*') || Request::is('dashboard/rt*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Table Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.kecamatan.index') }}"
                                class="nav-link {{ Request::is('dashboard/kecamatan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kecamatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.kelurahan.index') }}"
                                class="nav-link {{ Request::is('dashboard/kelurahan*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kelurahan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.rt.index') }}"
                                class="nav-link {{ Request::is('dashboard/rt*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data RT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.program.index') }}"
                                class="nav-link {{ Request::is('dashboard/program*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Program *</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Tematik Kumuh</li>
                <li
                    class="nav-item  {{ Request::is('dashboard/subpermasalahan*') || Request::is('dashboard/penanganan*') || Request::is('dashboard/tematik*') || Request::is('dashboard/permasalahan*') || Request::is('dashboard/kawasankumuh*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link  {{ Request::is('dashboard/subpermasalahan*') || Request::is('dashboard/penanganan*') || Request::is('dashboard/tematik*') || Request::is('dashboard/permasalahan*') || Request::is('dashboard/kawasankumuh*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
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
                                <i class="nav-icon fas fa-map-marker-alt"></i>
                                <p>Data Penanganan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.kawasankumuh.index') }}"
                                class="nav-link {{ Request::is('dashboard/kawasankumuh*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map-marker-alt"></i>
                                <p>Data Kawasan Kumuh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.permasalahan.index') }}"
                                class="nav-link {{ Request::is('dashboard/permasalahan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map"></i>
                                <p>Data Survey</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subpermasalahan.index') }}"
                                class="nav-link {{ Request::is('dashboard/subpermasalahan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map"></i>
                                <p>Data Sub Survey</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.tematik.index') }}"
                                class="nav-link {{ Request::is('dashboard/tematik*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map"></i>
                                <p>Data Tematik Map</p>
                            </a>
                        </li>

                        <li class="nav-header">Input Tematik Kumuh</li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.penanganan.create') }}"
                                class="nav-link {{ Request::is('dashboard/penanganan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Buat Penanganan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.permasalahan.create') }}"
                                class="nav-link {{ Request::is('dashboard/permasalahan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Buat Permasalahan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subpermasalahan.create') }}"
                                class="nav-link {{ Request::is('dashboard/subpermasalahan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Buat Sub Permasalahan</p>
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
                                <li class="nav-item">
                                    <a href="pages/search/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Perealisasian</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Tematik Banjir</li>
                <li
                    class="nav-item {{ Request::is('dashboard/kecamatan*') || Request::is('dashboard/kelurahan*') || Request::is('dashboard/rt*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard/kecamatan*') || Request::is('dashboard/kelurahan*') || Request::is('dashboard/rt*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tematik Banjir
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-header">Data View Tematik Banjir</li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.kawasankumuh.index') }}"
                                class="nav-link {{ Request::is('dashboard/kawasankumuh*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map-marker-alt"></i>
                                <p>Data Kawasan Kumuh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.permasalahan.index') }}"
                                class="nav-link {{ Request::is('dashboard/permasalahan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map"></i>
                                <p>Data Survey</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subpermasalahan.index') }}"
                                class="nav-link {{ Request::is('dashboard/subpermasalahan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map"></i>
                                <p>Data Sub Survey</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.tematik.index') }}"
                                class="nav-link {{ Request::is('dashboard/tematik*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-map"></i>
                                <p>Data Tematik Map</p>
                            </a>
                        </li>

                        <li class="nav-header">Input Profile Pemutakhiran</li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.permasalahan.create') }}"
                                class="nav-link {{ Request::is('dashboard/permasalahan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Buat Permasalahan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subpermasalahan.create') }}"
                                class="nav-link {{ Request::is('dashboard/subpermasalahan/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <p>Buat Sub Permasalahan</p>
                            </a>
                        </li>


                        <li class="nav-header">Laporan</li>
                        <li class="nav-item {{ Request::is('dashboard/laporan*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('dashboard/laporan*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/search/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan 1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/search/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/search/simple.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Import Data Tematik</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.tematik.create') }}"
                        class="nav-link {{ Request::is('dashboard/tematik/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-import"></i>
                        <p>Import Data Tematik Map</p>
                    </a>
                </li>

                <li class="nav-header">Artikel / Berita</li>
                <li class="nav-item {{ Request::is('dashboard/blog*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('dashboard/blog*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita / Artikel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.blog.index') }}"
                                class="nav-link {{ Request::is('dashboard/blog') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Berita / Artikel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.blog.create') }}"
                                class="nav-link {{ Request::is('dashboard/blog/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buat Berita / Artikel</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>