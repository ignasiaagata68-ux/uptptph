@extends('layouts.admin')

@section('title','Dashboard OPT')

@section('content')

<style>

body{
    background:#f5f7fb;
}

/*======================
HEADER
======================*/

.dashboard-header{

    margin-bottom:25px;

}

.dashboard-title{

    font-size:34px;

    font-weight:700;

    color:#1f2937;

    margin-bottom:4px;

}

.dashboard-subtitle{

    color:#6b7280;

    font-size:15px;

}

/*======================
FILTER
======================*/

.filter-card{

    background:#fff;

    border-radius:18px;

    box-shadow:0 8px 25px rgba(0,0,0,.05);

    padding:20px;

    margin-bottom:25px;

}

.form-label{

    font-size:13px;

    font-weight:600;

    color:#475569;

}

.form-select{

    border-radius:10px;

    height:42px;

}

/*======================
SUMMARY CARD
======================*/

.summary-card{

    background:#fff;

    border-radius:18px;

    padding:18px;

    box-shadow:0 8px 25px rgba(0,0,0,.05);

    transition:.25s;

    height:120px;

}

.summary-card:hover{

    transform:translateY(-6px);

    box-shadow:0 15px 35px rgba(0,0,0,.08);

}

.summary-icon{

    width:58px;

    height:58px;

    border-radius:15px;

    display:flex;

    justify-content:center;

    align-items:center;

    color:#fff;

    font-size:24px;

}

.icon-green{

    background:#16a34a;

}

.icon-orange{

    background:#fb923c;

}

.icon-blue{

    background:#2563eb;

}

.icon-purple{

    background:#7c3aed;

}

.icon-cyan{

    background:#0891b2;

}

.summary-title{

    color:#64748b;

    font-size:13px;

}

.summary-number{

    font-size:28px;

    font-weight:700;

    color:#0f172a;

    margin-top:5px;

}

.summary-desc{

    color:#16a34a;

    font-size:12px;

}

.graph-card{

    background:#fff;

    border-radius:18px;

    padding:20px;

    box-shadow:0 8px 25px rgba(0,0,0,.05);

    height:100%;

}

.graph-title{

    font-size:16px;

    font-weight:600;

    color:#1f2937;

    margin-bottom:15px;

}

.chart-area{

    position:relative;

    height:270px;

}

/* ==========================
   GRAPH
========================== */

.graph-card{

    background:#fff;

    border-radius:18px;

    box-shadow:0 8px 25px rgba(0,0,0,.05);

    padding:18px;

    height:100%;

}

.graph-title{

    font-size:15px;

    font-weight:600;

    color:#374151;

    margin-bottom:15px;

}

.chart-container{

    position:relative;

    width:100%;

    height:300px;

}

/* ==========================
   TABLE DASHBOARD
========================== */

.dashboard-table{

    background:#fff;

    border-radius:18px;

    box-shadow:0 8px 25px rgba(0,0,0,.05);

    padding:20px;

}

.dashboard-table table{

    margin-bottom:0;

}

.dashboard-table th{

    border:none;

    background:#f8fafc;

    font-size:13px;

    color:#64748b;

}

.dashboard-table td{

    vertical-align:middle;

    font-size:14px;

}

.opt-card{

    background:#fff;

    border-radius:18px;

    box-shadow:0 8px 25px rgba(0,0,0,.05);

    padding:20px;

    height:100%;

}

.opt-item{

    margin-bottom:18px;

}

.opt-item:last-child{

    margin-bottom:0;

}

.opt-name{

    display:flex;

    justify-content:space-between;

    font-size:14px;

    margin-bottom:6px;

}

.progress{

    height:8px;

    border-radius:10px;

}

/* ==========================
   BOTTOM CARD
========================== */

.bottom-card{

    background:#fff;

    border-radius:18px;

    box-shadow:0 8px 25px rgba(0,0,0,.05);

    padding:20px;

    height:100%;

}

.summary-item{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:14px 0;

    border-bottom:1px solid #edf2f7;

}

.summary-item:last-child{

    border-bottom:none;

}

.summary-title{

    color:#6b7280;

    font-size:14px;

}

.summary-value{

    font-size:22px;

    font-weight:700;

    color:#16a34a;

}

.chart-bottom{

    position:relative;

    height:280px;

}

</style>

