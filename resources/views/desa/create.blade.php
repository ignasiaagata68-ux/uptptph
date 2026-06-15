<!DOCTYPE html>
<html>
<head>
    <title>Tambah Desa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Tambah Data Desa
    </h2>

    <form action="{{ route('desa.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nama Desa
            </label>

            <input type="text"
                   name="nama_desa"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Kecamatan
            </label>

            <select name="id_kecamatan"
                    class="form-select"
                    required>

                <option value="">
                    Pilih Kecamatan
                </option>

                @foreach($kecamatan as $k)

                <option value="{{ $k->id_kecamatan }}">
                    {{ $k->nama_kecamatan }}
                </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('desa.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>