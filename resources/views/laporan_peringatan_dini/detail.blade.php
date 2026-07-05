<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Laporan Peringatan Dini</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

        body{

            font-family:"Times New Roman";
            font-size:12px;
            margin:8px;
            color:#000;

        }

        table{

            border-collapse:collapse;

        }

        table td,
        table th{

            border:1px solid #000;
            padding:0;
            text-align:center;
            vertical-align:middle;

        }

        input,
        select{

            width:100%;
            height:22px;

            border:none!important;
            outline:none!important;

            background:transparent;

            box-shadow:none!important;

            border-radius:0!important;

            font-size:11px;

            padding-left:2px;

        }

        input:focus,
        select:focus{

            box-shadow:none!important;
            outline:none!important;

        }

        .bg-biru{

            background:#b8cce4;

        }

        .bg-pink{

            background:#e6b8b7;

        }

        .bg-hijau{

            background:#c4d79b;

        }

        .bg-kuning{

            background:#ffff00;

        }

        .judul{

            text-align:center;
            font-size:20px;
            font-weight:bold;

        }

        .subjudul{

            text-align:center;
            font-size:12px;

        }

        .header{

            display:flex;

            justify-content:space-between;

            align-items:flex-start;

            margin-top:8px;

            margin-bottom:8px;

        }

        .kiri{

            width:320px;

        }

        .kanan{

            width:330px;

        }

        .tbl-kiri{

            width:320px;

        }

        .tbl-kanan{

            width:330px;

        }

        .tbl-utama{

            min-width:2200px;
            table-layout:auto;

        }

    </style>

</head>

<body>

    <br>

        <div class="judul">

            LAPORAN PERINGATAN DINI

        </div>

        <div class="subjudul">

            (Padi/Jagung)

        </div>

        <div class="header">

        <div class="kiri">

        <table class="tbl-kiri">

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

    </div>

<div class="kanan">

<table class="tbl-kanan">

   <tr>
    <td>Musim Tanam</td>
    <td>{{ $header->musim_tanam }}</td>
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

</div>

   <div style="overflow-x:auto; width:100%;">
    <table class="tbl-utama">

        <thead>

    <tr class="bg-biru">

        <th rowspan="2" width="45">

            Tahun

        </th>

        <th rowspan="2" width="45">

            Bulan

        </th>

        <th rowspan="2" width="50">

            Periode

        </th>

        <th rowspan="2" width="70">

            Kab/Kota

        </th>

        <th rowspan="2" width="90">

            Kecamatan

        </th>

        <th rowspan="2" width="95">

            Desa

        </th>

        <th rowspan="2" width="95">

            Poktan

        </th>

        <th colspan="2" width="120">

            Titik Koordinat

        </th>

        <th rowspan="2" width="75">

            Komoditas<br>

            Tanaman

        </th>

        <th rowspan="2" width="65">

            Varietas

        </th>

        <th rowspan="2" width="70">

            Stadia /

            <br>

            Umur Tan

            <br>

            (hst)

        </th>

        <th rowspan="2" width="75">

            Jenis

            <br>

            OPT

        </th>

        <th rowspan="2" width="70">

            Luas

            <br>

            Terserang

            <br>

            (Ha)

        </th>

        <th rowspan="2" width="70">

            Intens

            <br>

            (%)

        </th>

        <th rowspan="2" width="70">

            Kepadatan

            <br>

            Populasi

        </th>

        <th rowspan="2" width="70">

            Luas

            <br>

            Waspada

            <br>

            (Ha)

        </th>

        <th rowspan="2" width="90">

            Tgl

            <br>

            Pengamatan

        </th>

    </tr>

    <tr class="bg-biru">

        <th width="60">

            Longitude

        </th>

        <th width="60">

            Latitude

        </th>

    </tr>

    <tr class="bg-kuning">

        <th>

            Thn

        </th>

        <th>

            Bln

        </th>

        <th>

            Periode

        </th>

        <th>

            Kab

        </th>

        <th>

            Kec

        </th>

        <th>

            Desa

        </th>

        <th>

            Poktan

        </th>

        <th>

            Long

        </th>

        <th>

            Lat

        </th>

        <th>

            Tan

        </th>

        <th>

            Var

        </th>

        <th>

            Umur

        </th>

        <th>

            OPT

        </th>

        <th>

            Luas

        </th>

        <th>

            Int (%)

        </th>

        <th>

            Pop

        </th>

        <th>

            Was

        </th>

        <th>

            Tgl

        </th>

    </tr>

</thead>

    <tbody>

@forelse($detail as $d)

<tr>

    <td>{{ $d->tahun }}</td>

    <td>{{ $d->bulan }}</td>

    <td>{{ $d->periode_pengamatan }}</td>

    <td>{{ $header->nama_kabupaten_kota }}</td>

    <td>{{ $header->nama_kecamatan }}</td>

    <td>{{ $d->nama_desa }}</td>

    <td>{{ $d->poktan }}</td>

    <td>{{ $d->longitude }}</td>

    <td>{{ $d->latitude }}</td>

    <td>{{ $d->komoditas }}</td>

    <td>{{ $d->varietas }}</td>

    <td>{{ $d->umur }}</td>

    <td>{{ $d->nama_opt }}</td>

    <td>{{ $d->luas_terserang }}</td>

    <td>{{ $d->intens }}</td>

    <td>{{ $d->kepadatan_populasi }}</td>

    <td>{{ $d->luas_waspada }}</td>

    <td>{{ $d->tgl_pengamatan }}</td>

</tr>

@empty

<tr>

    <td colspan="18">

        Tidak ada data.

    </td>

</tr>

@endforelse

</tbody>
    </table>
</div>
    <br>

    <table style="width:100%; border:none;">

    <tr>

    <td style="width:60%; border:none; vertical-align:top;">

    <b>Keterangan :</b>

    <br>

    Poktan = Kelompok Tani

    <br>

    Tan = Tanaman / Komoditas

    <br>

    OPT = Organisme Pengganggu Tanaman

    <br>

    Long = Longitude

    <br>

    Lat = Latitude

    <br>

    Pop = Kepadatan Populasi

    <br>

    Was = Luas Waspada

    </td>

    <td style="width:40%; border:none; text-align:center;">

    <br>

<div>

    <a
    href="{{ route('laporan-peringatan-dini.index') }}"
    class="btn btn-secondary">

    Kembali

    </a>

</div>
</body>

</html>