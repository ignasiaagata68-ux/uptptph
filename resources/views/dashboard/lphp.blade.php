@extends('layouts.admin')

@section('title','Dashboard LPHP')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Dashboard LPHP
            </h2>

            <p class="text-muted">
                Verifikasi laporan yang dikirim oleh POPT
            </p>

        </div>

    </div>

    <div class="row g-4">

        <!-- Daftar Pengiriman -->
        <div class="col-lg-4">

            <a href="{{ url('/pengiriman-laporan') }}" class="btn-dashboard text-decoration-none">

                <div class="quick-card text-center">

                    <div class="quick-icon quick-blue">
                        <i class="bi bi-card-checklist"></i>
                    </div>

                    <h5>Daftar Pengiriman Laporan</h5>

                    <p class="text-muted">
                        Verifikasi laporan yang dikirim oleh POPT.
                    </p>

                </div>

            </a>

        </div>

        <!-- Notifikasi -->
        <div class="col-lg-4">

            <a href="{{ url('/notifikasi-lphp') }}" class="btn-dashboard text-decoration-none">

                <div class="quick-card text-center">

                    <div class="quick-icon quick-orange">
                        <i class="bi bi-bell-fill"></i>
                    </div>

                    <h5>Notifikasi</h5>

                    <p class="text-muted">
                        Lihat pemberitahuan laporan baru dari POPT.
                    </p>

                </div>

            </a>

        </div>

        <!-- Laporan -->
        <div class="col-lg-4">

            <a href="{{ url('/laporan') }}" class="btn-dashboard text-decoration-none">

                <div class="quick-card text-center">

                    <div class="quick-icon quick-purple">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>

                    <h5>Laporan</h5>

                    <p class="text-muted">
                        Lihat seluruh laporan yang telah diverifikasi.
                    </p>

                </div>

            </a>

        </div>

    </div>

</div>

@endsection