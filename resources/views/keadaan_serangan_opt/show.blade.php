<!DOCTYPE html>
<html>
<head>
    <title>Detail Keadaan Serangan OPT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        .table td,
        .table th{
            white-space: nowrap;
            text-align: center;
            vertical-align: middle;
            font-size: 12px;
        }
    </style>
    <div class="card mb-3">
        @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

        @endif

    <div class="card-header bg-primary text-white">
        Data Wilayah Pengamatan
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-3">
                <b>Kabupaten/Kota</b><br>
                {{ $header->nama_kabupaten_kota }}
            </div>

            <div class="col-md-3">
                <b>Kecamatan</b><br>
                {{ $header->nama_kecamatan }}
            </div>

            <div class="col-md-3">
                <b>Periode</b><br>
                {{ $header->periode_pengamatan }}
            </div>

            <div class="col-md-3">
                <b>Musim Tanam</b><br>
                {{ $header->musim_tanam }}
            </div>

        </div>

    </div>
</head>
<body>

<div class="container-fluid mt-4">
    <form method="POST"
      action="{{ route('keadaan-serangan-opt.proses-verifikasi', $header->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah) }}">

    @csrf
    <h3>Detail Keadaan Serangan OPT dan Pengendaliannya</h3>
    <div class="table-responsive">

        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>

                    <th>THN</th>
                    <th>BLN</th>
                    <th>PER</th>
                    <th>DESA</th>
                    <th>TANAMAN</th>
                    <th>VARIETAS</th>
                    <th>LUAS</th>
                    <th>OPT</th>

                    <th>S_R</th>
                    <th>S_S</th>
                    <th>S_B</th>
                    <th>S_P</th>
                    <th>S_J</th>

                    <th>KENDALI</th>
                    <th>PANEN</th>

                    <th>T_R</th>
                    <th>T_S</th>
                    <th>T_B</th>
                    <th>T_P</th>
                    <th>T_J</th>

                    <th>KIM</th>
                    <th>HYT</th>
                    <th>CL</th>
                    <th>JML</th>

                    <th>K_R</th>
                    <th>K_S</th>
                    <th>K_B</th>
                    <th>K_P</th>
                    <th>K_J</th>

                    <th>MT</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($detail as $d)

                <tr>

                    <td>{{ $d->id_tahun }}</td>
                    <td>{{ $d->id_bulan }}</td>
                    <td>{{ $d->id_periode }}</td>
                    <td>{{ $d->nama_desa }}</td>
                    <td>{{ $d->komoditas }}</td>
                    <td>{{ $d->varietas }}</td>
                    <td>{{ $d->luas }}</td>
                    <td>{{ $d->nama_opt }}</td>

                    <td>{{ $d->sisa_periode_sebelumnya_serangan_ringan }}</td>
                    <td>{{ $d->sisa_periode_sebelumnya_sisa_serangan_sedang }}</td>
                    <td>{{ $d->sisa_sisa_periode_sebelumnya_serangan_berat }}</td>
                    <td>{{ $d->sisa_sisa_periode_sebelumnya_serangan_puso }}</td>
                    <td>{{ $d->sisa_serangan_jumlah }}</td>

                    <td>{{ $d->luas_terkendali }}</td>
                    <td>{{ $d->luas_panen }}</td>

                    <td>{{ $d->luas_tambah_serangan_ringan }}</td>
                    <td>{{ $d->luas_tambah_serangan_sedang }}</td>
                    <td>{{ $d->luas_tambah_serangan_berat }}</td>
                    <td>{{ $d->luas_tambah_serangan_puso }}</td>
                    <td>{{ $d->luas_tambah_serangan_jumlah }}</td>

                    <td>{{ $d->pestisida_kimia }}</td>
                    <td>{{ $d->pestisida_hayati }}</td>
                    <td>{{ $d->cara_lain }}</td>
                    <td>{{ $d->jml }}</td>

                    <td>{{ $d->luas_keadaan_serangan_ringan }}</td>
                    <td>{{ $d->luas_keadaan_serangan_sedang }}</td>
                    <td>{{ $d->luas_keadaan_serangan_berat }}</td>
                    <td>{{ $d->luas_keadaan_serangan_puso }}</td>
                    <td>{{ $d->luas_keadaan_serangan_jumlah }}</td>

                    <td>{{ $d->mt }}</td>

                   <td>

                        @if(session('role') == 'lphp')

                            <input
                                type="hidden"
                                name="id_detail[]"
                                value="{{ $d->id_det_keadaan_serangan_opt_dan_pengendalian_di_wilayah }}">

                            <select
                                name="status_verifikasi[{{ $d->id_det_keadaan_serangan_opt_dan_pengendalian_di_wilayah }}]"
                                class="form-select form-select-sm">

                                <option value="menunggu"
                                    {{ $d->status_verifikasi == 'menunggu' ? 'selected' : '' }}>
                                    Menunggu
                                </option>

                                <option value="terverifikasi"
                                    {{ $d->status_verifikasi == 'terverifikasi' ? 'selected' : '' }}>
                                    Terverifikasi
                                </option>

                                <option value="perlu_perbaikan"
                                    {{ $d->status_verifikasi == 'perlu_perbaikan' ? 'selected' : '' }}>
                                    Perlu Perbaikan
                                </option>

                            </select>

                        @else

                            @if($d->status_verifikasi == 'terverifikasi')

                                <span class="badge bg-success">
                                    Terverifikasi
                                </span>

                            @elseif($d->status_verifikasi == 'perlu_perbaikan')

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
                                name="keterangan_verifikasi[{{ $d->id_det_keadaan_serangan_opt_dan_pengendalian_di_wilayah }}]"
                                class="form-control form-control-sm"
                                rows="2">{{ $d->keterangan_verifikasi }}</textarea>

                        @else

                            {{ $d->keterangan_verifikasi ?? '-' }}

                        @endif

                    </td>
                    <td>

                        @if(session('role') == 'popt')

                            @if($d->status_verifikasi == 'perlu_perbaikan')

                                <a href="{{ route('keadaan-serangan-opt.edit', $header->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah) }}"
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

    </div>

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

    <a href="{{ route('keadaan-serangan-opt.index') }}"
    class="btn btn-secondary">
        Kembali
    </a>

</div>

</body>


</div>
</html>