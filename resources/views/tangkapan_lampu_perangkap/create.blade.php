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

    <!-- Serangga Lain -->
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

@for($i = 1; $i <= 31; $i++)

<tr>

    <!-- Tanggal -->
    <td width="60">

        {{ $i }}

        <input
            type="hidden"
            name="tanggal[]"
            value="{{ $i }}">

    </td>

    <!-- Hidden Header -->

    <input
        type="hidden"
        name="id_kabupaten_kota"
        value="{{ $data->petugas->kecamatan->kabupaten->id_kabupaten_kota }}">

    <input
        type="hidden"
        name="id_kecamatan"
        value="{{ $data->petugas->id_kecamatan }}">

    <input 
        type="hidden" 
        name="id_bulan" 
        value="{{ $data->id_bulan }}">
        
    <input
        type="hidden"
        name="id_periode"
        value="{{ $data->id_periode }}">

    <input
        type="hidden"
        name="id_musim_tanam"
        value="{{ $data->id_musim_tanam }}">

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
               class="form-control p1">
    </td>

    <td>
        <input type="number"
               name="serangga2[]"
               class="form-control p2">
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

    <!-- Wereng Daun -->

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

    <td>
        <input type="number"
               name="serangga3[]"
               class="form-control wd">
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
               name="serangga4[]"
               class="form-control s1">
    </td>

    <td>
        <input type="number"
               name="serangga5[]"
               class="form-control s2">
    </td>

    <!-- Musuh Alami -->

    <td>
        <input type="number"
               name="musuh_alami1[]"
               class="form-control ma1">
    </td>

    <td>
        <input type="number"
               name="musuh_alami2[]"
               class="form-control ma2">
    </td>

    <td>
        <input type="number"
               name="musuh_alami3[]"
               class="form-control ma3">
    </td>

    <td>
        <input type="number"
               name="musuh_alami4[]"
               class="form-control ma4">
    </td>

</tr>

@endfor
<!-- ================= JUMLAH ================= -->

<tr class="table-primary fw-bold">

    <th>Jumlah</th>

    <th id="j_kn">0</th>
    <th id="j_pt">0</th>
    <th id="j_p1">0</th>
    <th id="j_p2">0</th>

    <th id="j_ck">0</th>
    <th id="j_pp">0</th>

    <th id="j_vn">0</th>
    <th id="j_nn">0</th>
    <th id="j_wd">0</th>

    <th id="j_g">0</th>
    <th id="j_kt">0</th>
    <th id="j_ws">0</th>
    <th id="j_s1">0</th>
    <th id="j_s2">0</th>

    <th id="j_ma1">0</th>
    <th id="j_ma2">0</th>
    <th id="j_ma3">0</th>
    <th id="j_ma4">0</th>

</tr>

<!-- ================= RATA-RATA ================= -->

<tr class="table-primary fw-bold">

    <th>Rata-rata</th>

    <th id="r_kn">0</th>
    <th id="r_pt">0</th>
    <th id="r_p1">0</th>
    <th id="r_p2">0</th>

    <th id="r_ck">0</th>
    <th id="r_pp">0</th>

    <th id="r_vn">0</th>
    <th id="r_nn">0</th>
    <th id="r_wd">0</th>

    <th id="r_g">0</th>
    <th id="r_kt">0</th>
    <th id="r_ws">0</th>
    <th id="r_s1">0</th>
    <th id="r_s2">0</th>

    <th id="r_ma1">0</th>
    <th id="r_ma2">0</th>
    <th id="r_ma3">0</th>
    <th id="r_ma4">0</th>

</tr>

</tbody>

</table>


   <div class="mt-3">

    <button
        type="submit"
        class="btn btn-success">

        Simpan

    </button>

    <a
        href="{{ route('tangkapan-lampu-perangkap.index') }}"
        class="btn btn-secondary">

        Kembali

    </a>

</div>
</form>
 
<script>

function hitung(cls, jumlahId, rataId){

    let total = 0;

    let data = document.querySelectorAll("." + cls);

    data.forEach(function(item){

        total += parseFloat(item.value) || 0;

    });

    document.getElementById(jumlahId).innerHTML = total;

    document.getElementById(rataId).innerHTML =
        (total / data.length).toFixed(2);

}

function refresh(){

    hitung("kn","j_kn","r_kn");
    hitung("pt","j_pt","r_pt");

    hitung("p1","j_p1","r_p1");
    hitung("p2","j_p2","r_p2");

    hitung("ck","j_ck","r_ck");
    hitung("pp","j_pp","r_pp");

    hitung("vn","j_vn","r_vn");
    hitung("nn","j_nn","r_nn");
    hitung("wd","j_wd","r_wd");

    hitung("g","j_g","r_g");
    hitung("kt","j_kt","r_kt");
    hitung("ws","j_ws","r_ws");

    hitung("s1","j_s1","r_s1");
    hitung("s2","j_s2","r_s2");

    hitung("ma1","j_ma1","r_ma1");
    hitung("ma2","j_ma2","r_ma2");
    hitung("ma3","j_ma3","r_ma3");
    hitung("ma4","j_ma4","r_ma4");

}

document.addEventListener("input", refresh);

refresh();

</script>

</body>
</html>
