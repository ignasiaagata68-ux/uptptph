<!DOCTYPE html>
<html>

<head>

    <title>Laporan Peringatan Dini</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

        <style>

                body{

                    font-size:12px;

                }

                table{

                    width:100%;
                    border-collapse:collapse;

                }

                table th,
                table td{

                    border:1px solid #000;
                    padding:2px;
                    text-align:center;
                    vertical-align:middle;

                }

                .bg-biru{

                    background:#b8cce4;

                }

                .bg-kuning{

                    background:#ffff00;

                }

                .bg-pink{

                    background:#e6b8b7;

                }

                .bg-hijau{

                    background:#d8e4bc;

                }

                .judul{

                    font-size:30px;
                    font-weight:bold;
                    text-align:center;

                }

                .subjudul{

                    font-size:18px;
                    text-align:center;
                    margin-bottom:15px;

                }

                input,
                select{

                    border:none!important;
                    border-radius:0!important;
                    box-shadow:none!important;
                    font-size:12px!important;
                    padding:2px!important;
                    height:26px!important;

                }

                input:focus,
                select:focus{

                    box-shadow:none!important;

                }

        </style>

</head>

    <body>

        <div class="container-fluid mt-3">

        <div class="judul">

            LAPORAN PERINGATAN DINI

        </div>

        <div class="subjudul">

            (Padi/Jagung)

        </div>

        <form method="POST"
            action="{{ route('laporan-peringatan-dini.store') }}">

        @csrf

        <div class="row mb-2">

        <div class="col-md-6">

            <table>

                <tr>

                    <td width="180">

                        Kabupaten/Kota

                    </td>

                    <td class="bg-pink">

                        {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}

                    </td>

                </tr>

                <tr>

                    <td>

                        Kecamatan

                    </td>

                    <td class="bg-pink">

                        {{ $data->petugas->kecamatan->nama_kecamatan }}

                    </td>

                </tr>

            </table>

        </div>

    <div class="col-md-4 offset-md-2">

    <table>

        <tr>

            <td width="170">

                Periode Pengamatan

            </td>

            <td class="bg-pink">

                {{ $data->periode->periode }}

            </td>

        </tr>

        <tr>

            <td>

                Musim Tanam

            </td>

            <td class="bg-pink">

                {{ $data->musimTanam->musim_tanam }}

            </td>

        </tr>

    </table>

</div>

</div>

    <table>

        <thead>

            <tr class="bg-biru">

                <th rowspan="2">

                    Tahun

                </th>

                <th rowspan="2">

                    Bulan

                </th>

                <th rowspan="2">

                    Periode

                </th>

                <th rowspan="2">

                    Kab/Kota

                </th>

                <th rowspan="2">

                    Kecamatan

                </th>

                <th rowspan="2">

                    Desa

                </th>

                <th rowspan="2">

                    Poktan

                </th>

                <th colspan="2">

                    Titik Koordinat

                </th>

                <th rowspan="2">

                    Komoditas Tanaman

                </th>

                <th rowspan="2">

                    Varietas

                </th>

                <th rowspan="2">

                    Stadia/
                    Umur Tan (hst)

                </th>

                <th rowspan="2">

                    Jenis OPT

                </th>

                <th rowspan="2">

                    Luas
                    Terserang
                    (Ha)

                </th>

                <th rowspan="2">

                    Intens
                    (%)

                </th>

                <th rowspan="2">

                    Kepadatan
                    Populasi

                </th>

                <th rowspan="2">

                    Luas
                    Waspada
                    (Ha)

                </th>

                <th rowspan="2">

                    Tgl
                    Pengamatan

                </th>

            </tr>

                <tr class="bg-biru">

                    <th>

                        Longitude

                    </th>

                    <th>

                        Latitude

                    </th>

                </tr>

        <tr class="bg-kuning">

            <th>Thn</th>

            <th>Bln</th>

            <th>Periode</th>

            <th>Kab</th>

            <th>Kec</th>

            <th>Desa</th>

            <th>Poktan</th>

            <th>Long</th>

            <th>Lat</th>

            <th>Tan</th>

            <th>Var</th>

            <th>Umur</th>

            <th>OPT</th>

            <th>Luas</th>

            <th>Int (%)</th>

            <th>Pop</th>

            <th>Was</th>

            <th>Tgl</th>

        </tr>

