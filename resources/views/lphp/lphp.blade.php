@extends('layouts.admin')

@section('title','Dashboard LPHP')

@section('content')

<div class="container-fluid">
    <style>

        body{
            background:#f4f6fb;
        }

        /*==========================
        CARD
        ==========================*/

        .dashboard-card{
            border:none;
            border-radius:16px;
            box-shadow:0 3px 15px rgba(0,0,0,.06);
            transition:.3s;
            overflow:hidden;
        }

        .dashboard-card:hover{
            transform:translateY(-3px);
            box-shadow:0 8px 25px rgba(0,0,0,.10);
        }

        /*==========================
        HEADER
        ==========================*/

        .dashboard-header h2{

            font-size:30px;

            font-weight:700;

            color:#1e293b;

        }

        .dashboard-header p{

            margin-bottom:2px;

            color:#64748b;

        }

        .dashboard-header small{

            color:#94a3b8;

        }

        /*==========================
        SECTION TITLE
        ==========================*/

        .card-header{

            background:#fff!important;

            border-bottom:1px solid #eef2f7;

            font-weight:600;

        }

        /*==========================
        QUICK MENU
        ==========================*/

        .quick-menu{

            border:none;

            border-radius:16px;

            transition:.3s;

            cursor:pointer;

        }

        .quick-menu:hover{

            transform:translateY(-6px);

            box-shadow:0 12px 25px rgba(37,99,235,.12);

        }

        .quick-menu i{

            transition:.3s;

        }

        .quick-menu:hover i{

            transform:scale(1.15);

        }

        .quick-menu h6{

            font-weight:700;

            margin-top:15px;

        }

        .quick-menu small{

            color:#94a3b8;

        }

        /*==========================
        STAT CARD
        ==========================*/

        .stat-card{

            border:none;

            border-radius:16px;

            box-shadow:0 2px 12px rgba(0,0,0,.05);

            transition:.3s;

        }

        .stat-card:hover{

            transform:translateY(-4px);

        }

        .stat-icon{

            width:65px;

            height:65px;

            border-radius:50%;

            display:flex;

            align-items:center;

            justify-content:center;

            font-size:28px;

        }

        /*==========================
        TABLE
        ==========================*/

        .table{

            margin-bottom:0;

        }

        .table thead{

            background:#f8fafc;

        }

        .table thead th{

            border:none;

            font-size:14px;

            color:#475569;

        }

        .table tbody td{

            vertical-align:middle;

        }

        .table-hover tbody tr:hover{

            background:#f8fbff;

        }

        /*==========================
        BADGE
        ==========================*/

        .badge{

            border-radius:30px;

            padding:7px 14px;

            font-weight:600;

        }

        /*==========================
        NOTIFIKASI
        ==========================*/

        .notification-item{

            display:flex;

            align-items:flex-start;

            gap:15px;

            padding:18px 0;

            border-bottom:1px solid #eef2f7;

        }

        .notification-item:last-child{

            border-bottom:none;

        }

        .notification-item i{

            font-size:22px;

        }

        /*==========================
        BUTTON
        ==========================*/

        .btn{

            border-radius:10px;

        }

        /*==========================
        CARD BODY
        ==========================*/

        .card-body{

            padding:22px;

        }

        .dashboard-header{

            border-left:5px solid #2563eb;

        }

        .dashboard-header .text-end{

            min-width:170px;

        }

        .dashboard-header .fw-semibold{

            font-size:15px;

            letter-spacing:.5px;

        }

                /*==================================
        MENU CEPAT
        ===================================*/

        .menu-card{

            border:none;

            border-radius:16px;

            background:#fff;

            transition:.25s ease;

            cursor:pointer;

            text-align:center;

            height:180px;

            display:flex;

            justify-content:center;

            align-items:center;

            box-shadow:0 4px 12px rgba(0,0,0,.05);

        }

        .menu-card:hover{

            transform:translateY(-6px);

            box-shadow:0 12px 24px rgba(37,99,235,.12);

        }

        .menu-icon{

            width:62px;

            height:62px;

            border-radius:16px;

            display:flex;

            align-items:center;

            justify-content:center;

            margin:0 auto 18px;

            font-size:28px;

        }

        .menu-blue{

            background:#eaf2ff;

            color:#2563eb;

        }

        .menu-green{

            background:#ecfdf5;

            color:#16a34a;

        }

        .menu-yellow{

            background:#fff8e7;

            color:#f59e0b;

        }

        .menu-card h5{

            font-weight:700;

            margin-bottom:8px;

            color:#1e293b;

        }

        .menu-card p{

            font-size:13px;

            color:#64748b;

            margin-bottom:0;

        }

        /*==================================
        RIWAYAT
        ===================================*/

        .history-card{

            border:none;

            border-radius:16px;

            overflow:hidden;

            box-shadow:0 4px 15px rgba(0,0,0,.05);

        }

        .history-card .card-header{

            padding:18px 22px;

        }

        .history-card .card-header h5{

            font-weight:700;

            color:#1e293b;

        }

        .history-card .btn{

            border-radius:10px;

            font-size:13px;

            padding:6px 14px;

        }

        .history-table thead{

            background:#f8fafc;

        }

        .history-table thead th{

            font-size:13px;

            color:#64748b;

            text-transform:uppercase;

            letter-spacing:.5px;

            border-bottom:none;

        }

        .history-table tbody tr{

            transition:.25s;

        }

        .history-table tbody tr:hover{

            background:#f5f9ff;

        }

        .history-table td{

            padding:18px 16px;

        }

        .history-table .btn{

            width:36px;

            height:36px;

            display:flex;

            align-items:center;

            justify-content:center;

            margin:auto;

        }

        .badge{

            padding:8px 14px;

            border-radius:30px;

            font-size:12px;

            font-weight:600;

        }

        .history-table .badge{

            min-width:110px;

            text-align:center;

            padding:8px 14px;

            font-size:12px;

        }

        .history-table tbody tr{

            transition:.25s;

        }

        .history-table tbody tr:hover{

            background:#eef6ff;

            transform:scale(1.003);

        }

        .history-table tbody td{

            border-top:1px solid #eef2f7;

        }
    </style>

    <!-- Header -->
    <div class="row mb-4">

    <div class="col-12">

        <div class="card dashboard-card dashboard-header">

            <div class="card-body d-flex justify-content-between align-items-center">

                <div>

                    <h2 class="mb-2">

                        Dashboard POPT

                    </h2>

                    <p>

                        Selamat Datang,

                        <strong>{{ session('username') }}</strong>

                        👋

                    </p>

                    <small>

                        Berikut adalah ringkasan aktivitas pencatatan data Anda.

                    </small>

                </div>

                <div class="text-end">

                    <div class="text-muted small">

                        {{ now()->translatedFormat('d F Y') }}

                    </div>

                    <div class="fw-semibold text-primary">

                        POPT

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<div class="card-body">

    <div class="row">

        <div class="col-md-4 mb-3">

            <a href="{{ route('data.index') }}" class="text-decoration-none">

                <div class="menu-card">

                    <div>

                        <div class="menu-icon menu-blue">
                            <i class="bi bi-plus-circle-fill"></i>
                        </div>

                        <h5>Input Data</h5>

                        <p>Tambah pencatatan baru</p>

                    </div>

                </div>

            </a>

        </div>

        <div class="col-md-4 mb-3">

            <div class="menu-card">

                <div>

                    <div class="menu-icon menu-green">
                        <i class="bi bi-clock-history"></i>
                    </div>

                    <h5>Riwayat</h5>

                    <p>Lihat riwayat pencatatan</p>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="menu-card">

                <div>

                    <div class="menu-icon menu-yellow">
                        <i class="bi bi-bell-fill"></i>
                    </div>

                    <h5>Notifikasi</h5>

                    <p>Status dari LPHP</p>

                </div>

            </div>

        </div>

    </div>

