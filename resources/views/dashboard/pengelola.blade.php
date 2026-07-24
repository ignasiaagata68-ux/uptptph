@extends('layouts.admin')

@section('title', 'Dashboard Pengelola')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="row align-items-center mb-4">

        <div class="col-md-8">
            <h2 class="fw-bold mb-1">
                Dashboard Pengelola Data
            </h2>

            <p class="text-muted mb-0">
                Selamat Datang,
                <strong>{{ session('username') }}</strong>
            </p>
        </div>

    </div>


    <!-- ===========================
            STATISTIK
    ============================ -->

    <div class="row g-4 mb-4">

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon icon-green">

                    <i class="bi bi-building"></i>

                </div>

                <div>

                    <small>Kabupaten / Kota</small>

                    <h2>{{ $jumlahKabupaten }}</h2>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon icon-blue">

                    <i class="bi bi-geo-alt-fill"></i>

                </div>

                <div>

                    <small>Kecamatan</small>

                    <h2>{{ $jumlahKecamatan }}</h2>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon icon-orange">

                    <i class="bi bi-house-door-fill"></i>

                </div>

                <div>

                    <small>Desa</small>

                    <h2>{{ $jumlahDesa }}</h2>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="stat-card">

                <div class="stat-icon icon-purple">

                    <i class="bi bi-person-workspace"></i>

                </div>

                <div>

                    <small>Petugas</small>

                    <h2>{{ $jumlahPetugas }}</h2>

                </div>

            </div>

        </div>

    </div>


    <!-- ===========================
            BANNER
    ============================ -->

    <div class="card banner mb-4 border-0">

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-lg-2 text-center">

                    <img src="{{ asset('images/logo.png') }}" class="img-fluid">

                </div>

                <div class="col-lg-10">

                    <h3 class="fw-bold">

                        SISTEM PENGELOLAAN DATA

                    </h3>

                    <h2 class="fw-bold">

                        SERANGAN ORGANISME PENGGANGGU TANAMAN 
                        TANAMAN PANGAN   

                    </h2>

                    <h5>

                        DAN

                    </h5>

                    <h2 class="fw-bold">

                        DATA DAMPAK PERUBAHAN 
                        IKLIM

                    </h2>

                    <p class="mt-3">

                        Unit Pelaksana Teknis Perlindungan Tanaman Pangan
                        dan Hortikultura

                        <br>

                        DINAS TANAMAN PANGAN DAN 
                        HORTIKULTURA PROVINSI KALIMANTAN BARAT 

                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- ===========================
            QUICK MENU
    ============================ -->

    <div class="row g-4">

        <div class="col-lg-4">

            <a href="{{ url('/master-data') }}" class="btn-dashboard w-100">

                <div class="quick-card">

                    <div class="quick-icon quick-green">

                        <i class="bi bi-database-fill"></i>

                    </div>

                    <h5>

                        Master Data

                    </h5>

                    <p>

                        Kelola seluruh data master sistem.

                    </p>

                </div>

            </a>

        </div>

        <div class="col-lg-4">

            <a href="{{ url('/data-opt') }}" class="btn-dashboard w-100">

                <div class="quick-card">

                    <div class="quick-icon quick-blue">

                        <i class="bi bi-pencil-square"></i>

                    </div>

                    <h5>

                        Pencatatan Data

                    </h5>

                    <p>

                        Input seluruh data hasil pengamatan lapangan.

                    </p>

                </div>

            </a>

        </div>

        <div class="col-lg-4">

            <a href="{{ url('/dashboard-opt') }}" class="btn-dashboard w-100">

                <div class="quick-card">

                    <div class="quick-icon quick-green">

                        <i class="bi bi-bug-fill"></i>

                    </div>

                    <h5>

                        Dashboard OPT

                    </h5>

                    <p>

                        Monitoring data Organisme Pengganggu Tanaman.

                    </p>

                </div>

            </a>

        </div>

        <div class="col-lg-4">

            <a href="{{ url('/dashboard-dpi') }}" class="btn-dashboard w-100">

                <div class="quick-card">

                    <div class="quick-icon quick-cyan">

                        <i class="bi bi-cloud-rain-heavy-fill"></i>

                    </div>

                    <h5>

                        Dashboard DPI

                    </h5>

                    <p>

                        Monitoring data Dampak Perubahan Iklim.

                    </p>

                </div>

            </a>

        </div>
        <div class="col-lg-4">

            <a href="{{ url('/verifikasi') }}" class="btn-dashboard w-100">

                <div class="quick-card">

                    <div class="quick-icon quick-orange">

                        <i class="bi bi-check2-square"></i>

                    </div>

                    <h5>

                        Verifikasi

                    </h5>

                    <p>

                        Verifikasi seluruh data hasil pengamatan sebelum
                        dipublikasikan.

                    </p>

                </div>

            </a>

        </div>

        <div class="col-lg-4">

            <a href="{{ url('/laporan') }}" class="btn-dashboard w-100">

                <div class="quick-card">

                    <div class="quick-icon quick-red">

                        <i class="bi bi-file-earmark-text-fill"></i>

                    </div>

                    <h5>

                        Laporan

                    </h5>

                    <p>

                        Lihat dan cetak laporan hasil pengamatan OPT dan DPI.

                    </p>

                </div>

            </a>

        </div>

        <div class="col-lg-4">

            <a href="{{ url('/manajemen-sistem') }}" class="btn-dashboard w-100">

                <div class="quick-card">

                    <div class="quick-icon quick-purple">

                        <i class="bi bi-gear-fill"></i>

                    </div>

                    <h5>

                        Manajemen Sistem

                    </h5>

                    <p>

                        Kelola pengguna dan hak akses aplikasi.

                    </p>

                </div>

            </a>

        </div>

    </div>

    <!-- ===========================
            INFORMASI
    ============================ -->

    <div class="row mt-4">

        <!-- Aktivitas -->

        <div class="col-lg-6 mb-4">

            <div class="info-box">

                <div class="card-body">

                    <h5>

                        <i class="bi bi-activity text-success"></i>

                        Aktivitas Sistem

                    </h5>

                    <table class="info-table">

                        <tr>

                            <td>

                                <i class="bi bi-building text-success"></i>

                                Kabupaten

                            </td>

                            <td>

                                {{ $jumlahKabupaten }}

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <i class="bi bi-geo-alt-fill text-primary"></i>

                                Kecamatan

                            </td>

                            <td>

                                {{ $jumlahKecamatan }}

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <i class="bi bi-house-fill text-warning"></i>

                                Desa

                            </td>

                            <td>

                                {{ $jumlahDesa }}

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <i class="bi bi-person-workspace text-danger"></i>

                                Petugas

                            </td>

                            <td>

                                {{ $jumlahPetugas }}

                            </td>

                        </tr>

                        <tr>

                            <td>

                                <i class="bi bi-people-fill text-info"></i>

                                User Sistem

                            </td>

                            <td>

                                {{ $jumlahUser }}

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <!-- Informasi -->

        <div class="col-lg-6 mb-4">

            <div class="info-box">

                <div class="card-body">

                    <h5>

                        <i class="bi bi-info-circle-fill text-primary"></i>

                        Informasi Sistem

                    </h5>

                    <table class="info-table">

                        <tr>

                            <td>

                                Periode Aktif

                            </td>

                            <td>

                                {{ $periodeAktif->periode_pengamatan ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <td>

                                Tanggal Mulai

                            </td>

                            <td>

                                {{ $periodeAktif->tgl_mulai ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <td>

                                Tanggal Selesai

                            </td>

                            <td>

                                {{ $periodeAktif->tgl_selesai ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <td>

                                Deadline Pelaporan

                            </td>

                            <td>

                                {{ $periodeAktif->deadline_pelaporan ?? '-' }}

                            </td>

                        </tr>

                        <tr>

                            <td>

                                Login Sebagai

                            </td>

                            <td>

                                {{ session('username') }}

                            </td>

                        </tr>

                        <tr>

                            <td>

                                Role

                            </td>

                            <td>

                                {{ session('role') }}

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection