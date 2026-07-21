@extends('layouts.admin')

@section('title','Dashboard Pimpinan')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Dashboard Pimpinan
            </h2>

            <p class="text-muted">
                Monitoring laporan dan statistik Organisme Pengganggu Tumbuhan (OPT) serta Data Pendukung Pengamatan (DPI).
            </p>

        </div>

    </div>

    <div class="row g-4">

        <!-- Dashboard OPT -->
        <div class="col-lg-3 col-md-4">

            <a href="{{ url('/dashboard-opt') }}" class="btn-dashboard text-decoration-none">

                <div class="quick-card text-center">

                    <div class="quick-icon quick-red">
                        <i class="bi bi-bug-fill"></i>
                    </div>

                    <h5 class="mt-3">
                        Dashboard OPT
                    </h5>

                    <p class="text-muted mb-0">
                        Monitoring data Organisme Pengganggu Tumbuhan.
                    </p>

                </div>

            </a>

        </div>

        <!-- Dashboard DPI -->
        <div class="col-lg-3 col-md-4">

            <a href="{{ url('/dashboard-dpi') }}" class="btn-dashboard text-decoration-none">

                <div class="quick-card text-center">

                    <div class="quick-icon quick-blue">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>

                    <h5 class="mt-3">
                        Dashboard DPI
                    </h5>

                    <p class="text-muted mb-0">
                        Monitoring Data Pendukung Pengamatan.
                    </p>

                </div>

            </a>

        </div>

        <!-- Laporan -->
        <div class="col-lg-3 col-md-4">

            <a href="{{ url('/laporan') }}" class="btn-dashboard text-decoration-none">

                <div class="quick-card text-center">

                    <div class="quick-icon quick-green">
                        <i class="bi bi-file-earmark-text-fill"></i>
                    </div>

                    <h5 class="mt-3">
                        Laporan
                    </h5>

                    <p class="text-muted mb-0">
                        Lihat dan cetak seluruh laporan yang telah disahkan.
                    </p>

                </div>

            </a>

        </div>

        <!-- Grafik -->
        <div class="col-lg-3 col-md-4">

            <a href="{{ url('/grafik') }}" class="btn-dashboard text-decoration-none">

                <div class="quick-card text-center">

                    <div class="quick-icon quick-orange">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>

                    <h5 class="mt-3">
                        Grafik
                    </h5>

                    <p class="text-muted mb-0">
                        Melihat grafik perkembangan OPT dan DPI.
                    </p>

                </div>

            </a>

        </div>

    </div>

</div>

@endsection