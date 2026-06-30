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

            <td>Kabupaten/Kota</td>

            <td class="bg-pink">

               {{ $header->nama_kabupaten_kota }}
            </td>

        </tr>

        <tr>

            <td>Kecamatan</td>

            <td class="bg-pink">

                {{ $header->nama_kecamatan }}

            </td>

        </tr>

    </table>

    <table class="table table-bordered w-auto">

        <tr>

            <td>Periode Pengamatan</td>

            <td class="bg-pink">

                {{ $header->periode_pengamatan }}

            </td>

        </tr>

        <tr>

            <td>Musim Tanam</td>

            <td class="bg-pink">

                {{ $header->musim_tanam }}

            </td>

        </tr>

    </table>

</div>

<form
    method="POST"
    action="{{ route('laporan-kerusakan-tanaman-akibat-bencana-alam.update', $header->id_laporan_kerusakan_tanaman_akibat_bencana_alam) }}">
@csrf
    @method('PUT')

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

@foreach($detail as $i => $d)

<tr class="baris-bencana">

    <input type="hidden"
        name="id_detail[]"
        value="{{ $d->id_det_laporan_kerusakan_tanaman_akibat_bencana_alam }}">

    <input type="hidden"
        name="id_tahun[]"
        value="{{ $d->id_tahun }}">

    <input type="hidden"
        name="id_bulan[]"
        value="{{ $d->id_bulan }}">

    <input type="hidden"
        name="id_periode[]"
        value="{{ $d->id_periode }}">
    
    <input type="hidden"
        name="id_periode[]"
        value="{{ $d->id_periode }}">

    <input type="hidden"
        name="id_kabupaten_kota[]"
        value="{{ $d->id_kabupaten_kota }}">

    <input type="hidden"
        name="id_kecamatan[]"
        value="{{ $d->id_kecamatan }}">

    <!-- THN -->
    <td class="bg-pink">
        {{ $d->id_tahun }}
    </td>

    <!-- BLN -->
    <td class="bg-pink">
        {{ $d->id_bulan }}
    </td>

    <!-- PRD -->
    <td class="bg-pink">
        {{ $d->id_periode }}
    </td>

    <!-- KAB -->
    <td class="bg-hijau">
        {{ $header->nama_kabupaten_kota }}
    </td>

    <!-- KEC -->
    <td class="bg-hijau">
        {{ $header->nama_kecamatan }}
    </td>

    <!-- DESA -->
    <td class="bg-hijau">
        <select name="id_desa[]" class="form-select">

            @foreach($desa as $ds)

            <option value="{{ $ds->id_desa }}"
                {{ $d->id_desa == $ds->id_desa ? 'selected' : '' }}>
                {{ $ds->nama_desa }}
            </option>

            @endforeach

        </select>
    </td>

    <!-- KOMODITAS -->
    <td class="bg-hijau">
        <select name="id_komoditas[]" class="form-select">

            @foreach($komoditas as $k)

            <option value="{{ $k->id_komoditas }}"
                {{ $d->id_komoditas == $k->id_komoditas ? 'selected' : '' }}>
                {{ $k->komoditas }}
            </option>

            @endforeach

        </select>
    </td>

    <!-- VAR -->
    <td>
        <input type="text"
            name="var[]"
            value="{{ $d->var }}"
            class="form-control">
    </td>

    <!-- UMR -->
    <td>
        <input type="text"
            name="umr[]"
            value="{{ $d->umr }}"
            class="form-control">
    </td>

    <!-- LST -->
    <td>
        <input type="number"
            step="0.01"
            name="lst[]"
            value="{{ $d->lst }}"
            class="form-control">
    </td>

    <!-- WAS -->
    <td class="garis-kanan">
        <input type="number"
            step="0.01"
            name="was[]"
            value="{{ $d->was }}"
            class="form-control">
    </td>

    <!-- LSRT -->
    <td>
        <input type="number"
            step="0.01"
            name="lsrt[]"
            value="{{ $d->lsrt }}"
            class="form-control lsrt">
    </td>

    <!-- K_S -->
    <td>
        <input type="text"
            name="k_s[]"
            value="{{ $d->k_s }}"
            class="form-control">
    </td>

    <!-- LPSO -->
    <td>
        <input type="number"
            step="0.01"
            name="lpso[]"
            value="{{ $d->lpso }}"
            class="form-control lpso">
    </td>

    <!-- K_P -->
    <td class="garis-kanan">
        <input type="text"
            name="k_p[]"
            value="{{ $d->k_p }}"
            class="form-control">
    </td>

    <!-- LT_T -->
    <td>
        <input type="number"
            step="0.01"
            name="lt_t[]"
            value="{{ $d->lt_t }}"
            class="form-control lt_t">
    </td>

    <!-- LT_P -->
    <td class="garis-kanan">
        <input type="number"
            step="0.01"
            name="lt_p[]"
            value="{{ $d->lt_p }}"
            class="form-control lt_p">
    </td>

    <!-- LK_T -->
    <td class="bg-pink">
        <input
            type="number"
            step="0.01"
            name="lk_t[]"
            value="{{ $d->lk_t }}"
            readonly
            class="form-control lk_t">
    </td>

    <!-- LK_P -->
    <td class="bg-pink garis-kanan">
        <input
            type="number"
            step="0.01"
            name="lk_p[]"
            value="{{ $d->lk_p }}"
            readonly
            class="form-control lk_p">
    </td>

    <!-- UPY -->
    <td>
        <input type="text"
            name="upy[]"
            value="{{ $d->upy }}"
            class="form-control">
    </td>

    <!-- J_UPY -->
    <td class="garis-kanan">
        <input type="number"
            step="0.01"
            name="j_upy[]"
            value="{{ $d->j_upy }}"
            class="form-control">
    </td>

    <!-- LAT -->
    <td>
        <input type="number"
            step="0.000000"
            name="lat[]"
            value="{{ $d->lat }}"
            class="form-control">
    </td>

    <!-- LONG -->
    <td>
        <input type="number"
            step="0.000000"
            name="long[]"
            value="{{ $d->long }}"
            class="form-control">
    </td>
    
</tr>
@endforeach
</tbody>
</table>

</div>

<div class="row mt-5">

    <div class="col-md-6">
    </div>

    <div class="col-md-6 text-center">

        <div class="bg-pink p-2">

                    <strong>
                        {{ $header->nama_kecamatan }},
                        {{ now()->translatedFormat('d F Y') }}
                    </strong>

                    <br>

                    POPT Kec.
                    {{ $header->nama_kecamatan }}

                </div>

                <br><br><br>

                <div class="bg-pink p-2">

                    <strong>
                        ..
                    </strong>

                    <br>

                    NIP :
                    ..

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
