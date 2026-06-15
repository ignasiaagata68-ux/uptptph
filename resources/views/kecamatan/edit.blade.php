<!DOCTYPE html>
<html>
<head>
    <title>Edit Kecamatan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit Kecamatan
    </h2>

    <form action="{{ route('kecamatan.update',$data->id_kecamatan) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nama Kecamatan
            </label>

            <input type="text"
                   name="nama_kecamatan"
                   value="{{ $data->nama_kecamatan }}"
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

                @foreach($kabupaten as $k)

                <option value="{{ $k->id_kabupaten_kota }}"
                    {{ $k->id_kabupaten_kota == $data->id_kabupaten_kota ? 'selected' : '' }}>

                    {{ $k->nama_kabupaten_kota }}

                </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('kecamatan.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>