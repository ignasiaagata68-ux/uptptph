<!DOCTYPE html>
<html>
<head>
    <title>Pengamatan Persemaian Padi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif  
    
    <h2 class="text-center fw-bold">
        PENGAMATAN PERSEMAIAN PADI
    </h2>

    <hr>

    <form action="{{ route('pengamatan-persemaian-padi.store') }}"
          method="POST">

        @csrf

        <input type="hidden"
               name="id_data"
               value="{{ $data->id_data }}">
        
        <input type="hidden"
               name="id_kabupaten_kota"
               value="{{ $data->petugas->kecamatan->kabupaten->id_kabupaten_kota }}">

        <input type="hidden"
               name="id_kecamatan"
               value="{{ $data->petugas->id_kecamatan }}">

        <input type="hidden"
               name="id_petugas"
               value="{{ $data->petugas->id_petugas }}">

        <!-- HEADER -->

        <table class="table table-bordered">

            <tr>

                <td width="20%">Kabupaten/Kota</td>

                <td width="30%">
                    {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}
                </td>

                <td width="20%">Kelompok Tani</td>

                <td width="30%">

                    <select name="id_kelompok_tani"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Kelompok Tani --
                        </option>

                        @foreach($kelompokTani as $kt)

                            <option value="{{ $kt->id_kelompok_tani }}">
                                {{ $kt->nama_kelompok }}
                            </option>

                        @endforeach

                    </select>

                </td>

            </tr>

            <tr>

                <td>Kecamatan</td>

                <td>
                    {{ $data->petugas->kecamatan->nama_kecamatan }}
                </td>

                <td>Tanggal Pengamatan</td>

                <td>

                    <input type="date"
                           name="tgl_pengamatan"
                           class="form-control"
                           value="{{ date('Y-m-d') }}">

                </td>

            </tr>

            <tr>

                <td>Desa</td>

                <td>

                    <select name="id_desa"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Desa --
                        </option>

                        @foreach($desa as $d)

                            <option value="{{ $d->id_desa }}">
                                {{ $d->nama_desa }}
                            </option>

                        @endforeach

                    </select>

                </td>

                <td>Nama Petugas</td>

                <td>
                    {{ $data->petugas->nama }}
                </td>

            </tr>

            <tr>

                <td>Petak Pengamatan</td>

                <td>

                    <input type="text"
                           name="petak_pengamatan"
                           class="form-control"
                           required>

                </td>

                <td></td>
                <td></td>

            </tr>

        </table>

        <hr>

        <table class="table table-bordered text-center align-middle">

            <thead class="table-primary">

                <tr>

                    <th rowspan="2">No Persemaian</th>
                    <th rowspan="2">Luas (m²)</th>
                    <th rowspan="2">Umur (hss)</th>
                    <th rowspan="2">Varietas</th>
                    <th rowspan="2">Pop Ayunan WBC</th>
                    <th rowspan="2">WDH</th>
                    <th rowspan="2">MA</th>
                    <th rowspan="2">Pop KT PBP</th>

                    <th colspan="4">
                        Intensitas (%)
                    </th>

                </tr>

                <tr>

                    <th>Tikus</th>
                    <th>PBP</th>
                    <th>Penyakit</th>
                    <th>WBC</th>

                </tr>

            </thead>

            <tbody>

            @for($i=0;$i<10;$i++)

                <tr>

                    <td>
                        <input type="text"
                               name="no_persemaian[]"
                               class="form-control form-control-sm">
                    </td>

                    <td>
                        <input type="number"
                               name="luas[]"
                               class="form-control">
                    </td>

                    <td>
                        <input type="text"
                               name="umur[]"
                               class="form-control">
                    </td>

                    <td>
                        <input type="text"
                               name="varietas[]"
                               class="form-control form-control-sm">
                    </td>

                    <td>
                        <input type="text"
                               name="pop_ayunan_wbc[]"
                               class="form-control form-control-sm">
                    </td>

                    <td>
                        <input type="text"
                               name="wdh[]"
                               class="form-control form-control-sm">
                    </td>

                    <td>

                        <select name="id_ma[]"
                                class="form-select form-select-sm">

                            <option value="">
                                Pilih MA
                            </option>

                            @foreach($ma as $m)

                                <option value="{{ $m->id_ma }}">
                                    {{ $m->nama_ma }}
                                </option>

                            @endforeach

                        </select>

                    </td>

                    <td>
                        <input type="number"
                               step="0.01"
                               name="pop_kt_pbp[]"
                               class="form-control form-control-sm">
                    </td>

                    <td>
                        <input type="number"
                               step="0.01"
                               name="tikus[]"
                               class="form-control form-control-sm">
                    </td>

                    <td>
                        <input type="number"
                               step="0.01"
                               name="pbp[]"
                               class="form-control form-control-sm">
                    </td>

                    <td>
                        <input type="number"
                               step="0.01"
                               name="penyakit[]"
                               class="form-control form-control-sm">
                    </td>

                    <td>
                        <input type="number"
                               step="0.01"
                               name="wbc[]"
                               class="form-control form-control-sm">
                    </td>

                </tr>

            @endfor

            </tbody>

            <tfoot>

                <tr class="table-primary">

                    <td><b>Jumlah</b></td>

                    <td id="jumlah_luas">0</td>

                    <td></td> <!-- umur -->
                    <td></td> <!-- varietas -->
                    <td></td> <!-- pop ayunan -->

                    <td id="jumlah_wdh">0</td>

                    <td></td> <!-- MA -->

                    <td id="jumlah_pop_kt_pbp">0</td>

                    <td id="jumlah_tikus">0</td>

                    <td id="jumlah_pbp">0</td>

                    <td id="jumlah_penyakit">0</td>

                    <td id="jumlah_wbc">0</td>

                </tr>

                <tr class="table-primary">

                    <td><b>Rerata</b></td>

                    <td id="rerata_luas">0</td>

                    <td></td>
                    <td></td>
                    <td></td>

                    <td id="rerata_wdh">0</td>

                    <td></td>

                    <td id="rerata_pop_kt_pbp">0</td>

                    <td id="rerata_tikus">0</td>

                    <td id="rerata_pbp">0</td>

                    <td id="rerata_penyakit">0</td>

                    <td id="rerata_wbc">0</td>

                </tr>
            </tfoot>

        </table>

        <div class="text-end">

            <button type="submit"
                    class="btn btn-success">

                Simpan Semua Data

            </button>

        </div>

    </form>

    <div class="row mt-5">

        <div class="col-md-6">

            <b>Keterangan :</b><br>

            hss : Hasil Setelah Sebar<br>
            WDC : Wereng Batang Coklat<br>
            WDH : Wereng Daun Hijau<br>
            MA : Musuh Alami<br>
            PBP : Penggerek Batang Padi<br>
            KT : Kelompok Telur

        </div>

        <div class="col-md-6 text-center">

            <b>

                {{ $data->petugas->kecamatan->nama_kecamatan }},
                {{ \Carbon\Carbon::parse($data->tanggal_laporan)->translatedFormat('d F Y') }}

            </b>

            <br>

            POPT Kecamatan
            {{ $data->petugas->kecamatan->nama_kecamatan }}

            <br><br><br><br>

            <b>
                {{ $data->petugas->nama }}
            </b>

            <br>

            0

        </div>

    </div>

