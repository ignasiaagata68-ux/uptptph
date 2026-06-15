<!DOCTYPE html>
<html>
<head>
    <title>Tambah Musim Tanam</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Tambah Musim Tanam
    </h2>

    <form action="{{ route('musim_tanam.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Musim Tanam
            </label>

            <input type="text"
                   name="musim_tanam"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('musim_tanam.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>