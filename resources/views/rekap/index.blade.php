@extends('layouts.admin')

@section('title', 'Rekap Laporan')

@section('content')

<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Rekap Laporan</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('rekap.generate') }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-3 mb-3">
                    <label class="form-label">Jenis Laporan</label>
                    <select name="jenis" class="form-control">

                        <option value="keadaan_serangan_opt">
                            Keadaan Serangan OPT
                        </option>

                        <option value="laporan_kerusakan_tanaman_akibat_banjir">
                            Kerusakan Akibat Banjir
                        </option>

                        <option value="laporan_kerusakan_tanaman_akibat_kekeringan">
                            Kerusakan Akibat Kekeringan
                        </option>

                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Tahun</label>

                    <select name="id_tahun" class="form-control">

                        @foreach($tahun as $t)

                            <option value="{{ $t->id_tahun }}">
                                {{ $t->tahun }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Bulan</label>

                    <select name="id_bulan" class="form-control">

                        @foreach($bulan as $b)

                            <option value="{{ $b->id_bulan }}">
                                {{ $b->bulan }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Periode</label>

                    <select name="id_periode" class="form-control">

                        @foreach($periode as $p)

                            <option value="{{ $p->id_periode }}">
                                {{ $p->periode_pengamatan }}
                            </option>

                        @endforeach

                    </select>
                </div>
                <div class="row mt-2">

    <!-- Kabupaten -->

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Kabupaten / Kota
        </label>

        <select
            name="id_kabupaten_kota"
            id="id_kabupaten_kota"
            class="form-control">

            <option value="">
                Semua Kabupaten / Kota
            </option>

            @foreach($kabupaten as $kab)

                <option value="{{ $kab->id_kabupaten_kota }}">

                    {{ $kab->nama_kabupaten_kota }}

                </option>

            @endforeach

        </select>

    </div>

    <!-- Kecamatan -->

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Kecamatan
        </label>

        <select
            name="id_kecamatan"
            id="id_kecamatan"
            class="form-control">

            <option value="">
                Semua Kecamatan
            </option>

            @foreach($kecamatan as $kec)

                <option value="{{ $kec->id_kecamatan }}">

                    {{ $kec->nama_kecamatan }}

                </option>

            @endforeach

        </select>

    </div>

    <!-- Komoditas -->

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Jenis Tanaman
        </label>

        <select
            name="id_komoditas"
            class="form-control">

            <option value="">
                Semua Tanaman
            </option>

            @foreach($komoditas as $kom)

                <option value="{{ $kom->id_komoditas }}">

                    {{ $kom->komoditas }}

                </option>

            @endforeach

        </select>

    </div>

</div>

            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">
                    Generate Rekap
                </button>
            </div>

        </form>

    </div>

</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {

    const kabupaten = document.getElementById('id_kabupaten_kota');
    const kecamatan = document.getElementById('id_kecamatan');

    kabupaten.addEventListener('change', function () {

        let idKabupaten = this.value;

        kecamatan.innerHTML = '<option value="">Semua Kecamatan</option>';

        if (idKabupaten == '') {
            return;
        }

        fetch('/rekap/get-kecamatan/' + idKabupaten)
            .then(response => response.json())
            .then(data => {

                data.forEach(function(item){

                    let option = document.createElement('option');

                    option.value = item.id_kecamatan;
                    option.text = item.nama_kecamatan;

                    kecamatan.appendChild(option);

                });

            })
            .catch(error => console.error(error));

    });

});
</script>