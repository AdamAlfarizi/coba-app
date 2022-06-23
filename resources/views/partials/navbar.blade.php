        <!-- Responsive navbar-->
        {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Webdes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Profil Desa
                            </a>
                            <ul class="dropdown-menu navbar-dark bg-dark " aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item nav-link" href="/profil/history">Sejarah Desa</a></li>
                                <li><a class="dropdown-item nav-link" href="/data/pendidikan">Profil Wilayah Desa</a>
                                </li>
                                <li class="nav-item dropdown-submenu">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pemerintahan Desa
                                    </a>
                                    <ul class="dropdown-menu navbar-dark bg-dark "
                                        aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item nav-link" href="/data/pekerjaan">Visi&Misi</a></li>
                                        <li><a class="dropdown-item nav-link" href="/data/pendidikan">Struktur
                                                Organisasi</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item"><a class="nav-link" href="#!">Lembaga Masyarakat</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Kader Desa</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Data Desa
                            </a>
                            <ul class="dropdown-menu navbar-dark bg-dark " aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item nav-link" href="/data/pekerjaan">Data Pekerjaan</a></li>
                                <li><a class="dropdown-item nav-link" href="/data/pendidikan">Data Pendidikan</a></li>
                                <li><a class="dropdown-item nav-link" href="/data/agama">Data Agama</a></li>
                                <li><a class="dropdown-item nav-link" href="/data/jenis">Data Jenis Kelamin</a></li>
                                <li><a class="dropdown-item nav-link" href="/data/perkawinan">Data Perkawinan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Informasi Keuangan</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Program Bantuan</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Potensi Desa</a></li>
                        <li class="nav-item"><a class="nav-link" href="/login_layanan">Layanan Mandiri</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> --}}

        <div id="app">
            <div id="main" class="layout-horizontal">
                <header>
                    <div class="header-top">
                        <div class="container">
                            <div class="logo">
                                <a href="/"><img src="{{ asset('/images/logo/logo.png') }}" alt="Logo"
                                        srcset=""></a>
                            </div>
                            <div class="header-top-right">

                                <!-- Burger button responsive -->
                                <a href="#" class="burger-btn d-block d-xl-none">
                                    <i class="bi bi-justify fs-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <nav class="main-navbar">
                        <div class="container">
                            <ul>
                                <li class="menu-item  ">
                                    <a href="/" class='menu-link'>
                                        <i class="bi bi-grid-fill"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <li class="menu-item  has-sub">
                                    <a href="#" class='menu-link'>
                                        <i class="bi bi-stack"></i>
                                        <span>Profil Desa</span>
                                    </a>
                                    <div class="submenu ">
                                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                        <div class="submenu-group-wrapper">
                                            <ul class="submenu-group">

                                                <li class="submenu-item  ">
                                                    <a href="/profil/history" class='submenu-link'>Sejarah Desa</a>
                                                </li>
                                                <li class="submenu-item  ">
                                                    <a href="/data/pendidikan" class='submenu-link'>Profil Desa</a>
                                                </li>
                                                <li class="submenu-item  has-sub">
                                                    <a href="#" class='submenu-link'>Pemerintahan Desa</a>
                                                    <!-- 3 Level Submenu -->
                                                    <ul class="subsubmenu">
                                                        <li class="subsubmenu-item ">
                                                            <a href="extra-component-avatar.html"
                                                                class="subsubmenu-link">Visi Misi</a>
                                                        </li>
                                                        <li class="subsubmenu-item ">
                                                            <a href="extra-component-sweetalert.html"
                                                                class="subsubmenu-link">Struktur Organisasi</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <ul class="submenu-group">
                                                <li class="submenu-item  has-sub">
                                                    <a href="#" class='submenu-link'>Lembaga Mayarakat</a>
                                                    <!-- 3 Level Submenu -->
                                                    <ul class="subsubmenu">
                                                        <li class="subsubmenu-item ">
                                                            <a href="extra-component-avatar.html"
                                                                class="subsubmenu-link">Lpm</a>
                                                        </li>
                                                        <li class="subsubmenu-item ">
                                                            <a href="extra-component-sweetalert.html"
                                                                class="subsubmenu-link">Karang Taruna</a>
                                                        </li>
                                                        <li class="subsubmenu-item ">
                                                            <a href="extra-component-toastify.html"
                                                                class="subsubmenu-link">Pkk</a>
                                                        </li>
                                                        <li class="subsubmenu-item ">
                                                            <a href="extra-component-rating.html"
                                                                class="subsubmenu-link">Liamas</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="submenu-item  has-sub">
                                                    <a href="#" class='submenu-link'>Kader Desa</a>
                                                    <!-- 3 Level Submenu -->
                                                    <ul class="subsubmenu">
                                                        <li class="subsubmenu-item ">
                                                            <a href="extra-component-avatar.html"
                                                                class="subsubmenu-link">Posyandu</a>
                                                        </li>
                                                        <li class="subsubmenu-item ">
                                                            <a href="extra-component-sweetalert.html"
                                                                class="subsubmenu-link">Desa Siaga</a>
                                                        </li>
                                                        <li class="subsubmenu-item ">
                                                            <a href="extra-component-toastify.html"
                                                                class="subsubmenu-link">Kader Pembangunan</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item active has-sub">
                                    <a href="#" class='menu-link'>
                                        <i class="bi bi-grid-1x2-fill"></i>
                                        <span>Data Desa</span>
                                    </a>
                                    <div class="submenu ">
                                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                        <div class="submenu-group-wrapper">
                                            <ul class="submenu-group">

                                                <li class="submenu-item  ">
                                                    <a href="/data/pekerjaan" class='submenu-link'>Data
                                                        Pekerjaan</a>
                                                </li>
                                                <li class="submenu-item  ">
                                                    <a href="/data/pendidikan" class='submenu-link'>Data
                                                        Pendidikan</a>
                                                </li>
                                                <li class="submenu-item  ">
                                                    <a href="/data/agama" class='submenu-link'>Data
                                                        Agama</a>
                                                </li>
                                                <li class="submenu-item  ">
                                                    <a href="/data/jenis" class='submenu-link'>Data Jenis
                                                        Kelamin</a>
                                                </li>
                                                <li class="submenu-item  ">
                                                    <a href="/data/perkawinan" class='submenu-link'>Data Perkawinan</a>
                                                </li>
                                                <li class="submenu-item active ">
                                                    <a href="layout-horizontal.html" class='submenu-link'>Informasi
                                                        Keuangan</a>
                                                </li>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item  has-sub">
                                    <a href="#" class='menu-link'>
                                        <i class="bi bi-file-earmark-medical-fill"></i>
                                        <span>Program Bantuan</span>
                                    </a>
                                    <div class="submenu ">
                                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                        <div class="submenu-group-wrapper">
                                            <ul class="submenu-group">
                                                <li class="submenu-item  ">
                                                    <a href="form-layout.html" class='submenu-link'>Blt</a>
                                                </li>
                                                <li class="submenu-item  ">
                                                    <a href="form-layout.html" class='submenu-link'>Bpnt</a>
                                                </li>
                                                <li class="submenu-item  ">
                                                    <a href="form-layout.html" class='submenu-link'>Pkh</a>
                                                </li>
                                        </div>
                                    </div>
                                </li>



                                <li class="menu-item  has-sub">
                                    <a href="#" class='menu-link'>
                                        <i class="bi bi-table"></i>
                                        <span>Potensi Desa</span>
                                    </a>
                                    <div class="submenu ">
                                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                        <div class="submenu-group-wrapper">
                                            <ul class="submenu-group">
                                                <li class="submenu-item  ">
                                                    <a href="table.html" class='submenu-link'>Wisata Desa</a>
                                                </li>
                                                <li class="submenu-item  ">
                                                    <a href="table-datatable.html" class='submenu-link'>Umkm</a>
                                                </li>
                                                <li class="submenu-item  ">
                                                    <a href="table-datatable-jquery.html"
                                                        class='submenu-link'>Kesenian</a>
                                                </li>
                                        </div>
                                    </div>
                                </li>
                                <li class="menu-item  ">
                                    <a href="index.html" class='menu-link'>
                                        <i class="bi bi-grid-fill"></i>
                                        <span>Panduan Layanan</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </header>
            </div>
        </div>
