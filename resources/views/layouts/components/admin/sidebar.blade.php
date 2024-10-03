<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('../adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->profile_photo_url}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{route('dashboard.index')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Table Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dashboard.kecamatan.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kecamatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.kelurahan.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Kelurahan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dashboard.rt.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data RT</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Data View</li>
                <li class="nav-item">
                    <a href="{{route('dashboard.kawasankumuh.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>Data Kawasan Kumuh</p>
                        <span class="badge badge-info right">2</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Data Profile</p>
                        <span class="badge badge-info right">2</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-map"></i>
                        <p>Data Tematik Map</p>
                        <span class="badge badge-info right">2</span>
                    </a>
                </li>

                <li class="nav-header">Input Profile Pemutakhiran</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>Buat Permasalahan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-plus-circle"></i>
                        <p>Buat Sub Permasalahan</p>
                    </a>
                </li>

                <li class="nav-header">Import Data Tematik</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-file-import"></i>
                        <p>Import Data Tematik Map</p>
                    </a>
                </li>

                <li class="nav-header">Artikel / Berita</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita / Artikel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/search/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buat Berita / Artikel</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Laporan</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
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
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>