<!DOCTYPE html>
<html>
<head>
    <title>Edit MA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit Data MA
    </h2>

    <form action="{{ route('ma.update', $ma->id_ma) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nama MA
            </label>

            <input type="text"
                   name="nama_ma"
                   value="{{ $ma->nama_ma }}"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('ma.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>