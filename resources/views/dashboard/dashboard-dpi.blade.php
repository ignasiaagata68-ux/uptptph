@extends('layouts.admin')

@section('title', 'Dashboard DPI')

@section('content')

<style>

body{

    background:#f5f7fb;

}

.page-title{

    font-size:34px;

    font-weight:700;

    color:#1f2937;

}

.page-subtitle{

    color:#64748b;

    font-size:15px;

    margin-top:-6px;

}

.filter-card{

    background:#fff;

    border-radius:18px;

    padding:20px;

    box-shadow:0 10px 30px rgba(0,0,0,.05);

    margin-top:25px;

}

.filter-label{

    font-size:13px;

    color:#64748b;

    margin-bottom:6px;

    font-weight:600;

}

.form-control,

.form-select{

    height:42px;

    border-radius:10px;

}

.btn-search{

    width:100%;

    height:42px;

    background:#0d6efd;

    color:white;

    border:none;

    border-radius:10px;

    font-weight:600;

}

.btn-reset{

    width:100%;

    height:42px;

    border-radius:10px;

}

.section-title{

    font-size:24px;

    font-weight:700;

    color:#2563eb;

    margin-top:35px;

    margin-bottom:20px;

}

.summary-card{

    background:#fff;

    border-radius:18px;

    box-shadow:0 10px 30px rgba(0,0,0,.05);

    padding:20px;

    display:flex;

    align-items:center;

}

.summary-icon{

    width:60px;

    height:60px;

    border-radius:14px;

    display:flex;

    align-items:center;

    justify-content:center;

    color:white;

    font-size:24px;

    margin-right:18px;

}

.summary-title{

    color:#64748b;

    font-size:14px;

}

.summary-value{

    font-size:30px;

    font-weight:700;

    color:#1f2937;

}

.summary-year{

    color:#16a34a;

    font-size:13px;

}

.chart-card{

    background:#fff;

    border-radius:18px;

    box-shadow:0 10px 30px rgba(0,0,0,.05);

    padding:20px;

    margin-top:20px;

    height:100%;

}

.chart-title{

    font-size:15px;

    font-weight:700;

    color:#1f2937;

    margin-bottom:15px;

}

.chart-subtitle{

    font-size:12px;

    color:#64748b;

    margin-top:-10px;

    margin-bottom:20px;

}

.chart-box{

    position:relative;

    height:280px;

}

.table-dashboard{

    font-size:13px;

}

.table-dashboard th{

    background:#f8fafc;

    color:#64748b;

    border:none;

}

.table-dashboard td{

    vertical-align:middle;

}

.link-all{

    float:right;

    font-size:13px;

    text-decoration:none;

}

</style>

<div class="container-fluid">

<div class="page-title">

Dashboard DPI

</div>

<div class="page-subtitle">

Sistem Pengelolaan Data Dampak Perubahan Iklim

</div>

<div class="filter-card">

<div class="row">

<div class="col-lg-2">

<div class="filter-label">

Cari Lokasi

</div>

<input class="form-control" placeholder="Cari lokasi...">

</div>

<div class="col-lg-2">

<div class="filter-label">

Kabupaten

</div>

<select class="form-select">

<option>Pilih Kabupaten</option>

</select>

</div>

<div class="col-lg-1">

<div class="filter-label">

Bulan

</div>

<select class="form-select">

<option>Bulan</option>

</select>

</div>

<div class="col-lg-2">

<div class="filter-label">

Periode

</div>

<select class="form-select">

<option>Periode</option>

</select>

</div>

<div class="col-lg-1">

<div class="filter-label">

Tahun

</div>

<select class="form-select">

<option>2025</option>

</select>

</div>

<div class="col-lg-2">

<div class="filter-label">

Jenis DPI

</div>

<select class="form-select">

<option>Semua</option>

</select>

</div>

<div class="col-lg-1 d-flex align-items-end">

