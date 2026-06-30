<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kerusakan Tanaman Akibat Fisiologis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        .judul-form{
            text-align:center;
            font-weight:bold;
            font-size:28px;
        }

        .subjudul{
            text-align:center;
            font-size:18px;
            margin-bottom:15px;
        }

        .bg-pink{
            background:#e6c0c0;
        }

        .bg-hijau{
            background:#dcecc5;
        }

        .bg-biru{
            background:#8db4e2;
        }

        .bg-kuning{
            background:yellow;
        }

        .header-form{
            display:flex;
            justify-content:space-between;
            margin-bottom:15px;
        }

        .tbl-info-kiri,
        .tbl-info-kanan{
            border-collapse:collapse;
        }

        .tbl-info-kiri td,
        .tbl-info-kanan td{
            border:1px solid #000;
            padding:4px 8px;
        }

        .label{
            min-width:150px;
        }

        .nilai{
            background:#e6c0c0;
            min-width:220px;
            font-weight:bold;
        }

        table td,
        table th{
            text-align:center;
            vertical-align:middle;
        }

        .tabel-fisiologis{

            border-collapse:collapse;
            width:max-content;
            min-width:100%;
            font-size:11px;

        }

        .tabel-fisiologis th,
        .tabel-fisiologis td{

            border:1px solid black;
            text-align:center;
            vertical-align:middle;
            padding:0;

        }

        .tabel-fisiologis th{

            height:28px;
            font-weight:bold;

        }

        .tabel-fisiologis td{

            height:22px;

        }

        .tabel-fisiologis input,
        .tabel-fisiologis select{

            width:100%;
            height:22px;
            border:none;
            padding:0 2px;
            font-size:11px;
            text-align:center;
            border-radius:0;
        }

        .tabel-fisiologis select{

            min-width:130px;

        }

        .bg-pink{

            background:#e6b8b7 !important;

        }

        .bg-hijau{

            background:#d8e4bc !important;

        }

        .bg-biru{

            background:#d8e4f2 !important;

        }

        .bg-kuning{

            background:#ffff00 !important;

        }

                /* ===================== TABEL ====================== */

        .tabel-fisiologis{
            border-collapse:collapse;
            border:1px solid #000;
            width:max-content;
            min-width:100%;
            table-layout:fixed;
            font-size:10px;
            font-family:Calibri, Arial, sans-serif;
        }

        .tabel-fisiologis th,
        .tabel-fisiologis td{

            border:1px solid #000;
            padding:0;
            text-align:center;
            vertical-align:middle;

        }

        /* tinggi header */

        .tabel-fisiologis thead tr:nth-child(1) th{
            background:#dbe5f1;
            height:34px;
            font-size:10px;
            font-weight:normal;
        }

        .tabel-fisiologis thead tr:nth-child(2) th{
            background:#dbe5f1;
            height:24px;
            font-size:10px;
            font-weight:normal;
        }

        .tabel-fisiologis thead tr:nth-child(3) th{
            background:#4f81bd;
            color:#000;
            height:22px;
            font-size:10px;
            font-style:italic;
            font-weight:normal;
        }

        .tabel-fisiologis thead tr:nth-child(4) th{
            background:#ffff00;
            color:#000;
            height:22px;
            font-size:10px;
            font-weight:bold;
        }

        /* body */

        .tabel-fisiologis tbody td{
            height:20px;
            font-size:10px;
        }

        /* ===================== INPUT ====================== */

        .tabel-fisiologis input,
        .tabel-fisiologis select{

            width:100%;
            height:19px;
            border:none;
            outline:none;
            border-radius:0;
            background:transparent;
            font-size:10px;
            padding:0 2px;
            text-align:center;

        }

        /* ===================== WARNA ====================== */

        /* hijau excel */

        .bg-hijau{

            background:#d8e4bc !important;

        }

        /* biru muda excel */

        .bg-biru{

            background:#dbe5f1 !important;

        }

        /* biru nomor */

        .bg-nomor{

            background:#4f81bd !important;
            color:#000 !important;

        }

        /* kuning */

        .bg-kuning{

            background:#ffff00 !important;

        }

        /* pink excel */

        .bg-pink{

            background:#e6b8b7 !important;

        }

        /* ===================== GARIS TEBAL ====================== */

        .garis-kanan{
            border-right:3px solid #000 !important;
        }

        .garis-kiri{
            border-left:3px solid #000 !important;
        }

        .garis-atas{
            border-top:3px solid #000 !important;
        }

        .garis-bawah{
            border-bottom:3px solid #000 !important;
        }

        /* dropdown */

        .form-select{
            padding:0;
            background-position:right .2rem center;
        }

        /* readonly */

        input[readonly]{
            background:#e6b8b7 !important;
        }

    </style>

