<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SP - Surat Pengantar</title>

```
<style>

    body{
        font-family:"Times New Roman", serif;
        font-size:14px;
        margin:20px;
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    .judul{
        text-align:center;
        font-weight:bold;
        font-size:18px;
        line-height:1.4;
    }

    .pink{
        background:#e8bcbc;
        padding:3px;
        font-weight:bold;
    }

    .checklist{
        border:1px solid #000;
        width:120px;
        text-align:center;
    }

    .mt-20{
        margin-top:20px;
    }

    .ttd{
        margin-top:40px;
        text-align:center;
    }

</style>
```

</head>
<body>


<div class="judul">
    UNIT PELAKSANA TEKNIS PERLINDUNGAN TANAMAN PANGAN DAN HORTIKULTURA<br>
    PROVINSI KALIMANTAN BARAT
</div>

<br>

<table width="100%">
    <tr>
        <td colspan="12" align="center">
  
        </td>
    </tr>

    <tr>
        <td colspan="5">
            POPT - PHP Kec :
        </td>

        <td colspan="7" align="right">
            Balai, 20 Juni 2026
        </td>
    </tr>


</table>

<br>

<table>

    <tr>

        <td width="45%">
            Hal
        </td>

        <td width="5%">
            :
        </td>

        <td width="50%">
            Laporan Setengah Bulanan/Bulanan/Musim Tanam
        </td>

    </tr>

    <tr>

        <td>
            Sifat
        </td>

        <td>
            :
        </td>

        <td>
            Penting
        </td>

    </tr>

</table>

<br>

<table>

    <tr>

        <td width="45%">
        </td>

        <td>

            Kepada Yth.<br>
            Bapak / Ibu / Sdr.<br>

            1. Bpk. Kepala BPP Kec.

            <span class="pink">
                {{ $data->petugas->kecamatan->nama_kecamatan }}
            </span>

            <br>

            &nbsp;&nbsp;&nbsp;&nbsp;Kab/Kota

            <span class="pink">
                {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}
            </span>

            <br>

            2. Kood POPT Kab/Kota

            <br>

            &nbsp;&nbsp;&nbsp;&nbsp;

            <span class="pink">
                {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}
            </span>

        </td>

    </tr>

</table>

<br><br>

Dengan ini kami laporkan bahwa berdasarkan hasil pengamatan periode,

<br>

<span class="pink">
    {{ $data->periode->periode_pengamatan }}
</span>

yang terdiri dari laporan :

<br><br>

<table>

    <tr>
        <td>1. Pengamatan persemaian padi</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>2. Keadaan Serangan OPT Pangan dan Luas Pengendalian ( Pengamatan Keliling )</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>3. Keadaan OPT Pada Petak Pengamatan Tetap</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>4. Kerusakan Tanaman Akibat Banjir</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>5. Kerusakan Tanaman Akibat Kekeringan</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>6. Perubahan Kategori Kekeringan</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>7. Kerusakan Tanaman Akibat Gangguan Fisiologis</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>8. Kerusakan Tanaman Akibat Bencana Alam</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>9. Tangkapan Lampu Perangkap</td>
        <td class="checklist">-</td>
    </tr>

    <tr>
        <td>10. Kumulatif Luas Tambah Tanam Padi</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>11. Penggunaan Pestisida</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>12. Keadaan Curah Hujan</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>13. Pengamatan Penyebaran dan Perkembangan Siput Murbei</td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>14. Laporan Peringatan Dini</td>
        <td class="checklist"></td>
    </tr>

</table>

<br>

Atas perhatiannya kami ucapkan terima kasih.

<br><br>

Tembusan Kepada Yth.

<br>

1. Kepala UPTPTPH Kalbar
<br>
2. Pengelola LPHP/LAH

<br><br><br>

<div class="ttd">

    POPT - PHP

    <br>

    Kecamatan

    <br>

    <span class="pink">
        {{ $data->petugas->kecamatan->nama_kecamatan }}
    </span>

    <br><br><br><br>

    <b>
        {{ $data->petugas->nama }}
    </b>

</div>
<div class="text-end mt-4">

    <a
        href="{{ route('pengamatan-persemaian-padi.create',$data->id_data) }}"
        class="btn btn-primary">

        Next >>

    </a>

</div>

</body>
</html>
