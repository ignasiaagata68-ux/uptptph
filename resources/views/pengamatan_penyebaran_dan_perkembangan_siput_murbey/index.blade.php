@extends('layouts.app')

@section('title','Pengamatan Penyebaran dan Perkembangan Siput Murbey')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Pengamatan Penyebaran dan Perkembangan Siput Murbey
            </h4>

            <a href="{{ route('data.index') }}"
               class="btn btn-primary">

                Tambah Data

            </a>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            <table class="table table-bordered table-striped">

                <thead class="table-primary">

                <tr>

                    <th width="60">No</th>

                    <th>Kabupaten</th>

                    <th>Kecamatan</th>

                    <th>Bulan</th>

                    <th>Musim Tanam</th>

                    <th>Status</th>

                    <th width="260">Aksi</th>

                </tr>

                </thead>

                <tbody>

                @forelse($data as $i=>$row)

                    <tr>

                        <td>

                            {{ $i+1 }}

                        </td>

                        <td>

                            {{ $row->kabupaten->nama_kabupaten_kota }}

                        </td>

                        <td>

                            {{ $row->kecamatan->nama_kecamatan }}

                        </td>

                        <td>

                            {{ $row->bulan->bulan }}

                        </td>

                        <td>

                            {{ $row->musimTanam->musim_tanam }}

                        </td>

                        <td>

                            @if($row->status_verifikasi=='menunggu')

                                <span class="badge bg-warning">

                                    Menunggu

                                </span>

                            @elseif($row->status_verifikasi=='benar')

                                <span class="badge bg-success">

                                    Benar

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Salah

                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('pengamatan-penyebaran-dan-perkembangan-siput-murbey.detail',$row->id_pengamatan_penyebaran_dan_perkembangan_siput_murbey) }}"
                               class="btn btn-info btn-sm">

                                Detail

                            </a>

                            <a href="{{ route('pengamatan-penyebaran-dan-perkembangan-siput-murbey.edit',$row->id_pengamatan_penyebaran_dan_perkembangan_siput_murbey) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <a href="{{ route('pengamatan-penyebaran-dan-perkembangan-siput-murbey.verifikasi',$row->id_pengamatan_penyebaran_dan_perkembangan_siput_murbey) }}"
                               class="btn btn-success btn-sm">

                                Verifikasi

                            </a>

                            <form
                                action="{{ route('pengamatan-penyebaran-dan-perkembangan-siput-murbey.destroy',$row->id_pengamatan_penyebaran_dan_perkembangan_siput_murbey) }}"
                                method="POST"
                                style="display:inline;">

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

                        <td colspan="7" class="text-center">

                            Belum ada data

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection