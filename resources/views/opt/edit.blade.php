<!DOCTYPE html>
<html>
<head>
    <title>Edit OPT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">
        Edit OPT
    </h2>

    <form action="{{ route('opt.update', $opt->id_opt) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Komoditas
            </label>

            <select name="id_komoditas"
                    class="form-select"
                    required>

                @foreach($komoditas as $k)

                <option value="{{ $k->id_komoditas }}"
                    {{ $opt->id_komoditas == $k->id_komoditas ? 'selected' : '' }}>

                    {{ $k->komoditas }}

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
                   value="{{ $opt->nama_opt }}"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('opt.index') }}"
           class="btn btn-secondary ms-2">
            Kembali
        </a>

    </form>

</div>

</body>
</html>