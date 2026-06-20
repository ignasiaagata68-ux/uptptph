<!DOCTYPE html>
<html>
<head>
    <title>DATA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>DATA</h3>

    <form action="{{ route('data.store') }}"
          method="POST">

        @csrf

        <table class="table table-bordered">

            <tr>
                <td width="250">Nama Petugas</td>
                <td>{{ $petugas->nama ?? '-' }}</td>

                <td width="120">Tahun</td>
                <td>OTOMATIS</td>
            </tr>

            <tr>
                <td>NIP</td>
                <td>{{ $petugas->NIP ?? '-' }}</td>

                <td>Bulan</td>
                <td>OTOMATIS</td>
            </tr>

            <tr>
                <td>Kabupaten/Kota</td>
                <td>
                    {{ $petugas->kecamatan->kabupaten->nama_kabupaten_kota ?? '-' }}
                </td>

                <td>Periode</td>
                <td>OTOMATIS</td>
            </tr>

            <tr>
                <td>Kecamatan</td>
                <td>
                    {{ $petugas->kecamatan->nama_kecamatan ?? '-' }}
                </td>

                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Periode Pengamatan</td>
                <td>OTOMATIS</td>

                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Bulan</td>
                <td>OTOMATIS</td>

                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Musim Tanam</td>

                <td>

                    <select
                        name="id_musim_tanam"
                        class="form-select">

                        @foreach($musimTanam as $m)

                            <option value="{{ $m->id_musim_tanam }}">
                                {{ $m->musim_tanam }}
                            </option>

                        @endforeach

                    </select>

                </td>

                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Tanggal Laporan</td>
                <td>{{ date('d-m-Y') }}</td>

                <td></td>
                <td></td>
            </tr>

        </table>

        <button class="btn btn-success">
            Simpan
        </button>

    </form>

</div>

</body>
</html>