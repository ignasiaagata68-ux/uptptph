@extends('layouts.admin')

@section('title', 'Verifikasi Pengelola Data')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">Verifikasi Pengelola Data</h2>
            <p class="text-muted">
                Daftar laporan yang telah dikirim oleh LPHP.
            </p>
        </div>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">
            <h5 class="mb-0">Data Verifikasi</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-success text-center">
                        <tr>
                            <th width="60">No</th>
                            <th>ID Pengiriman</th>
                            <th>ID Data</th>
                            <th>Status</th>
                            <th>Tanggal Kirim</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($data as $item)

                        <tr>

                            <td class="text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">
                                {{ $item->id_pengiriman }}
                            </td>

                            <td class="text-center">
                                {{ $item->id_data }}
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
                                        {{ $item->status }}
                                    </span>
                                @endif

                            </td>

                            <td class="text-center">
                                {{ $item->tanggal_kirim ?? '-' }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Belum ada laporan yang dikirim ke Pengelola.
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