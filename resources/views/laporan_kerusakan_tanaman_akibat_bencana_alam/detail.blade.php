<!DOCTYPE html>
<html>

<head>

    <title>
        Laporan Kerusakan Tanaman Akibat Bencana Alam
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size:12px;
            background:#ffffff;
        }

        .container-fluid{
            padding:20px;
        }

        .judul{
            font-size:30px;
            font-weight:bold;
            text-align:center;
            margin-bottom:2px;
        }

        .subjudul{
            font-size:16px;
            text-align:center;
            font-weight:bold;
            margin-bottom:25px;
        }

        .table{
            white-space:nowrap;
            margin-bottom:0;
        }

        .table th,
        .table td{
            border:1px solid #000 !important;
            text-align:center;
            vertical-align:middle;
            padding:3px;
            font-size:11px;
        }

        .table thead th{
            font-weight:bold;
        }

        .bg-biru{
            background:#b8cce4 !important;
        }

        .bg-hijau{
            background:#d8e4bc !important;
        }

        .bg-pink{
            background:#e6b8b7 !important;
        }

        .bg-kuning{
            background:#ffff00 !important;
        }

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

        input.form-control,
        select.form-select{

            min-width:90px;
            height:28px;

            padding:2px 5px;

            font-size:11px;

            border-radius:0;

        }

        input[readonly]{

            background:#e6b8b7 !important;
            font-weight:bold;

        }

        .table-responsive{

            overflow-x:auto;

        }

        .btn{

            border-radius:3px;
            font-size:12px;

        }

        .form-control:focus,
        .form-select:focus{

            box-shadow:none;
            border:1px solid #0d6efd;

        }

    </style>

</head>

<body>

<div class="container-fluid mt-3">
    <div class="judul">

    LAPORAN KERUSAKAN TANAMAN
    AKIBAT BENCANA ALAM

</div>

<div class="subjudul">

    (Padi/Jagung/Kedelai/
    Kacang Tanah/Kacang Hijau/
    Ubi Kayu/Ubi Jalar)

</div>
<div class="d-flex justify-content-between mb-3">

    <table class="table table-bordered w-auto">
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
    <div class="table-responsive">

        <table class="table table-bordered">
            <thead>

<tr>

    <th rowspan="3" class="bg-biru">Tahun</th>
    <th rowspan="3" class="bg-biru">Bulan</th>
    <th rowspan="3" class="bg-biru">Periode</th>

    <th rowspan="3" class="bg-biru">Kab/Kota</th>
    <th rowspan="3" class="bg-biru">Kecamatan</th>
    <th rowspan="3" class="bg-biru">Desa</th>

    <th rowspan="3" class="bg-biru">Tanaman</th>

    <th rowspan="3" class="bg-biru">Var</th>
    <th rowspan="3" class="bg-biru">Umur<br>(Hst)</th>

    <th rowspan="3" class="bg-biru">Luas Tanam<br>(Ha)</th>
    <th rowspan="3" class="bg-biru garis-kanan">Luas Waspada<br>(Ha)</th>

    <th colspan="4" class="bg-biru">
        Sisa Periode Sebelumnya /
        Perubahan Kriteria
    </th>

    <th colspan="2" class="bg-biru">
        Luas Tambah Pada
        <br>
        Periode Laporan (Ha)
    </th>

    <th colspan="2" class="bg-biru">
        Luas Keadaan Pada
        <br>
        Periode Laporan (Ha)
    </th>

    <th colspan="2" class="bg-biru">
        Penanganan
    </th>

    <th colspan="2" class="bg-biru">
        Koordinat
    </th>

    
    <th colspan="2" class="bg-biru">
        
    </th>

    <th colspan="2" class="bg-biru">
        
    </th>

</tr>

<tr>

    <th colspan="2" class="bg-biru">
        Surut
    </th>

    <th colspan="2" class="bg-biru garis-kanan">
        Puso
    </th>

    <th rowspan="2" class="bg-biru">
        Terkena
    </th>

    <th rowspan="2" class="bg-biru garis-kanan">
        Puso
    </th>

    <th rowspan="2" class="bg-biru">
        Terkena
    </th>

    <th rowspan="2" class="bg-biru garis-kanan">
        Puso
    </th>

    <th rowspan="2" class="bg-biru">
        Upaya
    </th>

    <th rowspan="2" class="bg-biru garis-kanan">
        Jumlah
    </th>

    <th rowspan="2" class="bg-biru">
        Latitude
    </th>

    <th rowspan="2" class="bg-biru">
        Longitude
    </th>

    <th rowspan="2" class="bg-biru">
        
    </th>
    <th rowspan="2" class="bg-biru">
        
    </th>