</thead>

    <tbody>
        @foreach($desa as $d)

        <input type="hidden"
        name="id_kabupaten_kota[]"
        value="{{ $data->petugas->kecamatan->kabupaten->id_kabupaten_kota }}">

        <input type="hidden"
        name="id_kecamatan[]"
        value="{{ $data->petugas->id_kecamatan }}">

        <input type="hidden"
        name="id_periode[]"
        value="{{ $data->id_periode }}">

        <input type="hidden"
        name="id_tahun[]"
        value="{{ $data->id_tahun }}">

        <input type="hidden"
        name="id_bulan[]"
        value="{{ $data->id_bulan }}">

        <tr>

            <td class="bg-pink">

                {{ $data->tahun->tahun }}

            </td>

            <td class="bg-pink">

                {{ $data->bulan->bulan }}

            </td>

            <td class="bg-pink">

                {{ $data->periode->periode_pengamatan }}

            </td>

    <td class="bg-hijau">

        <select name="id_kabupaten_kota[]" class="form-select">

        @foreach($kabupaten as $k)

        <option value="{{ $k->id_kabupaten_kota }}">
            {{ $k->nama_kabupaten_kota }}
        </option>

        @endforeach

        </select>

    </td>

    <td class="bg-hijau">

        <select
        name="id_kecamatan[]"
        class="form-select">

        @foreach($kecamatan as $kec)

        <option
        value="{{ $kec->id_kecamatan }}"
        {{ $kec->id_kecamatan==$data->petugas->id_kecamatan?'selected':'' }}>

        {{ $kec->nama_kecamatan }}

        </option>

        @endforeach

        </select>

    </td>

    <td class="bg-hijau">

        <select
        name="id_desa[]"
        class="form-select">

        @foreach($desa as $d)

        <option value="{{ $d->id_desa }}">

        {{ $d->nama_desa }}

        </option>

        @endforeach

        </select>

    </td>
    <td>

        <input
        type="text"
        name="poktan[]"
        class="form-control">

</td>

<td>

<input
type="text"
name="longitude[]"
class="form-control">

</td>

<td>

<input
type="text"
name="latitude[]"
class="form-control">

</td>

<td class="bg-hijau">

<select
name="id_komoditas[]"
class="form-select">

<option value="">

Pilih

</option>

@foreach($komoditas as $k)

<option value="{{ $k->id_komoditas }}">

{{ $k->komoditas }}

</option>

@endforeach

</select>

</td>

<td>

<input
type="text"
name="varietas[]"
class="form-control">

</td>

<td>

<input
type="number"
name="umur[]"
class="form-control">

</td>

<td class="bg-hijau">

<select
name="id_opt[]"
class="form-select">

<option value="">

Pilih

</option>

@foreach($opt as $o)

<option value="{{ $o->id_opt }}">

{{ $o->nama_opt }}

</option>

@endforeach

</select>

</td>

<td>

<input
type="number"
step="0.01"
name="luas_terserang[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="intens[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="kepadatan_populasi[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="luas_waspada[]"
class="form-control">

</td>

<td>

<input
type="date"
name="tgl_pengamatan[]"
class="form-control">

</td>

</tr>

@endforeach

</tbody>

</table>
<div class="row mt-3">

    <!-- KETERANGAN -->

    <div class="col-md-6">

        <strong>Keterangan :</strong>

        <br><br>

        1. Satu baris untuk satu lokasi pengamatan.

        <br>

        2. Longitude dan Latitude menggunakan koordinat GPS.

        <br>

        3. Luas dan Intensitas menggunakan satuan sesuai formulir.

        <br>

        4. Komoditas dan OPT dipilih dari master data.

    </div>

    <!-- TANDA TANGAN -->

    <div class="col-md-6 text-center">

        <div class="bg-pink d-inline-block px-3 py-2">

            <strong>

                {{ $data->petugas->kecamatan->nama_kecamatan }},
                {{ now()->translatedFormat('d F Y') }}

            </strong>

            <br>

            POPT Kecamatan
            {{ $data->petugas->kecamatan->nama_kecamatan }}

        </div>

        <br><br><br><br>

        <div class="bg-pink d-inline-block px-5 py-2">

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
        class="btn btn-primary"
        id="tambahBaris">

        Tambah Baris

    </button>

    <button
        type="submit"
        class="btn btn-success">

        Simpan

    </button>

    <a
        href="{{ route('laporan-peringatan-dini.index') }}"
        class="btn btn-secondary">

        Kembali

    </a>

</div>

</form>

</div>

<script>

document.getElementById('tambahBaris')
.addEventListener('click', function(){

    let tbody =
        document.querySelector('tbody');

    let baris =
        tbody.querySelector('tr').cloneNode(true);

    // kosongkan semua input
    baris.querySelectorAll('input').forEach(function(input){

        if(input.type !== 'hidden'){

            input.value = '';

        }

    });

    // reset semua select
    baris.querySelectorAll('select').forEach(function(select){

        select.selectedIndex = 0;

    });

    tbody.appendChild(baris);

});

</script>

</body>

</html>