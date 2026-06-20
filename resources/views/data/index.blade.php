<!DOCTYPE html>
<html>
<head>
    <title>DATA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>DATA</h2>

    <a href="{{ route('data.create') }}"
       class="btn btn-success mb-3">
        Tambah Data
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>No</th>
                <th>Petugas</th>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Periode</th>
                <th>Musim Tanam</th>
                <th>Tanggal Laporan</th>
            </tr>
        </thead>

        <tbody>

            @foreach($data as $d)

            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>{{ $d->petugas->nama ?? '-' }}</td>

                <td>{{ $d->tahun->tahun ?? '-' }}</td>

                <td>{{ $d->bulan->bulan ?? '-' }}</td>

                <td>{{ $d->periode->periode_pengamatan ?? '-' }}</td>

                <td>{{ $d->musimTanam->musim_tanam ?? '-' }}</td>

                <td>{{ $d->tanggal_laporan }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
</html>