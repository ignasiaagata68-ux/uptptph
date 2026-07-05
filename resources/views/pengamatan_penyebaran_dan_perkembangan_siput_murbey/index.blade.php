<!DOCTYPE html>
<html>
<head>
    <title>Data Pengamatan Penyebaran dan Perkembangan Siput Murbey</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2 class="mb-4">
        Data Pengamatan Penyebaran dan Perkembangan Siput Murbey
    </h2>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th width="70">ID</th>

                <th>Kabupaten/Kota</th>

                <th>Kecamatan</th>

                <th>Bulan</th>

                <th>Musim Tanam</th>

                <th width="220">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($data as $row)

            <tr>

                <td>

                    {{ $row->id_pengamatan_penyebaran_dan_perkembangan_siput_murbey }}

                </td>

                <td>

                    {{ $row->nama_kabupaten_kota }}

                </td>

                <td>

                    {{ $row->nama_kecamatan }}

                </td>

                <td>

                    {{ $row->bulan}}

                </td>

                <td>

                    {{ $row->musim_tanam }}

                </td>

                <td>

                    <a href="{{ route(
                        'pengamatan-penyebaran-dan-perkembangan-siput-murbey.detail',
                        $row->id_pengamatan_penyebaran_dan_perkembangan_siput_murbey
                    ) }}"
                    class="btn btn-info btn-sm">

                        Detail

                    </a>

                    <a href="{{ route(
                        'pengamatan-penyebaran-dan-perkembangan-siput-murbey.edit',
                        $row->id_pengamatan_penyebaran_dan_perkembangan_siput_murbey
                    ) }}"
                    class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    {{-- Aktifkan jika fitur verifikasi sudah dibuat --}}
                    {{--
                     <a href="{{ route(
                        'pengamatan-penyebaran-dan-perkembangan-siput-murbey.verifikasi',
                        $row->id_pengamatan_penyebaran_dan_perkembangan_siput_murbey
                    ) }}"
                    class="btn btn-success btn-sm">

                        Verifikasi

                    </a>
                    --}}

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="8" class="text-center">

                    Data belum tersedia.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>