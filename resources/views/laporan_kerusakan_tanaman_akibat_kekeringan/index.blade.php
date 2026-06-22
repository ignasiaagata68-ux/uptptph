<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kerusakan Tanaman Akibat Kekeringan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>Laporan Kerusakan Tanaman Akibat Kekeringan</h3>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th>No</th>
                <th>Kabupaten/Kota</th>
                <th>Kecamatan</th>
                <th>Periode</th>
                <th>Musim Tanam</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($data as $d)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $d->nama_kabupaten_kota }}
                </td>

                <td>
                    {{ $d->nama_kecamatan }}
                </td>

                <td>
                    {{ $d->periode_pengamatan }}
                </td>

                <td>
                    {{ $d->musim_tanam }}
                </td>

                <td>

                    <a href="{{ route(
                        'laporan-kerusakan-tanaman-akibat-kekeringan.detail',
                        $d->id_laporan_kerusakan_tanaman_akibat_kekeringan
                    ) }}"
                    class="btn btn-info btn-sm">

                        Detail

                    </a>

                    <a href="{{ route(
                        'laporan-kerusakan-tanaman-akibat-kekeringan.edit',
                        $d->id_laporan_kerusakan_tanaman_akibat_kekeringan
                    ) }}"
                    class="btn btn-warning btn-sm">

                        Edit

                    </a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="text-center">

                    Belum ada data

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>