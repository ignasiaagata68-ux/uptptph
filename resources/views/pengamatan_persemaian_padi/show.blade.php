<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengamatan Persemaian Padi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>Detail Pengamatan Persemaian Padi</h3>

    <table class="table table-bordered">

        <tr>
            <th>Tanggal Pengamatan</th>
            <td>{{ $header->tgl_pengamatan }}</td>
        </tr>

        <tr>
            <th>Petak Pengamatan</th>
            <td>{{ $header->petak_pengamatan }}</td>
        </tr>

    </table>

    <h5>Data Detail</h5>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>No Persemaian</th>
                <th>Luas</th>
                <th>Umur</th>
                <th>Varietas</th>
                <th>POP Ayunan WBC</th>
                <th>WDH</th>
                <th>MA</th>
                <th>Tikus</th>
                <th>Pop KT PBP</th>
                <th>Penyakit</th>
                <th>WBC</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>

        <tbody>

            @foreach($detail as $d)

            <tr>
                <td>{{ $d->no_persemaian }}</td>
                <td>{{ $d->luas }}</td>
                <td>{{ $d->umur }}</td>
                <td>{{ $d->varietas }}</td>
                <td>{{ $d->pop_ayunan_wbc }}</td>
                <td>{{ $d->wdh }}</td>
                <td>{{ $d->ma->nama_ma ?? '-' }}</td>
                <td>{{ $d->tikus }}</td>
                <td>{{ $d->pbp }}</td>
                <td>{{ $d->penyakit }}</td>
                <td>{{ $d->wbc }}</td>
                <td>{{ $d->status_verifikasi ?? 'menunggu' }}</td>
                <td>{{ $d->keterangan_verifikasi ?? '-' }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

    <a href="{{ route('pengamatan-persemaian-padi.index') }}"
       class="btn btn-secondary">
        Kembali
    </a>

</div>
<hr>

</body>
</html>