<button class="btn-search">

Cari

</button>

</div>

<div class="col-lg-1 d-flex align-items-end">

<button class="btn btn-light btn-reset">

Reset

</button>

</div>

</div>

</div>

<div class="section-title">

DPI BANJIR

</div>

<div class="row">

<div class="col-lg-3">

<div class="summary-card">

<div class="summary-icon bg-primary">

🌊

</div>

<div>

<div class="summary-title">

Luas Terkena Banjir (LTT)

</div>

<div class="summary-value">

7.905 Ha

</div>

<div class="summary-year">

● Data Tahun 2025

</div>

</div>

</div>

</div>

<div class="col-lg-3">

<div class="summary-card">

<div class="summary-icon bg-success">

🌱

</div>

<div>

<div class="summary-title">

Luas Tambah Puso (LTP)

</div>

<div class="summary-value">

1.402 Ha

</div>

<div class="summary-year">

● Data Tahun 2025

</div>

</div>

</div>

</div>

<div class="col-lg-3">

<div class="summary-card">

<div class="summary-icon bg-warning">

⚠

</div>

<div>

<div class="summary-title">

Sisa Puso Lama (LPSO)

</div>

<div class="summary-value">

1.246 Ha

</div>

<div class="summary-year">

● Data Tahun 2025

</div>

</div>

</div>

</div>

<div class="col-lg-3">

<div class="summary-card">

<div class="summary-icon bg-purple">

📄

</div>

<div>

<div class="summary-title">

Keterangan Data

</div>

<div style="font-size:13px">

• LTT : Luas terkena banjir

<br>

• LTP : Luas tambah puso

<br>

• LPSO : Sisa puso lama

</div>

</div>

</div>

</div>
<div class="row mt-3">

    {{-- Grafik Bulanan --}}
    <div class="col-lg-4">

        <div class="chart-card">

            <div class="chart-title">

                Grafik LTT (Luas Terkena Banjir)

            </div>

            <div class="chart-subtitle">

                Per Bulan Tahun 2025

            </div>

            <div class="chart-box">

                <canvas id="banjirBulanan"></canvas>

            </div>

        </div>

    </div>

    {{-- Grafik Kabupaten --}}
    <div class="col-lg-4">

        <div class="chart-card">

            <div class="chart-title">

                Grafik LTT per Kabupaten

            </div>

            <div class="chart-subtitle">

                Tahun 2025

            </div>

            <div class="chart-box">

                <canvas id="banjirKabupaten"></canvas>

            </div>

        </div>

    </div>

    {{-- Tabel --}}
    <div class="col-lg-4">

        <div class="chart-card">

            <div class="chart-title">

                Data Pencatatan Banjir Tahun 2025

                <a href="#" class="link-all">

                    Lihat semua

                </a>

            </div>

            <table class="table table-sm table-dashboard">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Kabupaten</th>

                        <th>LTT</th>

                        <th>LTP</th>

                        <th>LPSO</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>1</td>

                        <td>Kubu Raya</td>

                        <td>120</td>

                        <td>25</td>

                        <td>18</td>

                    </tr>

                    <tr>

                        <td>2</td>

                        <td>Sanggau</td>

                        <td>85</td>

                        <td>12</td>

                        <td>9</td>

                    </tr>

                    <tr>

                        <td>3</td>

                        <td>Bengkayang</td>

                        <td>210</td>

                        <td>32</td>

                        <td>28</td>

                    </tr>

                    <tr>

                        <td>4</td>

                        <td>Ketapang</td>

                        <td>150</td>

                        <td>26</td>

                        <td>18</td>

                    </tr>

                    <tr>

                        <td>5</td>

                        <td>Sintang</td>

                        <td>300</td>

                        <td>45</td>

                        <td>30</td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>
    <div class="section-title text-warning">

    DPI KEKERINGAN

</div>

