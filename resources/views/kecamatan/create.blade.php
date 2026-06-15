<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kecamatan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Tambah Data Kecamatan
    </h2>

    <form action="{{ route('kecamatan.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nama Kecamatan
            </label>

            <input type="text"
                   name="nama_kecamatan"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Kabupaten/Kota
            </label>

            <select name="id_kabupaten_kota"
                    class="form-select"
                    required>

                <option value="">
                    Pilih Kabupaten
                </option>

                @foreach($kabupaten as $k)

                <option value="{{ $k->id_kabupaten_kota }}">
                    {{ $k->nama_kabupaten_kota }}
                </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('kecamatan.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>