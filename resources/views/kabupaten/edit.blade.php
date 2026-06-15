<!DOCTYPE html>
<html>
<head>
    <title>Edit Kabupaten</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit Kabupaten/Kota
    </h2>

    <form action="{{ route('kabupaten.update', $data->id_kabupaten_kota) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nama Kabupaten/Kota
            </label>

            <input type="text"
                   name="nama_kabupaten_kota"
                   value="{{ $data->nama_kabupaten_kota }}"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('kabupaten.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>