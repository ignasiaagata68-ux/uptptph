<!DOCTYPE html>
<html>
<head>
    <title>Data Laporan Kerusakan Tanaman Akibat Banjir</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>Data Laporan Kerusakan Tanaman Akibat Banjir</h3>

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

                <th>ID</th>
                <th>Kabupaten/Kota</th>
                <th>Kecamatan</th>
                <th>Periode</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($data as $d)

            <tr>

                <td>
                    {{ $d->id_laporan_kerusakan_tanaman_akibat_banjir }}
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

                    @if($d->status_verifikasi == 'terverifikasi')

                        <span class="badge bg-success">
                            Terverifikasi
                        </span>

                    @elseif($d->status_verifikasi == 'perlu_perbaikan')

                        <span class="badge bg-danger">
                            Perlu Perbaikan
                        </span>

                    @else

                        <span class="badge bg-warning text-dark">
                            Menunggu
                        </span>

                    @endif

                </td>

                <td style="white-space: nowrap;">

                    <a href="{{ route(
                        'laporan-kerusakan-tanaman-akibat-banjir.detail',
                        $d->id_laporan_kerusakan_tanaman_akibat_banjir
                    ) }}"
                    class="btn btn-primary btn-sm">

                        Detail

                    </a>

                    @if(session('role') == 'popt')

                        @if($d->status_verifikasi == 'perlu_perbaikan')

                            <a href="{{ route(
                                'laporan-kerusakan-tanaman-akibat-banjir.edit',
                                $d->id_laporan_kerusakan_tanaman_akibat_banjir
                            ) }}"
                            class="btn btn-warning btn-sm">

                                Edit

                            </a>

                        @endif

                    @endif

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7" class="text-center">

                    Belum ada data

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>