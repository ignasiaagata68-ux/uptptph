<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SP - Surat Pengantar</title>

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

    table a{
    color:black;
    text-decoration:none;
    font-weight:bold;
    }

    table a:hover{
        color:blue;
        text-decoration:underline;
    }

</style>


</head>
<body>
    @if(session('success'))
    <div style="
        background:#d4edda;
        color:#155724;
        border:1px solid #c3e6cb;
        padding:10px;
        margin-bottom:15px;
        font-weight:bold;
        ">
            {{ session('success') }}
        </div>
    @endif


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
        <td>
            <a href="{{ route('pengamatan-persemaian-padi.create',$data->id_data) }}">
                1. Pengamatan Persemaian Padi
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('keadaan-serangan-opt.create',$data->id_data) }}">
                2. Keadaan Serangan OPT Pangan dan Luas Pengendalian (Pengamatan Keliling)
            </a>
        </td>
        <td class="checklist">
            {{ $adaKeadaanSerangan ? '✓' : '-' }}
        </td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('keadaan-opt-pada-petak-pengamatan-tetap.create',$data->id_data) }}">
                3. Keadaan OPT Pada Petak Pengamatan Tetap
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('laporan-kerusakan-tanaman-akibat-banjir.create',$data->id_data) }}">
                4. Kerusakan Tanaman Akibat Banjir
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('laporan-kerusakan-tanaman-akibat-kekeringan.create',$data->id_data) }}">
                5. Kerusakan Tanaman Akibat Kekeringan
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('informasi-perubahan-kategori-kekeringan.create',$data->id_data) }}">
                6. Perubahan Kategori Kekeringan
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('laporan-kerusakan-tanaman-akibat-fisiologis.create',$data->id_data) }}">
                7. Kerusakan Tanaman Akibat Gangguan Fisiologis
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('laporan-kerusakan-tanaman-akibat-bencana-alam.create',$data->id_data) }}">
                8. Kerusakan Tanaman Akibat Bencana Alam
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('tangkapan-lampu-perangkap.create',$data->id_data) }}">
                9. Tangkapan Lampu Perangkap
            </a>
        </td>
        <td class="checklist">-</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('kumulatif-luas-tambah-tanam-padi.create',$data->id_data) }}">
                10. Kumulatif Luas Tambah Tanam Padi
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('penggunaan-pestisida.create',$data->id_data) }}">
                11. Penggunaan Pestisida
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('keadaan-curah-hujan.create',$data->id_data) }}">
                12. Keadaan Curah Hujan
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('pengamatan-penyebaran-dan-perkembangan-siput-murbey.create',$data->id_data) }}">
                13. Pengamatan Penyebaran dan Perkembangan Siput Murbei
            </a>
        </td>
        <td class="checklist">V</td>
    </tr>

    <tr>
        <td>
            <a href="{{ route('laporan-peringatan-dini.create',$data->id_data) }}">
                14. Laporan Peringatan Dini
            </a>
        </td>
        <td class="checklist">V</td>
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
</body>
@if(session('role') == 'popt')

<div style="margin-top:20px; text-align:center;">
    <form action="{{ route('sp.kirim', $data->id_data) }}" method="POST">
        @csrf

        <button type="submit">
            Kirim ke LPHP
        </button>
    </form>
</div>

@endif

</body>
</form>
</html>
