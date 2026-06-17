<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit User
    </h2>

    <form action="{{ route('user-aplikasi.update',$data->id_user) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Username</label>

            <input type="text"
                   name="username"
                   value="{{ $data->username }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>

            <input type="text"
                   name="password"
                   value="{{ $data->password }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>

            <p> ID Role Saat Ini : {{ $data->id_role }}</p>

            <select name="role"
                    class="form-select"
                    required>

                <option value="popt" {{ $data->role == 'popt' ? 'selected' : '' }}>
                    POPT
                </option>

                <option value="lphp" {{ $data->role == 'lphp' ? 'selected' : '' }}>
                    LPHP
                </option>

                <option value="pengelola_data" {{ $data->role == 'pengelola_data' ? 'selected' : '' }}>
                    Pengelola Data
                </option>

                <option value="pimpinan" {{ $data->role == 'pimpinan' ? 'selected' : '' }}>
                    Pimpinan
                </option>

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>

            <input type="email"
                   name="email"
                   value="{{ $data->email }}"
                   class="form-control"
                   required>
        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('user-aplikasi.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>