<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengamatan Persemaian Padi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>Detail Pengamatan Persemaian Padi</h3>

    <table class="table table-bordered">
        <tr>
            <th width="25%">Tanggal Pengamatan</th>
            <td>{{ $header->tgl_pengamatan }}</td>
        </tr>

        <tr>
            <th>Kabupaten / Kota</th>
            <td>{{ $header->kabupaten->nama_kabupaten_kota ?? '-' }}</td>
        </tr>

        <tr>
            <th>Kecamatan</th>
            <td>{{ $header->kecamatan->nama_kecamatan ?? '-' }}</td>
        </tr>

        <tr>
            <th>Desa</th>
            <td>{{ $header->desa->nama_desa ?? '-' }}</td>
        </tr>

        <tr>
            <th>Kelompok Tani</th>
            <td>{{ $header->kelompokTani->nama_kelompok ?? '-' }}</td>
        </tr>

        <tr>
            <th>Petak Pengamatan</th>
            <td>{{ $header->petak_pengamatan }}</td>
        </tr>

        <tr>
            <th>Petugas</th>
            <td>{{ $header->petugas->nama ?? '-' }}</td>
        </tr>

    </table>

    <h5>Data Detail</h5>

    <form method="POST"
      action="{{ route('pengamatan-persemaian-padi.proses-verifikasi', $header->id_pengamatan_persemaian_padi) }}">

    @csrf

    <table class="table table-bordered">

        <thead class="table-dark">

        <tr>

            <th>No Persemaian</th>
            <th>Luas</th>
            <th>Umur</th>
            <th>Varietas</th>
            <th>POP Ayunan WBC</th>
            <th>WDH</th>
            <th>MA</th>
            <th>Tikus</th>
            <th>Pop KT PBP</th>
            <th>Penyakit</th>
            <th>WBC</th>
            <th>Status Verifikasi</th>
            <th>Keterangan</th>
            <th>Aksi</th>

        </tr>

        </thead>

        <tbody>

        @foreach($detail as $d)

        <tr>
            <input
                type="hidden"
                name="id_detail[]"
                value="{{ $d->id_det_pengamatan_persemaian_padi }}">
            <td>{{ $d->no_persemaian }}</td>
            <td>{{ $d->luas }}</td>
            <td>{{ $d->umur }}</td>
            <td>{{ $d->varietas }}</td>
            <td>{{ $d->pop_ayunan_wbc }}</td>
            <td>{{ $d->wdh }}</td>
            <td>{{ $d->nama_ma ?? '-' }}</td>
            <td>{{ $d->tikus }}</td>
            <td>{{ $d->pop_kt_pbp }}</td>
            <td>{{ $d->penyakit }}</td>
            <td>{{ $d->wbc }}</td>

            {{-- STATUS --}}
            <td>

                @if(session('role') == 'lphp')

                    <select
                        name="status_verifikasi[{{ $d->id_det_pengamatan_persemaian_padi }}]"
                        class="form-select form-select-sm">

                        <option value="menunggu"
                            {{ $d->status_verifikasi=='menunggu' ? 'selected' : '' }}>
                            Menunggu
                        </option>

                        <option value="terverifikasi"
                            {{ $d->status_verifikasi=='terverifikasi' ? 'selected' : '' }}>
                            Terverifikasi
                        </option>

                        <option value="perlu_perbaikan"
                            {{ $d->status_verifikasi=='perlu_perbaikan' ? 'selected' : '' }}>
                            Perlu Perbaikan
                        </option>

                    </select>

                @else

                    @if($d->status_verifikasi=='terverifikasi')

                        <span class="badge bg-success">
                            Terverifikasi
                        </span>

                    @elseif($d->status_verifikasi=='perlu_perbaikan')

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

            {{-- KETERANGAN --}}
            <td>

                @if(session('role') == 'lphp')

                <textarea
                    name="keterangan_verifikasi[{{ $d->id_det_pengamatan_persemaian_padi }}]"
                    class="form-control form-control-sm"
                    rows="2">{{ $d->keterangan_verifikasi }}</textarea>

                @else

                    {{ $d->keterangan_verifikasi ?? '-' }}

                @endif
            </td>

            {{-- AKSI --}}
            <td>

                @if(session('role') == 'popt')

                    @if($d->status_verifikasi == 'perlu_perbaikan')

                        <a href="{{ route('pengamatan-persemaian-padi.edit',$header->id_pengamatan_persemaian_padi) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                    @else

                        -

                    @endif

                @else

                    -

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

    <a href="{{ route('sp.create', $header->id_data) }}"
        class="btn btn-secondary">
         Kembali
    </a>

    @if(
        $statusPengiriman &&
        (
            $statusPengiriman->status == 'Draft' ||
            $statusPengiriman->status == 'Perlu Perbaikan'
        )
    )

    <a href="{{ route('pengamatan-persemaian-padi.edit', $header->id_pengamatan_persemaian_padi) }}"
        class="btn btn-warning">
        Edit
    </a>

    @endif

</div>

</body>
</html>