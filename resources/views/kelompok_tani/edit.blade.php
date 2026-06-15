<!DOCTYPE html>
<html>
<head>
    <title>Edit Kelompok Tani</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit Kelompok Tani
    </h2>

    <form action="{{ route('kelompok-tani.update', $kelompok->id_kelompok_tani) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nama Kelompok
            </label>

            <input type="text"
                   name="nama_kelompok"
                   value="{{ $kelompok->nama_kelompok }}"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Nama Ketua
            </label>

            <input type="text"
                   name="nama_ketua"
                   value="{{ $kelompok->nama_ketua }}"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Alamat
            </label>

            <textarea name="alamat"
                      class="form-control"
                      rows="3"
                      required>{{ $kelompok->alamat }}</textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Desa
            </label>

            <select name="id_desa"
                    class="form-select"
                    required>

                @foreach($desa as $item)

                <option value="{{ $item->id_desa }}"
                    {{ $kelompok->id_desa == $item->id_desa ? 'selected' : '' }}>

                    {{ $item->nama_desa }}

                </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('kelompok-tani.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>