<!DOCTYPE html>
<html>
<head>
    <title>Tambah Bulan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Tambah Data Bulan
    </h2>

    <form action="{{ route('bulan.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nama Bulan
            </label>

            <input type="text"
                   name="bulan"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('bulan.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>