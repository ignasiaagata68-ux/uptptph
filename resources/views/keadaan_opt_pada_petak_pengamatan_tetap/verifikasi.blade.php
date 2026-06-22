<!DOCTYPE html>
<html>
<head>

    <title>Verifikasi Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>
<body>

<div class="container mt-4">

    <h3>
        Verifikasi Data OPT
    </h3>

    <div class="alert alert-info">

        ID Data :
        {{ $header->id_keadaan_opt_pada_petak_pengamatan_tetap }}

    </div>
    <form method="POST"
        action="{{ route(
            'keadaan-opt-pada-petak-pengamatan-tetap.simpan-verifikasi',
            $header->id_keadaan_opt_pada_petak_pengamatan_tetap
        ) }}">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Status Verifikasi
            </label>

            <select
                name="status_verifikasi"
                class="form-select"
                required>

                <option value="">
                    Pilih Status
                </option>

                <option value="benar">
                    Data Benar
                </option>

                <option value="salah">
                    Data Salah
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Keterangan
            </label>

            <textarea
                name="keterangan_verifikasi"
                class="form-control"
                rows="4"></textarea>

        </div>

        <button
            type="submit"
            class="btn btn-success">

            Simpan Verifikasi

        </button>

        <a href="{{ route('keadaan-opt-pada-petak-pengamatan-tetap.index') }}"
        class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</body>
</html>