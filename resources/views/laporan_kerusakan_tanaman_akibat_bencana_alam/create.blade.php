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
            font-size:12px;
        }

        table{
            white-space:nowrap;
        }

        table th,
        table td{
            border:1px solid black !important;
            text-align:center;
            vertical-align:middle;
            padding:2px;
            font-size:11px;
        }

        .bg-biru{
            background:#b8cce4;
        }

        .bg-kuning{
            background:yellow;
        }

        .bg-hijau{
            background:#d8e4bc;
        }

        .bg-pink{
            background:#e6b8b7;
        }

        .garis-kanan{
            border-right:3px solid black !important;
        }

        .judul{
            font-size:28px;
            font-weight:bold;
            text-align:center;
        }

        .subjudul{
            text-align:center;
            font-weight:bold;
            margin-bottom:20px;
        }

        input,
        select{
            min-width:70px;
            padding:2px !important;
            font-size:11px !important;
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

            <td>Kabupaten/Kota</td>

            <td class="bg-pink">

                {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}

            </td>

        </tr>

        <tr>

            <td>Kecamatan</td>

            <td class="bg-pink">

                {{ $data->petugas->kecamatan->nama_kecamatan }}

            </td>

        </tr>

    </table>

    <table class="table table-bordered w-auto">

        <tr>

            <td>Periode Pengamatan</td>

            <td class="bg-pink">

                {{ $data->periode->periode_pengamatan }}

            </td>

        </tr>

        <tr>

            <td>Musim Tanam</td>

            <td class="bg-pink">

                {{ $data->musimTanam->musim_tanam }}

            </td>

        </tr>

    </table>

</div>
<form method="POST"
      action="{{ route('laporan-kerusakan-tanaman-akibat-bencana-alam.store') }}">

    @csrf

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

</tr>

</thead>
    <tbody id="tbody-bencana">

<input type="hidden"
    name="id_tahun[]"
    value="{{ $data->id_tahun }}">

<input type="hidden"
    name="id_bulan[]"
    value="{{ $data->id_bulan }}">

<input type="hidden"
    name="id_periode[]"
    value="{{ $data->id_periode }}">

<tr class="baris-bencana">

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
            style="min-width:180px;">

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
            style="min-width:180px;">

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
            class="form-control">
    </td>

    <!-- UMR -->
    <td>
        <input type="text"
            name="umr[]"
            class="form-control">
    </td>

    <!-- LST -->
    <td>
        <input type="number"
            step="0.01"
            name="lst[]"
            class="form-control">
    </td>

    <!-- WAS -->
    <td class="garis-kanan">
        <input type="number"
            step="0.01"
            name="was[]"
            class="form-control">
    </td>

    <!-- LSRT -->
    <td>
        <input type="number"
            step="0.01"
            name="lsrt[]"
            class="form-control lsrt">
    </td>

    <!-- K_S -->
    <td>
        <input type="text"
            name="k_s[]"
            class="form-control">
    </td>

    <!-- LPSO -->
    <td>
        <input type="number"
            step="0.01"
            name="lpso[]"
            class="form-control lpso">
    </td>

    <!-- K_P -->
    <td class="garis-kanan">
        <input type="text"
            name="k_p[]"
            class="form-control">
    </td>

    <!-- LT_T -->
    <td>
        <input type="number"
            step="0.01"
            name="lt_t[]"
            class="form-control lt_t">
    </td>

    <!-- LT_P -->
    <td class="garis-kanan">
        <input type="number"
            step="0.01"
            name="lt_p[]"
            class="form-control lt_p">
    </td>

    <!-- LK_T -->
    <td class="bg-pink">
        <input
            type="number"
            step="0.01"
            name="lk_t[]"
            value="0"
            readonly
            class="form-control lk_t">
    </td>

    <!-- LK_P -->
    <td class="bg-pink garis-kanan">
        <input
            type="number"
            step="0.01"
            name="lk_p[]"
            value="0"
            readonly
            class="form-control lk_p">
    </td>

    <!-- UPY -->
    <td>
        <input type="text"
            name="upy[]"
            class="form-control">
    </td>

    <!-- J_UPY -->
    <td class="garis-kanan">
        <input type="number"
            step="0.01"
            name="j_upy[]"
            class="form-control">
    </td>

    <!-- LAT -->
    <td>
        <input type="number"
            step="0.000000"
            name="lat[]"
            class="form-control">
    </td>

    <!-- LONG -->
    <td>
        <input type="number"
            step="0.000000"
            name="long[]"
            class="form-control">
    </td>

</tr>

</tbody>
</table>

</div>

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

    <a href="{{ route('laporan-kerusakan-tanaman-akibat-bencana-alam.index') }}"
        class="btn btn-secondary">

        Kembali

    </a>

</div>

</form>
<script>

document.getElementById('tambahBaris')
.addEventListener('click',function(){

    let tbody =
        document.getElementById('tbody-bencana');

    let contoh =
        document.querySelector('.baris-bencana');

    let baru =
        contoh.cloneNode(true);

    baru.querySelectorAll('input')
    .forEach(function(input){

        if(input.type=='hidden')
            return;

        if(input.readOnly)
        {
            input.value=0;
        }
        else
        {
            input.value='';
        }

    });

    baru.querySelectorAll('select')
    .forEach(function(select){

        select.selectedIndex=0;

    });

    tbody.appendChild(baru);

});

</script>
<script>

document.addEventListener('input',function(e){

    let row =
        e.target.closest('tr');

    if(!row) return;

    let lsrt =
        parseFloat(row.querySelector('.lsrt').value) || 0;

    let lpso =
        parseFloat(row.querySelector('.lpso').value) || 0;

    let lt_t =
        parseFloat(row.querySelector('.lt_t').value) || 0;

    let lt_p =
        parseFloat(row.querySelector('.lt_p').value) || 0;

    row.querySelector('.lk_t').value =
        lpso + lt_t;

    row.querySelector('.lk_p').value =
        lpso + lt_p;

});

</script>
</body>
</html>
