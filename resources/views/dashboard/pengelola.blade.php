@extends('layouts.admin')

@section('title','Dashboard Pengelola')

@section('content')

<div class="container-fluid">

    <!-- Judul -->
    <div class="mb-4">

        <h2 class="fw-bold">
            Dashboard Pengelola Data
        </h2>

        <p class="text-muted">
            Selamat Datang,
            <b>{{ session('username') }}</b>
        </p>

    </div>

    <!-- Statistik -->

    <div class="row mb-4">

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="stat-card">

                <small>Total Data OPT</small>

                <h2 class="text-success">8</h2>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="stat-card">

                <small>Total Data DPI</small>

                <h2 class="text-primary">7</h2>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="stat-card">

                <small>Master Data</small>

                <h2 class="text-warning">12</h2>

            </div>

        </div>

        <div class="col-lg-3 col-md-6 mb-3">

            <div class="stat-card">

                <small>User Sistem</small>

                <h2 class="text-danger">4</h2>

            </div>

        </div>

    </div>

    <!-- Banner -->

    <div class="card banner border-0 mb-4">

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-lg-2 text-center">

                    <img src="{{ asset('images/logo.png') }}">

                </div>

                <div class="col-lg-10">

                    <h2>
                        SISTEM INFORMASI
                    </h2>

                    <h5>
                        Monitoring Organisme Pengganggu Tanaman
                        <br>
                        dan
                        <br>
                        Dampak Perubahan Iklim
                    </h5>

                    <p class="mt-3">

                        Unit Perlindungan Tanaman Pangan dan Hortikultura

                        <br>

                        Provinsi Kalimantan Barat

                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Menu -->

    <div class="row">

        <div class="col-lg-9">

            <div class="row">

                <div class="col-md-4 mb-4">

                    <a href="/dashboard-pengelola" class="btn-dashboard">

                        <div class="card dashboard-card bg-dashboard">

                            <div class="card-body">

                                <div class="dashboard-icon">

                                    <i class="bi bi-speedometer2 text-primary"></i>

                                </div>

                                <h4>Dashboard</h4>

                                <p>
                                    Dashboard OPT dan DPI
                                </p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="col-md-4 mb-4">

                    <a href="/data-opt" class="btn-dashboard">

                        <div class="card dashboard-card bg-opt">

                            <div class="card-body">

                                <div class="dashboard-icon">

                                    <i class="bi bi-bug-fill text-success"></i>

                                </div>

                                <h4>Data OPT</h4>

                                <p>
                                    8 Menu Pengamatan
                                </p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="col-md-4 mb-4">

                    <a href="/data-dpi" class="btn-dashboard">

                        <div class="card dashboard-card bg-dpi">

                            <div class="card-body">

                                <div class="dashboard-icon">

                                    <i class="bi bi-cloud-rain-heavy-fill text-info"></i>

                                </div>

                                <h4>Data DPI</h4>

                                <p>
                                    7 Menu Pengamatan
                                </p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="col-md-4 mb-4">

                    <a href="/master-data" class="btn-dashboard">

                        <div class="card dashboard-card bg-master">

                            <div class="card-body">

                                <div class="dashboard-icon">

                                    <i class="bi bi-database-fill text-warning"></i>

                                </div>

                                <h4>Master Data</h4>

                                <p>
                                    Kelola Data Master
                                </p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="col-md-4 mb-4">

                    <a href="/laporan" class="btn-dashboard">

                        <div class="card dashboard-card bg-laporan">

                            <div class="card-body">

                                <div class="dashboard-icon">

                                    <i class="bi bi-file-earmark-text-fill text-danger"></i>

                                </div>

                                <h4>Laporan</h4>

                                <p>
                                    Laporan OPT & DPI
                                </p>

                            </div>

                        </div>

                    </a>

                </div>

                <div class="col-md-4 mb-4">

                    <a href="/manajemen-sistem" class="btn-dashboard">

                        <div class="card dashboard-card bg-sistem">

                            <div class="card-body">

                                <div class="dashboard-icon">

                                    <i class="bi bi-gear-fill text-secondary"></i>

                                </div>

                                <h4>Manajemen Sistem</h4>

                                <p>
                                    User, Role dan Hak Akses
                                </p>

                            </div>

                        </div>

                    </a>

                </div>

            </div>

        </div>

        <!-- Aktivitas -->

        <div class="col-lg-3">

            <div class="card activity">

                <div class="card-body">

                    <h5 class="mb-3">

                        Aktivitas Sistem

                    </h5>

                    <hr>

                    <p>
                        🟢 Data OPT :
                        <b>8</b>
                    </p>

                    <p>
                        🌧 Data DPI :
                        <b>7</b>
                    </p>

                    <p>
                        📄 Menunggu Verifikasi :
                        <b>18</b>
                    </p>

                    <p>
                        ✅ Diverifikasi :
                        <b>125</b>
                    </p>

                    <p>
                        👤 Login :
                        <br>

                        <b>{{ session('username') }}</b>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection