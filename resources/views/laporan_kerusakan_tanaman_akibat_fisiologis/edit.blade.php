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

<form method="POST"
    action="{{ route('laporan-kerusakan-tanaman-akibat-fisiologis.update',$header->id_laporan_kerusakan_tanaman_akibat_fisiologis) }}">

    @csrf
    @method('PUT')

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
        <tbody id="tbody-fisiologis">
            
            <input type="hidden" name="id_periode[]" value="{{ $header->id_periode }}">
            <input type="hidden" name="id_musim_tanam" value="{{ $header->id_musim_tanam }}">
            

            @foreach($detail as $i => $d)
                <tr class="baris-fisiologis">

                <input
                    type="hidden"
                    name="id_detail[]"
                    value="{{ $d->id_det_laporan_kerusakan_tanaman_akibat_fisiologis }}">

                <input
                    type="hidden"
                    name="id_tahun[]"
                    value="{{ $d->id_tahun }}">

                <input
                    type="hidden"
                    name="id_bulan[]"
                    value="{{ $d->id_bulan }}">

                <input
                    type="hidden"
                    name="id_periode[]"
                    value="{{ $header->id_periode }}">
                <!-- THN -->
                <td class="bg-pink">
                    {{ $header->tahun ?? $d->id_tahun }}
                </td>

                <!-- BLN -->
                <td class="bg-pink">
                    {{ $header->bulan ?? $d->id_bulan }}
                </td>

                <!-- PRD -->
                <td class="bg-pink">
                    {{ $d->id_periode }}
                </td>
                <!-- KAB -->
                <td class="bg-hijau">
                    {{ $header->nama_kabupaten_kota }}

                    <input type="hidden"
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

                    <select name="id_desa[]" class="form-select">

                    <option value="">Pilih Desa</option>

                    @foreach($desa as $ds)

                        <option
                            value="{{ $ds->id_desa }}"
                            {{ (int)$d->id_desa === (int)$ds->id_desa ? 'selected' : '' }}>

                            {{ $ds->nama_desa }}

                        </option>

                    @endforeach

                </select>

                </td>

                <!-- KOMODITAS -->
                <td class="bg-hijau">

                    <select name="id_komoditas[]" class="form-select">

                    <option value="">Pilih Komoditas</option>

                    @foreach($komoditas as $k)

                        <option
                            value="{{ $k->id_komoditas }}"
                            {{ (int)$d->id_komoditas === (int)$k->id_komoditas ? 'selected' : '' }}>

                            {{ $k->komoditas }}

                        </option>

                    @endforeach

                </select>

                </td>
            
                <!-- VAR -->
                <td>
                    <input type="text"
                        name="varietas[]"
                        value="{{ $d->varietas }}"
                        class="form-control">
                </td>

                 <!-- UMR -->
                <td>
                    <input type="text"
                        name="umur[]"
                        value="{{ $d->umur }}"
                        class="form-control">
                </td>

                <!-- LUAS TANAM -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="luas_tanam[]"
                        value="{{ $d->luas_tanam }}"
                        class="form-control">
                </td>

                <!-- LUAS WASPADA -->
                <td class="garis-kanan">
                    <input type="number"
                        step="0.01"
                        name="luas_waspada[]"
                        value="{{ $d->luas_waspada }}"
                        class="form-control">
                </td>

                <!-- SPS -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="sps_ringan[]"
                        value="{{ $d->sps_ringan }}"
                        class="form-control sp_r">
                </td>

                <td>
                    <input type="number"
                        step="0.01"
                        name="sps_sedang[]"
                        value="{{ $d->sps_sedang }}"
                        class="form-control sp_s">
                </td>

                 <td>
                    <input type="number"
                        step="0.01"
                        name="sps_berat[]"
                        value="{{ $d->sps_berat }}"
                        class="form-control sp_b">
                </td>

                <td>
                    <input type="number"
                        step="0.01"
                        name="sps_puso[]"
                        value="{{ $d->sps_puso }}"
                        class="form-control sp_ps">
                </td>

                <td>
                    <input type="number"
                        step="0.01"
                        name="sps_pulih[]"
                        value="{{ $d->sps_pulih }}"
                        class="form-control sp_pl">
                </td>

                <td class="bg-pink garis-kanan">
                    <input
                        type="number"
                        step="0.01"
                        name="sps_jumlah[]"
                        value="{{ $d->sps_jumlah }}"
                        readonly
                        class="form-control sp_j">
                </td>

                 <!-- LUAS TAMBAH -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="luas_tambah_ringan[]"
                        value="{{ $d->luas_tambah_ringan }}"
                        class="form-control lt_r">
                </td>

                <td>
                    <input type="number"
                        step="0.01"
                        name="luas_tambah_sedang[]"
                        value="{{ $d->luas_tambah_sedang }}"
                        class="form-control lt_s">
                </td>

                <td>
                    <input type="number"
                        step="0.01"
                        name="luas_tambah_berat[]"
                        value="{{ $d->luas_tambah_berat }}"
                        class="form-control lt_b">
                </td>

                <td>
                    <input type="number"
                        step="0.01"
                        name="luas_tambah_puso[]"
                        value="{{ $d->luas_tambah_puso }}"
                        class="form-control lt_p">
                </td>

                <td class="bg-pink garis-kanan">
                    <input
                        type="number"
                        step="0.01"
                        name="luas_tambah_jumlah[]"
                        value="{{ $d->luas_tambah_jumlah }}"
                        readonly
                        class="form-control lt_j">
                </td>

                 <!-- LUAS KEADAAN -->
                <td class="bg-pink">
                    <input
                        type="number"
                        step="0.01"
                        name="luas_keadaan_ringan[]"
                        value="{{ $d->luas_keadaan_ringan }}"
                        readonly
                        class="form-control lk_r">
                </td>

                <td class="bg-pink">
                    <input
                        type="number"
                        step="0.01"
                        name="luas_keadaan_sedang[]"
                        value="{{ $d->luas_keadaan_sedang }}"
                        readonly
                        class="form-control lk_s">
                </td>

                <td class="bg-pink">
                    <input
                        type="number"
                        step="0.01"
                        name="luas_keadaan_berat[]"
                        value="{{ $d->luas_keadaan_berat }}"
                        readonly
                        class="form-control lk_b">
                </td>

                <td class="bg-pink">
                    <input
                        type="number"
                        step="0.01"
                        name="luas_keadaan_puso[]"
                        value="{{ $d->luas_keadaan_puso }}"
                        readonly
                        class="form-control lk_p">
                </td>

                <td class="bg-pink garis-kanan">
                    <input
                        type="number"
                        step="0.01"
                        name="luas_keadaan_jumlah[]"
                        value="{{ $d->luas_keadaan_jumlah }}"
                        readonly
                        class="form-control lk_j">
                </td>

                <!-- UPAYA -->
                <td>
                    <input type="text"
                        name="penanganan_upaya[]"
                        value="{{ $d->penanganan_upaya }}"
                        class="form-control">
                </td>

                <!-- LUAS UPAYA -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="penanganan_luas[]"
                        value="{{ $d->penanganan_luas }}"
                        class="form-control">
                </td>

                <!-- LATITUDE -->
                <td>
                    <input type="text"
                        name="latitude[]"
                        value="{{ $d->latitude }}"
                        class="form-control">
                </td>

                <!-- LONGITUDE -->
                <td>
                    <input type="text"
                        name="longitude[]"
                        value="{{ $d->longitude }}"
                        class="form-control">
                </td>

            </tr>
            @endforeach
        </tbody>
   
    </table>

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

            <a href="{{ route('laporan-kerusakan-tanaman-akibat-fisiologis.index') }}"
            class="btn btn-secondary">

                Kembali

            </a>

        </div>

