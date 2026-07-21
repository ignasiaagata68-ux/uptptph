@extends('layouts.admin')

@section('title','Data OPT')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Data Organisme Pengganggu Tanaman (OPT)
            </h2>

            <p class="text-muted">
                Kelola seluruh data pengamatan Organisme Pengganggu Tanaman (OPT)
            </p>

        </div>

        <a href="{{ url('/dashboard-pengelola') }}" class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

    </div>

    <div class="row g-4">

        <div class="col-lg-3 col-md-4">
            <a href="/pengamatan-persemaian-padi" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-green">
                        <i class="bi bi-seedling"></i>
                    </div>
                    <h5 class="mt-3">Pengamatan Persemaian Padi</h5>
                    <p class="text-muted mb-0">
                        Kelola data pengamatan persemaian padi.
                    </p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/keadaan-serangan-opt" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-red">
                        <i class="bi bi-bug-fill"></i>
                    </div>
                    <h5 class="mt-3">Keadaan Serangan OPT</h5>
                    <p class="text-muted mb-0">
                        Kelola data serangan OPT.
                    </p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/keadaan-opt-pada-petak-pengamatan-tetap" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-orange">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                    </div>
                    <h5 class="mt-3">Petak Pengamatan Tetap</h5>
                    <p class="text-muted mb-0">
                        Kelola data petak pengamatan.
                    </p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/tangkapan-lampu-perangkap" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-blue">
                        <i class="bi bi-lightbulb-fill"></i>
                    </div>
                    <h5 class="mt-3">Tangkapan Lampu Perangkap</h5>
                    <p class="text-muted mb-0">
                        Kelola data tangkapan lampu perangkap.
                    </p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/kumulatif-luas-tambah-tanam-padi" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-purple">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>
                    <h5 class="mt-3">Kumulatif Luas Tambah Tanam</h5>
                    <p class="text-muted mb-0">
                        Kelola data luas tambah tanam.
                    </p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/penggunaan-pestisida" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-cyan">
                        <i class="bi bi-eyedropper"></i>
                    </div>
                    <h5 class="mt-3">Penggunaan Pestisida</h5>
                    <p class="text-muted mb-0">
                        Kelola data penggunaan pestisida.
                    </p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/pengamatan-penyebaran-dan-perkembangan-siput-murbey" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-orange">
                        <i class="bi bi-globe-asia-australia"></i>
                    </div>
                    <h5 class="mt-3">Siput Murbey</h5>
                    <p class="text-muted mb-0">
                        Kelola data penyebaran Siput Murbey.
                    </p>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection