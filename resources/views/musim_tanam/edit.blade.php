<!DOCTYPE html>
<html>
<head>
    <title>Edit Musim Tanam</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit Musim Tanam
    </h2>

    <form action="{{ route('musim_tanam.update',$data->id_musim_tanam) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Musim Tanam
            </label>

            <input type="text"
                   name="musim_tanam"
                   value="{{ $data->musim_tanam }}"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('musim_tanam.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>