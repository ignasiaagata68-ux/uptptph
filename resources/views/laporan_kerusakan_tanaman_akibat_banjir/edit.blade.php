<!DOCTYPE html>
<html>
<head>
    <title>Create LAPORAN KERUSAKAN TANAMAN AKIBAT BANJIR</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <div class="judul-form">
        LAPORAN KERUSAKAN TANAMAN AKIBAT BANJIR
    </div>

    <div class="subjudul">
        (Padi/Jagung)
    </div>
    <style>

        .judul-form{
            text-align:center;
            font-weight:bold;
            font-size:28px;
        }

        .subjudul{
            text-align:center;
            font-size:18px;
            margin-bottom:15px;
        }

        .bg-pink{
            background:#e6c0c0;
        }

        .bg-hijau{
            background:#dcecc5;
        }

        .bg-biru{
            background:#b7d7f0;
        }

        .bg-kuning{
            background:yellow;
        }

        table{
            font-size:13px;
        }

        table td,
        table th{
            text-align:center;
            vertical-align:middle;
            padding:3px;
        }
        .bg-biru{
            background:#8db4e2 !important;
        }

        .bg-kuning{
            background:#ffff00 !important;
        }
        .header-form{
            display:flex;
            justify-content:space-between;
            margin-bottom:15px;
        }

        .tbl-info-kiri,
        .tbl-info-kanan{
            border-collapse:collapse;
        }

        .tbl-info-kiri td,
        .tbl-info-kanan td{
            border:1px solid #000;
            padding:3px 8px;
            font-size:14px;
        }

        .label{
            background:#ffffff;
            min-width:140px;
        }

        .nilai{
            background:#e6c0c0;
            font-weight:bold;
            min-width:180px;
        }

        .tbl-info-kanan .nilai{
            text-align:center;
        }
        .bg-pink{
            background:#e6c0c0;
        }

</style>
</head>
<body>

<div class="container mt-4">
    @if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    {{ session('success') }}

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