</tr>

<tr>

    <th class="bg-biru">
        Luas (Ha)
    </th>

    <th class="bg-biru">
        Ket (Periode)
    </th>

    <th class="bg-biru">
        Luas (Ha)
    </th>

    <th class="bg-biru garis-kanan">
        Ket (Periode)
    </th>

</tr>

<tr>

    <th class="bg-kuning">THN</th>
    <th class="bg-kuning">BLN</th>
    <th class="bg-kuning">PRD</th>

    <th class="bg-kuning">KAB</th>
    <th class="bg-kuning">KEC</th>
    <th class="bg-kuning">DES</th>

    <th class="bg-kuning">TAN</th>

    <th class="bg-kuning">VAR</th>
    <th class="bg-kuning">UMR</th>

    <th class="bg-kuning">LST</th>
    <th class="bg-kuning garis-kanan">WAS</th>

    <th class="bg-kuning">LSRT</th>
    <th class="bg-kuning">K_S</th>

    <th class="bg-kuning">LPSO</th>
    <th class="bg-kuning garis-kanan">K_P</th>

    <th class="bg-kuning">LT_T</th>
    <th class="bg-kuning garis-kanan">LT_P</th>

    <th class="bg-kuning bg-pink">LK_T</th>
    <th class="bg-kuning bg-pink garis-kanan">LK_P</th>

    <th class="bg-kuning">UPY</th>
    <th class="bg-kuning garis-kanan">J_UPY</th>

    <th class="bg-kuning">LAT</th>
    <th class="bg-kuning">LONG</th>

    <th class="bg-kuning">Status</th>
    <th class="bg-kuning">Keterangan</th>
</tr>

</thead>
    <tbody id="tbody-bencana">
        @foreach($detail as $i => $d)

<tr class="baris-bencana">


     <!-- THN -->
            <td class="table-danger">{{ $d->id_tahun }}</td>

            <!-- BLN -->
            <td class="table-danger">{{ $d->id_bulan }}</td>

            <!-- PRD -->
            <td class="table-danger">{{ $header->periode_pengamatan }}</td>

            <!-- KAB -->
            <td class="bg-hijau">{{ $header->nama_kabupaten_kota }}</td>

            <!-- KEC -->
            <td class="bg-hijau">{{ $header->nama_kecamatan }}</td>

            <!-- DES -->
            <td class="table-success">{{ $d->desa->nama_desa ?? '-' }}</td>

            <!-- TAN -->
            <td>{{ $d->komoditas->komoditas ?? '-' }}</td>   
            <!-- VAR -->
              <td>{{ $d->var }}</td>
            <td>{{ $d->umr }}</td>
            <td>{{ $d->lst }}</td>
            <td>{{ $d->was }}</td>
            <td>{{ $d->lsrt }}</td>
            <td>{{ $d->k_s }}</td>

            <td>{{ $d->lpso }}</td>
            <td>{{ $d->k_p }}</td>
            <td>{{ $d->lt_t }}</td>
            <td>{{ $d->lt_p }}</td>
            <td>{{ $d->lk_t }}</td>
            <td>{{ $d->lk_p }}</td>
            <td>{{ $d->upy }}</td>
            <td>{{ $d->j_upy }}</td>
            <td>{{ $d->lat }}</td>
            <td>{{ $d->long }}</td>
            <td>
                @if($d->status_verifikasi == 'benar')
                    <span class="badge bg-success">Benar</span>
                @elseif($d->status_verifikasi == 'salah')
                    <span class="badge bg-danger">Salah</span>
                @else
                    <span class="badge bg-warning">Menunggu</span>
                @endif
            </td>
            <td>{{ $d->keterangan_verifikasi }}</td>

</tr>
@endforeach

</tbody>
</table>

</div>

<div class="row mt-5">

    <div class="col-md-6">
    </div>

    <div class="col-md-6 text-center">

</div>
<div class="mt-3">
    <a href="{{ route('laporan-kerusakan-tanaman-akibat-bencana-alam.index') }}"
        class="btn btn-secondary">

        Kembali

    </a>

</div>


</body>
</html>
