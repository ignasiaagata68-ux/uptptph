@extends('layouts.app')

@section('title','Tangkapan Lampu Perangkap')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-header">

            <h4 class="mb-0">
                Tangkapan Lampu Perangkap
            </h4>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-primary">

                    <tr>

                        <th width="50">No</th>

                        <th>Kabupaten/Kota</th>

                        <th>Kecamatan</th>

                        <th>Periode Pengamatan</th>

                        <th>Musim Tanam</th>

                        <th width="170">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($data as $i => $d)

                    <tr>

                        <td>
                            {{ $i+1 }}
                        </td>

                        <td>
                            {{ $d->nama_kabupaten_kota }}
                        </td>

                        <td>
                            {{ $d->nama_kecamatan }}
                        </td>

                        <td>
                            {{ $d->periode_pengamatan }}
                        </td>

                        <td>
                            {{ $d->musim_tanam }}
                        </td>

                        <td>

                            <a href="{{ route('tangkapan-lampu-perangkap.edit',$d->id_tangkapan_lampu_perangkap) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('tangkapan-lampu-perangkap.destroy',$d->id_tangkapan_lampu_perangkap) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

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