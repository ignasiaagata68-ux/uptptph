<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekap Keadaan Serangan OPT</title>

    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            border:1px solid #000;
            padding:5px;
        }

        th{
            background:#eeeeee;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }
    </style>

</head>

<body>

<h2>
REKAP KEADAAN SERANGAN OPT
</h2>

<p>

<b>Kabupaten :</b>
{{ $header->nama_kabupaten_kota }}

<br>

<b>Kecamatan :</b>
{{ $header->nama_kecamatan }}

<br>

<b>Periode :</b>
{{ $header->periode_pengamatan }}

<br>

<b>Musim Tanam :</b>
{{ $header->musim_tanam }}

</p>

<table>

<table style="width:100%; border-collapse:collapse; font-size:9px;" border="1">

<thead>

<tr>

    <th rowspan="2">THN</th>
    <th rowspan="2">BLN</th>
    <th rowspan="2">PER</th>
    <th rowspan="2">DESA</th>
    <th rowspan="2">KOMODITAS</th>
    <th rowspan="2">VARIETAS</th>
    <th rowspan="2">LUAS</th>
    <th rowspan="2">OPT</th>

    <th colspan="5">Sisa Periode Sebelumnya</th>

    <th colspan="2">Luas</th>

    <th colspan="5">Tambah Serangan</th>

    <th colspan="4">Pengendalian</th>

    <th colspan="5">Keadaan Serangan</th>

    <th rowspan="2">MT</th>

</tr>

<tr>

    <th>S_R</th>
    <th>S_S</th>
    <th>S_B</th>
    <th>S_P</th>
    <th>JML</th>

    <th>Terkendali</th>
    <th>Panen</th>

    <th>R</th>
    <th>S</th>
    <th>B</th>
    <th>P</th>
    <th>JML</th>

    <th>Kimia</th>
    <th>Hayati</th>
    <th>Cara Lain</th>
    <th>JML</th>

    <th>R</th>
    <th>S</th>
    <th>B</th>
    <th>P</th>
    <th>JML</th>

</tr>

</thead>

<tbody>


@foreach($detail as $d)

<tr>

<td>{{ $d->id_tahun }}</td>
<td>{{ $d->id_bulan }}</td>
<td>{{ $d->id_periode }}</td>

<td>{{ $d->nama_desa }}</td>

<td>{{ $d->komoditas }}</td>

<td>{{ $d->varietas }}</td>

<td>{{ $d->luas }}</td>

<td>{{ $d->nama_opt }}</td>

<td>{{ $d->sisa_periode_sebelumnya_serangan_ringan }}</td>
<td>{{ $d->sisa_periode_sebelumnya_sisa_serangan_sedang }}</td>
<td>{{ $d->sisa_sisa_periode_sebelumnya_serangan_berat }}</td>
<td>{{ $d->sisa_sisa_periode_sebelumnya_serangan_puso }}</td>
<td>{{ $d->sisa_serangan_jumlah }}</td>

<td>{{ $d->luas_terkendali }}</td>
<td>{{ $d->luas_panen }}</td>

<td>{{ $d->luas_tambah_serangan_ringan }}</td>
<td>{{ $d->luas_tambah_serangan_sedang }}</td>
<td>{{ $d->luas_tambah_serangan_berat }}</td>
<td>{{ $d->luas_tambah_serangan_puso }}</td>
<td>{{ $d->luas_tambah_serangan_jumlah }}</td>

<td>{{ $d->pestisida_kimia }}</td>
<td>{{ $d->pestisida_hayati }}</td>
<td>{{ $d->cara_lain }}</td>
<td>{{ $d->jml }}</td>

<td>{{ $d->luas_keadaan_serangan_ringan }}</td>
<td>{{ $d->luas_keadaan_serangan_sedang }}</td>
<td>{{ $d->luas_keadaan_serangan_berat }}</td>
<td>{{ $d->luas_keadaan_serangan_puso }}</td>
<td>{{ $d->luas_keadaan_serangan_jumlah }}</td>

<td>{{ $d->mt }}</td>

</tr>

@endforeach
</tbody>

</table>

</body>
</html>