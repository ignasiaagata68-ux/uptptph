@extends('layouts.admin')

@section('title', 'Rekap Keadaan Serangan OPT')

@section('content')

<style>
    .table td,
    .table th {
        white-space: nowrap;
        text-align: center;
        vertical-align: middle;
        font-size: 12px;
    }

    .card-summary {
        border-radius: 12px;
    }

    .card-summary .card-body {
        padding: 20px;
    }

    .card-summary h3 {
        font-weight: bold;
    }
</style>

<div class="container-fluid py-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">

    <h4 class="mb-0 fw-bold">
        Keadaan Serangan OPT dan Pengendalian
    </h4>

    <div class="d-flex gap-2">

        <a href="{{ route('rekap.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

        <form action="{{ route('rekap.export.pdf') }}" method="POST">
            @csrf

            <input type="hidden" name="jenis" value="{{ request()->input('jenis') }}">
            <input type="hidden" name="id_tahun" value="{{ request()->input('id_tahun') }}">
            <input type="hidden" name="id_bulan" value="{{ request()->input('id_bulan') }}">
            <input type="hidden" name="id_periode" value="{{ request()->input('id_periode') }}">
            <input type="hidden" name="id_kabupaten_kota" value="{{ request()->input('id_kabupaten_kota') }}">
            <input type="hidden" name="id_kecamatan" value="{{ request()->input('id_kecamatan') }}">
            <input type="hidden" name="id_komoditas" value="{{ request()->input('id_komoditas') }}">

            <button type="submit" class="btn btn-danger">
                <i class="bi bi-file-earmark-pdf-fill"></i>
                Export PDF
            </button>
        </form>

        <a href="{{ route('rekap.export.excel') }}" class="btn btn-success">
            <i class="bi bi-file-earmark-excel-fill"></i>
            Export Excel
        </a>

    </div>

