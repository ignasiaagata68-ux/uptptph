<!DOCTYPE html>
<html>
<head>
    <title>Data Periode</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Periode</h2>

    <a href="{{ route('periode.create') }}"
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
                <th>Periode Pengamatan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Deadline Pelaporan</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

        @forelse($data as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->periode_pengamatan }}</td>

            <td>{{ $item->tgl_mulai }}</td>

            <td>{{ $item->tgl_selesai }}</td>

            <td>{{ $item->deadline_pelaporan }}</td>

            <td style="white-space: nowrap; width:1%;">

                <a href="{{ route('periode.edit', $item->id_periode) }}"
                   class="btn btn-warning btn-sm me-2">
                    Edit
                </a>

                <form action="{{ route('periode.destroy', $item->id_periode) }}"
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
            <td colspan="6" class="text-center">
                Belum ada data
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>