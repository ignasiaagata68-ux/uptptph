@extends('layouts.app')

@section('title','Laporan Peringatan Dini')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">

                <i class="fas fa-exclamation-triangle"></i>

                Laporan Peringatan Dini

            </h5>

        </div>

        <div class="card-body">

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

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover">

                    <thead class="table-primary">

                        <tr>

                            <th width="60">No</th>

                            <th>Kabupaten/Kota</th>

                            <th>Kecamatan</th>

                            <th>Periode</th>

                            <th>Musim Tanam</th>

                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                        <tr>

                            <td class="text-center">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $item->kabupaten->nama_kabupaten_kota }}

                            </td>

                            <td>

                                {{ $item->kecamatan->nama_kecamatan }}

                            </td>

                            <td>

                                {{ $item->periode->periode }}

                            </td>

                            <td>

                                {{ $item->musimTanam->musim_tanam }}

                            </td>

                            <td class="text-center">

                                <a
                                    href="{{ route('laporan-peringatan-dini.detail',$item->id_laporan_peringatan_dini) }}"
                                    class="btn btn-info btn-sm">

                                    Detail

                                </a>

                                <a
                                    href="{{ route('laporan-peringatan-dini.edit',$item->id_laporan_peringatan_dini) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <a
                                    href="{{ route('laporan-peringatan-dini.verifikasi',$item->id_laporan_peringatan_dini) }}"
                                    class="btn btn-success btn-sm">

                                    Verifikasi

                                </a>

                                <form
                                    action="{{ route('laporan-peringatan-dini.destroy',$item->id_laporan_peringatan_dini) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

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

</div>

@endsection