</div>

    <!-- Data Wilayah -->
    <div class="card shadow-sm mb-4">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Data Wilayah Pengamatan</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-3">
                    <strong>Kabupaten / Kota</strong><br>
                    {{ $header?->nama_kabupaten_kota ?? '-' }}
                </div>

                <div class="col-md-3">
                    <strong>Kecamatan</strong><br>
                    {{ $header?->nama_kecamatan ?? '-' }}
                </div>

                <div class="col-md-3">
                    <strong>Periode</strong><br>
                    {{ $header?->periode_pengamatan ?? '-' }}
                </div>

                <div class="col-md-3">
                    <strong>Musim Tanam</strong><br>
                    {{ $header->musim_tanam  ?? '-'}}
                </div>

            </div>

        </div>

    </div>

    <!-- Ringkasan -->
    <div class="row mb-4">

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm card-summary">
                <div class="card-body text-center">
                    <div class="text-primary mb-2" style="font-size:30px;">📄</div>
                    <h6>Total Data</h6>
                    <h3 class="text-primary">{{ $detail->count() }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm card-summary">
                <div class="card-body text-center">
                    <div class="text-danger mb-2" style="font-size:30px;">🌾</div>
                    <h6>Total Luas Serangan</h6>
                    <h3 class="text-danger">
                        {{ number_format($detail->sum('luas_keadaan_serangan_jumlah'),2) }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm card-summary">
                <div class="card-body text-center">
                    <div class="text-success mb-2" style="font-size:30px;">✅</div>
                    <h6>Total Luas Terkendali</h6>
                    <h3 class="text-success">
                        {{ number_format($detail->sum('luas_terkendali'),2) }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm card-summary">
                <div class="card-body text-center">
                    <div class="text-info mb-2" style="font-size:30px;">🏘️</div>
                    <h6>Jumlah Desa</h6>
                    <h3 class="text-info">
                        {{ $detail->unique('nama_desa')->count() }}
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <!-- Detail Rekap -->
    <div class="card shadow-sm">

        <div class="card-header bg-success text-white">
            <h5 class="mb-0">
                Detail Keadaan Serangan OPT dan Pengendaliannya
            </h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover table-striped align-middle">

                    <thead class="table-primary text-center align-middle">
                        <thead class="table-success text-center align-middle">

<tr>

    <th rowspan="2">THN</th>
    <th rowspan="2">BLN</th>
    <th rowspan="2">PER</th>
    <th rowspan="2">DESA</th>
    <th rowspan="2">KOMODITAS</th>
    <th rowspan="2">VARIETAS</th>
    <th rowspan="2">LUAS</th>
    <th rowspan="2">OPT</th>

    <th colspan="5">
        Sisa Periode Sebelumnya
    </th>

    <th colspan="5">
        Tambah Serangan
    </th>

    <th colspan="4">
        Pengendalian
    </th>

    <th colspan="5">
        Keadaan Serangan
    </th>

    <th rowspan="2">
        MT
    </th>

</tr>

<tr>

    <th>S_R</th>
    <th>S_S</th>
    <th>S_B</th>
    <th>S_P</th>
    <th>JML</th>

    <th>R</th>
    <th>S</th>
    <th>B</th>
    <th>P</th>
    <th>JML</th>

    <th>Kimia</th>
    <th>Hayati</th>
    <th>Cara Lain</th>
    <th>JML</th>

    <th>R</th>
    <th>S</th>
    <th>B</th>
    <th>P</th>
    <th>JML</th>

</tr>

</thead>
                        <tbody>

                            @forelse($detail as $d)

                                <tr>

                                    <td>{{ $d->id_tahun }}</td>
                                    <td>{{ $d->id_bulan }}</td>
                                    <td>{{ $d->id_periode }}</td>
                                    <td>{{ $d->nama_desa }}</td>
                                    <td>{{ $d->komoditas }}</td>
                                    <td>{{ $d->varietas }}</td>
                                    <td>{{ $d->luas }}</td>
                                    <td>{{ $d->nama_opt }}</td>

                                    <!-- Sisa Periode Sebelumnya -->
                                    <td>{{ $d->sisa_periode_sebelumnya_serangan_ringan }}</td>
                                    <td>{{ $d->sisa_periode_sebelumnya_sisa_serangan_sedang }}</td>
                                    <td>{{ $d->sisa_sisa_periode_sebelumnya_serangan_berat }}</td>
                                    <td>{{ $d->sisa_sisa_periode_sebelumnya_serangan_puso }}</td>
                                    <td>{{ $d->sisa_serangan_jumlah }}</td>

                                    <!-- Luas Terkendali & Panen -->
                                    <td>{{ $d->luas_terkendali }}</td>
                                    <td>{{ $d->luas_panen }}</td>

                                    <!-- Tambah Serangan -->
                                    <td>{{ $d->luas_tambah_serangan_ringan }}</td>
                                    <td>{{ $d->luas_tambah_serangan_sedang }}</td>
                                    <td>{{ $d->luas_tambah_serangan_berat }}</td>
                                    <td>{{ $d->luas_tambah_serangan_puso }}</td>
                                    <td>{{ $d->luas_tambah_serangan_jumlah }}</td>

                                    <!-- Pengendalian -->
                                    <td>{{ $d->pestisida_kimia }}</td>
                                    <td>{{ $d->pestisida_hayati }}</td>
                                    <td>{{ $d->cara_lain }}</td>
                                    <td>{{ $d->jml }}</td>

                                    <!-- Keadaan Serangan -->
                                    <td>{{ $d->luas_keadaan_serangan_ringan }}</td>
                                    <td>{{ $d->luas_keadaan_serangan_sedang }}</td>
                                    <td>{{ $d->luas_keadaan_serangan_berat }}</td>
                                    <td>{{ $d->luas_keadaan_serangan_puso }}</td>
                                    <td>{{ $d->luas_keadaan_serangan_jumlah }}</td>

                                    <!-- Musim Tanam -->
                                    <td>{{ $d->mt }}</td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="30" class="text-center text-muted">
                                        Data tidak ditemukan.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

@endsection