</form>
     <script>

            document.getElementById('tambahBaris')
            .addEventListener('click', function(){

                let tbody =
                    document.getElementById('tbody-fisiologis');

                let contohBaris =
                    document.querySelector('.baris-fisiologis');

                let barisBaru =
                    contohBaris.cloneNode(true);

                barisBaru.querySelectorAll('input')
                .forEach(function(input){

                    if(input.type === 'hidden'){
                        return;
                    }

                    if(
                        input.classList.contains('sps_j')
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
        <script>

document.addEventListener("input", function(e){

    let row = e.target.closest("tr");
    if(!row) return;

    // =====================
    // SISA PERIODE
    // =====================

    let sp_r  = parseFloat(row.querySelector(".sp_r").value) || 0;
    let sp_s  = parseFloat(row.querySelector(".sp_s").value) || 0;
    let sp_b  = parseFloat(row.querySelector(".sp_b").value) || 0;
    let sp_ps = parseFloat(row.querySelector(".sp_ps").value) || 0;
    let sp_pl = parseFloat(row.querySelector(".sp_pl").value) || 0;

    let sp_j = sp_r + sp_s + sp_b + sp_ps + sp_pl;

    row.querySelector(".sp_j").value = sp_j;


    // =====================
    // LUAS TAMBAH
    // =====================

    let lt_r = parseFloat(row.querySelector(".lt_r").value) || 0;
    let lt_s = parseFloat(row.querySelector(".lt_s").value) || 0;
    let lt_b = parseFloat(row.querySelector(".lt_b").value) || 0;
    let lt_p = parseFloat(row.querySelector(".lt_p").value) || 0;

    let lt_j = lt_r + lt_s + lt_b + lt_p;

    row.querySelector(".lt_j").value = lt_j;


    // =====================
    // LUAS KEADAAN
    // =====================

    let lk_r = sp_r + lt_r;
    let lk_s = sp_s + lt_s;
    let lk_b = sp_b + lt_b;
    let lk_p = sp_ps + lt_p;

    row.querySelector(".lk_r").value = lk_r;
    row.querySelector(".lk_s").value = lk_s;
    row.querySelector(".lk_b").value = lk_b;
    row.querySelector(".lk_p").value = lk_p;

    let lk_j = lk_r + lk_s + lk_b + lk_p;

    row.querySelector(".lk_j").value = lk_j;

});

</script>

    </body>
</html>