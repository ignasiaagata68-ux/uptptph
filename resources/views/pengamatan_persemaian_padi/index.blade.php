<!DOCTYPE html>
<html>
<head>
    <title>Data Pengamatan Persemaian Padi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>Data Pengamatan Persemaian Padi</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Petak</th>
                <th>Status Verifikasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            @foreach($data as $d)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $d->tgl_pengamatan }}</td>

                <td>{{ $d->petak_pengamatan }}</td>

                <td>

                    @if($d->status_verifikasi == 'benar')

                        <span class="badge bg-success">
                            Benar
                        </span>

                    @elseif($d->status_verifikasi == 'salah')

                        <span class="badge bg-danger">
                            Salah
                        </span>

                    @else

                        <span class="badge bg-warning">
                            Menunggu
                        </span>

                    @endif

                </td>

                <td>
                    {{ $d->keterangan_verifikasi ?? '-' }}
                </td>

                <td>
                    <a href="{{ route('pengamatan-persemaian-padi.show', $d->id_pengamatan_persemaian_padi) }}"
                    class="btn btn-primary btn-sm">
                        Detail
                    </a>

                    <a href="{{ route('pengamatan-persemaian-padi.edit', $d->id_pengamatan_persemaian_padi) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>