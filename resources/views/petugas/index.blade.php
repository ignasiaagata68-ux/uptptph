<!DOCTYPE html>
<html>
<head>
    <title>Data Petugas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Petugas</h2>

    <a href="{{ route('petugas.create') }}"
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
                <th>Nama</th>
                <th>NIP</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Username</th>
                <th>Kecamatan</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

        @forelse($data as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->nama }}</td>

            <td>{{ $item->NIP }}</td>

            <td>{{ $item->alamat }}</td>

            <td>{{ $item->no_tlp }}</td>

            <td>
                {{ $item->user->username ?? '-' }}
            </td>

            <td>
                {{ $item->kecamatan->nama_kecamatan ?? '-' }}
            </td>

            <td style="white-space: nowrap; width:1%;">

                <a href="{{ route('petugas.edit',$item->id_petugas) }}"
                   class="btn btn-warning btn-sm me-2">
                    Edit
                </a>

                <form action="{{ route('petugas.destroy',$item->id_petugas) }}"
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
            <td colspan="8" class="text-center">
                Belum ada data
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>