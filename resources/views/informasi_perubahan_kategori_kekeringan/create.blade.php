<!DOCTYPE html>
<html>
<head>
    <title>Create INFORMASI PERUBAHAN KATEGORI KEKERINGAN</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <div class="judul-form">
        INFORMASI PERUBAHAN KATEGORI KEKERINGAN
    </div>

    <div class="subjudul">
        (Padi/Jagung)
    </div>
    <style>
        body{
    font-family: Arial, Helvetica, sans-serif;
    font-size:12px;
}

.judul-form{
    text-align:center;
    font-size:28px;
    font-weight:bold;
    margin-bottom:5px;
}

.subjudul{
    text-align:center;
    font-size:18px;
    font-weight:bold;
    margin-bottom:20px;
}

.header-form{
    display:flex;
    justify-content:space-between;
    margin-bottom:20px;
}

.tbl-info-kiri,
.tbl-info-kanan{
    border-collapse:collapse;
}

.tbl-info-kiri td,
.tbl-info-kanan td{
    border:1px solid #000;
    padding:6px 10px;
}

.label{
    background:#fff;
    font-weight:bold;
    width:170px;
}

.nilai{
    background:#E6B8B7;
    min-width:220px;
}

.table-responsive{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse !important;
    table-layout:auto;
    font-size:12px;
}

table th,
table td{
    border:1px solid #000 !important;
    text-align:center;
    vertical-align:middle;
    padding:3px;
}

thead th{
    font-weight:bold;
}

.bg-biru{
    background:#8DB4E2 !important;
}

.bg-kuning{
    background:#FFF200 !important;
}

.bg-hijau{
    background:#D8E4BC !important;
}

.bg-pink{
    background:#E6B8B7 !important;
}

.bg-nomor{
    background:#4F81BD !important;
    color:#fff !important;
    font-weight:bold;
}

.garis-kanan{
    border-right:3px solid #000 !important;
}

.garis-kiri{
    border-left:3px solid #000 !important;
}

input.form-control,
select.form-select{
    border:none !important;
    border-radius:0 !important;
    box-shadow:none !important;
    background:transparent;
    font-size:12px;
    padding:2px;
}

input.form-control:focus,
select.form-select:focus{
    border:none !important;
    box-shadow:none !important;
}

.bg-pink input{
    background:#E6B8B7 !important;
    font-weight:bold;
}

.bg-hijau select{
    background:#D8E4BC !important;
}

.table{
    margin-bottom:0;
}

th{
    white-space:nowrap;
}

td{
    min-width:70px;
}

td select{
    min-width:180px;
}

td input{
    min-width:70px;
}

.container{
    max-width:1900px;
}
    </style>
</head>
<body>


