<!DOCTYPE html>
<html>
<head>
    <title>Edit Tahun</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit Tahun
    </h2>

    <form action="{{ route('tahun.update',$data->id_tahun) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Tahun
            </label>

            <input type="number"
                   name="tahun"
                   value="{{ $data->tahun }}"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('tahun.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>