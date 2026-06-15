<!DOCTYPE html>
<html>
<head>
    <title>Edit Petugas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit Petugas
    </h2>

    <form action="{{ route('petugas.update',$data->id_petugas) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">
                Nama Petugas
            </label>

            <input type="text"
                   name="nama"
                   value="{{ $data->nama }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                NIP
            </label>

            <input type="text"
                   name="NIP"
                   value="{{ $data->NIP }}"
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
                      required>{{ $data->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">
                No HP
            </label>

            <input type="text"
                   name="no_tlp"
                   value="{{ $data->no_tlp }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                User
            </label>

            <select name="id_user"
                    class="form-select"
                    required>

                @foreach($user as $u)

                <option value="{{ $u->id_petugas }}"
                    {{ $data->id_user == $u->id_petugas ? 'selected' : '' }}>

                    {{ $u->username }} ({{ $u->role }})

                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label class="form-label">
                Kecamatan
            </label>

            <select name="id_kecamatan"
                    class="form-select"
                    required>

                @foreach($kecamatan as $k)

                <option value="{{ $k->id_kecamatan }}"
                    {{ $data->id_kecamatan == $k->id_kecamatan ? 'selected' : '' }}>

                    {{ $k->nama_kecamatan }}

                </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('petugas.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>