@extends('layouts.admin')

@section('title','Master Data')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Master Data
            </h2>

            <p class="text-muted">
                Kelola seluruh data master sistem
            </p>

        </div>

        <a href="{{ url('/dashboard-pengelola') }}" class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

    </div>

    <div class="row g-4">

        <div class="col-lg-3 col-md-4">
            <a href="/kabupaten" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-blue">
                        <i class="bi bi-building"></i>
                    </div>
                    <h5 class="mt-3">Kabupaten / Kota</h5>
                    <p class="text-muted mb-0">Kelola data kabupaten/kota.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/kecamatan" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-cyan">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h5 class="mt-3">Kecamatan</h5>
                    <p class="text-muted mb-0">Kelola data kecamatan.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/desa" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-orange">
                        <i class="bi bi-house-door-fill"></i>
                    </div>
                    <h5 class="mt-3">Desa</h5>
                    <p class="text-muted mb-0">Kelola data desa.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/kelompok-tani" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-purple">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="mt-3">Kelompok Tani</h5>
                    <p class="text-muted mb-0">Kelola kelompok tani.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/komoditas" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-green">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <h5 class="mt-3">Komoditas</h5>
                    <p class="text-muted mb-0">Kelola data komoditas.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/opt" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-red">
                        <i class="bi bi-bug-fill"></i>
                    </div>
                    <h5 class="mt-3">OPT</h5>
                    <p class="text-muted mb-0">Kelola data OPT.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/ma" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-blue">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="mt-3">Musuh Alami</h5>
                    <p class="text-muted mb-0">Kelola data musuh alami.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/musim_tanam" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-orange">
                        <i class="bi bi-calendar3"></i>
                    </div>
                    <h5 class="mt-3">Musim Tanam</h5>
                    <p class="text-muted mb-0">Kelola musim tanam.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/tahun" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-cyan">
                        <i class="bi bi-calendar-event-fill"></i>
                    </div>
                    <h5 class="mt-3">Tahun</h5>
                    <p class="text-muted mb-0">Kelola data tahun.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/bulan" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-purple">
                        <i class="bi bi-calendar2-month-fill"></i>
                    </div>
                    <h5 class="mt-3">Bulan</h5>
                    <p class="text-muted mb-0">Kelola data bulan.</p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-4">
            <a href="/periode" class="btn-dashboard w-100 text-decoration-none">
                <div class="quick-card text-center">
                    <div class="quick-icon quick-blue">
                        <i class="bi bi-calendar-range-fill"></i>
                    </div>
                    <h5 class="mt-3">Periode</h5>
                    <p class="text-muted mb-0">Kelola data periode.</p>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection