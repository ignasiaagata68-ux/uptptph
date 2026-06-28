<!DOCTYPE html>
<html>
<head>
    <title>Data Pengamatan Persemaian Padi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <!DOCTYPE html>

<html>

<div class="container mt-4">
<!DOCTYPE html>

<html>
<head>
    <title>Data Pengamatan Persemaian Padi</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">


</head>
<body>

<div class="container mt-4">


<h2>Data Pengamatan Persemaian Padi</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table table-bordered table-striped">

    <thead class="table-dark">

        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Petak Pengamatan</th>
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

                <span class="badge bg-warning text-dark">
                    Menunggu
                </span>

            @endif

        </td>

        <td>
            {{ $d->keterangan_verifikasi ?? '-' }}
        </td>

        <td style="white-space: nowrap; width:1%;">

            <a href="{{ route('pengamatan-persemaian-padi.show', $d->id_pengamatan_persemaian_padi) }}"
               class="btn btn-info btn-sm me-2">
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
```

</div>

</body>
</html>
