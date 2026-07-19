<!DOCTYPE html>
<html>
<head>
    <title>Pengamatan Persemaian Padi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
    <style>

        body{

            font-family:"Times New Roman";
            font-size:12px;
            background:#fff;

        }

        .container{

            max-width:98%;

        }

        .judul{

            font-size:28px;
            font-weight:bold;
            text-align:center;

        }

        .subjudul{

            text-align:center;
            margin-bottom:10px;

        }

        table{

            width:100%;
            border-collapse:collapse;

        }

        table th,
        table td{

            border:1px solid #000;
            padding:2px;
            text-align:center;
            vertical-align:middle;

        }

        .bg-pink{

            background:#e6b8b7;

        }

        .bg-hijau{

            background:#d8e4bc;

        }

        .bg-biru{

            background:#b8cce4;

        }

        .bg-kuning{

            background:#ffff99;

        }

        input,
        select{

            width:100%;
            border:none!important;
            outline:none!important;
            background:transparent!important;
            box-shadow:none!important;
            border-radius:0!important;
            font-size:12px!important;
            height:28px;
            padding:2px;

        }

        input:focus,
        select:focus{

            box-shadow:none!important;

        }

        .number-input{

            text-align:center;

        }

        .text-input{

            text-align:left;

        }

        thead th{

            background:#b8cce4;

        }

        tfoot td{

            background:#d8e4bc;
            font-weight:bold;

        }

    </style>

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

    <br>
    <br>
    
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

        <table>

            <tr>

                <td width="170">

                    Kabupaten/Kota

                </td>

                <td class="bg-pink">

                    {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}

                </td>

                <td width="170">

                    Kelompok Tani

                </td>

                <td class="bg-hijau">
                    <select
                        name="id_kelompok_tani"
                        id="id_kelompok_tani"
                        class="form-select"
                        required>

                        <option value="">-- Pilih Kelompok Tani --</option>

                        @foreach($kelompokTani as $k)
                            <option value="{{ $k->id_kelompok_tani }}">
                                {{ $k->nama_kelompok }}
                            </option>
                        @endforeach

                    </select>

                </td>

            </tr>

            <tr>

                <td>

                    Kecamatan

                </td>

                <td class="bg-pink">

                    {{ $data->petugas->kecamatan->nama_kecamatan }}

                </td>

                <td>

                    Tanggal Pengamatan

                </td>

                <td>

                    <input
                    type="date"
                    name="tgl_pengamatan"
                    value="{{ $data->tanggal_laporan }}">

                </td>

            </tr>

            <tr>

                <td>

                    Desa

                </td>

                <td class="bg-hijau">

                    <select
                        name="id_desa"
                        id="id_desa"
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

                

                </td>

                <td>

                    Nama Petugas

                </td>

                <td class="bg-pink">

                    {{ $data->petugas->nama }}

                </td>

            </tr>

            <tr>

                <td>

                    Petak Pengamatan

                </td>

                <td>

                    <input
                        type="text"
                        name="petak_pengamatan"
                        class="form-control"
                        required
                        placeholder="Masukkan Petak Pengamatan">

                </td>

            </tr>