<div class="container-fluid">

    {{-- HEADER --}}

    <div class="dashboard-header">

        <div class="dashboard-title">

            Dashboard OPT

        </div>

        <div class="dashboard-subtitle">

            Sistem Pengelolaan Data Serangan Organisme Pengganggu Tanaman

        </div>

    </div>

    {{-- FILTER --}}

    <div class="filter-card">

        <div class="row g-3">

            <div class="col-lg-2">

                <label class="form-label">

                    Kabupaten

                </label>

                <select class="form-select">

                    <option>Semua Kabupaten</option>

                </select>

            </div>

            <div class="col-lg-3">

                <label class="form-label">

                    Komoditas

                </label>

                <select class="form-select">

                    <option>Semua Komoditas</option>

                </select>

            </div>

            <div class="col-lg-2">

                <label class="form-label">

                    Bulan

                </label>

                <select class="form-select">

                    <option>Januari</option>

                </select>

            </div>

            <div class="col-lg-2">

                <label class="form-label">

                    Tahun

                </label>

                <select class="form-select">

                    <option>2025</option>

                </select>

            </div>

            <div class="col-lg-2 d-flex align-items-end">

                <button class="btn btn-success w-100">

                    Cari

                </button>

            </div>

            <div class="col-lg-1 d-flex align-items-end">

                <button class="btn btn-outline-secondary w-100">

                    Reset

                </button>

            </div>

        </div>

    </div>

    {{-- SUMMARY --}}

    <div class="row g-4">

        <div class="col-lg">

            <div class="summary-card">

                <div class="d-flex">

                    <div class="summary-icon icon-green">

                        <i class="bi bi-bug-fill"></i>

                    </div>

                    <div class="ms-3">

                        <div class="summary-title">

                            Total Luas Serangan

                        </div>

                        <div class="summary-number">

                            5.208,19 Ha

                        </div>

                        <div class="summary-desc">

                            ↑ 18,6% dari bulan lalu

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg">

            <div class="summary-card">

                <div class="d-flex">

                    <div class="summary-icon icon-orange">

                        <i class="bi bi-exclamation-triangle-fill"></i>

                    </div>

                    <div class="ms-3">

                        <div class="summary-title">

                            Luas Puso

                        </div>

                        <div class="summary-number">

                            4,66 Ha

                        </div>

                        <div class="summary-desc text-danger">

                            ↓ 12,4%

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg">

            <div class="summary-card">

                <div class="d-flex">

                    <div class="summary-icon icon-blue">

                        <i class="bi bi-shield-check"></i>

                    </div>

                    <div class="ms-3">

                        <div class="summary-title">

                            Total Pengendalian

                        </div>

                        <div class="summary-number">

                            8.380,78 Ha

                        </div>

                        <div class="summary-desc">

                            ↑ 15,2%

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg">

            <div class="summary-card">

                <div class="d-flex">

                    <div class="summary-icon icon-purple">

                        <i class="bi bi-file-earmark-text-fill"></i>

                    </div>

                    <div class="ms-3">

                        <div class="summary-title">

                            Jumlah Pengamatan

                        </div>

                        <div class="summary-number">

                            2.487

                        </div>

                        <div class="summary-desc">

                            ↑ 20,1%

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg">

            <div class="summary-card">

                <div class="d-flex">

                    <div class="summary-icon icon-cyan">

                        <i class="bi bi-geo-alt-fill"></i>

                    </div>

                    <div class="ms-3">

                        <div class="summary-title">

                            Kabupaten Terpantau

                        </div>

                        <div class="summary-number">

                            14

                        </div>

                        <div class="summary-desc">

                            dari 14 Kabupaten

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="row mt-4">

    {{-- Grafik Luas Serangan --}}
    <div class="col-lg-5">

        <div class="graph-card">

            <div class="graph-title">

                Luas Serangan OPT (Ha)

            </div>

            <div class="chart-container">

                <canvas id="chartLuas"></canvas>

            </div>

        </div>

    </div>

    {{-- Grafik Kabupaten --}}
    <div class="col-lg-3">

        <div class="graph-card">

            <div class="graph-title">

                Serangan per Kabupaten

            </div>

            <div class="chart-container">

                <canvas id="chartKabupaten"></canvas>

            </div>

        </div>

    </div>

    {{-- Grafik Jumlah Serangan --}}
    <div class="col-lg-4">

        <div class="graph-card">

            <div class="graph-title">

                Jumlah Serangan OPT

            </div>

            <div class="chart-container">

                <canvas id="chartJumlah"></canvas>

            </div>

        </div>

    </div>

