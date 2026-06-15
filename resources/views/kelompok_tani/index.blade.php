<!DOCTYPE html>
<html>
<head>
    <title>Data Kelompok Tani</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Kelompok Tani</h2>

    <a href="{{ route('kelompok-tani.create') }}"
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
                <th>Nama Kelompok</th>
                <th>Nama Ketua</th>
                <th>Alamat</th>
                <th>Desa</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($kelompok as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->nama_kelompok }}</td>

            <td>{{ $item->nama_ketua }}</td>

            <td>{{ $item->alamat }}</td>

            <td>
                {{ $item->desa->nama_desa ?? '-' }}
            </td>

            <td style="white-space: nowrap; width:1%;">

                <a href="{{ route('kelompok-tani.edit',$item->id_kelompok_tani) }}"
                   class="btn btn-warning btn-sm me-2">
                    Edit
                </a>

                <form action="{{ route('kelompok-tani.destroy',$item->id_kelompok_tani) }}"
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
                Belum ada data kelompok tani
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>