@endif
    <div class="header-form">

    <table class="tbl-info-kiri">
        <tr>
            <td class="label">Kabupaten/Kota</td>
            <td class="nilai">
               {{ $header->nama_kabupaten_kota }}
            </td>
        </tr>

        <tr>
            <td class="label">Kecamatan</td>
            <td class="nilai">
                {{ $header->nama_kecamatan }}
            </td>
        </tr>
    </table>

    <table class="tbl-info-kanan">
        <tr>
            <td class="label">
                Periode Pengamatan
            </td>

            <td class="nilai">
                {{ $header->periode_pengamatan }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Musim Tanam
            </td>

            <td class="nilai">
                {{ $header->musim_tanam }}
            </td>
        </tr>
    </table>

</div>

<form action="{{ route('laporan-kerusakan-tanaman-akibat-banjir.update',$header->id_laporan_kerusakan_tanaman_akibat_banjir) }}" method="POST">
    @csrf


        <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="3" class="bg-biru">Tahun</th>
                <th rowspan="3" class="bg-biru">Bulan</th>
                <th rowspan="3" class="bg-biru">Periode</th>

                <th rowspan="3" class="bg-biru">Kab/Kota</th>
                <th rowspan="3" class="bg-biru">Kecamatan</th>
                <th rowspan="3" class="bg-biru">Desa</th>
                <th rowspan="3" class="bg-biru">Tanaman</th>

                <th rowspan="3" class="bg-biru">Var</th>
                <th rowspan="3" class="bg-biru">Umur<br>(Hst)</th>

                <th rowspan="3" class="bg-biru">Luas Tanam<br>(Ha)</th>
                <th rowspan="3" class="bg-biru">Luas Waspada<br>(Ha)</th>

                <th colspan="4" class="bg-biru">
                    Sisa Periode Sebelumnya / Perubahan Kriteria
                </th>

                <th colspan="2" class="bg-biru">
                    Luas Tambah Pada<br>
                    Periode Laporan (Ha)
                </th>

                <th colspan="2" class="bg-biru">
                    Luas Keadaan Pada<br>
                    Periode Laporan (Ha)
                </th>

                <th colspan="2" class="bg-biru">
                    Penanganan
                </th>

                <th colspan="2" class="bg-biru">
                    Koordinat
                </th>

            </tr>

            <tr>

                <th colspan="2" class="bg-biru">
                    Surut
                </th>

                <th colspan="2" class="bg-biru">
                    Puso
                </th>

                <th rowspan="2" class="bg-biru">
                    Terkena
                </th>

                <th rowspan="2" class="bg-biru">
                    Puso
                </th>

                <th rowspan="2" class="bg-biru">
                    Terkena
                </th>

                <th rowspan="2" class="bg-biru">
                    Puso
                </th>

                <th rowspan="2" class="bg-biru">
                    Upaya
                </th>

                <th rowspan="2" class="bg-biru">
                    Jumlah
                </th>

                <th rowspan="2" class="bg-biru">
                    Latitude
                </th>

                <th rowspan="2" class="bg-biru">
                    Longitude
                </th>

            </tr>

            <tr>

                <th class="bg-biru">
                    Luas (Ha)
                </th>

                <th class="bg-biru">
                    Ket (Periode)
                </th>

                <th class="bg-biru">
                    Luas (Ha)
                </th>

                <th class="bg-biru">
                    Ket (Periode)
                </th>

            </tr>

            <tr>
                <th class="bg-kuning">THN</th>
                <th class="bg-kuning">BLN</th>
                <th class="bg-kuning">PRD</th>

                <th class="bg-kuning">KAB</th>
                <th class="bg-kuning">KEC</th>
                <th class="bg-kuning">DES</th>
                <th class="bg-kuning">TAN</th>

                <th class="bg-kuning">VAR</th>
                <th class="bg-kuning">UMR</th>

                <th class="bg-kuning">LST</th>
                <th class="bg-kuning">WAS</th>

                <th class="bg-kuning">LSRT</th>
                <th class="bg-kuning">K_S</th>

                <th class="bg-kuning">LPSO</th>
                <th class="bg-kuning">K_P</th>

                <th class="bg-kuning">LT_T</th>
                <th class="bg-kuning">LT_P</th>

                <th class="bg-kuning bg-pink">LK_T</th>
                <th class="bg-kuning bg-pink">LK_P</th>

                <th class="bg-kuning">UPY</th>
                <th class="bg-kuning">J_UPY</th>

                <th class="bg-kuning">LAT</th>
                <th class="bg-kuning">LONG</th>
            </tr>

        </thead>
            <tbody id="tbody-banjir">

                @foreach($detail as $d)
      
                <input type="hidden"
                    name="id_tahun[]"
                    value="{{ $d->id_tahun }}">

                <input type="hidden"
                    name="id_bulan[]"
                    value="{{ $d->id_bulan }}">

                <input type="hidden"
                    name="id_periode[]"
                    value="{{ $d->id_periode }}">
                
                <input
                    type="hidden"
                    name="id_musim_tanam"
                    value="{{ $header->id_musim_tanam }}">
        
            <tr class="baris-banjir">
                <input
                    type="hidden"
                    name="id_detail[]"
                    value="{{ $d->id_det_laporan_kerusakan_tanaman_akibat_banjir }}">

                <td class="table-danger">
                    {{ $d->id_tahun }}
                </td>

                <td class="table-danger">
                    {{ $d->id_bulan }}
                </td>

                <td class="table-danger">
                    {{ $d->id_periode }}
                </td>
                <!-- KAB -->
                <td class="bg-hijau">

                {{ $header->nama_kabupaten_kota }}

                <input
                    type="hidden"
                    name="id_kabupaten_kota[]"
                    value="{{ $header->id_kabupaten_kota }}">

                </td>

                <!-- KEC -->
                <td class="bg-hijau">

                {{ $header->nama_kecamatan }}

                <input
                    type="hidden"
                    name="id_kecamatan[]"
                    value="{{ $header->id_kecamatan }}">

                </td>

                <!-- DES -->
                <td class="table-success">
                    <select
                        name="id_desa[]"
                        class="form-select"
                        style="min-width:200px;">

                        <option value="">
                            Pilih Desa
                        </option>

                        @foreach($desa as $desaItem)

                        <option
                            value="{{ $desaItem->id_desa }}"
                            {{ $d->id_desa == $desaItem->id_desa ? 'selected' : '' }}>

                            {{ $desaItem->nama_desa }}

                        </option>

                        @endforeach
                    </select>
                </td>

                <!-- TAN -->
                <td class="table-success">
                    <select
                        name="id_komoditas[]"
                        class="form-select"
                        style="min-width:200px;">

                        <option value="">
                            Pilih Komoditas
                        </option>
                        @foreach($komoditas as $k)

                        <option
                            value="{{ $k->id_komoditas }}"
                            {{ $d->id_komoditas == $k->id_komoditas ? 'selected' : '' }}>

                            {{ $k->komoditas }}

                        </option>

                        @endforeach
                    </select>

                </td>
                <!-- VAR -->
                <td>
                    <input
                        type="text"
                        name="var[]"
                        value="{{ $d->var }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

                <!-- UMR -->
                <td>
                    <input
                        type="text"
                        name="umur[]"
                        value="{{ $d->umur }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

                <!-- LST -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="luas_tanam[]"
                        value="{{ $d->luas_tanam }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

                <!-- WAS -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="luas_waspada[]"
                        value="{{ $d->luas_waspada }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

                <!-- LSRT -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="sps_surut_luas[]"
                        value="{{ $d->sps_surut_luas }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

                <!-- K_S -->
                <td>
                    <input type="text"
                        name="sps_surut_ket[]"
                        value="{{ $d->sps_surut_ket }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

                <!-- LPSO -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="sps_puso_luas[]"
                        value="{{ $d->sps_puso_luas }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

                <!-- K_P -->
                <td>
                    <input type="text"
                        name="sps_puso_ket[]"
                        value="{{ $d->sps_puso_ket }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

                <!-- LT_T -->
                <td>
                    <input
                        type="number"
                        step="0.01"
                        name="luas_tambah_terkena[]"
                        value="{{ $d->luas_tambah_terkena }}"
                        class="form-control lt_t"
                        style="min-width:150px;">
                </td>

                <!-- LT_P -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="luas_tambah_puso[]"
                        value="{{ $d->luas_tambah_puso }}"
                        class="form-control lt_p"
                        style="min-width:150px;">
                </td>

                <!-- LK_T -->
                <td class="bg-pink">
                    <input
                        name="luas_keadaan_terkena[]"
                        value="{{ $d->luas_keadaan_terkena }}"
                        class="form-control lk_t"
                        style="min-width:150px;"
                        readonly>
                </td>


                <!-- LK_P -->
                <td class="bg-pink">
                    <input
                        type="number"
                        step="0.01"
                        name="luas_keadaan_puso[]"
                        value="{{ $d->luas_keadaan_puso }}"
                        class="form-control lk_p"
                        readonly
                        style="min-width:150px;">
                </td>

                <!-- UPY -->
                <td>
                    <input type="text"
                        name="penangan_upaya[]"
                        class="form-control"
                        value="{{ $d->penangan_upaya }}"
                        style="min-width:100px;">
                </td>

                <!-- J_UPY -->
                <td>
                    <input type="number"
                        step="0.01"
                        name="penangan_jumlah[]"
                        value="{{ $d->penangan_jumlah }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

                <!-- LAT -->
                <td>
                    <input type="number"
                        step="0.000000"
                        name="koordinat_latitude[]"
                        value="{{ $d->koordinat_latitude }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

                <!-- LONG -->
                <td>
                    <input type="number"
                        step="0.000000"
                        name="koordinat_longitude[]"
                        value="{{ $d->koordinat_longitude }}"
                        class="form-control"
                        style="min-width:100px;">
                </td>

        </tr>

        @endforeach

    </tbody>

</table>

        <div class="row mt-5">

            <div class="col-md-6">
        </div>

        <div class="col-md-6 text-center">

        <div class="bg-pink p-2">

            <strong>
                {{ $header->nama_kecamatan }},
                {{ now()->translatedFormat('d F Y') }}
            </strong>

            <br>

            POPT Kec.
            {{ $header->nama_kecamatan }}

        </div>

        <br><br><br>

        <div class="bg-pink p-2">

            <strong>
                ................................
            </strong>

            <br>

            NIP :
            ................................

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

            update

        </button>

        <a href="{{ route('laporan-kerusakan-tanaman-akibat-banjir.index')}}"
        class="btn btn-secondary">

            Kembali

        </a>

    </div>


</form>

</body>
<script>
    document.getElementById('tambahBaris').addEventListener('click', function () {

    let tbody = document.getElementById('tbody-banjir');

    if (tbody.rows.length == 0) {
        alert('Tidak ada baris');
        return;
    }

    let row = tbody.rows[0].cloneNode(true);

    // Kosongkan input
    row.querySelectorAll('input').forEach(function (input) {

        if (input.type === 'hidden') {

            if (input.name === 'id_detail[]') {
                input.value = '';
            }

        } else {

            input.value = '';

        }

    });

    // Reset semua select
    row.querySelectorAll('select').forEach(function (select) {

        select.selectedIndex = 0;

    });

    tbody.appendChild(row);

});
</script>
<script>

document.addEventListener('input', function(e){

    let row =
        e.target.closest('tr');

    if(!row) return;

    let lt_t =
        row.querySelector('.lt_t');

    let lt_p =
        row.querySelector('.lt_p');

    let lk_t =
        row.querySelector('.lk_t');

    let lk_p =
        row.querySelector('.lk_p');

    if(lt_t && lk_t)
    {
        lk_t.value =
            lt_t.value || 0;
    }

    if(lt_p && lk_p)
    {
        lk_p.value =
            lt_p.value || 0;
    }

});

</script>
</div>
</html>

