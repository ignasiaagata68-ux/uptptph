<!DOCTYPE html>
<html>
<head>
    <title>Create LAPORAN KERUSAKAN TANAMAN AKIBAT KEKERINGAN</title>

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
      action="{{ route('laporan-kerusakan-tanaman-akibat-kekeringan.store') }}">

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

</tr>

</thead>
        <tbody id="tbody-kekeringan">

<input type="hidden"
    name="id_tahun[]"
    value="{{ $data->id_tahun }}">

<input type="hidden"
    name="id_bulan[]"
    value="{{ $data->id_bulan }}">

<input type="hidden"
    name="id_periode[]"
    value="{{ $data->id_periode }}">
    
<input
    type="hidden"
    name="id_musim_tanam"
    value="{{ $data->id_musim_tanam }}">

<tr class="baris-kekeringan">

    <!-- THN -->
    <td class="table-danger">
        {{ $data->tahun->tahun }}
    </td>

    <!-- BLN -->
    <td class="table-danger">
        {{ $data->bulan->bulan }}
    </td>

    <!-- PRD -->
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
        <select
            name="id_desa[]"
            class="form-select"
            style="min-width:200px;">

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
        <select
            name="id_komoditas[]"
            class="form-select"
            style="min-width:200px;">

            <option value="">Pilih Komoditas</option>

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
            class="form-control"
            style="min-width:100px;">
    </td>

    <!-- UMR -->
    <td>
        <input type="text"
            name="umr[]"
            class="form-control"
            style="min-width:100px;">
    </td>

    <!-- LST -->
    <td>
        <input type="number"
            step="0.01"
            name="lst[]"
            class="form-control"
            style="min-width:100px;">
    </td>

    <!-- WAS -->
    <td>
        <input type="number"
            step="0.01"
            name="was[]"
            class="form-control"
            style="min-width:100px;">
    </td>

    <!-- SP_R -->
    <td>
        <input type="number"
            step="0.01"
            name="sp_r[]"
            class="form-control sp_r"
            style="min-width:100px;">
    </td>

    <!-- SP_S -->
    <td>
        <input type="number"
            step="0.01"
            name="sp_s[]"
            class="form-control sp_s"
            style="min-width:100px;">
    </td>

    <!-- SP_B -->
    <td>
        <input type="number"
            step="0.01"
            name="sp_b[]"
            class="form-control sp_b"
            style="min-width:100px;">
    </td>

    <!-- SP_PS -->
    <td>
        <input type="number"
            step="0.01"
            name="sp_ps[]"
            class="form-control sp_ps"
            style="min-width:100px;">
    </td>

    <!-- SP_PL -->
    <td>
        <input type="number"
            step="0.01"
            name="sp_pl[]"
            class="form-control sp_pl"
            style="min-width:100px;">
    </td>

    <!-- SP_J -->
    <td class="bg-pink">
        <input type="number"
            name="sp_j[]"
            class="form-control sp_j"
            readonly
            value="0"
            style="min-width:100px;">
    </td>

    <!-- LT_R -->
    <td>
        <input type="number"
            step="0.01"
            name="lt_r[]"
            class="form-control lt_r"
            style="min-width:100px;">
    </td>

    <!-- LT_S -->
    <td>
        <input type="number"
            step="0.01"
            name="lt_s[]"
            class="form-control lt_s"
            style="min-width:100px;">
    </td>

    <!-- LT_B -->
    <td>
        <input type="number"
            step="0.01"
            name="lt_b[]"
            class="form-control lt_b"
            style="min-width:100px;">
    </td>

    <!-- LT_P -->
    <td>
        <input type="number"
            step="0.01"
            name="lt_p[]"
            class="form-control lt_p"
            style="min-width:100px;">
    </td>

    <!-- LT_J -->
    <td class="bg-pink">
        <input type="number"
            name="lt_j[]"
            class="form-control lt_j"
            readonly
            value="0"
            style="min-width:100px;">
    </td>

    <!-- LK_R -->
    <td class="bg-pink">
        <input type="number"
            name="lk_r[]"
            class="form-control lk_r"
            readonly
            value="0"
            style="min-width:120px;">
    </td>

    <!-- LK_S -->
    <td class="bg-pink">
        <input type="number"
            name="lk_s[]"
            class="form-control lk_s"
            readonly
            value="0"
            style="min-width:120px;">
    </td>

    <!-- LK_B -->
    <td class="bg-pink">
        <input type="number"
            name="lk_b[]"
            class="form-control lk_b"
            readonly
            value="0"
            style="min-width:120px;">
    </td>

    <!-- LK_P -->
    <td class="bg-pink">
        <input type="number"
            name="lk_p[]"
            class="form-control lk_p"
            readonly
            value="0"
            style="min-width:120px;">
    </td>

    <!-- LK_J -->
    <td class="bg-pink">
        <input type="number"
            name="lk_j[]"
            class="form-control lk_j"
            readonly
            value="0"
            style="min-width:120px;">
    </td>

    <!-- UPY -->
    <td>
        <input
            type="number"
            step="0.01"
            name="upy[]"
            class="form-control"
            style="min-width:120px;">
    </td>

    <!-- L_UPY -->
    <td>
        <input type="number"
            step="0.01"
            name="l_upy[]"
            class="form-control"
            style="min-width:100px;">
    </td>

    <!-- LAT -->
    <td>
        <input type="text"
            name="lat[]"
            class="form-control"
            style="min-width:120px;">
    </td>

    <!-- LONG -->
    <td>
        <input type="text"
            name="long[]"
            class="form-control"
            style="min-width:120px;">
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

        <a href="{{ route('laporan-kerusakan-tanaman-akibat-kekeringan.index')}}"
        class="btn btn-secondary">

            Kembali

        </a>

    </div>


