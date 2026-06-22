<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>Edit Keadaan OPT</h3>

    <form method="POST"
          action="{{ route(
            'keadaan-opt-pada-petak-pengamatan-tetap.update',
            $header->id_keadaan_opt_pada_petak_pengamatan_tetap
          ) }}">

        @csrf
        @method('PUT')

        <div class="mb-3">
    <label>Desa</label>

    <select name="id_desa" class="form-select">

        @foreach($desa as $d)

        <option value="{{ $d->id_desa }}"
            {{ $detail->id_desa == $d->id_desa ? 'selected' : '' }}>

            {{ $d->nama_desa }}

        </option>

        @endforeach

    </select>
</div>

<div class="mb-3">
    <label>Komoditas</label>

    <select name="id_komoditas" class="form-select">

        @foreach($komoditas as $k)

        <option value="{{ $k->id_komoditas }}"
            {{ $detail->id_komoditas == $k->id_komoditas ? 'selected' : '' }}>

            {{ $k->komoditas }}

        </option>

        @endforeach

    </select>
</div>

        <div class="mb-3">
            <label>Varietas</label>

            <input
                type="text"
                name="varietas"
                class="form-control"
                value="{{ $detail->varietas }}">
        </div>

        <div class="mb-3">
            <label>Umur</label>

            <input
                type="text"
                name="umur"
                class="form-control"
                value="{{ $detail->umur }}">
        </div>

        <div class="mb-3">
            <label>OPT</label>

            <select name="id_opt" class="form-select">

                @foreach($opt as $o)

                <option value="{{ $o->id_opt }}"
                    {{ $detail->id_opt == $o->id_opt ? 'selected' : '' }}>

                    {{ $o->nama_opt }}

                </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Intensitas</label>

            <input
                type="number"
                step="0.01"
                name="intensitas"
                class="form-control"
                value="{{ $detail->intensitas }}">
        </div>

        <div class="mb-3">
            <label>Populasi Rumpunan</label>

            <input
                type="number"
                step="0.01"
                name="populasi_rumpunan"
                class="form-control"
                value="{{ $detail->populasi_rumpunan }}">
        </div>

        <div class="mb-3">
            <label>Populasi Musuh Alami</label>

            <input
                type="number"
                step="0.01"
                name="populasi_musuh_alami"
                class="form-control"
                value="{{ $detail->populasi_musuh_alami }}">
        </div>

        <div class="mb-3">
            <label>MA</label>

            <select name="id_ma" class="form-select">

                @foreach($ma as $m)

                <option value="{{ $m->id_ma }}"
                    {{ $detail->id_ma == $m->id_ma ? 'selected' : '' }}>

                    {{ $m->nama_ma }}

                </option>

                @endforeach

            </select>
        </div>

        <button
            type="submit"
            class="btn btn-success">

            Update

        </button>

        <a href="{{ route('keadaan-opt-pada-petak-pengamatan-tetap.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</body>
</html>