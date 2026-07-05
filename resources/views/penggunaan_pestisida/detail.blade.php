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
            <tbody>

@foreach($detail as $d)

<tr>

    <td width="45">

        {{ $d->no }}

    </td>

    <td class="bg-hijau">

        {{ $d->lokasi_wilkel_desa }}

    </td>

    <td>

        {{ $d->jenis_dan_formulasi }}

    </td>

    <td>

        {{ $d->penggunaan }}

    </td>

    <td>

        {{ $d->volume_semprot }}

    </td>

    <td>

        {{ $d->jenis_tanaman }}

    </td>

    <td>

        {{ $d->opt_sasaran }}

    </td>

    <td>

        {{ $d->opt_non_sasaran }}

    </td>

    <td>

        {{ $d->lingkungan_hayati }}

    </td>

    <td>

        {{ $d->jumlah_korban }}

    </td>

    <td>

        {{ $d->sebab }}

    </td>

    <td>

        {{ $d->ket }}

    </td>

</tr>

@endforeach

@if($detail->count() == 0)

<tr>

    <td colspan="12" class="text-center">

        Tidak ada data.

    </td>

</tr>

@endif

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

    </div>

</div>
<div class="mt-3">

    <a href="{{ route('penggunaan-pestisida.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>


</div>
</div>
</html>