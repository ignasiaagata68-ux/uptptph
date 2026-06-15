<!DOCTYPE html>
<html>
<head>
    <title>Edit Komoditas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit Komoditas
    </h2>

    <form action="{{ route('komoditas.update',$data->id_komoditas) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nama Komoditas
            </label>

            <input type="text"
                   name="komoditas"
                   value="{{ $data->komoditas }}"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('komoditas.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>