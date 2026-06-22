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
                {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}
            </td>
        </tr>

        <tr>
            <td class="label">Kecamatan</td>
            <td class="nilai">
                {{ $data->petugas->kecamatan->nama_kecamatan }}
            </td>
        </tr>
    </table>

    <table class="tbl-info-kanan">
        <tr>
            <td class="label">
                Periode Pengamatan
            </td>

            <td class="nilai">
                {{ $data->periode->periode_pengamatan }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Musim Tanam
            </td>

            <td class="nilai">
                {{ $data->musimTanam->musim_tanam }}
            </td>
        </tr>
    </table>

</div>

<form method="POST"
      action="{{ route('laporan-kerusakan-tanaman-akibat-banjir.store') }}">

    @csrf

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
</tr>

</thead>
        <tbody id="tbody-banjir">
            <input type="hidden"
                name="id_tahun[]"
                value="{{ $data->id_tahun }}">

            <input type="hidden"
                name="id_bulan[]"
                value="{{ $data->id_bulan }}">

            <input type="hidden"
                name="id_periode[]"
                value="{{ $data->id_periode }}">
        
        <tr class="baris-banjir">
        <td class="table-danger">
            {{ $data->tahun->tahun }}
        </td>

        <td class="table-danger">
            {{ $data->bulan->bulan }}
        </td>

        <td class="table-danger">
            {{ $data->periode->id_periode }}
        </td>
        <!-- KAB -->
        <td class="bg-hijau">

        {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}

        <input
            type="hidden"
            name="id_kabupaten_kota[]"
            value="{{ $data->petugas->kecamatan->kabupaten->id_kabupaten_kota }}">

        </td>

        <!-- KEC -->
        <td class="bg-hijau">

        {{ $data->petugas->kecamatan->nama_kecamatan }}

        <input
            type="hidden"
            name="id_kecamatan[]"
            value="{{ $data->petugas->id_kecamatan }}">

        </td>

        <!-- DES -->
        <td class="table-success">
            <select name="id_desa[]" class="form-select">
                <option value="">Pilih Desa</option>

                @foreach($desa as $d)
                    <option value="{{ $d->id_desa }}">
                        {{ $d->nama_desa }}
                    </option>
                @endforeach
            </select>
        </td>

        <!-- TAN -->
        <td class="table-success">
            <select name="id_komoditas[]" class="form-select">

                <option value="">
                    Pilih Komoditas
                </option>

                @foreach($komoditas as $k)

                <option value="{{ $k->id_komoditas }}">
                    {{ $k->komoditas }}
                </option>

                @endforeach

            </select>
        </td>

        <!-- VAR -->
        <td>
            <input type="text"
                name="var[]"
                class="form-control">
        </td>

        <!-- UMR -->
        <td>
            <input type="text"
                name="umur[]"
                class="form-control">
        </td>

        <!-- LST -->
        <td>
            <input type="number"
                step="0.01"
                name="luas_tanam[]"
                class="form-control">
        </td>

        <!-- WAS -->
        <td>
            <input type="number"
                step="0.01"
                name="luas_waspada[]"
                class="form-control">
        </td>

        <!-- LSRT -->
        <td>
            <input type="number"
                step="0.01"
                name="sps_surut_luas[]"
                class="form-control">
        </td>

        <!-- K_S -->
        <td>
            <input type="text"
                name="sps_surut_ket[]"
                class="form-control">
        </td>

        <!-- LPSO -->
        <td>
            <input type="number"
                step="0.01"
                name="sps_puso_luas[]"
                class="form-control">
        </td>

        <!-- K_P -->
        <td>
            <input type="text"
                name="sps_puso_ket[]"
                class="form-control">
        </td>

        <!-- LT_T -->
        <td>
            <input type="number"
                step="0.01"
                name="luas_tambah_terkena[]"
                class="form-control lt_t">
        </td>

        <!-- LT_P -->
        <td>
            <input type="number"
                step="0.01"
                name="luas_tambah_puso[]"
                class="form-control lt_p">
        </td>

        <!-- LK_T -->
        <td class="bg-pink">
        <input
            type="number"
            step="0.01"
            name="luas_keadaan_terkena[]"
            value="0"
            class="form-control lk_t"
            readonly>
        </td>


        <!-- LK_P -->
        <td class="bg-pink">
        <input
            type="number"
            step="0.01"
            name="luas_keadaan_puso[]"
            value="0"
            class="form-control lk_p"
            readonly>
        </td>

        <!-- UPY -->
        <td>
            <input type="text"
                name="penangan_upaya[]"
                class="form-control">
        </td>

        <!-- J_UPY -->
        <td>
            <input type="number"
                step="0.01"
                name="penangan_jumlah[]"
                class="form-control">
        </td>

        <!-- LAT -->
        <td>
            <input type="number"
                step="0.000000"
                name="koordinat_latitude[]"
                class="form-control">
        </td>

        <!-- LONG -->
        <td>
            <input type="number"
                step="0.000000"
                name="koordinat_longitude[]"
                class="form-control">
        </td>

    </tr>

</tbody>
    </table>

        <div class="row mt-5">

    <div class="col-md-6">
    </div>

    <div class="col-md-6 text-center">

        <div class="bg-pink p-2">

            <strong>
                {{ $data->petugas->kecamatan->nama_kecamatan }},
                {{ now()->translatedFormat('d F Y') }}
            </strong>

            <br>

            POPT Kec.
            {{ $data->petugas->kecamatan->nama_kecamatan }}

        </div>

        <br><br><br>

        <div class="bg-pink p-2">

            <strong>
                {{ $data->petugas->nama }}
            </strong>

            <br>

            NIP :
            {{ $data->petugas->NIP ?? '-' }}

        </div>

    </div>

</div>

        <div class="mt-3">

        <button
            type="button"
            id="tambahBaris"
            class="btn btn-primary">

            Tambah Baris

        </button>

        <button
            type="submit"
            class="btn btn-success">

            Simpan

        </button>

        <a href="{{ route('laporan-kerusakan-tanaman-akibat-banjir.index')}}"
        class="btn btn-secondary">

            Kembali

        </a>

    </div>
    <pre>
    {{ print_r($komoditas->toArray(), true) }}
    </pre>

</form>

</body>
    <script>

document.getElementById('tambahBaris')
.addEventListener('click', function(){

    let tbody =
        document.getElementById('tbody-banjir');

    let contohBaris =
        document.querySelector('.baris-banjir');

    let barisBaru =
        contohBaris.cloneNode(true);

    barisBaru.querySelectorAll('input')
    .forEach(function(input){

        if(input.type === 'hidden'){
            return;
        }

        if(
            input.classList.contains('lk_t')
            ||
            input.classList.contains('lk_p')
        ){
            input.value = 0;
        }
        else{
            input.value = '';
        }

    });

    barisBaru.querySelectorAll('select')
    .forEach(function(select){

        select.selectedIndex = 0;

    });

    tbody.appendChild(barisBaru);

});

</script>
<script>

document.addEventListener('input', function(e){

    let row =
        e.target.closest('tr');

    if(!row) return;

    let lt_t =
        row.querySelector('.lt_t');

    let lt_p =
        row.querySelector('.lt_p');

    let lk_t =
        row.querySelector('.lk_t');

    let lk_p =
        row.querySelector('.lk_p');

    if(lt_t && lk_t)
    {
        lk_t.value =
            lt_t.value || 0;
    }

    if(lt_p && lk_p)
    {
        lk_p.value =
            lt_p.value || 0;
    }

});

</script>
</div>
</html>

