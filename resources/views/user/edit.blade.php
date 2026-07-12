@extends('layouts.admin')

@section('title', 'Tambah User Aplikasi')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                Tambah User Aplikasi
            </h4>

        </div>

        <div class="card-body">

            <form action="{{ route('user-aplikasi.update',$data->id_user) }}" method="POST">

            @csrf
            @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Username
                        </label>

                        <input type="text"
                            name="username"
                            class="form-control"
                            value="{{ $data->username }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                            name="email"
                            class="form-control"
                            value="{{ $data->email }}"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Password Baru
                        </label>

                        <input type="password"
                            name="password"
                            class="form-control"
                            placeholder="Kosongkan jika tidak ingin mengubah password">

                        <small class="text-muted">
                            Isi hanya jika ingin mengganti password.
                        </small>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Role
                        </label>

                        <select name="role"
                                id="role"
                                class="form-select"
                                required>

                            <option value="">-- Pilih Role --</option>

                            <option value="pengelola_data"
                                {{ $data->role == 'pengelola_data' ? 'selected' : '' }}>
                                Pengelola Data
                            </option>

                            <option value="popt"
                                {{ $data->role == 'popt' ? 'selected' : '' }}>
                                POPT / Petugas Lapangan
                            </option>

                            <option value="lphp"
                                {{ $data->role == 'lphp' ? 'selected' : '' }}>
                                LPHP / Petugas Laboratorium
                            </option>

                            <option value="pimpinan"
                                {{ $data->role == 'pimpinan' ? 'selected' : '' }}>
                                Pimpinan
                            </option>

                        </select>

                    </div>

                    <!-- LPHP -->
                    <div class="col-md-6 mb-3" id="div_lphp" style="display:none;">

                        <label class="form-label">
                            LPHP
                        </label>

                        <select name="id_lphp" class="form-select">

                            <option value="">-- Pilih LPHP --</option>

                            @foreach($lphp as $item)

                                <option value="{{ $item->id_lphp }}"
                                    {{ $data->id_lphp == $item->id_lphp ? 'selected' : '' }}>

                                    {{ $item->nama_lphp }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Kabupaten -->
                    <div class="col-md-6 mb-3" id="div_kabupaten" style="display:none;">

                        <label class="form-label">
                            Kabupaten / Kota
                        </label>

                        <select name="id_kabupaten"
                                id="id_kabupaten"
                                class="form-select">

                            <option value="">-- Pilih Kabupaten --</option>

                            @foreach($kabupaten as $item)

                                <option value="{{ $item->id_kabupaten_kota }}"
                                    {{ $data->id_kabupaten == $item->id_kabupaten_kota ? 'selected' : '' }}>

                                    {{ $item->nama_kabupaten_kota }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Kecamatan -->
                    <div class="col-md-6 mb-3" id="div_kecamatan" style="display:none;">

                        <label class="form-label">
                            Kecamatan
                        </label>

                        <select name="id_kecamatan"
                                id="id_kecamatan"
                                class="form-select">

                            <option value="">-- Pilih Kecamatan --</option>

                            @foreach($kecamatan as $item)

                                <option value="{{ $item->id_kecamatan }}"
                                    {{ $data->id_kecamatan == $item->id_kecamatan ? 'selected' : '' }}>

                                    {{ $item->nama_kecamatan }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select"
                                required>

                            <option value="aktif">
                                Aktif
                            </option>

                            <option value="nonaktif">
                                Nonaktif
                            </option>

                        </select>

                    </div>

                </div>

                <hr>

                <button type="submit"
                        class="btn btn-success">

                    <i class="bi bi-check-circle"></i>
                    Update

                </button>

                <a href="{{ route('user-aplikasi.index') }}"
                   class="btn btn-secondary">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>
<script>

document.getElementById('role').addEventListener('change', function () {

    let role = this.value;

    document.getElementById('div_lphp').style.display = 'none';
    document.getElementById('div_kabupaten').style.display = 'none';
    document.getElementById('div_kecamatan').style.display = 'none';

    if(role === 'popt'){
        document.getElementById('div_kabupaten').style.display = 'block';
        document.getElementById('div_kecamatan').style.display = 'block';
    }

    if(role === 'lphp'){
        document.getElementById('div_lphp').style.display = 'block';
    }

});


document.getElementById('id_kabupaten').addEventListener('change', function () {

    let idKabupaten = this.value;

    fetch('/get-kecamatan/' + idKabupaten)

        .then(response => response.json())

        .then(data => {

            let kecamatan = document.getElementById('id_kecamatan');

            kecamatan.innerHTML =
                '<option value="">-- Pilih Kecamatan --</option>';

            data.forEach(function(item){

                kecamatan.innerHTML +=
                    `<option value="${item.id_kecamatan}">
                        ${item.nama_kecamatan}
                    </option>`;

            });

        });

});

</script>
@endsection