</div>
<script>

function hitungTotal() {

    let luas = 0;
    let wdh = 0;
    let popkt = 0;
    let tikus = 0;
    let pbp = 0;
    let penyakit = 0;
    let wbc = 0;

    document.querySelectorAll('[name="luas[]"]').forEach(el=>{
        luas += Number(el.value || 0);
    });

    document.querySelectorAll('[name="wdh[]"]').forEach(el=>{
    wdh += Number(el.value || 0);
    });

    document.querySelectorAll('[name="pop_kt_pbp[]"]').forEach(el=>{
        popkt += Number(el.value || 0);
    });

    document.querySelectorAll('[name="tikus[]"]').forEach(el=>{
        tikus += Number(el.value || 0);
    });

    document.querySelectorAll('[name="pbp[]"]').forEach(el=>{
        pbp += Number(el.value || 0);
    });

    document.querySelectorAll('[name="penyakit[]"]').forEach(el=>{
        penyakit += Number(el.value || 0);
    });

    document.querySelectorAll('[name="wbc[]"]').forEach(el=>{
        wbc += Number(el.value || 0);
    });

    document.getElementById('jumlah_luas').innerHTML = luas;
    document.getElementById('jumlah_wdh').innerHTML = wdh;
    document.getElementById('jumlah_pop_kt_pbp').innerHTML = popkt;
    document.getElementById('jumlah_tikus').innerHTML = tikus;
    document.getElementById('jumlah_pbp').innerHTML = pbp;
    document.getElementById('jumlah_penyakit').innerHTML = penyakit;
    document.getElementById('jumlah_wbc').innerHTML = wbc;

    let baris = 10;

    document.getElementById('rerata_luas').innerHTML =
        (luas / baris).toFixed(2);
    
    document.getElementById('rerata_wdh').innerHTML =
        (luas / baris).toFixed(2);


    document.getElementById('rerata_pop_kt_pbp').innerHTML =
        (popkt / baris).toFixed(2);

    document.getElementById('rerata_tikus').innerHTML =
        (tikus / baris).toFixed(2);

    document.getElementById('rerata_pbp').innerHTML =
        (pbp / baris).toFixed(2);

    document.getElementById('rerata_penyakit').innerHTML =
        (penyakit / baris).toFixed(2);

    document.getElementById('rerata_wbc').innerHTML =
        (wbc / baris).toFixed(2);
}

document.addEventListener('input', hitungTotal);

</script>
</body>
</html>

