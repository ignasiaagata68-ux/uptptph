<!DOCTYPE html>
<html>
<head>
    <title>Data Kecamatan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Kecamatan</h2>

    <a href="{{ route('kecamatan.create') }}"
       class="btn btn-primary mb-3">
        Tambah Data
    </a>

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
                <th>ID</th>
                <th>Nama Kecamatan</th>
                <th>Kabupaten</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @foreach($data as $row)

        <tr>

            <td>{{ $row->id_kecamatan }}</td>

            <td>{{ $row->nama_kecamatan }}</td>

            <td>{{ $row->kabupaten->nama_kabupaten_kota }}</td>

            <td style="white-space: nowrap; width:1%;">

                <a href="{{ route('kecamatan.edit',$row->id_kecamatan) }}"
                   class="btn btn-warning btn-sm me-2">
                    Edit
                </a>

                <form action="{{ route('kecamatan.destroy',$row->id_kecamatan) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus data?')">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>