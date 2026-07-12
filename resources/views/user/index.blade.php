@extends('layouts.admin')

@section('title', 'User Aplikasi')

@section('content')

<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            Data User Aplikasi
        </h5>

        <a href="{{ route('user-aplikasi.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Tambah User

        </a>

    </div>

    <div class="card-body">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th width="60">No</th>

                        <th>Username</th>

                        <th>Role</th>

                        <th>LPHP</th>

                        <th>Kabupaten</th>

                        <th>Kecamatan</th>

                        <th>Status</th>

                        <th width="170">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $item->username }}</td>

                        <td>

                            <span class="badge bg-primary">

                                {{ strtoupper(str_replace('_',' ',$item->role)) }}

                            </span>

                        </td>

                        <td>

                            {{ $item->lphp->nama_lphp ?? '-' }}

                        </td>

                        <td>

                            {{ $item->kabupaten->nama_kabupaten_kota ?? '-' }}

                        </td>

                        <td>

                            {{ $item->kecamatan->nama_kecamatan ?? '-' }}

                        </td>

                        <td>

                            @if($item->status=='aktif')

                                <span class="badge bg-success">

                                    Aktif

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Nonaktif

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('user-aplikasi.edit',$item->id_user) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('user-aplikasi.destroy',$item->id_user) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus user ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8"
                            class="text-center">

                            Belum ada data.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection