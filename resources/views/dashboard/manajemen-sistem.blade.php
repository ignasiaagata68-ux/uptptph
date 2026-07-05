@extends('layouts.admin')

@section('title','Manajemen Sistem')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold">
            Manajemen Sistem
        </h2>

        <p class="text-muted">
            Kelola pengguna dan hak akses sistem.
        </p>

    </div>

    <div class="row">

        <div class="col-lg-4 col-md-6 mb-4">

            <a href="/user-aplikasi" class="btn btn-warning w-100 p-4">

                👤

                <hr>

                User Aplikasi

            </a>

        </div>

        <div class="col-lg-4 col-md-6 mb-4">

            <a href="/role" class="btn btn-warning w-100 p-4">

                🔐

                <hr>

                Role & Permission

            </a>

        </div>

    </div>

</div>

@endsection