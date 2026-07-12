<!DOCTYPE html>
<html>

<head>

    <title>Pengamatan Penyebaran dan Perkembangan Siput Murbey</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            font-size:30px;
            font-weight:bold;
            text-align:center;
            margin-bottom:8px;
        }

        input,
        select{

            border:none!important;
            border-radius:0!important;
            box-shadow:none!important;
            font-size:12px!important;
            padding:2px!important;

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

        PENGAMATAN PENYEBARAN DAN PERKEMBANGAN SIPUT MURBEY

    </div>

    <form action="{{ route('pengamatan-penyebaran-dan-perkembangan-siput-murbey.update',$header->id_pengamatan_penyebaran_dan_perkembangan_siput_murbey) }}"
        method="POST">

        @csrf
        @method('PUT')

    <div class="row mb-2">

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

            <td width="120">

                Bulan

            </td>

            <td class="bg-pink">

                {{ $header->bulan }}

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

            <th rowspan="3" width="40">

                No

            </th>

            <th rowspan="3" width="170">

                Desa/Lokasi

            </th>

            <th colspan="10">

                Populasi (m²)

            </th>

            <th rowspan="2">

                Sawah (ha)
                <br>
                Keadaan Serangan

            </th>

            <th colspan="4">

                Pengendalian (ha)

            </th>

        </tr>

        <tr class="bg-biru">

            <th colspan="2">

                Kolam

            </th>

            <th colspan="2">

                Bak Permanen

            </th>

            <th colspan="2">

                Parit

            </th>

            <th colspan="2">

                Sawah

            </th>

            <th colspan="2">

                Lain-lain

            </th>

            <th>

                Fm

            </th>

            <th>

                Pest

            </th>

            <th>

                Cl

            </th>

            <th>

                Jumlah

            </th>

        </tr>

        <tr class="bg-biru">

            <th>

                Telur

            </th>

            <th>

                Dewasa

            </th>

            <th>

                Telur

            </th>

            <th>

                Dewasa

            </th>

            <th>

                Telur

            </th>

            <th>

                Dewasa

            </th>

            <th>

                Telur

            </th>

            <th>

                Dewasa

            </th>

            <th>

                Telur

            </th>

            <th>

                Dewasa

            </th>

            <th>

                Intensitas

            </th>

            <th></th>

            <th></th>

            <th></th>

            <th></th>

        </tr>

    </thead>
<tbody>
    @foreach($detail as $i=>$d)
    <tr>

        <input type="hidden"
            name="id_kabupaten_kota[]"
            value="{{ $header->id_kabupaten_kota }}">

        <input type="hidden"
            name="id_kecamatan[]"
            value="{{ $header->id_kecamatan }}">

        <input type="hidden"
            name="id_bulan[]"
            value="{{ $header->id_bulan }}">

        <input type="hidden"
            name="id_musim_tanam[]"
            value="{{ $header->id_musim_tanam }}">
        
        <td>

            {{ $loop->iteration }}

        </td>
        
        <td class="bg-hijau text-start">

            <select
            name="id_desa[]"
            class="form-select">

            @foreach($desa as $x)

            <option
            value="{{ $x->id_desa }}"
            {{ $x->id_desa==$d->id_desa ? 'selected':'' }}>

            {{ $x->nama_desa }}

            </option>

            @endforeach

            </select>

        </td>

        </td>

        <!-- ================= KOLAM ================= -->

        <td>

            <input
                type="number"
                step="0.01"
                name="kolom_telur[]"
                class="form-control"
                value="{{ $d->kolom_telur }}">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                name="kolom_dewasa[]"
                class="form-control"
                value="{{ $d->kolom_dewasa }}">

        </td>

        <!-- ============== BAK PERMANEN ============== -->

        <td>

            <input
                type="number"
                step="0.01"
                name="bak_permanen_telur[]"
                class="form-control"
                value="{{ $d->bak_permanen_telur }}">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                name="bak_permanen_dewasa[]"
                class="form-control"
                value="{{ $d->bak_permanen_dewasa }}">

        </td>

        <!-- ================= PARIT ================= -->

        <td>

            <input
                type="number"
                step="0.01"
                name="parit_telur[]"
                class="form-control"
                value="{{ $d->parit_telur }}">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                name="parit_dewasa[]"
                class="form-control"
                value="{{ $d->parit_dewasa }}">

        </td>

        <!-- ================= SAWAH ================= -->

        <td>

            <input
                type="number"
                step="0.01"
                name="sawah_telur[]"
                class="form-control"
                value="{{ $d->sawah_telur }}">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                name="sawah_dewasa[]"
                class="form-control"
                value="{{ $d->sawah_dewasa }}">

        </td>

        <!-- =============== LAIN-LAIN =============== -->

        <td>

            <input
                type="number"
                step="0.01"
                name="lain_lain_telur[]"
                class="form-control"
                value="{{ $d->lain_lain_telur }}">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                name="lain_lain_dewasa[]"
                class="form-control"
                value="{{ $d->lain_lain_dewasa }}">

        </td>

        <!-- ======= SAWAH (ha) - KEADAAN SERANGAN ======= -->

        <td>

            <input
                type="number"
                step="0.01"
                name="intensitas[]"
                class="form-control"
                value="{{ $d->intensitas }}">

        </td>

        <!-- ============ PENGENDALIAN ============ -->

        <td>

            <input
                type="number"
                step="0.01"
                name="pengendalian_fm[]"
                class="form-control"
                value="{{ $d->pengendalian_fm }}">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                name="pengendalian_pest[]"
                class="form-control"
                value="{{ $d->pengendalian_pest }}">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                name="pengendalian_cl[]"
                class="form-control"
                value="{{ $d->pengendalian_cl }}">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                name="pengendalian_jumlah[]"
                class="form-control"
                value="{{ $d->pengendalian_jumlah }}">

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

        T = Telur

        <br>

        D = Dewasa

        <br>

        FM = Fisik Mekanis

        <br>

        Pest = Pestisida

        <br>

        CL = Cara Lain

        <br>

        Jumlah = Total luas pengendalian (ha)

    </div>


    <!-- TANDA TANGAN -->

    <div class="col-md-6 text-center">

        
</div>

<div class="mt-3">

    <button
        type="submit"
        class="btn btn-success">

        Update

    </button>

    <a
        href="{{ route('pengamatan-penyebaran-dan-perkembangan-siput-murbey.index') }}"
        class="btn btn-secondary">

        Kembali

    </a>

</div>

</form>

</div>

</body>

</html>

