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

                    {{ $header->nama_kabupaten_kota }}

                </td>

            </tr>

            <tr>

                <td>

                    Kecamatan

                </td>

                <td class="bg-pink">

                    {{ $header->nama_kecamatan }}

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

                    {{ \Carbon\Carbon::parse($header->tgl_mulai)->translatedFormat('F Y') }}

                </td>

            </tr>

            <tr>

                <td>

                    Musim Tanam

                </td>

                <td class="bg-pink">

                    {{ $header->musim_tanam }}

                </td>

            </tr>

        </table>

    </div>

</div>
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

                @foreach($detail as $d)
                <tr class="baris-kumulatif">
                   
                    <td>{{ $d->no }}</td>

                    <td>{{ $header->nama_kabupaten_kota }}</td>

                    <td>{{ $header->nama_kecamatan }}</td>

                    <td>{{ $d->nama_desa }}</td>

                    <td>{{ $d->total_luas_laporan_periode_lalu }}</td>

                    <td>{{ $d->var1 }}</td>

                    <td>{{ $d->var2 }}</td>

                    <td>{{ $d->var3 }}</td>

                    <td>{{ $d->var4 }}</td>

                    <td>{{ $d->var5 }}</td>

                    <td>{{ $d->var6 }}</td>

                    <td>{{ $d->var7 }}</td>

                    <td>{{ $d->var8 }}</td>

                    <td>{{ $d->var9 }}</td>

                    <td>{{ $d->var10 }}</td>

                </tr>

                @endforeach

            </tbody>
        </table>

    <br>

<div class="row mt-4">

    <div class="col-md-6">

        <a href="{{ route('kumulatif-luas-tambah-tanam-padi.index') }}"
            class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>

</div>
</body>
</html>
