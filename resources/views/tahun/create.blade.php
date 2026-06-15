<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tahun</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Tambah Tahun</h2>

    <form action="{{ route('tahun.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Tahun</label>

            <input type="number"
                   name="tahun"
                   class="form-control"
                   placeholder="Contoh: 2025"
                   required>
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('tahun.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>