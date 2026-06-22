<!DOCTYPE html>
<html>
<head>

    <title>Detail Banjir</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

        </head>
        <body>

        <div class="container mt-4">

        <h3>Detail Laporan Kerusakan Tanaman Akibat Banjir</h3>

        <table class="table table-bordered">
 <thead>

        <tr>

        <th>Desa</th>
        <th>Komoditas</th>
        <th>Var</th>
        <th>Umur</th>
        <th>Luas Tanam</th>
        <th>Status</th>

        </tr>

</thead>

    <tbody>

    @foreach($detail as $d)

    <tr>

    <td>{{ $d->desa->nama_desa ?? '-' }}</td>

    <td>{{ $d->komoditas->komoditas ?? '-' }}</td>

    <td>{{ $d->var }}</td>

    <td>{{ $d->umur }}</td>

    <td>{{ $d->luas_tanam }}</td>

    <td>

    @if($d->status_verifikasi=='benar')

    <span class="badge bg-success">
    Benar
    </span>

    @elseif($d->status_verifikasi=='salah')

    <span class="badge bg-danger">
    Salah
    </span>

    @else

    <span class="badge bg-warning">
    Menunggu
    </span>

    @endif

    </td>

    </tr>

    @endforeach

    </tbody>

</table>

    <a href="{{ route('laporan-kerusakan-tanaman-akibat-banjir.index') }}"
    class="btn btn-secondary">
    Kembali
    </a>

</div>

</body>
</html>