@extends('layouts.admin')

@section('title','Manajemen Sistem')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Manajemen Sistem
            </h2>

            <p class="text-muted">
                Kelola User, Role, Permission dan Hak Akses
            </p>

        </div>

        <a href="{{ url('/dashboard-pengelola') }}" class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

    </div>

    <div class="row g-4">

    <div class="col-lg-3">
        <a href="/user-aplikasi" class="btn-dashboard w-100 text-decoration-none">

            <div class="quick-card text-center">

                <div class="quick-icon setting">
                    <i class="bi bi-person-fill"></i>
                </div>

                <h5 class="mt-3">User Aplikasi</h5>

            </div>

        </a>
    </div>

    <div class="col-lg-3">
        <a href="/petugas" class="btn-dashboard w-100 text-decoration-none">

            <div class="quick-card text-center">

                <div class="quick-icon setting">
                    <i class="bi bi-person-badge-fill"></i>
                </div>

                <h5 class="mt-3">Petugas</h5>

            </div>

        </a>
    </div>
    
    

</div>


</div>

@endsection