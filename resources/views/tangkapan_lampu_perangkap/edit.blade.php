<!DOCTYPE html>
<html>
<head>

    <title>Tangkapan Lampu Perangkap</title>

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

        .subjudul{
            text-align:center;
            font-size:22px;
            font-weight:bold;
            margin-bottom:15px;
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

    TANGKAPAN LAMPU PERANGKAP

</div>

<div class="subjudul">

    (Padi)

</div>
<div class="row mb-3">

    <div class="col-md-3 offset-md-3">

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
    </table>

    </div>

    <div class="col-md-3 offset-md-3">

        <table>

            <tr>

                <td>Bulan</td>

                <td class="bg-pink">
                    {{ $header->bulan }}
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

</div>
<form action="{{ route('tangkapan-lampu-perangkap.update',$header->id_tangkapan_lampu_perangkap) }}" method="POST">

    @csrf
    @method('PUT')

<table>
    <thead>

<tr>

    <th rowspan="4">Tanggal <sup>1)</sup></th>

    <th colspan="18" class="bg-biru">
        Serangga yang tertangkap lampu perangkap (ekor)
    </th>

</tr>

<tr>

    <th colspan="14">
        Serangga Pengganggu
    </th>

    <th colspan="4">
        Musuh Alami
    </th>

</tr>

<tr>

    <!-- Penggerek Batang Padi -->
    <th colspan="4">
        Penggerek Batang Padi
    </th>

    <!-- Wereng -->
    <th colspan="2">
        Wereng
    </th>

    <!-- Wereng Daun -->
    <th colspan="3">
        Wereng Daun
    </th>

    <!-- lainnya -->
    <th rowspan="2">G</th>
    <th rowspan="2">Kt</th>
    <th rowspan="2">Ws</th>
    <th rowspan="2">...(2)</th>
    <th rowspan="2">...(2)</th>

    <!-- Musuh Alami -->
    <th rowspan="2">...(3)</th>
    <th rowspan="2">...(3)</th>
    <th rowspan="2">...(3)</th>
    <th rowspan="2">...(3)</th>

</tr>

<tr>

    <!-- Penggerek -->
    <th>Kn</th>
    <th>Pt</th>
    <th>...(2)</th>
    <th>...(2)</th>

    <!-- Wereng -->
    <th>Ck</th>
    <th>Pp</th>

    <!-- Wereng Daun -->
    <th>Nv</th>
    <th>Nn</th>
    <th>...(2)</th>

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
    <th>16</th>
    <th>17</th>
    <th>18</th>
    <th>19</th>

</tr>

</thead>
<tbody>

@foreach($detail as $i => $d)
<tr class="baris-data">
<input
    type="hidden"
    name="id_kabupaten_kota"
    value="{{ $header->id_kabupaten_kota }}">

<input 
    type="hidden" 
    name="id_kecamatan" 
    value="{{ $header->id_kecamatan }}">

<input 
    type="hidden" 
    name="id_periode" 
    value="{{ $header->id_periode }}">

<input 
    type="hidden" 
    name="id_tahun" 
    value="{{ $d->id_tahun }}">

<input 
    type="hidden" 
    name="id_bulan" 
    value="{{ $d->id_bulan }}">

<input
    type="hidden"
    name="id_musim_tanam"
    value="{{ $header->id_musim_tanam }}">


    <input
        type="hidden"
        name="id_detail[]"
        value="{{ $d->id_det_tangkapan_lampu_perangkap }}">

    <!-- Tanggal -->
    <td width="55">

        {{ $i+1 }}

        <input type="hidden"
               name="tanggal[]"
               value="{{ $i+1 }}">

    </td>

    <!-- Penggerek Batang Padi -->

    <td>
       <input type="number"
            name="penggerek_batang_padi_kn[]"
            value="{{ $d->penggerek_batang_padi_kn }}"
            class="form-control kn">
    </td>

    <td>
        <input type="number"
            name="penggerek_batang_padi_pt[]"
            value="{{ $d->penggerek_batang_padi_pt }}"
            class="form-control pt">
    </td>
    <!-- Wereng -->

    <td>
        <input type="number"
            name="wereng_ck[]"
            value="{{ $d->wereng_ck }}"
            class="form-control ck">
    </td>

    <td>
        <input type="number"
            name="wereng_pp[]"
            value="{{ $d->wereng_pp }}"
            class="form-control pp">
    </td>

    <td>
        <input type="number"
            name="wereng_daun_vn[]"
            value="{{ $d->wereng_daun_vn}}"
            class="form-control vn">
    </td>

    <td>
        <input type="number"
            name="wereng_daun_nn[]"
            value="{{ $d->wereng_daun_nn}}"
            class="form-control nn">
    </td>

    <!-- Serangga -->

    <td>
        <input type="number"
            name="ganjur[]"
            value="{{ $d->ganjur }}"
            class="form-control g">
    </td>

    <td>
        <input type="number"
            name="kepinding_tanah[]"
            value="{{ $d->kepinding_tanah}}"
            class="form-control kt">
    </td>

    <td>
        <input type="number"
            name="walang_sangit[]"
            value="{{ $d->walang_sangit}}"
            class="form-control ws">
    </td>

    <td>
    <input type="number"
           name="serangga1[]"
           value="{{ $d->serangga1 }}"
           class="form-control">
    </td>

    <td>
        <input type="number"
            name="serangga2[]"
            value="{{ $d->serangga2 }}"
            class="form-control">
    </td>

    <td>
        <input type="number"
            name="serangga3[]"
            value="{{ $d->serangga3 }}"
            class="form-control">
    </td>

    <td>
        <input type="number"
            name="serangga4[]"
            value="{{ $d->serangga4 }}"
            class="form-control">
    </td>
    
    <td>
        <input type="number"
            name="serangga5[]"
            value="{{ $d->serangga5}}"
            class="form-control">
    </td>

   <!-- Musuh Alami -->

    <td>
        <input
            type="number"
            name="musuh_alami1[]"
            value="{{ $d->musuh_alami1 }}"
            class="form-control ma1">
    </td>

    <td>
        <input
            type="number"
            step="0.01"
            name="musuh_alami2[]"
            value="{{ $d->musuh_alami2 }}"
            class="form-control ma2">
    </td>

    <td>
        <input
            type="number"
            name="musuh_alami3[]"
            value="{{ $d->musuh_alami3 }}"
            class="form-control ma3">
    </td>

    <td>
        <input
            type="number"
            name="musuh_alami4[]"
            value="{{ $d->musuh_alami4 }}"
            class="form-control ma4">
    </td>

