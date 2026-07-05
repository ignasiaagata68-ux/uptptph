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

<tr>

    <!-- Tanggal -->
    <td width="55">
        {{ $i + 1 }}
    </td>

    <!-- Penggerek Batang Padi -->
    <td>{{ $d->penggerek_batang_padi_kn }}</td>
    <td>{{ $d->penggerek_batang_padi_pt }}</td>

    <td>-</td>
    <td>-</td>

    <!-- Wereng -->
    <td>{{ $d->wereng_ck }}</td>
    <td>{{ $d->wereng_pp }}</td>

    <!-- Wereng Daun -->
    <td>{{ $d->wereng_daun_vn }}</td>
    <td>{{ $d->wereng_daun_nn }}</td>

    <td>-</td>

    <!-- Serangga -->
    <td>{{ $d->ganjur }}</td>
    <td>{{ $d->kepinding_tanah }}</td>
    <td>{{ $d->walang_sangit }}</td>

    <td>-</td>
    <td>-</td>

    <!-- Musuh Alami -->
    <td>{{ $d->musuh_alami1 }}</td>
    <td>{{ $d->musuh_alami2 }}</td>
    <td>{{ $d->musuh_alami3 }}</td>
    <td>{{ $d->musuh_alami4 }}</td>

</tr>

@endforeach

<!-- JUMLAH -->

<!-- JUMLAH -->

<tr class="bg-primary text-white">

    <th>Jumlah</th>

    <th>{{ $jumlah['kn'] ?? 0 }}</th>
    <th>{{ $jumlah['pt'] ?? 0 }}</th>
    <th>{{ $jumlah['p1'] ?? 0 }}</th>
    <th>{{ $jumlah['p2'] ?? 0 }}</th>

    <th>{{ $jumlah['ck'] ?? 0 }}</th>
    <th>{{ $jumlah['pp'] ?? 0 }}</th>
    <th>{{ $jumlah['vn'] ?? 0 }}</th>
    <th>{{ $jumlah['nn'] ?? 0 }}</th>

    <th>{{ $jumlah['g'] ?? 0 }}</th>
    <th>{{ $jumlah['kt'] ?? 0 }}</th>
    <th>{{ $jumlah['ws'] ?? 0 }}</th>

    <th>{{ $jumlah['s1'] ?? 0 }}</th>
    <th>{{ $jumlah['s2'] ?? 0 }}</th>
    <th>{{ $jumlah['s3'] ?? 0 }}</th>
    <th>{{ $jumlah['s4'] ?? 0 }}</th>

    <th>{{ $jumlah['m1'] ?? 0 }}</th>
    <th>{{ $jumlah['m2'] ?? 0 }}</th>
    <th>{{ $jumlah['m3'] ?? 0 }}</th>
    <th>{{ $jumlah['m4'] ?? 0 }}</th>

</tr>

<!-- RATA-RATA -->

<tr class="bg-primary text-white">

    <th>Rata-rata</th>

    <th>{{ $rata['kn'] ?? 0 }}</th>
    <th>{{ $rata['pt'] ?? 0 }}</th>
    <th>{{ $rata['p1'] ?? 0 }}</th>
    <th>{{ $rata['p2'] ?? 0 }}</th>

    <th>{{ $rata['ck'] ?? 0 }}</th>
    <th>{{ $rata['pp'] ?? 0 }}</th>
    <th>{{ $rata['vn'] ?? 0 }}</th>
    <th>{{ $rata['nn'] ?? 0 }}</th>

    <th>{{ $rata['g'] ?? 0 }}</th>
    <th>{{ $rata['kt'] ?? 0 }}</th>
    <th>{{ $rata['ws'] ?? 0 }}</th>

    <th>{{ $rata['s1'] ?? 0 }}</th>
    <th>{{ $rata['s2'] ?? 0 }}</th>
    <th>{{ $rata['s3'] ?? 0 }}</th>
    <th>{{ $rata['s4'] ?? 0 }}</th>

    <th>{{ $rata['m1'] ?? 0 }}</th>
    <th>{{ $rata['m2'] ?? 0 }}</th>
    <th>{{ $rata['m3'] ?? 0 }}</th>
    <th>{{ $rata['m4'] ?? 0 }}</th>

</tr>
</tbody>
</table>
<div class="row mt-5">

    <div class="col-md-6">
    </div>

</div>
        <a href="{{ route('tangkapan-lampu-perangkap.index') }}"
            class="btn btn-secondary">

            Kembali

        </a>

    </div>
</div>
</body>
</html>