</table>

        <hr>

        <table>

            <thead>

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

            <tbody id="tbodyData">

            @for($i=0;$i<10;$i++)>

                <tr>

                    <td>
                        <input
                            type="text"
                            name="no_persemaian[]"
                            class="form-control form-control-sm text-input"
                            placeholder="Teks"
                            class="angka"
                            maxlength="20">
                    </td>

                    <td>
                        <input
                            type="number"
                            name="luas[]"
                            class="form-control form-control-sm number-input"
                            placeholder="0"
                            class="angka"
                            min="0">
                    </td>

                    <td>
                        <input
                            type="number"
                            name="umur[]"
                            class="form-control form-control-sm number-input"
                            placeholder="HSS"
                            class="angka"
                            min="0">
                    </td>

                    <td>
                        <input
                            type="text"
                            name="varietas[]"
                            class="form-control form-control-sm text-input"
                            placeholder="Varietas">
                    </td>

                    <td>
                        <input
                            type="text"
                            name="pop_ayunan_wbc[]"
                            class="form-control form-control-sm text-input"
                            placeholder="Teks"
                            maxlength="20">
                            
                    </td>

                    <td>
                        <input
                            type="number"
                            name="wdh[]"
                            class="form-control form-control-sm number-input"
                            placeholder="0.00"
                            step="0.01"
                            class="angka"
                            min="0">
                    </td>

                    <td>

                        <select
                            name="id_ma[]"
                            class="form-control form-control-sm">

                            <option value="">-- Pilih MA --</option>

                            @foreach($ma as $item)
                                <option value="{{ $item->id_ma }}">
                                    {{ $item->nama_ma }}
                                </option>
                            @endforeach

                        </select>

                    </td>

                    <td>
                        <input
                            type="number"
                            name="pop_kt_pbp[]"
                            class="form-control form-control-sm number-input"
                            placeholder="0.00"
                            step="0.01"
                            class="angka"
                            min="0">
                    </td>

                    <td>
                        <input
                            type="number"
                            name="tikus[]"
                            class="form-control form-control-sm number-input"
                            placeholder="0.00"
                            step="0.01"
                            class="angka"
                            min="0">
                    </td>

                    <td>
                        <input
                            type="number"
                            name="pbp[]"
                            class="form-control form-control-sm number-input"
                            placeholder="0.00"
                            step="0.01"
                            class="angka"
                            min="0">
                    </td>

                    <td>
                        <input
                            type="number"
                            name="penyakit[]"
                            class="form-control form-control-sm number-input"
                            placeholder="0.00"
                            step="0.01"
                            class="angka"
                            min="0">
                    </td>

                    <td>
                        <input
                            type="number"
                            name="wbc[]"
                            class="form-control form-control-sm number-input"
                            placeholder="0.00"
                            step="0.01"
                            class="angka"
                            min="0">
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
        <div class="mt-3">

                <button
                    type="button"
                    id="tambahBaris"
                    class="btn btn-primary">

                    Tambah Baris

                </button>

                @if($statusLaporan->status == 'Draft' || $statusLaporan->status == 'Perlu Perbaikan')

                <button
                    type="submit"
                    class="btn btn-success">
                    Simpan
                </button>

            @else

                <button
                    type="button"
                    class="btn btn-success"
                    disabled>
                    Simpan
                </button>

            @endif

                <a href="{{ route('sp.create', $data->id_data) }}"
                    class="btn btn-secondary">
                    Kembali
                </a>

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

            NIP :

            {{ $data->petugas->NIP ?? '-' }}

        </div>

