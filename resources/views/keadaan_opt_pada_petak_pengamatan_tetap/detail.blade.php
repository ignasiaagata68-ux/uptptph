<!DOCTYPE html>
<html>
<head>
    <title>Detail Keadaan OPT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <form method="POST"
      action="{{ route(
            'keadaan-opt-pada-petak-pengamatan-tetap.proses-verifikasi',
            $header->id_keadaan_opt_pada_petak_pengamatan_tetap
      ) }}">

    @csrf
    {{ session('role') }}
    <hr>

    <h3>Detail Keadaan OPT Pada Petak Pengamatan Tetap</h3>
    <table class="table table-bordered table-striped">

        <thead class="table-dark">

        <tr>
            <th>No</th>
            <th>Desa</th>
            <th>Komoditas</th>
            <th>Varietas</th>
            <th>Umur</th>
            <th>OPT</th>
            <th>Intensitas</th>
            <th>Populasi Rumpunan</th>
            <th>Populasi Musuh Alami</th>
            <th>MA</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>

        </thead>

        <tbody>

        @foreach($detail as $row)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $row->desa->nama_desa ?? '-' }}
            </td>

            <td>
                {{ $row->komoditas->komoditas ?? '-' }}
            </td>

            <td>
                {{ $row->varietas }}
            </td>

            <td>
                {{ $row->umur }}
            </td>

            <td>
                {{ $row->opt->nama_opt ?? '-' }}
            </td>

            <td>
                {{ $row->intensitas }}
            </td>

            <td>
                {{ $row->populasi_rumpunan }}
            </td>

            <td>
                {{ $row->populasi_musuh_alami }}
            </td>

            <td>
                {{ $row->ma->nama_ma ?? '-' }}
            </td>

            <td>

                @if(session('role') == 'lphp')

                    <input
                        type="hidden"
                        name="id_detail[]"
                        value="{{ $row->id_det_keadaan_opt_pada_petak_pengamatan_tetap }}">
                        
                    <select
                        name="status_verifikasi[{{ $row->id_det_keadaan_opt_pada_petak_pengamatan_tetap }}]"
                        class="form-select form-select-sm">

                        <option value="menunggu"
                            {{ $row->status_verifikasi == 'menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="terverifikasi"
                            {{ $row->status_verifikasi == 'terverifikasi' ? 'selected' : '' }}>
                            Terverifikasi
                        </option>

                        <option value="perlu_perbaikan"
                            {{ $row->status_verifikasi == 'perlu_perbaikan' ? 'selected' : '' }}>
                            Perlu Perbaikan
                        </option>

                    </select>

                @else

                    @if($row->status_verifikasi == 'terverifikasi')

                        <span class="badge bg-success">
                            Terverifikasi
                        </span>

                    @elseif($row->status_verifikasi == 'perlu_perbaikan')

                        <span class="badge bg-danger">
                            Perlu Perbaikan
                        </span>

                    @else

                        <span class="badge bg-warning text-dark">
                            Menunggu
                        </span>

                    @endif

                @endif

            </td>

            <td>

                @if(session('role') == 'lphp')

                    <textarea
                        name="keterangan_verifikasi[{{ $row->id_det_keadaan_opt_pada_petak_pengamatan_tetap }}]"
                        class="form-control form-control-sm"
                        rows="2">{{ $row->keterangan_verifikasi }}</textarea>

                @else

                    {{ $row->keterangan_verifikasi ?? '-' }}

                @endif

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

    @if(session('role') == 'lphp')

    <div class="mb-3">

        <button
            type="submit"
            class="btn btn-success">

            Simpan Verifikasi

        </button>

    </div>

    @endif

    </form>

    <a href="{{ route('keadaan-opt-pada-petak-pengamatan-tetap.index') }}"
    class="btn btn-secondary">
        Kembali
    </a>

</body>
</html>