<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengamatan Persemaian Padi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>Edit Pengamatan Persemaian Padi</h3>

    <form action="{{ route('pengamatan-persemaian-padi.update',$header->id_pengamatan_persemaian_padi) }}"
          method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">
                Tanggal Pengamatan
            </label>

            <input
                type="date"
                class="form-control"
                value="{{ $header->tgl_pengamatan }}"
                readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Petak Pengamatan
            </label>

            <input
                type="text"
                class="form-control"
                value="{{ $header->petak_pengamatan }}"
                readonly>
        </div>

        <h5>Data Detail</h5>

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>No Persemaian</th>
                    <th>Luas</th>
                    <th>Umur</th>
                    <th>Varietas</th>
                    <th>Pop ayunan WBC</th>
                    <th>WDH</th>
                    <th>MA</th>
                    <th>Tikus</th>
                    <th>Pop KT PBP</th>
                    <th>Penyakit</th>
                    <th>WBC</th>
                </tr>

            </thead>

            <tbody>

                @foreach($detail as $d)

                <tr>

                    <input
                        type="hidden"
                        name="id_detail[]"
                        value="{{ $d->id_det_pengamatan_persemaian_padi }}">

                    <td>
                        <input
                            type="text"
                            name="no_persemaian[]"
                            class="form-control"
                            value="{{ $d->no_persemaian }}">
                    </td>

                    <td>
                        <input
                            type="text"
                            name="luas[]"
                            class="form-control"
                            value="{{ $d->luas }}">
                    </td>

                    <td>
                        <input
                            type="text"
                            name="umur[]"
                            class="form-control"
                            value="{{ $d->umur }}">
                    </td>

                    <td>
                        <input
                            type="text"
                            name="varietas[]"
                            class="form-control"
                            value="{{ $d->varietas }}">
                    </td>

                    <td>
                        <input
                            type="text"
                            name="pop_ayunan_wbc[]"
                            class="form-control"
                            value="{{ $d->pop_ayunan_wbc }}">
                    </td>

                    <td>
                        <input
                            type="text"
                            name="wdh[]"
                            class="form-control"
                            value="{{ $d->wdh }}">
                    </td>

                    <td>

                        <select
                            name="id_ma[]"
                            class="form-select">

                            <option value="">
                                -- Pilih MA --
                            </option>

                            @foreach($ma as $m)

                                <option
                                    value="{{ $m->id_ma }}"
                                    {{ $d->id_ma == $m->id_ma ? 'selected' : '' }}>

                                    {{ $m->nama_ma }}

                                </option>

                            @endforeach

                        </select>

                    </td>

                    <td>
                        <input
                            type="text"
                            name="tikus[]"
                            class="form-control"
                            value="{{ $d->tikus }}">
                    </td>

                    <td>
                        <input
                            type="text"
                            name="pop_kt_pbp[]"
                            class="form-control"
                            value="{{ $d->pop_kt_pbp }}">
                    </td>

                    <td>
                        <input
                            type="text"
                            name="penyakit[]"
                            class="form-control"
                            value="{{ $d->penyakit }}">
                    </td>

                    <td>
                        <input
                            type="text"
                            name="wbc[]"
                            class="form-control"
                            value="{{ $d->wbc }}">
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <button
            type="submit"
            class="btn btn-warning">
            Update
        </button>

        <a href="{{ route('pengamatan-persemaian-padi.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>