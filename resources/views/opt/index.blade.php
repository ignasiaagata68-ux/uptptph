<!DOCTYPE html>
<html>
<head>
    <title>Data OPT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data OPT</h2>

    <a href="{{ route('opt.create') }}"
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
                <th>Komoditas</th>
                <th>Nama OPT</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

        @forelse($opt as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>
                {{ $item->komoditas->komoditas ?? '-' }}
            </td>

            <td>
                {{ $item->nama_opt }}
            </td>

            <td style="white-space: nowrap; width:1%;">

                <a href="{{ route('opt.edit',$item->id_opt) }}"
                   class="btn btn-warning btn-sm me-2">
                    Edit
                </a>

                <form action="{{ route('opt.destroy',$item->id_opt) }}"
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
            <td colspan="4" class="text-center">
                Belum ada data
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>