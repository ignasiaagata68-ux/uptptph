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

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('laporan-peringatan-dini.update', $header->id_laporan_peringatan_dini) }}" method="POST">

    @csrf
    @method('PUT')

    <table style="width:850px;">

        <tr>

            <td width="80">

                Formulir 17.

            </td>

            <td style="text-align:left;padding-left:5px;">

                Laporan Serangan OPT oleh POPT kepada Koordinator POPT/LPHP (Insidentil)

            </td>

        </tr>

    </table>

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

                <td width="120" style="text-align:left;padding-left:4px;">

                    Kabupaten/Kota

                </td>

                <td class="bg-pink" style="text-align:left;padding-left:4px;">

                    {{ $header->nama_kabupaten_kota }}
                <input
                        type="hidden"
                            name="id_kabupaten_kota"
                            value="{{ $header->id_kabupaten_kota }}">
                </td>

            </tr>

            <tr>

                <td style="text-align:left;padding-left:4px;">

                    Kecamatan

                </td>

                <td class="bg-pink" style="text-align:left;padding-left:4px;">

                    {{ $header->nama_kecamatan }}

                <input
                    type="hidden"
                    name="id_kecamatan"
                    value="{{ $header->id_kecamatan }}">

                </td>

            </tr>

        </table>

    </div>

<div class="kanan">

<table class="tbl-kanan">

    <tr>

        <td width="150" style="text-align:left;padding-left:4px;">

            Periode Pengamatan

        </td>

        <td class="bg-pink" style="text-align:left;padding-left:4px;">

           {{ $header->periode_pengamatan }}

        <input
            type="hidden"
            name="id_periode[]"
            value="{{ $header->id_periode }}">

        </td>

    </tr>

    <tr>

        <td style="text-align:left;padding-left:4px;">

            Musim Tanam

        </td>

        <td class="bg-pink" style="text-align:left;padding-left:4px;">

            {{ $header->musim_tanam }}

        <input
            type="hidden"
            name="id_musim_tanam[]"
            value="{{ $header->id_musim_tanam }}">

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

    <tbody id="tbody-peringatan">
        <input
            type="hidden"
            name="id_tahun"
            value="{{ $detail->first()->id_tahun }}">

        <input
            type="hidden"
            name="id_bulan"
            value="{{ $detail->first()->id_bulan }}">

        <input
            type="hidden"
            name="id_periode"
            value="{{ $header->id_periode }}">

        <input
            type="hidden"
            name="id_musim_tanam"
            value="{{ $header->id_musim_tanam }}">

        @foreach($detail as $d)
    <tr class="baris-peringatan">

        <!-- TAHUN -->
        <td class="bg-pink">

            {{ $detail->first()->tahun }}

        </td>

        <!-- BULAN -->
        <td class="bg-pink">

            {{ $detail->first()->bulan }}

        </td>

        <!-- PERIODE -->
        <td class="bg-pink">

            {{ $header->periode_pengamatan }}

        </td>

        <!-- KABUPATEN -->
        <td class="bg-hijau">
            {{ $kabupaten->first()->nama_kabupaten_kota }}
        </td>

        <!-- KECAMATAN -->

        <td class="bg-hijau">
            {{ $kecamatan->first()->nama_kecamatan }}
        </td>

        <!-- DESA -->

        <td class="bg-hijau">

            <select
            name="id_desa[]">

                <option value="">

                    -- Pilih --

                </option>

                @foreach($desa as $desaItem)

                <option
                    value="{{ $desaItem->id_desa }}"
                    {{ $d->id_desa == $desaItem->id_desa ? 'selected' : '' }}>

                    {{ $desaItem->nama_desa }}

                </option>

                @endforeach

            </select>

        </td>

        <!-- POKTAN -->

        <td>

            <input
            type="text"
            name="poktan[]"
            value="{{ $d->poktan }}">

        </td>

        <!-- LONGITUDE -->

        <td>

            <input
            type="text"
            name="longitude[]"
            value="{{ $d->longitude }}">

        </td>

        <!-- LATITUDE -->

        <td>

            <input
            type="text"
            name="latitude[]"
            value="{{ $d->latitude }}">

        </td>

        <!-- KOMODITAS -->

        <td class="bg-hijau">

            <select
                name="id_komoditas[]"
                class="komoditas">

                <option value="">
                    -- Pilih --
                </option>

                @foreach($komoditas as $kom)

                <option
                    value="{{ $kom->id_komoditas }}"
                    {{ $d->id_komoditas == $kom->id_komoditas ? 'selected' : '' }}>

                    {{ $kom->komoditas }}

                </option>

                @endforeach

            </select>

        </td>
            <!-- VARIETAS -->

        <td>

            <input
            type="text"
            name="varietas[]"
            value="{{ $d->varietas }}">

        </td>

        <!-- STADIA / UMUR -->

        <td>

            <input
            type="text"
            name="umur[]"
             value="{{ $d->umur }}">

        </td>

        <!-- JENIS OPT -->

        <td class="bg-hijau">

            <select
                name="id_opt[]"
                class="opt">

                <option value="">
                    -- Pilih Komoditas Dulu --
                </option>

            </select>

        </td>

        <!-- LUAS TERSERANG -->

        <td>

            <input
            type="number"
            step="0.01"
            name="luas_terserang[]"
            value="{{ $d->luas_terserang }}">

        </td>

        <!-- INTENSITAS -->

        <td>

            <input
                type="number"
                step="0.01"
                name="intens[]"
                value="{{ $d->intens }}">

        </td>

        <!-- KEPADATAN POPULASI -->

        <td>

            <input
            type="text"
            name="kepadatan_populasi[]"
            value="{{ $d->kepadatan_populasi }}">

        </td>

        <!-- LUAS WASPADA -->

        <td>

            <input
            type="number"
            step="0.01"
            name="luas_waspada[]"
            value="{{ $d->luas_waspada }}">

        </td>

        <!-- TANGGAL PENGAMATAN -->

        <td>

            <input
            type="date"
            name="tanggal_pengamatan[]"
            value="{{ $d->tgl_pengamatan }}">

        </td>

    </tr>
