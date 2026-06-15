<!DOCTYPE html>
<html>
<head>
    <title>Data Desa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Desa</h2>

    <a href="{{ route('desa.create') }}"
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
                <th>Nama Desa</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @foreach($data as $row)

        <tr>

            <td>{{ $row->id_desa }}</td>

            <td>{{ $row->nama_desa }}</td>

            <td>{{ $row->kecamatan->nama_kecamatan }}</td>

            <td>

                <a href="{{ route('desa.edit',$row->id_desa) }}"
                   class="btn btn-warning btn-sm me-2">
                    Edit
                </a>

                <form action="{{ route('desa.destroy',$row->id_desa) }}"
                      method="POST"
                      style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data?')">
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