<div class="row">

    <div class="col-lg-3">

        <div class="summary-card">

            <div class="summary-icon bg-warning">

                ☀️

            </div>

            <div>

                <div class="summary-title">

                    Luas Kekeringan (LTJ)

                </div>

                <div class="summary-value">

                    8.762 Ha

                </div>

                <div class="summary-year">

                    ● Data Tahun 2025

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="summary-card">

            <div class="summary-icon bg-success">

                🌱

            </div>

            <div>

                <div class="summary-title">

                    Luas Tambah Puso (LTP)

                </div>

                <div class="summary-value">

                    1.432 Ha

                </div>

                <div class="summary-year">

                    ● Data Tahun 2025

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="summary-card">

            <div class="summary-icon bg-warning">

                ⚠️

            </div>

            <div>

                <div class="summary-title">

                    Sisa Puso (SPPS)

                </div>

                <div class="summary-value">

                    1.125 Ha

                </div>

                <div class="summary-year">

                    ● Data Tahun 2025

                </div>

            </div>

        </div>

    </div>

    <div class="col-lg-3">

        <div class="summary-card">

            <div class="summary-icon bg-purple">

                📄

            </div>

            <div>

                <div class="summary-title">

                    Keterangan Data

                </div>

                <div style="font-size:13px">

                    • LTJ : Luas Kekeringan

                    <br>

                    • LTP : Luas tambah puso

                    <br>

                    • SPPS : Sisa puso

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row mt-3">

    <div class="col-lg-4">

        <div class="chart-card">

            <div class="chart-title">

                Grafik LTJ (Luas Kekeringan)

            </div>

            <div class="chart-subtitle">

                Per Bulan Tahun 2025

            </div>

            <div class="chart-box">

                <canvas id="keringBulanan"></canvas>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="chart-card">

            <div class="chart-title">

                Grafik LTJ per Kabupaten

            </div>

            <div class="chart-subtitle">

                Tahun 2025

            </div>

            <div class="chart-box">

                <canvas id="keringKabupaten"></canvas>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="chart-card">

            <div class="chart-title">

                Data Pencatatan Kekeringan Tahun 2025

                <a href="#" class="link-all">

                    Lihat semua

                </a>

            </div>

            <table class="table table-sm table-dashboard">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Kabupaten</th>

                        <th>LTJ</th>

                        <th>LTP</th>

                        <th>SPPS</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>1</td>

                        <td>Kapuas Hulu</td>

                        <td>145</td>

                        <td>20</td>

                        <td>15</td>

                    </tr>

                    <tr>

                        <td>2</td>

                        <td>Sintang</td>

                        <td>98</td>

                        <td>18</td>

                        <td>12</td>

                    </tr>

                    <tr>

                        <td>3</td>

                        <td>Sambas</td>

                        <td>210</td>

                        <td>25</td>

                        <td>18</td>

                    </tr>

                    <tr>

                        <td>4</td>

                        <td>Kubu Raya</td>

                        <td>170</td>

                        <td>22</td>

                        <td>14</td>

                    </tr>

                    <tr>

                        <td>5</td>

                        <td>Ketapang</td>

                        <td>160</td>

                        <td>26</td>

                        <td>17</td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>
<div class="row mt-4">

    {{-- Grafik 5 Tahun --}}
    <div class="col-lg-4">

        <div class="chart-card">

            <div class="chart-title">

                Data 5 Tahun Terakhir (LTT & LTJ)

            </div>

            <div class="chart-box">

                <canvas id="chart5Tahun"></canvas>

            </div>

        </div>

    </div>

    {{-- Donut --}}
    <div class="col-lg-4">

        <div class="chart-card">

            <div class="chart-title">

                Perbandingan Banjir vs Kekeringan Tahun 2025

            </div>

            <div class="chart-box">

                <canvas id="chartDonut"></canvas>

            </div>

        </div>

    </div>

    {{-- Grafik Puso --}}
    <div class="col-lg-4">

        <div class="chart-card">

            <div class="chart-title">

                Data 5 Tahun Terakhir (LTP & Puso)

            </div>

            <div class="chart-box">

                <canvas id="chartPuso"></canvas>

            </div>

        </div>

    </div>

