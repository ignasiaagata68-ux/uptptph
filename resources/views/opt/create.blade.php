<!DOCTYPE html>
<html>
<head>
    <title>Tambah OPT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Tambah Data OPT
    </h2>

    <form action="{{ route('opt.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Komoditas
            </label>

            <select name="id_komoditas"
                    class="form-select"
                    required>

                <option value="">
                    Pilih Komoditas
                </option>

                @foreach($komoditas as $item)

                <option value="{{ $item->id_komoditas }}">
                    {{ $item->komoditas }}
                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Nama OPT
            </label>

            <input type="text"
                   name="nama_opt"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-success">
            Simpan
        </button>

        <a href="{{ route('opt.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>