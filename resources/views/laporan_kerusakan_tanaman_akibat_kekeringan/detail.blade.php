<!DOCTYPE html>
<html>
<head>
    <title>Detail LAPORAN KERUSAKAN TANAMAN AKIBAT KEKERINGAN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <div class="judul-form">
        LAPORAN KERUSAKAN TANAMAN AKIBAT KEKERINGAN
    </div>

    <div class="subjudul">
        (Padi/Jagung)
    </div>
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
            background:#b7d7f0;
        }

        .bg-kuning{
            background:yellow;
        }

        table{
            font-size:13px;
        }

        table td,
        table th{
            text-align:center;
            vertical-align:middle;
            padding:3px;
        }
        .bg-biru{
            background:#8db4e2 !important;
        }

        .bg-kuning{
            background:#ffff00 !important;
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
            padding:3px 8px;
            font-size:14px;
        }

        .label{
            background:#ffffff;
            min-width:140px;
        }

        .nilai{
            background:#e6c0c0;
            font-weight:bold;
            min-width:180px;
        }

        .tbl-info-kanan .nilai{
            text-align:center;
        }
        .bg-pink{
            background:#e6c0c0;
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

    <th rowspan="3" class="bg-biru">Varietas</th>
    <th rowspan="3" class="bg-biru">Umur<br>(Hst)</th>

    <th rowspan="3" class="bg-biru">Luas Tanam<br>(Ha)</th>
    <th rowspan="3" class="bg-biru">Luas Waspada<br>(Ha)</th>

    <th colspan="6" class="bg-biru">
        Sisa Periode Sebelumnya / Perubahan Kategori (Ha)
    </th>

    <th colspan="5" class="bg-biru">
        Luas Tambah Pada Periode Laporan (Ha)
    </th>

    <th colspan="5" class="bg-biru">
        Luas Keadaan Pada Periode Laporan (Ha)
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

    <th rowspan="2" class="bg-biru">Ringan</th>
    <th rowspan="2" class="bg-biru">Sedang</th>
    <th rowspan="2" class="bg-biru">Berat</th>
    <th rowspan="2" class="bg-biru">Puso</th>
    <th rowspan="2" class="bg-biru">Pulih</th>
    <th rowspan="2" class="bg-biru">Jumlah</th>

    <th rowspan="2" class="bg-biru">Ringan</th>
    <th rowspan="2" class="bg-biru">Sedang</th>
    <th rowspan="2" class="bg-biru">Berat</th>
    <th rowspan="2" class="bg-biru">Puso</th>
    <th rowspan="2" class="bg-biru">Jumlah</th>

    <th rowspan="2" class="bg-biru">Ringan</th>
    <th rowspan="2" class="bg-biru">Sedang</th>
    <th rowspan="2" class="bg-biru">Berat</th>
    <th rowspan="2" class="bg-biru">Puso</th>
    <th rowspan="2" class="bg-biru">Jumlah</th>

    <th rowspan="2" class="bg-biru">Upaya</th>
    <th rowspan="2" class="bg-biru">Luas (Ha)</th>

    <th rowspan="2" class="bg-biru">Latitude</th>
    <th rowspan="2" class="bg-biru">Longitude</th>

    <th rowspan="2" class="bg-biru"></th>
    <th rowspan="2" class="bg-biru"></th>

</tr>

<tr>
</tr>

<tr>

    <th class="bg-kuning bg-pink">THN</th>
    <th class="bg-kuning bg-pink">BLN</th>
    <th class="bg-kuning bg-pink">PRD</th>

    <th class="bg-kuning">KAB</th>
    <th class="bg-kuning">KEC</th>
    <th class="bg-kuning">DES</th>
    <th class="bg-kuning">TAN</th>

    <th class="bg-kuning">VAR</th>
    <th class="bg-kuning">UMR</th>

    <th class="bg-kuning">LST</th>
    <th class="bg-kuning">WAS</th>

    <th class="bg-kuning">SP_R</th>
    <th class="bg-kuning">SP_S</th>
    <th class="bg-kuning">SP_B</th>
    <th class="bg-kuning">SP_PS</th>
    <th class="bg-kuning">SP_PL</th>
    <th class="bg-kuning bg-pink">SP_J</th>

    <th class="bg-kuning">LT_R</th>
    <th class="bg-kuning">LT_S</th>
    <th class="bg-kuning">LT_B</th>
    <th class="bg-kuning">LT_P</th>
    <th class="bg-kuning bg-pink">LT_J</th>

    <th class="bg-kuning bg-pink">LK_R</th>
    <th class="bg-kuning bg-pink">LK_S</th>
    <th class="bg-kuning bg-pink">LK_B</th>
    <th class="bg-kuning bg-pink">LK_P</th>
    <th class="bg-kuning bg-pink">LK_J</th>

    <th class="bg-kuning">UPY</th>
    <th class="bg-kuning">L_UPY</th>

    <th class="bg-kuning">LAT</th>
    <th class="bg-kuning">LONG</th>

    <th class="bg-kuning">Status</th>
    <th class="bg-kuning">Keterangan</th>

</tr>

</thead>
        <tbody id="tbody-kekeringan">

        @foreach($detail as $d)

        <tr class="baris-kekeringan">
            <!-- THN -->
            <td class="table-danger">{{ $d->id_tahun }}</td>

            <!-- BLN -->
            <td class="table-danger">{{ $d->id_bulan }}</td>

            <!-- PRD -->
            <td class="table-danger">{{ $d->id_periode }}</td>

            <!-- KAB -->
            <td class="bg-hijau">{{ $header->nama_kabupaten_kota }}</td>

            <!-- KEC -->
            <td class="bg-hijau">{{ $header->nama_kecamatan }}</td>

            <!-- DES -->
            <td class="table-success">{{ $d->desa->nama_desa ?? '-' }}</td>

            <!-- TAN -->
            <td>{{ $d->komoditas->komoditas ?? '-' }}</td>
            <td>{{ $d->var }}</td>
            <td>{{ $d->umr }}</td>
            <td>{{ $d->lst }}</td>
            <td>{{ $d->was }}</td>
            <td>{{ $d->sp_r }}</td>
            <td>{{ $d->sp_s }}</td>
            <td>{{ $d->sp_b }}</td>
            <td>{{ $d->sp_ps }}</td>
            <td>{{ $d->sp_pl }}</td>
            <td>{{ $d->sp_j }}</td>
            <td>{{ $d->lt_r }}</td>
            <td>{{ $d->lt_s }}</td>
            <td>{{ $d->lt_b }}</td>
            <td>{{ $d->lt_p }}</td>
            <td>{{ $d->lt_j }}</td>
            <td>{{ $d->lk_r }}</td>
            <td>{{ $d->lk_s }}</td>
            <td>{{ $d->lk_b }}</td>
            <td>{{ $d->lk_p }}</td>
            <td>{{ $d->lk_j }}</td>
            <td>{{ $d->upy }}</td>
            <td>{{ $d->l_upy }}</td>
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
    <div>
        <a href="{{ route('laporan-kerusakan-tanaman-akibat-kekeringan.index')}}"
            class="btn btn-secondary">

                Kembali
        </a>
    </div>
</body>
</div>
</html>

