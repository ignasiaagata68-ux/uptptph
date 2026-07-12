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
            <th>kabupaten</th>
            <th>Kecamatan</th>
            <th>Desa</th>
            <th>Kelompok Tani</th>
            <th>Petak Pengamatan</th>
            <th>Petugas</th>
            <th>Aksi</th>
        </tr>

    </thead>

    <tbody>

    @foreach($data as $d)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $d->tgl_pengamatan }}</td>

        <td>{{ $d->kabupaten->nama_kabupaten_kota ?? '-' }}</td>

        <td>{{ $d->kecamatan->nama_kecamatan ?? '-' }}</td>

        <td>{{ $d->desa->nama_desa ?? '-' }}</td>

        <td>{{ $d->kelompokTani->nama_kelompok ?? '-' }}</td>

        <td>{{ $d->petak_pengamatan }}</td>

        <td>{{ $d->petugas->nama ?? '-' }}</td>


        <td style="white-space: nowrap; width:1%;">

            <a href="{{ route('pengamatan-persemaian-padi.show', $d->id_pengamatan_persemaian_padi) }}"
               class="btn btn-info btn-sm me-2">
                Detail
            </a>
        </td>

    </tr>

    @endforeach

    </tbody>

</table>
</div>

</body>
</html>
