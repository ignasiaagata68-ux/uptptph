<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kerusakan Tanaman Akibat Fisiologis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        .judul-form{
            text-align:center;
            font-weight:bold;
            font-size:28px;
        }

        .subjudul{
            text-align:center;
            font-size:18px;
            margin-bottom:15px;
        }

        .bg-pink{
            background:#e6c0c0;
        }

        .bg-hijau{
            background:#dcecc5;
        }

        .bg-biru{
            background:#8db4e2;
        }

        .bg-kuning{
            background:yellow;
        }

        .header-form{
            display:flex;
            justify-content:space-between;
            margin-bottom:15px;
        }

        .tbl-info-kiri,
        .tbl-info-kanan{
            border-collapse:collapse;
        }

        .tbl-info-kiri td,
        .tbl-info-kanan td{
            border:1px solid #000;
            padding:4px 8px;
        }

        .label{
            min-width:150px;
        }

        .nilai{
            background:#e6c0c0;
            min-width:220px;
            font-weight:bold;
        }

        table td,
        table th{
            text-align:center;
            vertical-align:middle;
        }

    </style>

</head>
<body>

<div class="container-fluid mt-3">

    <div class="judul-form">
        LAPORAN KERUSAKAN TANAMAN AKIBAT FISIOLOGIS
    </div>

    <div class="subjudul">
        (Padi / Jagung)
    </div>

    <div class="header-form">

        <table class="tbl-info-kiri">

            <tr>
                <td class="label">
                    Kabupaten/Kota
                </td>

                <td class="nilai">
                    {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Kecamatan
                </td>

                <td class="nilai">
                    {{ $data->petugas->kecamatan->nama_kecamatan }}
                </td>
            </tr>

        </table>

        <table class="tbl-info-kanan">

            <tr>
                <td class="label">
                    Periode Pengamatan
                </td>

                <td class="nilai">
                    {{ $data->periode->periode_pengamatan }}
                </td>
            </tr>

            <tr>
                <td class="label">
                    Musim Tanam
                </td>

                <td class="nilai">
                    {{ $data->musimTanam->musim_tanam }}
                </td>
            </tr>

        </table>

    </div>

<form method="POST"
      action="{{ route('laporan-kerusakan-tanaman-akibat-fisiologis.store') }}">

    @csrf

<thead>

<tr>

    <th rowspan="2">Tahun</th>
    <th rowspan="2">Bulan</th>
    <th rowspan="2">Periode</th>

    <th rowspan="2">Kab/Kota</th>
    <th rowspan="2">Kecamatan</th>
    <th rowspan="2">Desa</th>

    <th rowspan="2">Tanaman</th>
    <th rowspan="2">Varietas</th>
    <th rowspan="2">Umur (Hst)</th>

    <th rowspan="2">Luas Tanam (Ha)</th>
    <th rowspan="2">Luas Waspada (Ha)</th>

    <th colspan="6">
        Sisa Periode Sebelumnya /
        Perubahan Kategori (Ha)
    </th>

    <th colspan="5">
        Luas Tambah Pada
        Periode Laporan (Ha)
    </th>

    <th colspan="5">
        Keadaan Pada
        Periode Laporan (Ha)
    </th>

    <th colspan="2">
        Penanganan
    </th>

    <th colspan="2">
        Koordinat
    </th>

</tr>

<tr>

    <!-- SPS -->

    <th>Ringan</th>
    <th>Sedang</th>
    <th>Berat</th>
    <th>Puso</th>
    <th>Pulih</th>
    <th>Jumlah</th>

    <!-- LT -->

    <th>Ringan</th>
    <th>Sedang</th>
    <th>Berat</th>
    <th>Puso</th>
    <th>Jumlah</th>

    <!-- LK -->

    <th>Ringan</th>
    <th>Sedang</th>
    <th>Berat</th>
    <th>Puso</th>
    <th>Jumlah</th>

    <th>Upaya</th>
    <th>Luas (Ha)</th>

    <th>Latitude</th>
    <th>Longitude</th>

</tr>

<tr class="bg-primary text-white">

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
    <th>20</th>
    <th>21</th>
    <th>22</th>

    <th>23</th>
    <th>24</th>
    <th>25</th>
    <th>26</th>
    <th>27</th>

    <th>28</th>
    <th>29</th>

    <th>30</th>
    <th>31</th>

</tr>

<tr class="bg-warning">

    <th>THN</th>
    <th>BLN</th>
    <th>PRD</th>

    <th>KAB</th>
    <th>KEC</th>
    <th>DES</th>

    <th>TAN</th>
    <th>VAR</th>
    <th>UMR</th>

    <th>LST</th>
    <th>WAS</th>

    <th>SP_R</th>
    <th>SP_S</th>
    <th>SP_B</th>
    <th>SP_P</th>
    <th>SP_PL</th>
    <th>SP_J</th>

    <th>LT_R</th>
    <th>LT_S</th>
    <th>LT_B</th>
    <th>LT_P</th>
    <th>LT_J</th>

    <th>LK_R</th>
    <th>LK_S</th>
    <th>LK_B</th>
    <th>LK_P</th>
    <th>LK_J</th>

    <th>UPY</th>
    <th>L_UPY</th>

    <th>LAT</th>
    <th>LONG</th>

</tr>

</thead>
<tbody id="tbody-fisiologis">

<input type="hidden" name="id_tahun[]" value="{{ $data->id_tahun }}">
<input type="hidden" name="id_bulan[]" value="{{ $data->id_bulan }}">
<input type="hidden" name="id_periode[]" value="{{ $data->id_periode }}">

<tr class="baris-fisiologis">

    <!-- THN -->
    <td class="bg-pink">
        {{ $data->tahun->tahun }}
    </td>

    <!-- BLN -->
    <td class="bg-pink">
        {{ $data->bulan->bulan }}
    </td>

    <!-- PRD -->
    <td class="bg-pink">
        {{ $data->periode->id_periode }}
    </td>

    <!-- KAB -->
    <td class="bg-hijau">
        {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}

        <input type="hidden"
            name="id_kabupaten_kota[]"
            value="{{ $data->petugas->kecamatan->kabupaten->id_kabupaten_kota }}">
    </td>

    <!-- KEC -->
    <td class="bg-hijau">
        {{ $data->petugas->kecamatan->nama_kecamatan }}

        <input type="hidden"
            name="id_kecamatan[]"
            value="{{ $data->petugas->id_kecamatan }}">
    </td>

    <!-- DESA -->
    <td class="bg-hijau">
        <select name="id_desa[]" class="form-select">

            <option value="">
                Pilih Desa
            </option>

            @foreach($desa as $d)
            <option value="{{ $d->id_desa }}">
                {{ $d->nama_desa }}
            </option>
            @endforeach

        </select>
    </td>

    <!-- TANAMAN -->
    <td class="bg-hijau">
        <select name="id_komoditas[]" class="form-select">

            <option value="">
                Pilih Komoditas
            </option>

            @foreach($komoditas as $k)
            <option value="{{ $k->id_komoditas }}">
                {{ $k->komoditas }}
            </option>
            @endforeach

        </select>
    </td>

    <!-- VAR -->
    <td>
        <input type="text"
            name="varietas[]"
            class="form-control">
    </td>

    <!-- UMR -->
    <td>
        <input type="text"
            name="umur[]"
            class="form-control">
    </td>

    <!-- LST -->
    <td>
        <input type="number"
            step="0.01"
            name="luas_tanam[]"
            class="form-control">
    </td>

    <!-- WAS -->
    <td>
        <input type="number"
            step="0.01"
            name="luas_waspada[]"
            class="form-control">
    </td>

    <!-- SPS -->
    <td><input type="number" step="0.01" name="sps_ringan[]" class="form-control"></td>
    <td><input type="number" step="0.01" name="sps_sedang[]" class="form-control"></td>
    <td><input type="number" step="0.01" name="sps_berat[]" class="form-control"></td>
    <td><input type="number" step="0.01" name="sps_puso[]" class="form-control"></td>
    <td><input type="number" step="0.01" name="sps_pulih[]" class="form-control"></td>

    <td class="bg-pink">
        <input type="number"
            step="0.01"
            name="sps_jumlah[]"
            value="0"
            readonly
            class="form-control sps_jumlah">
    </td>

    <!-- LT -->
    <td><input type="number" step="0.01" name="lt_ringan[]" class="form-control lt_ringan"></td>
    <td><input type="number" step="0.01" name="lt_sedang[]" class="form-control lt_sedang"></td>
    <td><input type="number" step="0.01" name="lt_berat[]" class="form-control lt_berat"></td>
    <td><input type="number" step="0.01" name="lt_puso[]" class="form-control lt_puso"></td>

    <td class="bg-pink">
        <input type="number"
            step="0.01"
            name="lt_jumlah[]"
            value="0"
            readonly
            class="form-control lt_jumlah">
    </td>

    <!-- LK -->
    <td><input type="number" step="0.01" name="lk_ringan[]" class="form-control"></td>
    <td><input type="number" step="0.01" name="lk_sedang[]" class="form-control"></td>
    <td><input type="number" step="0.01" name="lk_berat[]" class="form-control"></td>
    <td><input type="number" step="0.01" name="lk_puso[]" class="form-control"></td>

    <td class="bg-pink">
        <input type="number"
            step="0.01"
            name="lk_jumlah[]"
            value="0"
            readonly
            class="form-control lk_jumlah">
    </td>

    <!-- UPY -->
    <td>
        <input type="text"
            name="penanganan_upaya[]"
            class="form-control">
    </td>

    <!-- L UPY -->
    <td>
        <input type="number"
            step="0.01"
            name="penanganan_luas[]"
            class="form-control">
    </td>

    <!-- LAT -->
    <td>
        <input type="text"
            name="latitude[]"
            class="form-control">
    </td>

    <!-- LONG -->
    <td>
        <input type="text"
            name="longitude[]"
            class="form-control">
    </td>

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
                type="button"
                id="tambahBaris"
                class="btn btn-primary">

                Tambah Baris

            </button>

            <button
                type="submit"
                class="btn btn-success">

                Simpan

            </button>

            <a href="{{ route('laporan-kerusakan-tanaman-akibat-fisiologis.index') }}"
            class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>
        <script>

            document.getElementById('tambahBaris')
            .addEventListener('click', function(){

                let tbody =
                    document.getElementById('tbody-fisiologis');

                let contohBaris =
                    document.querySelector('.baris-fisiologis');

                let barisBaru =
                    contohBaris.cloneNode(true);

                barisBaru.querySelectorAll('input')
                .forEach(function(input){

                    if(input.type === 'hidden'){
                        return;
                    }

                    if(
                        input.classList.contains('sps_j')
                        ||
                        input.classList.contains('lt_j')
                        ||
                        input.classList.contains('lk_r')
                        ||
                        input.classList.contains('lk_s')
                        ||
                        input.classList.contains('lk_b')
                        ||
                        input.classList.contains('lk_p')
                        ||
                        input.classList.contains('lk_j')
                    ){
                        input.value = 0;
                    }
                    else{
                        input.value = '';
                    }

                });

                barisBaru.querySelectorAll('select')
                .forEach(function(select){

                    select.selectedIndex = 0;

                });

                tbody.appendChild(barisBaru);

            });

        </script>

        <script>
            document.addEventListener('input', function(e){

                let row = e.target.closest('tr');

                if(!row) return;

                let sps_r =
                    parseFloat(row.querySelector('.sps_r')?.value) || 0;

                let sps_s =
                    parseFloat(row.querySelector('.sps_s')?.value) || 0;

                let sps_b =
                    parseFloat(row.querySelector('.sps_b')?.value) || 0;

                let sps_p =
                    parseFloat(row.querySelector('.sps_p')?.value) || 0;

                let sps_pl =
                    parseFloat(row.querySelector('.sps_pl')?.value) || 0;

                row.querySelector('.sps_j').value =
                    sps_r + sps_s + sps_b + sps_p + sps_pl;

                let lt_r =
                    parseFloat(row.querySelector('.lt_r')?.value) || 0;

                let lt_s =
                    parseFloat(row.querySelector('.lt_s')?.value) || 0;

                let lt_b =
                    parseFloat(row.querySelector('.lt_b')?.value) || 0;

                let lt_p =
                    parseFloat(row.querySelector('.lt_p')?.value) || 0;

                row.querySelector('.lt_j').value =
                    lt_r + lt_s + lt_b + lt_p;

                row.querySelector('.lk_r').value =
                    sps_r + lt_r;

                row.querySelector('.lk_s').value =
                    sps_s + lt_s;

                row.querySelector('.lk_b').value =
                    sps_b + lt_b;

                row.querySelector('.lk_p').value =
                    sps_p + lt_p;

                row.querySelector('.lk_j').value =
                    (sps_r + lt_r)
                    +
                    (sps_s + lt_s)
                    +
                    (sps_b + lt_b)
                    +
                    (sps_p + lt_p);

            });

        </script>

    </body>
</html>