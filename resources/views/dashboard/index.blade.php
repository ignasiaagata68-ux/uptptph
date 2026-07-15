@extends('layouts.admin')

@section('title','Dashboard POPT')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="row mb-4">

        <div class="col-md-12">

            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <h2 class="fw-bold">
                        Dashboard POPT
                    </h2>

                    <p class="text-muted mb-0">
                        Selamat Datang,
                        <b>{{ session('username') }}</b> 👋
                    </p>

                    <small class="text-secondary">
                        Berikut adalah ringkasan aktivitas pencatatan data Anda.
                    </small>

                </div>

            </div>

        </div>

    </div>
    <div class="row mt-4">

    <div class="col-12">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bi bi-grid-fill text-primary"></i>

                    Menu Cepat

                </h5>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-3 mb-3">

                        <a href="{{ route('data.index') }}"class="text-decoration-none text-dark">

                        <div class="card text-center shadow-sm h-100 quick-menu">

                            <div class="card-body">

                                <i class="bi bi-plus-circle-fill text-primary fs-1"></i>

                                <h6 class="mt-3">
                                    Input Data
                                </h6>

                                <small class="text-muted">

                                    Tambah pencatatan baru

                                </small>

                            </div>

                        </div>
                    </a>

                    </div>

                    <div class="col-md-3 mb-3">

                        <div class="card text-center shadow-sm h-100 quick-menu">

                            <div class="card-body">

                                <i class="bi bi-clock-history text-success fs-1"></i>

                                <h6 class="mt-3">

                                    Riwayat

                                </h6>

                                <small class="text-muted">

                                    Lihat riwayat pencatatan

                                </small>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 mb-3">

                        <div class="card text-center shadow-sm h-100 quick-menu">

                            <div class="card-body">

                                <i class="bi bi-bell-fill text-warning fs-1"></i>

                                <h6 class="mt-3">

                                    Notifikasi

                                </h6>

                                <small class="text-muted">

                                    Status dari LPHP

                                </small>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 mb-3">

                        <div class="card text-center shadow-sm h-100 quick-menu">

                            <div class="card-body">

                                <i class="bi bi-bar-chart-fill text-danger fs-1"></i>

                                <h6 class="mt-3">

                                    Statistik

                                </h6>

                                <small class="text-muted">

                                    Statistik bulanan

                                </small>

                            </div>

                        </div>

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
    <!-- Riwayat Pencatatan -->
<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <div class="d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">

                        <i class="bi bi-clock-history text-primary"></i>

                        Riwayat Pencatatan Saya

                    </h5>

                    <a href="#"
                        class="btn btn-sm btn-outline-primary">

                        Lihat Semua

                    </a>

                </div>

            </div>

            <div class="card-body p-0">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

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
                                    class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </td>

                        </tr>

                        <tr>

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
                                    class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </td>

                        </tr>

                        <tr>

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
                                    class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>
</div>
</div>

<!-- Notifikasi LPHP -->
<div class="row mt-4 align-items-stretch">

    <div class="card shadow-sm border-0 h-100">

        <div class="card-header bg-white">

            <h5 class="mb-0">

                <i class="bi bi-bell-fill text-warning"></i>

                Notifikasi LPHP

            </h5>

        </div>

        <div class="card-body d-flex flex-column">

            <div class="border-bottom pb-3 mb-3">

                <div class="d-flex">

                    <div class="me-3">

                        <i class="bi bi-check-circle-fill text-success fs-4"></i>

                    </div>

                    <div>

                        <strong>Pengamatan Persemaian</strong>

                        <br>

                        <small class="text-muted">
                            Telah diverifikasi LPHP
                        </small>

                    </div>

                </div>

            </div>

            <div class="border-bottom pb-3 mb-3">

                <div class="d-flex">

                    <div class="me-3">

                        <i class="bi bi-exclamation-circle-fill text-danger fs-4"></i>

                    </div>

                    <div>

                        <strong>Laporan Kekeringan</strong>

                        <br>

                        <small class="text-danger">
                            Perlu Perbaikan
                        </small>

                    </div>

                </div>

            </div>

            <div>

                <div class="d-flex">

                    <div class="me-3">

                        <i class="bi bi-hourglass-split text-warning fs-4"></i>

                    </div>

                    <div>

                        <strong>Keadaan Serangan OPT</strong>

                        <br>

                        <small class="text-muted">

                            Sedang diverifikasi

                        </small>

                    </div>
                    

                </div>

            </div>
            <div class="mt-auto"></div>

        </div>
        </div>

    </div>
<div class="row mt-4">

    <div class="col-lg-12">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bi bi-bar-chart-fill text-primary"></i>

                    Grafik Aktivitas Pencatatan

                </h5>

            </div>

            <div class="card-body">

                <canvas id="grafikPencatatan" height="90"></canvas>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('grafikPencatatan');

new Chart(ctx,{

    type:'bar',

    data:{

        labels:[
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul'
        ],

        datasets:[{

            label:'Jumlah Pencatatan',

            data:[
                4,
                7,
                6,
                9,
                12,
                8,
                5
            ],

            backgroundColor:'#2563eb',

            borderRadius:8

        }]

    },

    options:{

        responsive:true,

        plugins:{

            legend:{
                display:false
            }

        },

        scales:{

            y:{
                beginAtZero:true
            }

        }

    }

});

</script>

</div>

@endsection