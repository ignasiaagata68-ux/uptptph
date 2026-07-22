@extends('layouts.admin')

@section('title','Daftar Pengiriman Laporan')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">
                Daftar Pengiriman Laporan
            </h2>

            <p class="text-muted">
                Daftar laporan yang dikirim oleh POPT untuk diverifikasi LPHP.
            </p>
        </div>

        <a href="{{ url('/dashboard-lphp') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h5 class="mb-0 fw-semibold">
                Data Pengiriman Laporan
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-success text-center">

                        <tr>
                            <th width="60">No</th>
                            <th>Kecamatan</th>
                            <th>Periode</th>
                            <th>Tanggal Kirim</th>
                            <th>Status</th>
                            <th width="260">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    @forelse($data as $item)

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->data->petugas->kecamatan->nama_kecamatan }}
                            </td>

                            <td>
                                {{ $item->data->periode->periode_pengamatan }}
                            </td>

                            <td>
                                {{ $item->tanggal_kirim
                                    ? \Carbon\Carbon::parse($item->tanggal_kirim)->format('d-m-Y H:i')
                                    : '-' }}
                            </td>

                            <td class="text-center">

                                @if($item->status == 'menunggu')
                                    <span class="badge bg-secondary">
                                        Menunggu
                                    </span>

                                @elseif($item->status == 'terverifikasi')
                                    <span class="badge bg-success">
                                        Terverifikasi
                                    </span>

                                @elseif($item->status == 'perlu_perbaikan')
                                    <span class="badge bg-warning text-dark">
                                        Perlu Perbaikan
                                    </span>

                                @else
                                    <span class="badge bg-info">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                @endif

                            </td>

                            <td class="text-center">

                                <a href="{{ route('sp.create',$item->id_data) }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="bi bi-search"></i>
                                    Verifikasi
                                </a>

                                @if($item->status == 'terverifikasi')

                                @if($item->is_kirim_pengelola == 0)

                                    <form action="{{ route('pengiriman-laporan.kirim-pengelola',$item->id_pengiriman) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf

                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="bi bi-send-fill"></i>
                                            Kirim ke Pengelola
                                        </button>

                                    </form>

                                @else

                                    <span class="badge bg-success">
                                        Sudah Dikirim
                                    </span>

                                @endif

                            @endif
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center text-muted">
                                Belum ada data pengiriman laporan.
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