</div>
    <script>
        document.getElementById('tambahBaris').addEventListener('click', function () {

            let tbody = document.getElementById('tbodyData');

            // Clone baris terakhir
            let row = tbody.rows[tbody.rows.length - 1].cloneNode(true);

            // Kosongkan semua input
            row.querySelectorAll('input').forEach(function(input){

                input.value = '';

            });

            // Reset semua dropdown
            row.querySelectorAll('select').forEach(function(select){

                select.selectedIndex = 0;

            });

            // Tambahkan ke tabel
            tbody.appendChild(row);

            // Hitung ulang
            hitungTotal();

        });
    </script>
    <script>

        document.getElementById('id_desa').addEventListener('change', function () {

        });

        document.querySelectorAll('.angka').forEach(function(input){

            input.addEventListener('input', function(){

                this.value = this.value.replace(',', '.');

            });

        });

    </script>
    <script>

        function hitungTotal() {

            let luas = 0;
            let wdh = 0;
            let popkt = 0;
            let tikus = 0;
            let pbp = 0;
            let penyakit = 0;
            let wbc = 0;

            // ===============================
            // HITUNG TOTAL SETIAP KOLOM
            // ===============================

            document.querySelectorAll('[name="luas[]"]').forEach(function(el){
                luas += parseFloat(el.value) || 0;
            });

            document.querySelectorAll('[name="wdh[]"]').forEach(function(el){
                wdh += parseFloat(el.value) || 0;
            });

            document.querySelectorAll('[name="pop_kt_pbp[]"]').forEach(function(el){
                popkt += parseFloat(el.value) || 0;
            });

            document.querySelectorAll('[name="tikus[]"]').forEach(function(el){
                tikus += parseFloat(el.value) || 0;
            });

            document.querySelectorAll('[name="pbp[]"]').forEach(function(el){
                pbp += parseFloat(el.value) || 0;
            });

            document.querySelectorAll('[name="penyakit[]"]').forEach(function(el){
                penyakit += parseFloat(el.value) || 0;
            });

            document.querySelectorAll('[name="wbc[]"]').forEach(function(el){
                wbc += parseFloat(el.value) || 0;
            });

            // ===============================
            // TAMPILKAN JUMLAH
            // ===============================

            document.getElementById('jumlah_luas').textContent = luas.toFixed(2);
            document.getElementById('jumlah_wdh').textContent = wdh.toFixed(2);
            document.getElementById('jumlah_pop_kt_pbp').textContent = popkt.toFixed(2);
            document.getElementById('jumlah_tikus').textContent = tikus.toFixed(2);
            document.getElementById('jumlah_pbp').textContent = pbp.toFixed(2);
            document.getElementById('jumlah_penyakit').textContent = penyakit.toFixed(2);
            document.getElementById('jumlah_wbc').textContent = wbc.toFixed(2);
            // ===============================
            // HITUNG JUMLAH BARIS
            // ===============================

            let baris = 0;

            document.querySelectorAll('[name="luas[]"]').forEach(function(el){

                if(el.value !== ''){
                    baris++;
                }

            });

            if(baris==0){

                baris=1;

            }

            // ===============================
            // TAMPILKAN RERATA
            // ===============================

           document.getElementById('rerata_luas').textContent =
                (luas / baris).toFixed(2);

            document.getElementById('rerata_wdh').textContent =
                (wdh / baris).toFixed(2);

            document.getElementById('rerata_pop_kt_pbp').textContent =
                (popkt / baris).toFixed(2);

            document.getElementById('rerata_tikus').textContent =
                (tikus / baris).toFixed(2);

            document.getElementById('rerata_pbp').textContent =
                (pbp / baris).toFixed(2);

            document.getElementById('rerata_penyakit').textContent =
                (penyakit / baris).toFixed(2);

            document.getElementById('rerata_wbc').textContent =
                (wbc / baris).toFixed(2);
        }

        // ===============================
        // OTOMATIS HITUNG SAAT INPUT BERUBAH
        // ===============================

        document.addEventListener('input', function(e){

            if(
                e.target.name === 'luas[]' ||
                e.target.name === 'wdh[]' ||
                e.target.name === 'pop_kt_pbp[]' ||
                e.target.name === 'tikus[]' ||
                e.target.name === 'pbp[]' ||
                e.target.name === 'penyakit[]' ||
                e.target.name === 'wbc[]'
            ){
                hitungTotal();
            }

        });

        // Hitung saat halaman pertama kali dibuka
        document.addEventListener('DOMContentLoaded', function(){
            hitungTotal();
        });

    </script>
   <script>
document.getElementById('id_desa').addEventListener('change', function () {

    let idDesa = this.value;

    fetch("{{ url('pengamatan-persemaian-padi/kelompok-tani') }}/" + idDesa)

    .then(response => response.json())

    .then(data => {

        let select = document.getElementById('id_kelompok_tani');

        select.innerHTML = '<option value="">-- Pilih Kelompok Tani --</option>';

        data.forEach(function(item){

            select.innerHTML +=
                `<option value="${item.id_kelompok_tani}">
                    ${item.nama_kelompok}
                </option>`;

        });

    });

});
</script>
</body>
</html>