</div>

    <div class="row mt-4">

    {{-- DATA TERBARU --}}
    <div class="col-lg-8">

        <div class="dashboard-table">

            <h5 class="mb-3">

                Data Pengamatan Terbaru

            </h5>

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>Tanggal</th>

                        <th>Kabupaten</th>

                        <th>Komoditas</th>

                        <th>OPT</th>

                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>20 Jul 2026</td>

                        <td>Sekadau</td>

                        <td>Padi</td>

                        <td>Wereng</td>

                        <td>
                            <span class="badge badge-success">
                                Terverifikasi
                            </span>
                        </td>

                    </tr>

                    <tr>

                        <td>20 Jul 2026</td>

                        <td>Sintang</td>

                        <td>Jagung</td>

                        <td>Tikus</td>

                        <td>
                            <span class="badge badge-warning">
                                Menunggu
                            </span>
                        </td>

                    </tr>

                    <tr>

                        <td>19 Jul 2026</td>

                        <td>Ketapang</td>

                        <td>Padi</td>

                        <td>Penggerek</td>

                        <td>
                            <span class="badge badge-danger">
                                Perbaikan
                            </span>
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    {{-- TOP 5 OPT --}}
    <div class="col-lg-4">

        <div class="opt-card">

            <h5 class="mb-4">

                Top 5 OPT

            </h5>

            <div class="opt-item">

                <div class="opt-name">

                    <span>Wereng</span>

                    <span>92%</span>

                </div>

                <div class="progress">

                    <div class="progress-bar bg-success"

                        style="width:92%">

                    </div>

                </div>

            </div>

            <div class="opt-item">

                <div class="opt-name">

                    <span>Tikus</span>

                    <span>80%</span>

                </div>

                <div class="progress">

                    <div class="progress-bar bg-primary"

                        style="width:80%">

                    </div>

                </div>

            </div>

            <div class="opt-item">

                <div class="opt-name">

                    <span>Penggerek</span>

                    <span>65%</span>

                </div>

                <div class="progress">

                    <div class="progress-bar bg-warning"

                        style="width:65%">

                    </div>

                </div>

            </div>

            <div class="opt-item">

                <div class="opt-name">

                    <span>Ulat Grayak</span>

                    <span>45%</span>

                </div>

                <div class="progress">

                    <div class="progress-bar bg-danger"

                        style="width:45%">

                    </div>

                </div>

            </div>

            <div class="opt-item">

                <div class="opt-name">

                    <span>Keong Mas</span>

                    <span>30%</span>

                </div>

                <div class="progress">

                    <div class="progress-bar bg-info"

                        style="width:30%">

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<div class="row mt-4">

    {{-- Ringkasan --}}
    <div class="col-lg-4">

        <div class="bottom-card">

            <h5 class="mb-4">

                Ringkasan Pengendalian

            </h5>

            <div class="summary-item">

                <div>

                    <div class="summary-title">

                        Luas Dikendalikan

                    </div>

                </div>

                <div class="summary-value">

                    2.548 Ha

                </div>

            </div>

            <div class="summary-item">

                <div>

                    <div class="summary-title">

                        Luas Belum Dikendalikan

                    </div>

                </div>

                <div class="summary-value text-danger">

                    432 Ha

                </div>

            </div>

            <div class="summary-item">

                <div>

                    <div class="summary-title">

                        Persentase Pengendalian

                    </div>

                </div>

                <div class="summary-value text-primary">

                    85%

                </div>

            </div>

            <div class="summary-item">

                <div>

                    <div class="summary-title">

                        Total Laporan

                    </div>

                </div>

                <div class="summary-value">

                    5.208

                </div>

            </div>

        </div>

    </div>

    {{-- Grafik --}}
    <div class="col-lg-8">

        <div class="bottom-card">

            <h5 class="mb-4">

                Tren Serangan 5 Tahun Terakhir

            </h5>

            <div class="chart-bottom">

                <canvas id="chartTrend5"></canvas>

            </div>

        </div>

    </div>

</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

// ==============================
// GRAFIK LUAS SERANGAN
// ==============================

new Chart(document.getElementById('chartLuas'), {

    type: 'line',

    data: {

        labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul'],

        datasets: [

            {
                label: 'Ringan',
                data: [1200,1500,1600,1800,1700,1950,2100],
                borderColor: '#16a34a',
                tension: 0.4
            },

            {
                label: 'Sedang',
                data: [700,900,950,1100,1050,1200,1300],
                borderColor: '#f59e0b',
                tension: 0.4
            },

            {
                label: 'Berat',
                data: [250,300,320,400,380,420,500],
                borderColor: '#ef4444',
                tension: 0.4
            },

            {
                label: 'Puso',
                data: [20,30,35,40,45,50,60],
                borderColor: '#7c3aed',
                tension: 0.4
            }

        ]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false

    }

});


// ==============================
// SERANGAN PER KABUPATEN
// ==============================

new Chart(document.getElementById('chartKabupaten'), {

    type: 'bar',

    data: {

        labels: [

            'Sintang',

            'Sanggau',

            'Sekadau',

            'Ketapang',

            'Kubu Raya'

        ],

        datasets: [

            {

                data: [120,95,80,65,40]

            }

        ]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        indexAxis: 'y',

        plugins: {

            legend: {

                display: false

            }

        }

    }

});


// ==============================
// JUMLAH SERANGAN
// ==============================

new Chart(document.getElementById('chartJumlah'), {

    type: 'line',

    data: {

        labels: [

            '2021',

            '2022',

            '2023',

            '2024',

            '2025'

        ],

        datasets: [

            {

                label: 'Jumlah',

                data: [850,1200,1450,1800,2100],

                borderColor: '#2563eb',

                backgroundColor: 'rgba(37,99,235,.12)',

                fill: true,

                tension: 0.4

            }

        ]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {

                display: false

            }

        }

    }

});


// ==============================
// TREN 5 TAHUN
// ==============================

new Chart(document.getElementById('chartTrend5'), {

    type: 'line',

    data: {

        labels: [

            '2021',

            '2022',

            '2023',

            '2024',

            '2025'

        ],

        datasets: [

            {

                label: 'Luas Serangan',

                data: [1800,2500,3100,2800,3650],

                borderColor: '#16a34a',

                backgroundColor: 'rgba(22,163,74,.10)',

                fill: true,

                tension: 0.4

            }

        ]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {

                display: false

            }

        }

    }

});

</script>

@endsection

