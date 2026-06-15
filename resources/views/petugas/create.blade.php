<!DOCTYPE html>
<html>
<head>
    <title>Tambah Petugas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Tambah Petugas
    </h2>

    <form action="{{ route('petugas.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Petugas</label>
            <input type="text"
                   name="nama"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text"
                   name="NIP"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat"
                      class="form-control"
                      rows="3"
                      required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text"
                   name="no_tlp"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">User</label>

            <select name="id_user"
                    class="form-select"
                    required>

                <option value="">
                    Pilih User
                </option>

                @foreach($user as $u)

                <option value="{{ $u->id_petugas }}">
                    {{ $u->username }} ({{ $u->role }})
                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label class="form-label">Kecamatan</label>

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

        <a href="{{ route('petugas.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>