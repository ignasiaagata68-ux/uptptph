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
<form method="POST"
      action="{{ route('tangkapan-lampu-perangkap.store') }}">

@csrf
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

@for($i=1; $i<=31; $i++)

<input type="hidden" name="id_kabupaten_kota[]" value="{{ $data->petugas->kecamatan->kabupaten->id_kabupaten_kota }}">
<input type="hidden" name="id_kecamatan[]" value="{{ $data->petugas->id_kecamatan }}">
<input type="hidden" name="id_periode[]" value="{{ $data->id_periode }}">
<input type="hidden" name="id_bulan[]" value="{{ $data->id_bulan }}">
<input type="hidden" name="id_tahun[]" value="{{ $data->id_tahun }}">

<tr>

    <!-- Tanggal -->
    <td width="55">

        {{ $i }}

        <input type="hidden"
               name="tanggal[]"
               value="{{ $i }}">

    </td>

    <!-- Penggerek Batang Padi -->

    <td>
       <input type="number"
            name="penggerek_batang_padi_kn[]"
            class="form-control kn">
    </td>

    <td>
        <input type="number"
            name="penggerek_batang_padi_pt[]"
            class="form-control pt">
    </td>

    <td>
    <input type="number"
           name="serangga1[]"
           class="form-control">
    </td>

    <td>
        <input type="number"
            name="serangga2[]"
            class="form-control">
    </td>

    <!-- Wereng -->

    <td>
        <input type="number"
            name="wereng_ck[]"
            class="form-control ck">
    </td>

    <td>
        <input type="number"
            name="wereng_pp[]"
            class="form-control pp">
    </td>

    <td>
        <input type="number"
            name="wereng_daun_vn[]"
            class="form-control vn">
    </td>

    <td>
        <input type="number"
            name="wereng_daun_nn[]"
            class="form-control nn">
    </td>

    <!-- Serangga -->

    <td>
        <input type="number"
            name="ganjur[]"
            class="form-control g">
    </td>

    <td>
        <input type="number"
            name="kepinding_tanah[]"
            class="form-control kt">
    </td>

    <td>
        <input type="number"
            name="walang_sangit[]"
            class="form-control ws">
    </td>

    <td>
    <input type="number"
           name="serangga1[]"
           class="form-control">
    </td>

    <td>
        <input type="number"
            name="serangga2[]"
            class="form-control">
    </td>

    <td>
        <input type="number"
            name="serangga3[]"
            class="form-control">
    </td>

    <td>
        <input type="number"
            name="serangga4[]"
            class="form-control">
    </td>

    <!-- Musuh Alami -->

    <td>
        <input type="number"
            name="musuh_alami1[]"
            class="form-control ma1">
    </td>

    <td>
        <input type="number"
               step="0.01"
               name="musuh_alami2[]"
               class="form-control ma2">
    </td>

    <td>
        <input type="number"
                name="musuh_alami3[]"
                class="form-control ma3">
    </td>

</tr>

@endfor

<!-- JUMLAH -->

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
    hitungKolom('vn','j_vn','r_vn');
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