</form>

</body>
    <script>

document.addEventListener('input', function(e){

    let row = e.target.closest('tr');

    if(!row) return;

    let sp_r  = parseFloat(row.querySelector('.sp_r')?.value)  || 0;
    let sp_s  = parseFloat(row.querySelector('.sp_s')?.value)  || 0;
    let sp_b  = parseFloat(row.querySelector('.sp_b')?.value)  || 0;
    let sp_ps = parseFloat(row.querySelector('.sp_ps')?.value) || 0;
    let sp_pl = parseFloat(row.querySelector('.sp_pl')?.value) || 0;

    let lt_r = parseFloat(row.querySelector('.lt_r')?.value) || 0;
    let lt_s = parseFloat(row.querySelector('.lt_s')?.value) || 0;
    let lt_b = parseFloat(row.querySelector('.lt_b')?.value) || 0;
    let lt_p = parseFloat(row.querySelector('.lt_p')?.value) || 0;

    let sp_j = sp_r + sp_s + sp_b + sp_ps + sp_pl;

    let lt_j = lt_r + lt_s + lt_b + lt_p;

    let lk_r = sp_r + lt_r;
    let lk_s = sp_s + lt_s;
    let lk_b = sp_b + lt_b;
    let lk_p = sp_ps + lt_p;

    let lk_j = sp_j + lt_j;

    row.querySelector('.sp_j').value = sp_j;
    row.querySelector('.lt_j').value = lt_j;

    row.querySelector('.lk_r').value = sp_r + lt_r;
    row.querySelector('.lk_s').value = sp_s + lt_s;
    row.querySelector('.lk_b').value = sp_b + lt_b;
    row.querySelector('.lk_p').value = sp_ps + lt_p;

    row.querySelector('.lk_j').value = lk_j;

});


</script>
    <script>

document.getElementById('tambahBaris')
.addEventListener('click', function(){

    let tbody =
        document.getElementById('tbody-kekeringan');

    let contohBaris =
        document.querySelector('.baris-kekeringan');

    let barisBaru =
        contohBaris.cloneNode(true);

    barisBaru.querySelectorAll('input')
    .forEach(function(input){

        if(input.type === 'hidden'){
            return;
        }

        if(
            input.classList.contains('sp_j')
            ||
            input.classList.contains('lt_j')
            ||
            input.classList.contains('lk_r')
            ||
            input.classList.contains('lk_s')
            ||
            input.classList.contains('lk_b')
            ||
            input.classList.contains('lk_p')
            ||
            input.classList.contains('lk_j')
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
</div>
</html>

