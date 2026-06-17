<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Role</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Manajemen Role</h2>

    <table class="table table-bordered">

        <thead class="table-dark">
            <tr>
                <th>ID Role</th>
                <th>Nama Role</th>
                <th>Jumlah Permission</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @foreach($roles as $role)

        <tr>
            <td>{{ $role->id_role }}</td>
            <td>{{ $role->nama_role }}</td>
            <td>{{ $role->permissions->count() }}</td>
            <td>
                <a href="/role/{{ $role->id_role }}"
                class="btn btn-warning btn-sm">
                    Kelola Permission
                </a>
            </td>
        </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>