<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data User</h2>

    <a href="{{ route('user-aplikasi.create') }}"
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
                <th width="60">ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Email</th>
                <th>Id User</th>
                <th width="1%">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @foreach($data as $row)

        <tr>

            <td>{{ $row->id_user }}</td>
            <td>{{ $row->username }}</td>
            <td>{{ $row->role }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->id_role }}</td>

            <td style="white-space: nowrap;">

                <a href="{{ route('user-aplikasi.edit',$row->id_user') }}"
                   class="btn btn-warning btn-sm me-2">
                    Edit
                </a>

                <form action="{{ route('user-aplikasi.destroy',$row->id_user) }}"
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