</div>

</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// =========================
// BANJIR BULANAN
// =========================

new Chart(document.getElementById('banjirBulanan'),{

type:'bar',

data:{

labels:['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],

datasets:[{

data:[220,340,520,1100,1800,2500,2200,1600,900,250,60,20],

backgroundColor:'#2563eb'

}]

},

options:{

responsive:true,

maintainAspectRatio:false,

plugins:{legend:{display:false}}

}

});


// =========================
// BANJIR KABUPATEN
// =========================

new Chart(document.getElementById('banjirKabupaten'),{

type:'bar',

data:{

labels:[

'Kubu Raya',

'Pontianak',

'Sanggau',

'Ketapang',

'Sintang',

'Bengkayang',

'Sekadau'

],

datasets:[{

data:[1803,1245,832,645,432,251,120],

backgroundColor:'#2563eb'

}]

},

options:{

indexAxis:'y',

responsive:true,

maintainAspectRatio:false,

plugins:{legend:{display:false}}

}

});
</script>

<script>
    // ===============================
// KEKERINGAN BULANAN
// ===============================

new Chart(document.getElementById('keringBulanan'),{

type:'bar',

data:{

labels:['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],

datasets:[{

data:[180,120,210,160,250,480,1700,1900,1500,420,110,40],

backgroundColor:'#f59e0b'

}]

},

options:{

responsive:true,

maintainAspectRatio:false,

plugins:{legend:{display:false}}

}

});


// ===============================
// KEKERINGAN KABUPATEN
// ===============================

new Chart(document.getElementById('keringKabupaten'),{

type:'bar',

data:{

labels:[

'Kapuas Hulu',

'Sintang',

'Sambas',

'Kubu Raya',

'Ketapang',

'Bengkayang',

'Mempawah'

],

datasets:[{

data:[1465,1280,1150,950,890,720,570],

backgroundColor:'#f59e0b'

}]

},

options:{

responsive:true,

maintainAspectRatio:false,

indexAxis:'y',

plugins:{legend:{display:false}}

}

});
</script>

<script>
    // ====================================
// DATA 5 TAHUN
// ====================================

new Chart(document.getElementById('chart5Tahun'),{

type:'bar',

data:{

labels:[

'2021',

'2022',

'2023',

'2024',

'2025'

],

datasets:[

{

label:'LTT',

data:[6000,6500,5600,6100,7905],

backgroundColor:'#2563eb'

},

{

label:'LTJ',

data:[6800,6200,7600,7100,8762],

backgroundColor:'#f59e0b'

}

]

},

options:{

responsive:true,

maintainAspectRatio:false

}

});


// ====================================
// DONUT
// ====================================

new Chart(document.getElementById('chartDonut'),{

type:'doughnut',

data:{

labels:[

'Banjir',

'Kekeringan'

],

datasets:[{

data:[7905,8762]

}]

},

options:{

responsive:true,

maintainAspectRatio:false,

cutout:'70%'

}

});


// ====================================
// LTP & PUSO
// ====================================

new Chart(document.getElementById('chartPuso'),{

type:'bar',

data:{

labels:[

'2021',

'2022',

'2023',

'2024',

'2025'

],

datasets:[

{

label:'LTP',

data:[3000,3100,2950,2700,2850],

backgroundColor:'#22c55e'

},

{

label:'LPSO',

data:[1800,1900,1700,1650,1500],

backgroundColor:'#f59e0b'

},

{

label:'SPPS',

data:[1500,1600,1450,1350,1250],

backgroundColor:'#7c3aed'

}

]

},

options:{

responsive:true,

maintainAspectRatio:false

}

});
</script>
@endsection