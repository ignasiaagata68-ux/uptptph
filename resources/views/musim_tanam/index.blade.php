<!DOCTYPE html>
<html>
<head>
    <title>Data Musim Tanam</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Musim Tanam</h2>

    <a href="{{ route('musim_tanam.create') }}"
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
                <th>ID</th>
                <th>Musim Tanam</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @foreach($data as $row)

        <tr>

            <td>{{ $row->id_musim_tanam }}</td>

            <td>{{ $row->musim_tanam }}</td>

            <td style="white-space: nowrap; width:1%;">

                <a href="{{ route('musim_tanam.edit',$row->id_musim_tanam) }}"
                   class="btn btn-warning btn-sm me-2">
                    Edit
                </a>

                <form action="{{ route('musim_tanam.destroy',$row->id_musim_tanam) }}"
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

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>