</div>

    <!-- Card Statistik -->
    <div class="row g-4">

        <div class="col-lg-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">

                            <i class="bi bi-clipboard-data fs-2 text-primary"></i>

                        </div>

                        <div>

                            <h6 class="mb-1">
                                Pengamatan Bulan Ini
                            </h6>

                            <h2 class="text-primary fw-bold">
                                {{ $jumlahPengamatan }}
                            </h2>

                            <small class="text-muted">
                                Data
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        
        <div class="col-lg-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">

                            <i class="bi bi-clock-history fs-2 text-warning"></i>

                        </div>

                        <div>

                            <h6 class="mb-1">
                                Menunggu Verifikasi
                            </h6>

                            <h2 class="text-warning fw-bold">
                                0
                            </h2>

                            <small class="text-muted">
                                Data
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">

                            <i class="bi bi-check-circle fs-2 text-success"></i>

                        </div>

                        <div>

                            <h6 class="mb-1">
                                Terverifikasi
                            </h6>

                            <h2 class="text-success fw-bold">
                                0
                            </h2>

                            <small class="text-muted">
                                Data
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center">

                        <div class="rounded-circle bg-danger bg-opacity-10 p-3 me-3">

                            <i class="bi bi-exclamation-triangle fs-2 text-danger"></i>

                        </div>

                        <div>

                            <h6 class="mb-1">
                                Perlu Perbaikan
                            </h6>

                            <h2 class="text-danger fw-bold">
                                0
                            </h2>

                            <small class="text-muted">
                                Data
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>
</div>


    </div>
    <!-- Riwayat Pencatatan -->
