<!DOCTYPE html>
<html>
<head>
    <title>
        Data Keadaan OPT Pada Petak Pengamatan Tetap
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif

    <h2>
        Data Keadaan OPT Pada Petak Pengamatan Tetap
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

    <table class="table table-bordered">

        <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Kabupaten/Kota</th>
            <th>Kecamatan</th>
            <th>Periode</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>

        </thead>

        <tbody>

        @foreach($data as $row)

        <tr>

            <td>
                {{ $row->id_keadaan_opt_pada_petak_pengamatan_tetap }}
            </td>

            <td>
                {{ $row->nama_kabupaten_kota }}
            </td>

            <td>
                {{ $row->nama_kecamatan }}
            </td>

            <td>
                {{ $row->periode_pengamatan }}
            </td>
            <td>
                {{ $row->status_verifikasi ?? '-' }}
            </td>

            <td>

                @if($row->status_verifikasi == 'benar')

                    <span class="badge bg-success">
                        Benar
                    </span>

                @elseif($row->status_verifikasi == 'salah')

                    <span class="badge bg-danger">
                        Salah
                    </span>

                @elseif($row->status_verifikasi == 'menunggu')

                    <span class="badge bg-warning text-dark">
                        Menunggu
                    </span>

                @else

                    <span class="badge bg-secondary">
                        -
                    </span>

                @endif

            </td>

            <td>

                <a href="{{ route('keadaan-opt-pada-petak-pengamatan-tetap.detail', $row->id_keadaan_opt_pada_petak_pengamatan_tetap) }}"
                    class="btn btn-info btn-sm">
                    Detail
                </a>

                <a href="{{ route(
                    'keadaan-opt-pada-petak-pengamatan-tetap.edit',
                    $row->id_keadaan_opt_pada_petak_pengamatan_tetap
                ) }}"
                class="btn btn-warning btn-sm">

                    Edit

                </a>
                <a href="{{ route(
                    'keadaan-opt-pada-petak-pengamatan-tetap.verifikasi',
                    $row->id_keadaan_opt_pada_petak_pengamatan_tetap
                ) }}"
                class="btn btn-success btn-sm">

                    Verifikasi

                </a>

            </td>
        </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>