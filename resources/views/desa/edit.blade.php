<!DOCTYPE html>
<html>
<head>
    <title>Edit Desa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Edit Desa</h2>

    <form action="{{ route('desa.update', $data->id_desa) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Nama Desa</label>

            <input type="text"
                   name="nama_desa"
                   class="form-control"
                   value="{{ $data->nama_desa }}">

        </div>

        <div class="mb-3">

            <label>Kecamatan</label>

            <select name="id_kecamatan"
                    class="form-control">

                @foreach($kecamatan as $k)

                <option value="{{ $k->id_kecamatan }}"
                    {{ $k->id_kecamatan == $data->id_kecamatan ? 'selected' : '' }}>

                    {{ $k->nama_kecamatan }}

                </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('desa.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>