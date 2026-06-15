<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Tambah User
    </h2>

    <form action="{{ route('user-aplikasi.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Username</label>

            <input type="text"
                   name="username"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>

            <input type="text"
                   name="password"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>

            <select name="role"
                    class="form-select"
                    required>

                <option value="">Pilih Role</option>
                <option value="popt">POPT</option>
                <option value="lphp">LPHP</option>
                <option value="pengelola_data">Pengelola Data</option>
                <option value="pimpinan">Pimpinan</option>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>

            <input type="email"
                   name="email"
                   class="form-control"
                   required>
        </div>

        <button type="submit"
                class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('user-aplikasi.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>