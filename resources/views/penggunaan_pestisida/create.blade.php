<!DOCTYPE html>
<html>
<head>

    <title>Penggunaan Pestisida</title>

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
    text-align:center;
    vertical-align:middle;
    padding:2px;
}

.bg-biru{
    background:#b8cce4;
}

.bg-pink{
    background:#e6b8b7;
}

.bg-hijau{
    background:#d8e4bc;
}

.judul{
    text-align:center;
    font-size:34px;
    font-weight:bold;
    margin-bottom:10px;
}

input,
select{

    border:none!important;
    border-radius:0!important;
    font-size:12px!important;
    box-shadow:none!important;

}

input:focus,
select:focus{
    box-shadow:none!important;
}

.bg-hijau{
    background:#d8e4bc !important;
}

.bg-hijau select,
select.bg-hijau{

    background:#d8e4bc !important;
    border:none !important;

}
</style>

</head>

<body>

<div class="container-fluid mt-3">

<div class="judul">

PENGGUNAAN PESTISIDA

</div>
<div class="row mb-3">

<div class="col-md-6">

<table>

<tr>

<td width="170">
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

<div class="col-md-3 offset-md-3">

<table>

<tr>

<td>Bulan</td>

<td class="bg-pink">

{{ $data->bulan->bulan }}

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

</div>
<table>

<thead>

<tr class="bg-biru">

<th rowspan="2">
No
</th>

<th rowspan="2">
Lokasi<br>
WilKel/<br>
Desa
</th>

<th rowspan="2">
Jenis &<br>
Formulasi
</th>

<th rowspan="2">
Penggunaan<br>(Kg/l)
</th>

<th rowspan="2">
Volume<br>Semprot
</th>

<th colspan="2">
Penggunaan
</th>

<th colspan="2">
Pengaruh Samping
</th>

<th colspan="2">
Kasus Keracunan
</th>

<th rowspan="2">
Ket
</th>

</tr>

<tr class="bg-biru">

<th>
Jenis Tanaman
</th>

<th>
OPT Sasaran
</th>

<th>
OPT Non Sasaran
</th>

<th>
Lingkungan Hayati
</th>

<th>
Jumlah Korban
</th>

<th>
Sebab
</th>

</tr>

<tr class="bg-biru">

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
<th>11</th>
<th>12</th>

</tr>

</thead>

<tbody id="tbodyPestisida">
    @for($i=1;$i<=10;$i++)

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
       name="id_bulan[]"
       value="{{ $data->id_bulan }}">

<input type="hidden"
       name="id_tahun[]"
       value="{{ $data->id_tahun }}">

<tr class="barisPestisida">

<td width="45">

{{ $i }}

<input type="hidden"
       name="no[]"
       value="{{ $i }}">

</td>

<!-- DES -->
<td class="bg-hijau">

<select
    name="id_desa[]"
    class="form-select bg-hijau">

    <option value="">Pilih Desa</option>

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
name="jenis_dan_formulasi[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="penggunaan[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="volume_semprot[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="jenis_tanaman[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="opt_sasaran[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="opt_non_sasaran[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="lingkungan_hayati[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="jumlah_korban[]"
class="form-control">

</td>

<td>

<input
type="number"
step="0.01"
name="sebab[]"
class="form-control">

</td>

<td>

<input
type="text"
name="ket[]"
class="form-control">

</td>

</tr>

@endfor

</tbody>

</table>
<div class="row mt-3">

    <div class="col-md-5">

        <div>

            <b>Keterangan :</b><br>

            1). Sebab terjadi :
            a. Usaha bunuh diri;
            b. Salah penggunaan

            <br>

            2). Diisi saat kejadian dan usaha penyelamatan

        </div>

    </div>

    <div class="col-md-7 text-center">

        <div
            class="bg-pink p-2 d-inline-block"
            style="min-width:320px;">

            <b>

                {{ $data->petugas->kecamatan->nama_kecamatan }},
                {{ now()->translatedFormat('d F Y') }}

            </b>

            <br>

            POPT Kec.

            {{ $data->petugas->kecamatan->nama_kecamatan }}

        </div>

        <br><br><br>

        <div
            class="bg-pink p-2 d-inline-block"
            style="min-width:320px;">

            <b>

                {{ $data->petugas->nama }}

            </b>

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

    <a href="{{ route('penggunaan-pestisida.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</div>

</form>

</div>
<script>

let nomorBaris = 10;

document.getElementById('tambahBaris')
.addEventListener('click', function(){

    nomorBaris++;

    let tbody =
        document.getElementById('tbodyPestisida');

    let contoh =
        document.querySelector('.barisPestisida');

    let baru =
        contoh.cloneNode(true);

    // ubah nomor

    baru.querySelector('td:first-child').innerHTML =
        nomorBaris +
        '<input type="hidden" name="no[]" value="'+nomorBaris+'">';

    // kosongkan input

    baru.querySelectorAll('input').forEach(function(item){

        if(item.type=="hidden")
            return;

        item.value='';

    });

    // reset select desa

    baru.querySelectorAll('select').forEach(function(item){

        item.selectedIndex=0;

    });

    tbody.appendChild(baru);

});

</script>
</div>
</html>