@endforeach
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

    <table style="width:280px; float:right;">

    <tr>

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
                ................................
            </strong>

            <br>

            NIP :
            ................................

        </div>
    </tr>

    </table>

    </td>

    </tr>

    </table>

    <br>

<div>

    <button
    type="button"
    class="btn btn-primary"
    id="tambahBaris">

    Tambah Baris

    </button>

    <button
    type="submit"
    class="btn btn-success">

    Update

    </button>

    <a
    href="{{ route('laporan-peringatan-dini.index') }}"
    class="btn btn-secondary">

    Kembali

    </a>

</div>

</form>
    <script>

function loadOpt(komoditasSelect){

    let idKomoditas = komoditasSelect.value;

    let row = komoditasSelect.closest('tr');

    let optSelect = row.querySelector('.opt');

    optSelect.innerHTML =
        '<option value="">Loading...</option>';

    if(idKomoditas==''){

        optSelect.innerHTML =
            '<option value="">-- Pilih Komoditas Dulu --</option>';

        return;

    }

    fetch("{{ route('laporan-peringatan-dini.get-opt', ':id') }}".replace(':id', idKomoditas))

    .then(response => response.json())

    .then(data => {

        optSelect.innerHTML =
            '<option value="">-- Pilih OPT --</option>';

        data.forEach(function(opt){

            optSelect.innerHTML +=
                `<option value="${opt.id_opt}">
                    ${opt.nama_opt}
                </option>`;

        });

    });

}

// Event pertama
document.addEventListener('change',function(e){

    if(e.target.classList.contains('komoditas')){

        loadOpt(e.target);

    }

});

// Tambah Baris
document
.getElementById('tambahBaris')
.addEventListener('click',function(){

    let tbody =
    document.getElementById('tbody-peringatan');

    let row =
    document.querySelector('.baris-peringatan')
    .cloneNode(true);

    row.querySelectorAll('input').forEach(function(i){

        if(i.type!='hidden'){

            i.value='';

        }

    });

    row.querySelectorAll('select').forEach(function(s){

        s.selectedIndex=0;

    });

    row.querySelector('.opt').innerHTML =
        '<option value="">-- Pilih Komoditas Dulu --</option>';

    tbody.appendChild(row);

});

</script>
</body>

</html>