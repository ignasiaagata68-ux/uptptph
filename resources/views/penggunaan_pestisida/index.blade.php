@extends('layouts.app')

@section('title','Penggunaan Pestisida')

@section('content')

<div class="container">

    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">

                Data Penggunaan Pestisida

            </h4>

            <a href="{{ route('penggunaan-pestisida.create',1) }}"
                class="btn btn-primary">

                Tambah Data

            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="table-primary">

                    <tr>

                        <th>No</th>

                        <th>Kabupaten/Kota</th>

                        <th>Kecamatan</th>

                        <th>Periode</th>

                        <th>Musim Tanam</th>

                        <th width="180">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($data as $row)

                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        {{ $row->nama_kabupaten_kota }}

                    </td>

                    <td>

                        {{ $row->nama_kecamatan }}

                    </td>

                    <td>

                        {{ $row->periode_pengamatan }}

                    </td>

                    <td>

                        {{ $row->musim_tanam }}

                    </td>

                    <td>

                        <a href="{{ route('penggunaan-pestisida.show',$row->id_penggunaan_pestisida) }}"
                            class="btn btn-info btn-sm">

                            Detail

                        </a>

                        <a href="{{ route('penggunaan-pestisida.edit',$row->id_penggunaan_pestisida) }}"
                            class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form
                            action="{{ route('penggunaan-pestisida.destroy',$row->id_penggunaan_pestisida) }}"
                            method="POST"
                            style="display:inline-block">

                            @csrf

                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin hapus data?')"
                                class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
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

</div>

@endsection