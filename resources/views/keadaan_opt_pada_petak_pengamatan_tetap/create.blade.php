<!DOCTYPE html>
<html>
<head>
    <title>Create Keadaan OPT Pada Petak Pengamatan Tetap</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <div class="judul-form">
        KEADAAN OPT PADA PETAK PENGAMATAN TETAP
    </div>

    <div class="subjudul">
        (Padi/Jagung)
    </div>
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
            background:#b7d7f0;
        }

        .bg-kuning{
            background:yellow;
        }

        table{
            font-size:13px;
        }

        table td,
        table th{
            text-align:center;
            vertical-align:middle;
            padding:3px;
        }
        .bg-biru{
            background:#8db4e2 !important;
        }

        .bg-kuning{
            background:#ffff00 !important;
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
            padding:3px 8px;
            font-size:14px;
        }

        .label{
            background:#ffffff;
            min-width:140px;
        }

        .nilai{
            background:#e6c0c0;
            font-weight:bold;
            min-width:180px;
        }

        .tbl-info-kanan .nilai{
            text-align:center;
        }
        .bg-pink{
            background:#e6c0c0;
        }

</style>
</head>
<body>

<div class="container mt-4">
    <div class="header-form">

    <table class="tbl-info-kiri">
        <tr>
            <td class="label">Kabupaten/Kota</td>
            <td class="nilai">
                {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}
            </td>
        </tr>

        <tr>
            <td class="label">Kecamatan</td>
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
      action="{{ route('keadaan-opt-pada-petak-pengamatan-tetap.store') }}">

    @csrf

        <table class="table table-bordered">
        <thead>

            <tr>

                <th class="bg-biru">Tahun</th>
                <th class="bg-biru">Bulan</th>
                <th class="bg-biru">Periode</th>

                <th class="bg-biru">Kab/Kota</th>
                <th class="bg-biru">Kecamatan</th>

                <th class="bg-biru">Desa</th>

                <th class="bg-biru">Tanaman</th>

                <th class="bg-biru">Varietas</th>

                <th class="bg-biru">Umur</th>

                <th class="bg-biru">Jenis OPT</th>

                <th class="bg-biru">
                    Intensitas (%) 
                </th>

                <th class="bg-biru">
                    POPULASI<br>
                    (ekor/10)
                </th>

                <th class="bg-biru">
                    Populasi
                </th>

                <th class="bg-biru">
                    Jenis MA
                </th>

            </tr>

            <tr>

                <th class="bg-kuning">Thn</th>
                <th class="bg-kuning">Bln</th>
                <th class="bg-kuning">Per</th>

                <th class="bg-kuning">Kab/Kota</th>
                <th class="bg-kuning">Kec</th>

                <th class="bg-kuning">Desa</th>

                <th class="bg-kuning">Tan</th>

                <th class="bg-kuning">Var</th>

                <th class="bg-kuning">Umur</th>

                <th class="bg-kuning">OPT</th>

                <th class="bg-kuning">Int %</th>

                <th class="bg-kuning">Pop</th>

                <th class="bg-kuning">Pop MA</th>

                <th class="bg-kuning">MA</th>

            </tr>

        </thead>
        
            <input type="hidden"
                    name="id_tahun[]"
                    value="{{ $data->id_tahun }}">

            <input type="hidden"
                name="id_bulan[]"
                value="{{ $data->id_bulan }}">

            <input type="hidden"
                name="id_periode[]"
                value="{{ $data->id_periode }}">

            <input type="hidden"
                name="id_musim_tanam"
                value="{{ $data->id_musim_tanam }}">

            <input type="hidden"
                name="id_kabupaten_kota[]"
                value="{{ $data->petugas->kecamatan->kabupaten->id_kabupaten_kota }}">

            <input type="hidden"
                name="id_kecamatan[]"
                value="{{ $data->petugas->id_kecamatan }}">

            <input type="hidden"
                name="id_petugas"
                value="{{ $data->petugas->id_petugas }}">
                
            <tbody id="tbody-opt">
            <tr class="baris-opt">

                <td class="table-danger">
                    {{ $data->tahun->tahun }}
                </td>

                <td class="table-danger">
                    {{ $data->bulan->bulan }}
                </td>

                <td class="table-danger">
                    {{ $data->periode->id_periode }}
                </td>

                <td class="table-danger">
                    {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}
                </td>

                <td class="table-danger">
                    {{ $data->petugas->kecamatan->nama_kecamatan }}
                </td>

                <td class="table-success">

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

                    <td class="table-success">

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
                
                <td>
                    <input type="text"
                            name="varietas[]"
                            class="form-control">
                </td>

                <td>
                   <input type="text"
                          name="umur[]"
                          class="form-control">
                </td>

                <td class="table-success">

                <select name="id_opt[]"
                        class="form-select">

                        <option value="">
                            Pilih OPT
                        </option>

                        @foreach($opt as $o)

                        <option value="{{ $o->id_opt }}">
                            {{ $o->nama_opt }}
                        </option>

                        @endforeach

                </select>

                </td>

                <td>
                    <input type="number"
                            step="0.01"
                            name="intensitas[]"
                            class="form-control">
                </td>

                <td>
                    <input type="number"
                            step="0.01"
                            name="populasi_rumpunan[]"
                            class="form-control">
                </td>

                <td>
                    <input type="number"
                            step="0.01"
                            name="populasi_musuh_alami[]"
                            class="form-control">
                </td>

                <td class="table-success">

                <select name="id_ma[]"
                        class="form-select">

                    <option value="">
                        Pilih MA
                    </option>

                    @foreach($ma as $m)

                    <option value="{{ $m->id_ma }}">
                        {{ $m->nama_ma }}
                    </option>

                    @endforeach

                </select>

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
                {{ date('d F Y') }}
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
            {{ $data->petugas->nip ?? '-' }}

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

        <a href="{{ route('keadaan-opt-pada-petak-pengamatan-tetap.index') }}"
        class="btn btn-secondary">

            Kembali

        </a>

    </div>

</form>

</body>
    <script>

    document.getElementById('tambahBaris').addEventListener('click', function(){

        let tbody =
            document.getElementById('tbody-opt');

        let contohBaris =
            document.querySelector('.baris-opt');

        let barisBaru =
            contohBaris.cloneNode(true);

        barisBaru.querySelectorAll('input').forEach(function(input){

            input.value = '';

        });

        barisBaru.querySelectorAll('select').forEach(function(select){

            select.selectedIndex = 0;

        });

        tbody.appendChild(barisBaru);

    });

    </script>
</div>
</html>

