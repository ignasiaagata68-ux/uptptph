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

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('data.store') }}"
          method="POST">

        <input type="hidden" name="id_petugas"
            value="{{ $petugas->id_petugas }}">

        <input type="hidden" name="id_tahun"
            value="{{ $tahunAktif->id_tahun }}">

        <input type="hidden" name="id_bulan"
            value="{{ $bulanAktif->id_bulan }}">

        <input type="hidden" name="id_periode"
            value="{{ $periodeAktif->id_periode }}">

        <input type="hidden" name="tanggal_laporan"
            value="{{ date('Y-m-d') }}">

        @csrf

        <table class="table table-bordered">

            <tr>
                <td width="250">Nama Petugas</td>
                <td>{{ $petugas->nama ?? '-' }}</td>

                <td width="120">Tahun</td>
                <td>
                    {{ $tahunAktif->tahun ?? '-' }}
                </td>
            </tr>

            <tr>
                <td>NIP</td>
                <td>{{ $petugas->NIP ?? '-' }}</td>

                <td>Bulan</td>
                <td>
                    {{ $bulanAktif->bulan ?? '-' }}
                </td>
            </tr>

            <tr>
                <td>Kabupaten/Kota</td>
                <td>
                    {{ $petugas->kecamatan->kabupaten->nama_kabupaten_kota ?? '-' }}
                </td>

                <td>Periode</td>
                <td>
                    {{ $periodeAktif->id_periode ?? '-' }}
                </td>
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
                <td>
                    {{ $periodeAktif->periode_pengamatan ?? '-' }}
                </td>

                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>Bulan</td>
                <td>
                    {{ $bulanAktif->bulan ?? '-' }}
                </td>

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

        <div class="mt-3">

            <a href="{{ url('/dashboard-popt') }}"
            class="btn btn-secondary">
                ← Kembali
            </a>

            <button type="submit"
                    class="btn btn-success">
                Simpan
            </button>

        </div>

    </form>

</div>

</body>
</html>