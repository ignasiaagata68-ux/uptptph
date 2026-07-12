<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>

<div class="wrapper">

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="logo">

            <img src="{{ asset('images/logo.png') }}" alt="Logo">

            <h5>UPT PTPH</h5>

            <small>Provinsi Kalimantan Barat</small>

        </div>

        <div class="menu-title">
            MAIN MENU
        </div>

        <ul>

            <li>

                @if(session('role') == 'pengelola_data')

                    <a href="{{ url('/dashboard-pengelola') }}"
                        class="{{ request()->is('dashboard-pengelola') ? 'active' : '' }}">

                        <i class="bi bi-speedometer2"></i>

                        <span>Dashboard</span>

                    </a>

                @elseif(session('role') == 'popt')

                    <a href="{{ url('/dashboard-popt') }}"
                        class="{{ request()->is('dashboard-popt') ? 'active' : '' }}">

                        <i class="bi bi-speedometer2"></i>

                        <span>Dashboard</span>

                    </a>

                @elseif(session('role') == 'lphp')

                    <a href="{{ url('/dashboard-lphp') }}"
                        class="{{ request()->is('dashboard-lphp') ? 'active' : '' }}">

                        <i class="bi bi-speedometer2"></i>

                        <span>Dashboard</span>

                    </a>

                @elseif(session('role') == 'pimpinan')

                    <a href="{{ url('/dashboard-pimpinan') }}"
                        class="{{ request()->is('dashboard-pimpinan') ? 'active' : '' }}">

                        <i class="bi bi-speedometer2"></i>

                        <span>Dashboard</span>

                    </a>

                @endif

            </li>

            @if(session('role') == 'pengelola_data')
            <li>
                <button
                    class="menu-dropdown"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#masterDataMenu"
                    aria-expanded="false"
                    aria-controls="masterDataMenu">

                    <span>

                        <i class="bi bi-database-fill"></i>

                        Master Data

                    </span>

                    <i class="bi bi-chevron-down"></i>

                </button>

                <div class="collapse" id="masterDataMenu">

                    <ul class="submenu">

                        <li>
                            <a href="{{ url('/kabupaten') }}">
                                <i class="bi bi-building"></i>
                                Kabupaten / Kota
                            </a>
                        </li>

                        <li>
                            <a href="/kecamatan">
                                <i class="bi bi-geo-alt-fill"></i>
                                Kecamatan
                            </a>
                        </li>

                        <li>
                            <a href="/desa">
                                <i class="bi bi-house-door-fill"></i>
                                Desa
                            </a>
                        </li>

                        <li>
                            <a href="/kelompok-tani">
                                <i class="bi bi-people-fill"></i>
                                Kelompok Tani
                            </a>
                        </li>

                        <li>
                            <a href="/komoditas">
                                <i class="bi bi-flower1"></i>
                                Komoditas
                            </a>
                        </li>

                        <li>
                            <a href="/opt">
                                <i class="bi bi-bug-fill"></i>
                                Data OPT
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/musim_tanam') }}">
                                <i class="bi bi-calendar3"></i>
                                Musim Tanam
                            </a>
                        </li>

                        <li>
                            <a href="/periode">
                                <i class="bi bi-calendar-range-fill"></i>
                                Periode
                            </a>
                        </li>

                        <li>
                            <a href="/bulan">
                                <i class="bi bi-calendar2-month-fill"></i>
                                Bulan
                            </a>
                        </li>

                        <li>
                            <a href="/tahun">
                                <i class="bi bi-calendar-event-fill"></i>
                                Tahun
                            </a>
                        </li>

                        <li>
                            <a href="/petugas">
                                <i class="bi bi-person-badge-fill"></i>
                                Petugas
                            </a>
                        </li>

                    </ul>

                </div>
            </li>
            @endif

            <li>

                <button class="menu-dropdown"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#pencatatanMenu">

                    <span>
                        <i class="bi bi-pencil-square"></i>
                        Pencatatan Data
                    </span>

                    <i class="bi bi-chevron-down"></i>

                </button>

                <div class="collapse" id="pencatatanMenu">

                    <ul class="submenu">

                        <!-- DATA OPT -->

                        <li>

                            <button class="menu-dropdown submenu-btn"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#dataOPT">

                                <span>
                                    <i class="bi bi-bug-fill"></i>
                                    Data OPT
                                </span>

                                <i class="bi bi-chevron-down"></i>

                            </button>

                            <div class="collapse" id="dataOPT">

                                <ul class="submenu">
                                    <li><a href="/pengamatan-persemaian-padi">Pengamatan Persemaian Padi</a></li>

                                    <li><a href="/keadaan-serangan-opt">Keadaan Serangan OPT Dan Pengendalian Di Wilayah Pengamatan</a></li>

                                    <li><a href="/keadaan-opt-pada-petak-pengamatan-tetap">Keadaan OPT Pada Petak Pengamatan Tetap</a></li>

                                    <li><a href="/tangkapan-lampu-perangkap">Tangkapan Lampu Perangkap</a></li>

                                    <li><a href="/kumulatif-luas-tambah-tanam-padi">Kumulatif Luas Tambah Tanam Padi</a></li>

                                    <li><a href="/penggunaan-pestisida">Penggunaan Pestisida</a></li>

                                    <li><a href="/pengamatan-penyebaran-dan-perkembangan-siput-murbey">Pengamatan Siput Murbey</a></li>
                    </ul>                       
                </div>
            </li>
            <li>

                <button class="menu-dropdown submenu-btn"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#dataDPI">

                    <span>
                        <i class="bi bi-cloud-rain-heavy-fill"></i>
                        Data DPI
                    </span>

                    <i class="bi bi-chevron-down"></i>

                </button>

                <div class="collapse" id="dataDPI">

                    <ul class="submenu">

                        <li><a href="/laporan-kerusakan-tanaman-akibat-banjir">Laporan Kerusakan Tanaman Akibat Banjir</a></li>

                        <li><a href="/laporan-kerusakan-tanaman-akibat-kekeringan">Laporan Kerusakan Tanaman Akibat Kekeringan</a></li>

                        <li><a href="/informasi-perubahan-kategori-kekeringan">Informasi Perubahan Kategori Kekeringan</a></li>

                        <li><a href="/laporan-kerusakan-tanaman-akibat-fisiologis">Laporan Kerusakan Tanaman Akibat Fisiologis</a></li>

                        <li><a href="/laporan-kerusakan-tanaman-akibat-bencana-alam">Laporan Kerusakan Tanaman Akibat Bencana Alam</a></li>

                        <li><a href="/keadaan-curah-hujan">Curah Hujan</a></li>

                        <li><a href="/laporan-peringatan-dini">Laporan Peringatan Dini</a></li>

                    </ul>

                </div>

            </li>

        </ul>
        </div>
        </li>

            <li>


                <a href="{{ url('/dashboard-opt') }}"
                class="{{ request()->is('dashboard-opt') ? 'active' : '' }}">

                    <i class="bi bi-bar-chart-fill"></i>

                    Dashboard OPT

                </a>

            </li>

            <li>

                <a href="{{ url('/dashboard-dpi') }}"
                class="{{ request()->is('dashboard-dpi') ? 'active' : '' }}">

                    <i class="bi bi-cloud-rain-heavy-fill"></i>

                    Dashboard DPI

                </a>

            </li>
      
            <li>

                <a href="{{ url('/verifikasi') }}"
                class="{{ request()->is('verifikasi') ? 'active' : '' }}">

                    <i class="bi bi-check2-square"></i>

                    Verifikasi

                </a>

            </li>

            <li>

                <a href="{{ url('/laporan') }}"
                class="{{ request()->is('laporan') ? 'active' : '' }}">

                    <i class="bi bi-file-earmark-text-fill"></i>

                    Laporan

                </a>

            </li>

            <li>

                <a data-bs-toggle="collapse"
                    href="#sistemMenu"
                    aria-expanded="{{ request()->is('user-aplikasi*','role*','permission*','hak-akses*') ? 'true' : 'false' }}">

                    <i class="bi bi-gear-fill"></i>

                    <span>Manajemen Sistem</span>

                    <i class="bi bi-chevron-down ms-auto"></i>

                </a>

                <div class="collapse {{ request()->is('user-aplikasi*','role*','permission*','hak-akses*') ? 'show' : '' }}"
                    id="sistemMenu">

                    <ul class="submenu">

                        <li><a href="/user-aplikasi">User Aplikasi</a></li>
                    </ul>

                </div>

            </li>
        </ul>

        <div class="sidebar-footer">

            <div class="user-box">

                <i class="bi bi-person-circle"></i>

                <div>

                    <b>{{ session('username') }}</b>

                    <br>

                    <small>{{ session('role') }}</small>

                </div>

            </div>

            <a href="/logout" class="logout-btn">

                <i class="bi bi-box-arrow-right"></i>

                Logout

            </a>

        </div>

    </aside>

    <!-- ================= CONTENT ================= -->

    <main class="content">

        <!-- TOPBAR -->

        <div class="topbar">

            <div>

                <h4>@yield('title')</h4>

            </div>

            <div class="top-right">

                <i class="bi bi-calendar-event"></i>

                {{ date('d M Y') }}

                &nbsp;&nbsp;

                <i class="bi bi-person-circle"></i>

                {{ session('username') }}

            </div>

        </div>

        <!-- PAGE -->

        <div class="page-content">

            @yield('content')

        </div>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>