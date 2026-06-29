<!DOCTYPE html>
<html>
<head>
    <title>Create LAPORAN KERUSAKAN TANAMAN AKIBAT BANJIR</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <div class="judul-form">
        LAPORAN KERUSAKAN TANAMAN AKIBAT BANJIR
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

                <th rowspan="3" class="bg-biru">Var</th>
                <th rowspan="3" class="bg-biru">Umur<br>(Hst)</th>

                <th rowspan="3" class="bg-biru">Luas Tanam<br>(Ha)</th>
                <th rowspan="3" class="bg-biru">Luas Waspada<br>(Ha)</th>

                <th colspan="4" class="bg-biru">
                    Sisa Periode Sebelumnya / Perubahan Kriteria
                </th>

                <th colspan="2" class="bg-biru">
                    Luas Tambah Pada<br>
                    Periode Laporan (Ha)
                </th>

                <th colspan="2" class="bg-biru">
                    Luas Keadaan Pada<br>
                    Periode Laporan (Ha)
                </th>

                <th colspan="2" class="bg-biru">
                    Penanganan
                </th>

                <th colspan="2" class="bg-biru">
                    Koordinat
                </th>
                <th class="bg-biru"></th>
                <th class="bg-biru"></th>

            </tr>

            <tr>

                <th colspan="2" class="bg-biru">
                    Surut
                </th>

                <th colspan="2" class="bg-biru">
                    Puso
                </th>

                <th rowspan="2" class="bg-biru">
                    Terkena
                </th>

                <th rowspan="2" class="bg-biru">
                    Puso
                </th>

                <th rowspan="2" class="bg-biru">
                    Terkena
                </th>

                <th rowspan="2" class="bg-biru">
                    Puso
                </th>

                <th rowspan="2" class="bg-biru">
                    Upaya
                </th>

                <th rowspan="2" class="bg-biru">
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

                <th class="bg-biru">
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
                <th class="bg-kuning">WAS</th>

                <th class="bg-kuning">LSRT</th>
                <th class="bg-kuning">K_S</th>

                <th class="bg-kuning">LPSO</th>
                <th class="bg-kuning">K_P</th>

                <th class="bg-kuning">LT_T</th>
                <th class="bg-kuning">LT_P</th>

                <th class="bg-kuning bg-pink">LK_T</th>
                <th class="bg-kuning bg-pink">LK_P</th>

                <th class="bg-kuning">UPY</th>
                <th class="bg-kuning">J_UPY</th>

                <th class="bg-kuning">LAT</th>
                <th class="bg-kuning">LONG</th>
                <th class="bg-kuning">status</th>
                <th class="bg-kuning">Keterangan</th>
                
            </tr>

        </thead>
            <tbody id="tbody-banjir">

                @foreach($detail as $d)

                <input type="hidden"
                    name="id_tahun[]"
                    value="{{ $d->id_tahun }}">

                <input type="hidden"
                    name="id_bulan[]"
                    value="{{ $d->id_bulan }}">

                <input type="hidden"
                    name="id_periode[]"
                    value="{{ $d->id_periode }}">
                
                <input
                    type="hidden"
                    name="id_musim_tanam"
                    value="{{ $header->id_musim_tanam }}">
        
            <tr class="baris-banjir">
                <input
                    type="hidden"
                    name="id_detail[]"
                    value="{{ $d->id_det_laporan_kerusakan_tanaman_akibat_banjir }}">

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

                <!-- DES -->
                <td>{{ $d->desa->nama_desa ?? '-' }}</td>
                <!-- TAN -->
                <td>{{ $d->komoditas->komoditas ?? '-' }}</td>
                <!-- VAR -->
                <td>{{ $d->var }}</td>
                <td>{{ $d->umur }}</td>
                <td>{{ $d->luas_tanam }}</td>
                <td>{{ $d->luas_waspada }}</td>
                <td>{{ $d->sps_surut_luas }}</td>
                <td>{{ $d->sps_surut_ket }}</td>
                <td>{{ $d->sps_puso_luas }}</td>
                <td>{{ $d->sps_puso_ket }}</td>
                <td>{{ $d->luas_tambah_terkena }}</td>
                <td>{{ $d->luas_tambah_puso }}</td>
                <td>{{ $d->luas_keadaan_terkena }}</td>
                <td>{{ $d->luas_keadaan_puso }}</td>
                <td>{{ $d->penangan_upaya }}</td>
                <td>{{ $d->penangan_jumlah }}</td>
                <td>{{ $d->koordinat_latitude }}</td>
                <td>{{ $d->koordinat_longitude }}</td>
                <td>
                    @if($d->status_verifikasi == 'benar')
                        <span class="badge bg-success">Benar</span>
                    @elseif($d->status_verifikasi == 'salah')
                        <span class="badge bg-danger">Salah</span>
                    @else
                        <span class="badge bg-warning">Menunggu</span>
                    @endif
                </td>
                

        </tr>

        @endforeach

    </tbody>

</table>

        </button>

        <a href="{{ route('laporan-kerusakan-tanaman-akibat-banjir.index') }}"
        class="btn btn-secondary">
            Kembali
        </a>

    </div>

</body>
</div>
</html>