<div class="container mt-4">
    <div class="header-form">

    <table class="tbl-info-kiri">
        <tr>
            <td class="label">Kabupaten/Kota</td>
            <td class="nilai">
                {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}
            </td>
        </tr>

        <tr>
            <td class="label">Kecamatan</td>
            <td class="nilai">
                {{ $data->petugas->kecamatan->nama_kecamatan }}
            </td>
        </tr>
    </table>

    <table class="tbl-info-kanan">
        <tr>
            <td class="label">
                Periode Pengamatan
            </td>

            <td class="nilai">
                {{ $data->periode->periode_pengamatan }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Musim Tanam
            </td>

            <td class="nilai">
                {{ $data->musimTanam->musim_tanam }}
            </td>
        </tr>
    </table>

</div>

<form method="POST"
      action="{{ route('informasi-perubahan-kategori-kekeringan.store') }}">
    @csrf

        <div class="table-responsive">

        <table class="table table-bordered mb-0">
            <thead>

                <tr>

                    <th rowspan="2" class="bg-biru">No</th>
                    <th rowspan="2" class="bg-biru">Kab/Kota</th>
                    <th rowspan="2" class="bg-biru">Kec</th>
                    <th rowspan="2" class="bg-biru">Desa</th>
                    <th rowspan="2" class="bg-biru">Komoditas</th>

                    <th colspan="5" class="bg-biru">
                        Luas Terkena Bulan ..... Periode ..... (Ha)
                    </th>

                    <th colspan="6" class="bg-biru">
                        Perubahan Kategori Terkena Bulan ..... Periode ..... (Ha)
                    </th>

                </tr>

                <tr>

                    <th class="bg-biru">Ringan</th>
                    <th class="bg-biru">Sedang</th>
                    <th class="bg-biru">Berat</th>
                    <th class="bg-biru">Puso</th>
                    <th class="bg-biru">Jumlah</th>

                    <th class="bg-biru">Ringan</th>
                    <th class="bg-biru">Sedang</th>
                    <th class="bg-biru">Berat</th>
                    <th class="bg-biru">Puso</th>
                    <th class="bg-biru">Jumlah</th>
                    <th class="bg-biru">Pulih</th>

                </tr>

                <tr>

                    <th class="bg-nomor">1</th>
                    <th class="bg-nomor">2</th>
                    <th class="bg-nomor">3</th>
                    <th class="bg-nomor">3</th>
                    <th class="bg-nomor">4</th>

                    <th class="bg-nomor">5</th>
                    <th class="bg-nomor">6</th>
                    <th class="bg-nomor">7</th>
                    <th class="bg-nomor">8</th>

                    <th class="bg-nomor">
                        9
                        <br>
                        (5+6+7+8)
                    </th>

                    <th class="bg-nomor">10</th>
                    <th class="bg-nomor">11</th>
                    <th class="bg-nomor">12</th>
                    <th class="bg-nomor">13</th>

                    <th class="bg-nomor">
                        14
                        <br>
                        (10+11+12+13)
                    </th>

                    <th class="bg-nomor">15</th>

                </tr>

    </thead>

        <tbody id="tbody-kekeringan">

            <input type="hidden"
                name="id_periode[]"
                value="{{ $data->id_periode }}">

            <tr class="baris-kekeringan">

                <!-- NO -->
                <td class="table-danger">1</td>

                <!-- KAB -->
                <td class="bg-hijau">

                    {{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}

                    <input
                        type="hidden"
                        name="id_kabupaten_kota[]"
                        value="{{ $data->petugas->kecamatan->kabupaten->id_kabupaten_kota }}">

                </td>

                <!-- KEC -->
                <td class="bg-hijau">

                    {{ $data->petugas->kecamatan->nama_kecamatan }}

                    <input
                        type="hidden"
                        name="id_kecamatan[]"
                        value="{{ $data->petugas->id_kecamatan }}">

                </td>

                <!-- DESA -->
                <td class="table-success">

                    <select
                        name="id_desa[]"
                        class="form-select"
                        style="min-width:200px;">

                        <option value="">Pilih Desa</option>

                        @foreach($desa as $d)

                            <option value="{{ $d->id_desa }}">
                                {{ $d->nama_desa }}
                            </option>

                        @endforeach

                    </select>

                </td>

                <!-- KOMODITAS -->
                <td class="table-success">

                    <select
                        name="id_komoditas[]"
                        class="form-select"
                        style="min-width:200px;">

                        <option value="">Pilih Komoditas</option>

                        @foreach($komoditas as $k)

                            <option value="{{ $k->id_komoditas }}">
                                {{ $k->komoditas }}
                            </option>

                        @endforeach

                    </select>

                </td>

                <!-- LTB RINGAN -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="ltb_ringan[]"
                        class="form-control ltb_ringan"
                        style="min-width:200px;">
                </td>

                <!-- LTB SEDANG -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="ltb_sedang[]"
                        class="form-control ltb_sedang"
                        style="min-width:200px;">
                </td>

                <!-- LTB BERAT -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="ltb_berat[]"
                        class="form-control ltb_berat"
                        style="min-width:200px;">
                </td>

                <!-- LTB PUSO -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="ltb_puso[]"
                        class="form-control ltb_puso"
                        style="min-width:200px;">
                </td>

                <!-- LTB JUMLAH -->
                <td class="bg-pink">

                    <input
                        type="number"
                        step="0.01"
                        name="ltb_jumlah[]"
                        value="0"
                        readonly
                        class="form-control ltb_jumlah"
                        style="min-width:200px;">

                </td>

                <!-- PKT RINGAN -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="pkt_ringan[]"
                        class="form-control pkt_ringan"
                        style="min-width:200px;">
                </td>

                <!-- PKT SEDANG -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="pkt_sedang[]"
                        class="form-control pkt_sedang"
                        style="min-width:200px;">
                </td>

                <!-- PKT BERAT -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="pkt_berat[]"
                        class="form-control pkt_berat"
                        style="min-width:200px;">
                </td>

                <!-- PKT PUSO -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="pkt_puso[]"
                        class="form-control pkt_puso"
                        style="min-width:200px;">
                </td>

                <!-- PKT JUMLAH -->
                <td class="bg-pink">

                    <input
                        type="number"
                        step="0.01"
                        name="pkt_jumlah[]"
                        value="0"
                        readonly
                        class="form-control pkt_jumlah"
                        style="min-width:200px;">

                </td>

                <!-- PKT PULIH -->
                <td>

                    <input
                        type="number"
                        step="0.01"
                        name="pkt_pulih[]"
                        class="form-control"
                        style="min-width:200px;">

                </td>

            </tr>

    </tbody>
</table>
    <div class="row mt-5">

    <div class="col-md-6">
    </div>

    <div class="col-md-6 text-center">

        <div class="bg-pink p-2">

            <strong>
                {{ $data->petugas->kecamatan->nama_kecamatan }},
                {{ now()->translatedFormat('d F Y') }}
            </strong>

            <br>

            POPT Kec.
            {{ $data->petugas->kecamatan->nama_kecamatan }}

        </div>

        <br><br><br>

        <div class="bg-pink p-2">

            <strong>
                {{ $data->petugas->nama }}
            </strong>

            <br>

            NIP :
            {{ $data->petugas->NIP ?? '-' }}

        </div>

    </div>

</div>

<div class="mt-3">

    <button
        type="button"
        id="tambahBaris"
        class="btn btn-primary">

        Tambah Baris

    </button>

    <button
        type="submit"
        class="btn btn-success">

        Simpan

    </button>

    <a href="{{ route('informasi-perubahan-kategori-kekeringan.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</div>

</form>

<script>

document.getElementById('tambahBaris')
.addEventListener('click', function(){

    let tbody =
        document.getElementById('tbody-kekeringan');

    let contohBaris =
        document.querySelector('.baris-kekeringan');

    let barisBaru =
        contohBaris.cloneNode(true);

    barisBaru.querySelectorAll('input')
    .forEach(function(input){

        if(input.type === 'hidden'){
            return;
        }

        if(
            input.classList.contains('ltb_jumlah')
            ||
            input.classList.contains('pkt_jumlah')
        ){
            input.value = 0;
        }
        else{
            input.value = '';
        }

    });

    barisBaru.querySelectorAll('select')
    .forEach(function(select){

        select.selectedIndex = 0;

    });

    tbody.appendChild(barisBaru);

});

</script>

<script>

document.addEventListener('input', function(e){

    let row = e.target.closest('tr');

    if(!row) return;

    let ltb_ringan =
        parseFloat(row.querySelector('.ltb_ringan')?.value) || 0;

    let ltb_sedang =
        parseFloat(row.querySelector('.ltb_sedang')?.value) || 0;

    let ltb_berat =
        parseFloat(row.querySelector('.ltb_berat')?.value) || 0;

    let ltb_puso =
        parseFloat(row.querySelector('.ltb_puso')?.value) || 0;

    let ltb_jumlah =
        row.querySelector('.ltb_jumlah');

    if(ltb_jumlah)
    {
        ltb_jumlah.value =
            ltb_ringan +
            ltb_sedang +
            ltb_berat +
            ltb_puso;
    }

    let pkt_ringan =
        parseFloat(row.querySelector('.pkt_ringan')?.value) || 0;

    let pkt_sedang =
        parseFloat(row.querySelector('.pkt_sedang')?.value) || 0;

    let pkt_berat =
        parseFloat(row.querySelector('.pkt_berat')?.value) || 0;

    let pkt_puso =
        parseFloat(row.querySelector('.pkt_puso')?.value) || 0;

    let pkt_jumlah =
        row.querySelector('.pkt_jumlah');

    if(pkt_jumlah)
    {
        pkt_jumlah.value =
            pkt_ringan +
            pkt_sedang +
            pkt_berat +
            pkt_puso;
    }

});

</script>

</body>
</html>

