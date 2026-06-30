<!DOCTYPE html>
<html>
<head>
    <title>DETAIL INFORMASI PERUBAHAN KATEGORI KEKERINGAN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <div class="judul-form">
        INFORMASI PERUBAHAN KATEGORI KEKERINGAN
    </div>

    <div class="subjudul">
        (Padi/Jagung)
    </div>
    <style>
        body{
    font-family: Arial, Helvetica, sans-serif;
    font-size:12px;
}

.judul-form{
    text-align:center;
    font-size:28px;
    font-weight:bold;
    margin-bottom:5px;
}

.subjudul{
    text-align:center;
    font-size:18px;
    font-weight:bold;
    margin-bottom:20px;
}

.header-form{
    display:flex;
    justify-content:space-between;
    margin-bottom:20px;
}

.tbl-info-kiri,
.tbl-info-kanan{
    border-collapse:collapse;
}

.tbl-info-kiri td,
.tbl-info-kanan td{
    border:1px solid #000;
    padding:6px 10px;
}

.label{
    background:#fff;
    font-weight:bold;
    width:170px;
}

.nilai{
    background:#E6B8B7;
    min-width:220px;
}

.table-responsive{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse !important;
    table-layout:auto;
    font-size:12px;
}

table th,
table td{
    border:1px solid #000 !important;
    text-align:center;
    vertical-align:middle;
    padding:3px;
}

thead th{
    font-weight:bold;
}

.bg-biru{
    background:#8DB4E2 !important;
}

.bg-kuning{
    background:#FFF200 !important;
}

.bg-hijau{
    background:#D8E4BC !important;
}

.bg-pink{
    background:#E6B8B7 !important;
}

.bg-nomor{
    background:#4F81BD !important;
    color:#fff !important;
    font-weight:bold;
}

.garis-kanan{
    border-right:3px solid #000 !important;
}

.garis-kiri{
    border-left:3px solid #000 !important;
}

input.form-control,
select.form-select{
    border:none !important;
    border-radius:0 !important;
    box-shadow:none !important;
    background:transparent;
    font-size:12px;
    padding:2px;
}

input.form-control:focus,
select.form-select:focus{
    border:none !important;
    box-shadow:none !important;
}

.bg-pink input{
    background:#E6B8B7 !important;
    font-weight:bold;
}

.bg-hijau select{
    background:#D8E4BC !important;
}

.table{
    margin-bottom:0;
}

th{
    white-space:nowrap;
}

td{
    min-width:70px;
}

td select{
    min-width:180px;
}

td input{
    min-width:70px;
}

.container{
    max-width:1900px;
}
    </style>
</head>
<body>

<div class="container mt-4">

    <div class="header-form">

        <table class="tbl-info-kiri">

            <tr>
                <td class="label">Kabupaten/Kota</td>
                <td class="nilai">
                    {{ $header->nama_kabupaten_kota }}
                </td>
            </tr>

            <tr>
                <td class="label">Kecamatan</td>
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

        <div class="table-responsive">

        <table class="table table-bordered mb-0">
            <thead>

                <tr>

                    <th rowspan="2" class="bg-biru">No</th>
                    <th rowspan="2" class="bg-biru">Kab/Kota</th>
                    <th rowspan="2" class="bg-biru">Kec</th>
                    <th rowspan="2" class="bg-biru">Desa</th>
                    <th rowspan="2" class="bg-biru">Komoditas</th>

                    <th colspan="5" class="bg-biru">
                        Luas Terkena Bulan ..... Periode ..... (Ha)
                    </th>

                    <th colspan="6" class="bg-biru">
                        Perubahan Kategori Terkena Bulan ..... Periode ..... (Ha)
                    </th>

                    <th colspan="6" class="bg-biru">
                        
                    </th>
                    <th colspan="6" class="bg-biru">
                        
                    </th>

                </tr>

                <tr>

                    <th class="bg-biru">Ringan</th>
                    <th class="bg-biru">Sedang</th>
                    <th class="bg-biru">Berat</th>
                    <th class="bg-biru">Puso</th>
                    <th class="bg-biru">Jumlah</th>

                    <th class="bg-biru">Ringan</th>
                    <th class="bg-biru">Sedang</th>
                    <th class="bg-biru">Berat</th>
                    <th class="bg-biru">Puso</th>
                    <th class="bg-biru">Jumlah</th>
                    <th class="bg-biru">Pulih</th>
                    <th class="bg-biru"></th>
                    <th class="bg-biru"></th>

                </tr>

                <tr>

                    <th class="bg-nomor">1</th>
                    <th class="bg-nomor">2</th>
                    <th class="bg-nomor">3</th>
                    <th class="bg-nomor">3</th>
                    <th class="bg-nomor">4</th>

                    <th class="bg-nomor">5</th>
                    <th class="bg-nomor">6</th>
                    <th class="bg-nomor">7</th>
                    <th class="bg-nomor">8</th>

                    <th class="bg-nomor">
                        9
                        <br>
                        (5+6+7+8)
                    </th>

                    <th class="bg-nomor">10</th>
                    <th class="bg-nomor">11</th>
                    <th class="bg-nomor">12</th>
                    <th class="bg-nomor">13</th>

                    <th class="bg-nomor">
                        14
                        <br>
                        (10+11+12+13)
                    </th>

                    <th class="bg-nomor">15</th>

                </tr>

    </thead>
        <tbody>

@foreach($detail as $i => $d)

<tr>

    <td class="table-danger">
        {{ $i + 1 }}
    </td>

    <td class="bg-hijau">
        {{ $header->nama_kabupaten_kota }}
    </td>

    <td class="bg-hijau">
        {{ $header->nama_kecamatan }}
    </td>

    <td class="table-success">
        {{ $d->desa->nama_desa ?? '-' }}
    </td>

    <td class="table-success">
        {{ $d->komoditas->komoditas ?? '-' }}
    </td>

    <td>{{ $d->ltb_ringan }}</td>
    <td>{{ $d->ltb_sedang }}</td>
    <td>{{ $d->ltb_berat }}</td>
    <td>{{ $d->ltb_puso }}</td>
    <td class="bg-pink">{{ $d->ltb_jumlah }}</td>

    <td>{{ $d->pkt_ringan }}</td>
    <td>{{ $d->pkt_sedang }}</td>
    <td>{{ $d->pkt_berat }}</td>
    <td>{{ $d->pkt_puso }}</td>
    <td class="bg-pink">{{ $d->pkt_jumlah }}</td>

    <td>{{ $d->pkt_pulih }}</td>

</tr>

@endforeach

</tbody>
        
</table>
    <div class="row mt-5">

    <div class="col-md-6">
    </div>

</div>

<div class="mt-3">
    <a href="{{ route('informasi-perubahan-kategori-kekeringan.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</div>
</body>
</html>

