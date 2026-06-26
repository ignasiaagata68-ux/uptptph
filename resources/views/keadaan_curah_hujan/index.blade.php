@extends('layouts.app')

@section('title','Keadaan Curah Hujan')

@section('content')

<div class="container-fluid">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Keadaan Curah Hujan
            </h4>

            <a href="{{ route('data.index') }}"
               class="btn btn-primary">

                <i class="fa fa-plus"></i>
                Tambah Data

            </a>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-striped" id="datatable">

                    <thead class="table-primary">

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th>
                                Kabupaten/Kota
                            </th>

                            <th>
                                Kecamatan
                            </th>

                            <th>
                                Bulan
                            </th>

                            <th>
                                Musim Tanam
                            </th>

                            <th width="230">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($data as $item)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $item->nama_kabupaten_kota }}

                            </td>

                            <td>

                                {{ $item->nama_kecamatan }}

                            </td>

                            <td>

                                {{ $item->bulan }}

                            </td>

                            <td>

                                {{ $item->musim_tanam }}

                            </td>

                            <td>

                                <a
                                    href="{{ route('keadaan-curah-hujan.show',$item->id_keadaan_curah_hujan) }}"
                                    class="btn btn-info btn-sm">

                                    Detail

                                </a>

                                <a
                                    href="{{ route('keadaan-curah-hujan.edit',$item->id_keadaan_curah_hujan) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('keadaan-curah-hujan.destroy',$item->id_keadaan_curah_hujan) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data ini?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

$(function(){

    $('#datatable').DataTable({

        responsive:true

    });

});

</script>

@endpush