<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card history-card">

            <div class="card-header bg-white">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h5 class="mb-1 fw-bold">

                            <i class="bi bi-clock-history text-primary me-2"></i>

                            Riwayat Pencatatan Saya

                        </h5>

                        <small class="text-muted">

                            Daftar pencatatan yang telah Anda lakukan.

                        </small>

                    </div>

                    <a href="#"
                        class="btn btn-primary">

                        <i class="bi bi-arrow-right-circle me-1"></i>

                        Lihat Semua

                    </a>

                </div>

            </div>

            <div class="card-body p-0">

                <table class="table table-hover align-middle mb-0 history-table">

                    <thead>

                        <tr>
                            <th width="60">No</th>


                            <th width="120">
                                Tanggal
                            </th>

                            <th>
                                Formulir
                            </th>

                            <th width="120">
                                Komoditas
                            </th>

                            <th width="130">
                                Status
                            </th>

                            <th width="80" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>12 Jul 2026</td>

                            <td>Pengamatan Persemaian Padi</td>

                            <td>Padi</td>

                            <td>

                                <span class="badge bg-success">

                                    Terverifikasi

                                </span>

                            </td>

                            <td class="text-center">

                                <button
                                    class="btn btn-outline-primary rounded-circle">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </td>

                        </tr>

                        <tr>
                            <td>2</td>
                            <td>11 Jul 2026</td>

                            <td>Keadaan Serangan OPT</td>

                            <td>Padi</td>

                            <td>

                                <span class="badge bg-warning text-dark">

                                    Menunggu

                                </span>

                            </td>

                            <td class="text-center">

                                <button
                                    class="btn btn-outline-primary rounded-circle">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </td>

                        </tr>

                        <tr>
                            <td>3</td>
                            <td>10 Jul 2026</td>

                            <td>Laporan Kekeringan</td>

                            <td>Padi</td>

                            <td>

                                <span class="badge bg-danger">

                                    Perlu Perbaikan

                                </span>

                            </td>

                            <td class="text-center">

                                <button
                                    class="btn btn-outline-primary rounded-circle">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>
</div>
</div>


@endsection