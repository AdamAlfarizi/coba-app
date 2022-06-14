 {{-- NEW SIDEBAR --}}
 <div id="sidebar" class="active">
     <div class="sidebar-wrapper active">
         <div class="sidebar-header">
             <div class="d-flex justify-content-between">
                 <div class="logo">
                     <a href="index.html"><img src="" alt="Logo" srcset=""></a>
                 </div>
             </div>
         </div>
         <div class="sidebar-menu">
             @if (Auth::user()->is_admin == 'admin' || Auth::user()->is_admin == 'pegawai')
                 <ul class="menu">
                     <li class="sidebar-title">Menu</li>

                     <li class="sidebar-item @yield('dashboard') ">
                         <a href="/dashboard" class='sidebar-link '>
                             <i class="bi bi-grid-fill"></i>
                             <span>Dashboard</span>
                         </a>
                     </li>
                     <li class="sidebar-item @yield('berita') ">
                         <a href="/dashboard/posts" class='sidebar-link'>
                             <i class="bi bi-stack"></i>
                             <span>Berita</span>
                         </a>
                     </li>
                     <li class="sidebar-item @yield('category') ">
                         <a href="/dashboard/category" class='sidebar-link '>
                             <i class="bi bi-collection-fill"></i>
                             <span>Kategory Berita</span>
                         </a>
                     </li>
                     <li class="sidebar-item @yield('potensi-desa') ">
                         <a href="/dashboard/villages" class='sidebar-link '>
                             <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                             <span>Potensi Desa</span>
                         </a>
                     </li>
                     <li class="sidebar-title">Data Desa</li>

                     <li class="sidebar-item  @yield('data') has-sub">
                         <a href="#" class='sidebar-link'>
                             <i class="bi bi-stack"></i>
                             <span>Data Desa</span>
                         </a>
                         <ul class="submenu ">
                             <li class="submenu-item @yield('pekerjaan') ">
                                 <i class="file"></i>
                                 <a href="/dashboard/data/professions">Data Pekerjaan</a>
                             </li>
                             <li class="submenu-item  @yield('pendidikan') ">
                                 <a href="/dashboard/data/educations">Data Pendidikan</a>
                             </li>
                             <li class="submenu-item  @yield('agama')">
                                 <a href="/dashboard/data/religions">Data Agama</a>
                             </li>
                             <li class="submenu-item  @yield('jenis')">
                                 <a href="/dashboard/data/genders">Data Jenis Kelamin</a>
                             </li>
                             <li class="submenu-item  @yield('perkawinan')">
                                 <a href="/dashboard/data/marriages">Data Perkawinan</a>
                             </li>
                         </ul>
                     </li>

                     <li class="sidebar-item @yield('informasi-keuangan') ">
                         <a href="/dashboard/finances" class='sidebar-link '>
                             <i class="bi bi-cash"></i>
                             <span>Informasi Keuangan</span>
                         </a>
                     </li>

                     <li class="sidebar-item @yield('program-bantuan') ">
                         <a href="/dashboard/programs" class='sidebar-link '>
                             <i class="bi bi-pen-fill"></i>
                             <span>Program Bantuan</span>
                         </a>
                     </li>
                     <li class="sidebar-item @yield('aparatur') ">
                         <a href="/dashboard/aparatur" class='sidebar-link '>
                             <i class="bi bi-collection-fill"></i>
                             <span>Aparatur Desa</span>
                         </a>
                     </li>
                     <li class="sidebar-title">Extra UI</li>
                 </ul>
                 {{-- @can('user') --}}
                 <ul class="menu">
                     <li class="sidebar-title">Layanan Mandiri</li>
                     <li class="sidebar-item  @yield('layanan') has-sub">
                         <a href="#" class='sidebar-link'>
                             <i class="bi bi-stack"></i>
                             <span>Layanan Mandiri</span>
                         </a>
                         <ul class="submenu ">
                             <li class="submenu-item @yield('izin_usaha') ">
                                 <i class="file"></i>
                                 <a href="/dashboard/surat_izin_usaha">Surat Izin Usaha</a>
                             </li>
                             <li class="submenu-item  @yield('keterangan_meninggal') ">
                                 <a href="/dashboard/surat_keterangan_meninggal">Suarat Keterangan Meninggal</a>
                             </li>
                             <li class="submenu-item  @yield('izin_keramaian')">
                                 <a href="/dashboard/surat_izin_keramaian">Suarat Izin Keramaian</a>
                             </li>
                             <li class="submenu-item  @yield('tidak_mampu')">
                                 <a href="/dashboard/surat_tidak_mampu">Surat Keterangan Tidak Mampu</a>
                             </li>
                             <li class="submenu-item  @yield('pengantar_nikah')">
                                 <a href="/dashboard/surat_pengantar_nikah">Surat Pengantar Nikah</a>
                             </li>
                             <li class="submenu-item  @yield('surat_pindah')">
                                 <a href="/dashboard/surat_pindah">Surat Pindah</a>
                             </li>
                             <li class="submenu-item  @yield('surat_domisili')">
                                 <a href="/dashboard/surat_keterangan_domisili">Surat Keterangan Domisili</a>
                             </li>
                             <li class="submenu-item  @yield('keterangan_usaha')">
                                 <a href="/dashboard/surat_keterangan_usaha">Surat Keterangan Usaha</a>
                             </li>
                         </ul>
                     </li>
                 </ul>
             @endif

             {{-- @endcan --}}

             {{-- @if (Auth::user()->user_role_id == 1) --}}


             @if (Auth::user()->is_admin == 'admin')
                 <ul class="menu">
                     <li class="sidebar-title">Settings</li>
                     <li class="sidebar-item @yield('pegawai') ">
                         <a href="/dashboard/pegawai_login" class='sidebar-link'>
                             <i class="bi bi-stack"></i>
                             <span>Seting User</span>
                         </a>
                     </li>
                 </ul>
             @endif

             <ul class="menu">
                 <div class="navbar-nav">
                     <div class="nav-item text-nowrap">
                         <form action="/logout" method="post">
                             @csrf
                             <button type="submit" class="nav-link px-3  border-0"> Logout <span
                                     data-feather="log-out"></span></button>
                         </form>
                     </div>
                 </div>
             </ul>

         </div>
         <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
     </div>
 </div>
