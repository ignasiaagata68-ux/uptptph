<!DOCTYPE html>
<html>
<head>
    <title>Edit Periode</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit Periode
    </h2>

    <form action="{{ route('periode.update', $data->id_periode) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">
                Periode Pengamatan
            </label>

            <input type="text"
                   name="periode_pengamatan"
                   value="{{ $data->periode_pengamatan }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Tanggal Mulai
            </label>

            <input type="date"
                   name="tgl_mulai"
                   value="{{ $data->tgl_mulai }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Tanggal Selesai
            </label>

            <input type="date"
                   name="tgl_selesai"
                   value="{{ $data->tgl_selesai }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Deadline Pelaporan
            </label>

            <input type="date"
                   name="deadline_pelaporan"
                   value="{{ $data->deadline_pelaporan }}"
                   class="form-control"
                   required>
        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('periode.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>