</tr>

@endforeach

<!-- JUMLAH -->

<tr class="bg-primary text-white">

    <th>Jumlah</th>

    <!-- Penggerek Batang Padi -->
    <th id="j_kn">0</th>
    <th id="j_pt">0</th>
    <th id="j_p1">0</th>
    <th id="j_p2">0</th>

    <!-- Wereng -->
    <th id="j_ck">0</th>
    <th id="j_pp">0</th>

    <!-- Wereng Daun -->
    <th id="j_nv">0</th>
    <th id="j_nn">0</th>
    <th id="j_wd">0</th>

    <!-- Serangga -->
    <th id="j_g">0</th>
    <th id="j_kt">0</th>
    <th id="j_ws">0</th>
    <th id="j_s1">0</th>
    <th id="j_s2">0</th>

    <!-- Musuh Alami -->
    <th id="j_m1">0</th>
    <th id="j_m2">0</th>
    <th id="j_m3">0</th>
    <th id="j_m4">0</th>

</tr>

<!-- RATA-RATA -->

<tr class="bg-primary text-white">

    <th>Rata-rata</th>

    <!-- Penggerek Batang Padi -->
    <th id="r_kn">0</th>
    <th id="r_pt">0</th>
    <th id="r_p1">0</th>
    <th id="r_p2">0</th>

    <!-- Wereng -->
    <th id="r_ck">0</th>
    <th id="r_pp">0</th>

    <!-- Wereng Daun -->
    <th id="r_nv">0</th>
    <th id="r_nn">0</th>
    <th id="r_wd">0</th>

    <!-- Serangga -->
    <th id="r_g">0</th>
    <th id="r_kt">0</th>
    <th id="r_ws">0</th>
    <th id="r_s1">0</th>
    <th id="r_s2">0</th>

    <!-- Musuh Alami -->
    <th id="r_m1">0</th>
    <th id="r_m2">0</th>
    <th id="r_m3">0</th>
    <th id="r_m4">0</th>

</tr>

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

        <div class="mt-3">

        <button
            type="submit"
            class="btn btn-success">

            Simpan

        </button>

        <a href="{{ route('tangkapan-lampu-perangkap.index') }}"
            class="btn btn-secondary">

            Kembali

        </a>

    </div>
</form>

</body>
    <script>

document.addEventListener('input', hitungSemua);

function hitungSemua(){

    hitungKolom('kn','j_kn','r_kn');
    hitungKolom('pt','j_pt','r_pt');

    hitungKolom('ck','j_ck','r_ck');
    hitungKolom('pp','j_pp','r_pp');
    hitungKolom('vn','j_nv','r_nv');
    hitungKolom('nn','j_nn','r_nn');

    hitungKolom('g','j_g','r_g');
    hitungKolom('kt','j_kt','r_kt');
    hitungKolom('ws','j_ws','r_ws');

    hitungKolom('ma1','j_m1','r_m1');
    hitungKolom('ma2','j_m2','r_m2');
    hitungKolom('ma3','j_m3','r_m3');
    hitungKolom('ma4','j_m4','r_m4');

}

function hitungKolom(kelas,idJumlah,idRata){

    let total = 0;
    let jumlah = 0;

    document.querySelectorAll('.'+kelas)
    .forEach(function(item){

        total += parseFloat(item.value) || 0;
        jumlah++;

    });

    document.getElementById(idJumlah).innerHTML = total;

    document.getElementById(idRata).innerHTML =
        jumlah > 0
        ? (total / jumlah).toFixed(2)
        : 0;

}

</script>
</div>
</html>