</head>
<body>

<div class="container-fluid mt-3">

    <div class="judul-form">
        LAPORAN KERUSAKAN TANAMAN AKIBAT FISIOLOGIS
    </div>

    <div class="subjudul">
        (Padi / Jagung)
    </div>

    <div class="header-form">

        <table class="tbl-info-kiri">

            <tr>
                <td class="label">
                    Kabupaten/Kota
                </td>

                <td class="nilai">
                    {{ $header->nama_kabupaten_kota }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Kecamatan
                </td>

                <td class="nilai">
                    {{ $header->nama_kecamatan }}
                </td>
            </tr>

        </table>

        <table class="tbl-info-kanan">

            <tr>
                <td class="label">
                    Periode Pengamatan
                </td>

                <td class="nilai">
                    {{ $header->periode_pengamatan }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Musim Tanam
                </td>

                <td class="nilai">
                    {{ $header->musim_tanam }}
                </td>
            </tr>

        </table>

    </div>

    <table class="tabel-fisiologis">

    <thead>

        <tr>

            <th rowspan="2">Tahun</th>
            <th rowspan="2">Bulan</th>
            <th rowspan="2">Periode</th>

            <th rowspan="2">Kab/Kota</th>
            <th rowspan="2">Kecamatan</th>
            <th rowspan="2">Desa</th>

            <th rowspan="2">Komoditas</th>
            <th rowspan="2">Varietas</th>
            <th rowspan="2">Umur (Hst)</th>
            <th rowspan="2">Luas Tanam (Ha)</th>
            <th rowspan="2">Luas Waspada (Ha)</th>

            <th colspan="6">
                Sisa Periode Sebelumnya /
                Perubahan Kategori (Ha)
            </th>

            <th colspan="5">
                Luas Tambah Pada
                Periode Laporan (Ha)
            </th>

            <th colspan="5">
                Keadaan Pada
                Periode Laporan (Ha)
            </th>

            <th colspan="2">
                Penanganan
            </th>

            <th colspan="2">
                Koordinat
            </th>

        </tr>

        <tr>

            <!-- SPS -->

            <th>Ringan</th>
            <th>Sedang</th>
            <th>Berat</th>
            <th>Puso</th>
            <th>Pulih</th>
            <th class="garis-kanan">
                Jumlah
            </th>

            <!-- LT -->

            <th>Ringan</th>
            <th>Sedang</th>
            <th>Berat</th>
            <th>Puso</th>
            <th class="garis-kanan">
                Jumlah
            </th>

            <!-- LK -->

            <th>Ringan</th>
            <th>Sedang</th>
            <th>Berat</th>
            <th>Puso</th>
            <th class="garis-kanan">
                Jumlah
            </th>

            <th>Upaya</th>
            <th class="garis-kanan">
                Luas (Ha)
            </th>

            <th>Latitude</th>
            <th>Longitude</th>

        </tr>

        <tr class="bg-primary text-white">

            <th>1</th>
            <th>2</th>
            <th>3</th>

            <th>4</th>
            <th>5</th>
            <th>6</th>

            <th>7</th>
            <th>8</th>
            <th>9</th>

            <th>10</th>
            <th class="garis-kanan">11</th>

            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16 </th>
            <th class="garis-kanan">17 <br>
                (12+13+14+15+16)</th>

            <th>18</th>
            <th>19</th>
            <th>20</th>
            <th>21 </th>
            <th class="garis-kanan">22 <br> (18+19+20+21)</th>

            <th>23</th>
            <th>24</th>
            <th>25</th>
            <th>26 </th>
            <th class="garis-kanan">27 <br>(23+24+25+26)</th>

            <th>28</th>
            <th class="garis-kanan">29</th>

            <th>30</th>
            <th>31</th>

        </tr>

        <tr class="bg-warning">

            <th>THN</th>
            <th>BLN</th>
            <th>PRD</th>

            <th>KAB</th>
            <th>KEC</th>
            <th>DES</th>

            <th>TAN</th>
            <th>VAR</th>
            <th>UMR</th>

            <th>LST</th>
            <th class="garis-kanan">WAS</th>

            <th>SP_R</th>
            <th>SP_S</th>
            <th>SP_B</th>
            <th>SP_PS</th>
            <th>SP_PL</th>
            <th class="garis-kanan">SP_J</th>

            <th>LT_R</th>
            <th>LT_S</th>
            <th>LT_B</th>
            <th>LT_P</th>
            <th class="garis-kanan">LT_J</th>

            <th>LK_R</th>
            <th>LK_S</th>
            <th>LK_B</th>
            <th>LK_P</th>
            <th class="garis-kanan">LK_J</th>

            <th>UPY</th>
            <th class="garis-kanan">L_UPY</th>

            <th>LAT</th>
            <th>LONG</th>

        </tr>

    </thead>
        <tbody>

    @foreach($detail as $i => $d)

    <tr>

        <td class="table-danger">
                    {{ $d->id_tahun }}
                </td>

                <td class="table-danger">
                    {{ $d->id_bulan }}
                </td>

                <td class="table-danger">
                    {{ $d->id_periode }}
                </td>
                <!-- KAB -->
                <td class="bg-hijau">

                {{ $header->nama_kabupaten_kota }}

                <input
                    type="hidden"
                    name="id_kabupaten_kota[]"
                    value="{{ $header->id_kabupaten_kota }}">

                </td>

                <!-- KEC -->
                <td class="bg-hijau">

                {{ $header->nama_kecamatan }}

                <input
                    type="hidden"
                    name="id_kecamatan[]"
                    value="{{ $header->id_kecamatan }}">

                </td>

        <!-- DESA -->
        <td class="bg-hijau">
            {{ $d->desa->nama_desa ?? '-' }}
        </td>

        <!-- TANAMAN / KOMODITAS -->
        <td class="bg-hijau">
            {{ $d->komoditas->komoditas ?? '-' }}
        </td>

        <!-- VAR -->
        <td>
            {{ $d->varietas }}
        </td>

        <!-- UMR -->
        <td>
            {{ $d->umur }}
        </td>

        <!-- LUAS TANAM -->
        <td>
            {{ number_format($d->luas_tanam, 2) }}
        </td>

        <!-- LUAS WASPADA -->
        <td class="garis-kanan">
            {{ number_format($d->luas_waspada, 2) }}
        </td>

        <!-- SPS -->
        <td>{{ number_format($d->sps_ringan, 2) }}</td>

        <td>{{ number_format($d->sps_sedang, 2) }}</td>

        <td>{{ number_format($d->sps_berat, 2) }}</td>

        <td>{{ number_format($d->sps_puso, 2) }}</td>

        <td>{{ number_format($d->sps_pulih, 2) }}</td>

        <td class="bg-pink garis-kanan">
            {{ number_format($d->sps_jumlah, 2) }}
        </td>

        <!-- LUAS TAMBAH -->
        <td>{{ number_format($d->luas_tambah_ringan, 2) }}</td>

        <td>{{ number_format($d->luas_tambah_sedang, 2) }}</td>

        <td>{{ number_format($d->luas_tambah_berat, 2) }}</td>

        <td>{{ number_format($d->luas_tambah_puso, 2) }}</td>

        <td class="bg-pink garis-kanan">
            {{ number_format($d->luas_tambah_jumlah, 2) }}
        </td>

        <!-- LUAS KEADAAN -->
        <td class="bg-pink">
            {{ number_format($d->luas_keadaan_ringan, 2) }}
        </td>

        <td class="bg-pink">
            {{ number_format($d->luas_keadaan_sedang, 2) }}
        </td>

        <td class="bg-pink">
            {{ number_format($d->luas_keadaan_berat, 2) }}
        </td>

        <td class="bg-pink">
            {{ number_format($d->luas_keadaan_puso, 2) }}
        </td>

        <td class="bg-pink garis-kanan">
            {{ number_format($d->luas_keadaan_jumlah, 2) }}
        </td>

        <!-- UPAYA -->
        <td>
            {{ $d->penanganan_upaya }}
        </td>

        <!-- LUAS UPAYA -->
        <td>
            {{ number_format($d->penanganan_luas, 2) }}
        </td>

        <!-- LATITUDE -->
        <td>
            {{ $d->latitude }}
        </td>

        <!-- LONGITUDE -->
        <td>
            {{ $d->longitude }}
        </td>

    </tr>

    @endforeach

</tbody>   
    </table>

        <div class="row mt-5">

            <div class="col-md-6">
            </div>

            <div class="col-md-6 text-center">

        <div class="mt-3">

            <a
            href="{{ route('laporan-kerusakan-tanaman-akibat-fisiologis.index') }}"
            class="btn btn-secondary">

            Kembali

            </a>

        </div>

</form>
    

    </body>
</html>