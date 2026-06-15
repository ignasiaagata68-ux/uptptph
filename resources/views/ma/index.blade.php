<!DOCTYPE html>
<html>
<head>
    <title>Data MA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data MA</h2>

    <a href="{{ route('ma.create') }}"
       class="btn btn-primary mb-3">
        Tambah Data
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>No</th>
                <th>Nama MA</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

        @forelse($ma as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->nama_ma }}</td>

            <td style="white-space: nowrap; width:1%;">

                <a href="{{ route('ma.edit', $item->id_ma) }}"
                   class="btn btn-warning btn-sm me-2">
                    Edit
                </a>

                <form action="{{ route('ma.destroy', $item->id_ma) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data?')">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="3" class="text-center">
                Belum ada data
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>