<!DOCTYPE html>
<html>
<head>

    <title>Kumulatif Luas Tambah Tanam Padi</title>

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
    border:1px solid black;
    text-align:center;
    vertical-align:middle;
    padding:2px;
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

.judul{
    text-align:center;
    font-size:30px;
    font-weight:bold;
}

input,
select{

    border:none !important;
    border-radius:0 !important;
    font-size:12px !important;
    padding:2px !important;

}

input:focus,
select:focus{

    box-shadow:none !important;

}

</style>

</head>

<body>

<div class="container-fluid mt-3">

<div class="judul">

    KUMULATIF LUAS TAMBAH TANAM PADI

</div>

<br>

<div class="row mb-3">

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

<div class="col-md-3 offset-md-3">

<table>

<tr>

<td>

Bulan

</td>

<td class="bg-pink">

{{ $data->bulan->bulan }}

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

<form method="POST"
action="{{ route('kumulatif-luas-tambah-tanam-padi.store') }}">

@csrf

<table>

<thead>

<tr class="bg-biru">

<th rowspan="3">

No

</th>

<th rowspan="3">

Kab/Kota

</th>

<th rowspan="3">

Kec

</th>

<th rowspan="3">

Desa

</th>

<th rowspan="3">

Total Luas Laporan
<br>
Periode Lalu (Ha)

</th>

<th colspan="10">

Luas Kumulatif Tambah Tanam (Ha)
Menurut Varietas

</th>

</tr>

<tr class="bg-biru">

<th>Var ....</th>

<th>Var ....</th>

<th>Var ....</th>

<th>Var ....</th>

<th>Var ....</th>

<th>Var ....</th>

<th>Var ....</th>

<th>Var ....</th>

<th>Var ....</th>

<th>Var ....</th>

</tr>

<tr class="bg-biru">

<th>6</th>
<th>7</th>
<th>8</th>
<th>9</th>
<th>10</th>
<th>11</th>
<th>12</th>
<th>13</th>
<th>14</th>
<th>15</th>

</tr>

<tr class="bg-kuning">

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

<th>13</th>

<th>14</th>

<th>15</th>

</tr>

</thead>
    <tbody id="tbody-kumulatif">

<tr class="baris-kumulatif">

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
       name="id_musim_tanam"
       value="{{ $data->id_musim_tanam }}">

<td class="nomor">

1

<input type="hidden"
       name="no[]"
       value="1">

</td>

<td class="bg-hijau">

{{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}

</td>

<td class="bg-hijau">

{{ $data->petugas->kecamatan->nama_kecamatan }}

</td>

<td class="bg-hijau">

<select
    name="id_desa[]"
    class="form-select">

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
    type="number"
    step="0.01"
    name="total_luas_laporan_periode_lalu[]"
    class="form-control">

</td>

<td>

<input
    type="number"
    step="0.01"
    name="var1[]"
    class="form-control">

</td>

<td>

<input
    type="number"
    step="0.01"
    name="var2[]"
    class="form-control">

</td>

<td>

<input
    type="number"
    step="0.01"
    name="var3[]"
    class="form-control">

</td>

<td>

<input
    type="number"
    step="0.01"
    name="var4[]"
    class="form-control">

</td>

<td>

<input
    type="number"
    step="0.01"
    name="var5[]"
    class="form-control">

</td>

<td>

<input
    type="number"
    step="0.01"
    name="var6[]"
    class="form-control">

</td>

<td>

<input
    type="number"
    step="0.01"
    name="var7[]"
    class="form-control">

</td>

<td>

<input
    type="number"
    step="0.01"
    name="var8[]"
    class="form-control">

</td>

<td>

<input
    type="number"
    step="0.01"
    name="var9[]"
    class="form-control">

</td>

<td>

<input
    type="number"
    step="0.01"
    name="var10[]"
    class="form-control">

</td>

</tr>

</tbody>
</table>

<br>

<div class="row mt-4">

    <div class="col-md-6">

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

        <a href="{{ route('kumulatif-luas-tambah-tanam-padi.index') }}"
            class="btn btn-secondary">

            Kembali

        </a>

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

</form>

</div>

<script>

document
.getElementById('tambahBaris')
.addEventListener('click',function(){

    let tbody =
        document.getElementById('tbody-kumulatif');

    let contoh =
        document.querySelector('.baris-kumulatif');

    let clone =
        contoh.cloneNode(true);

    let nomor =
        tbody.querySelectorAll('tr').length + 1;

    clone.querySelector('.nomor').innerHTML = nomor;

    clone.querySelector('input[name="no[]"]').value = nomor;

    clone.querySelectorAll('input')
    .forEach(function(input){

        if(
            input.type=="hidden"
            &&
            input.name!="no[]"
        ){
            return;
        }

        if(input.name=="no[]"){
            return;
        }

        input.value="";

    });

    clone.querySelectorAll('select')
    .forEach(function(select){

        select.selectedIndex=0;

    });

    clone.querySelector('.nomor').appendChild(

        clone.querySelector('input[name="no[]"]')

    );

    tbody.appendChild(clone);

});

</script>
    <script>

document.getElementById('tambahBaris')
.addEventListener('click', function(){

    let tbody =
        document.getElementById('tbody-kumulatif');

    let contohBaris =
        document.querySelector('.baris-kumulatif');

    let barisBaru =
        contohBaris.cloneNode(true);

    let jumlahBaris =
        tbody.querySelectorAll('tr').length + 1;

    // Nomor urut
    barisBaru.querySelector('.nomor').innerHTML =
        jumlahBaris +
        '<input type="hidden" name="no[]" value="'+jumlahBaris+'">';

    // Reset semua input selain hidden
    barisBaru.querySelectorAll('input')
    .forEach(function(input){

        if(input.type === 'hidden'){
            return;
        }

        input.value = '';

    });

    // Reset semua select
    barisBaru.querySelectorAll('select')
    .forEach(function(select){

        select.selectedIndex = 0;

    });

    tbody.appendChild(barisBaru);

});

</script>

</body>
</html>
