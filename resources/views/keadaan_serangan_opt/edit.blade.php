<!DOCTYPE html>
<html>
<head>
    <title>Keadaan Serangan OPT dan Pengendaliannya di Wilayah Pengamatan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            font-size:12px;
        }

        .bg-pink{
            background-color:#f4cccc !important;
        }

        .bg-hijau{
            background-color:#d9ead3 !important;
        }

        .bg-kuning{
            background-color:#fff200 !important;
        }

        .table-opt{
            min-width:3000px;
        }

        th,
        td{
            text-align:center;
            vertical-align:middle;
            white-space:nowrap;
            padding:3px !important;
            font-size:11px;
        }

        input.form-control,
        select.form-select{
            min-width:80px;
            font-size:11px;
            padding:2px;
        }

        .readonly{
            background:#f4cccc !important;
        }

    </style>

</head>
<body>

<div class="container-fluid mt-3">

    <h3 class="text-center fw-bold">
        KEADAAN SERANGAN OPT DAN PENGENDALIANNYA
        DI WILAYAH PENGAMATAN (PENGAMATAN KELILING)
    </h3>

    <h5 class="text-center mb-4">
        (Padi/Jagung)
    </h5>

    <form action="{{ route('keadaan-serangan-opt.update', $header->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah) }}" method="POST">

    @csrf

        <div class="row mb-3">

            <div class="col-md-6">

                <table class="table table-bordered table-sm">

            <tr>
                <th width="200">
                    Kabupaten/Kota
                </th>

                <td>
                    {{ $header->nama_kabupaten_kota }}

                    <input type="hidden"
                        name="id_kabupaten_kota"
                        value="{{ $header->id_kabupaten_kota }}">
                </td>
            </tr>

            <tr>
                <th>
                    Kecamatan
                </th>

                <td>
                    {{ $header->nama_kecamatan }}

                    <input type="hidden"
                        name="id_kecamatan"
                        value="{{ $header->id_kecamatan }}">
                </td>
            </tr>

        </table>

        </div>

        <div class="col-md-6">

            <table class="table table-bordered table-sm">

                <tr>
                    <th width="200">
                        Periode Pengamatan
                    </th>

                    <td>
                        {{ $header->periode_pengamatan }}

                        <input type="hidden"
                            name="id_periode"
                            value="{{ $header->id_periode }}">
                    </td>
                </tr>

                <tr>
                    <th>
                        Musim Tanam
                    </th>

                    <td>
                        {{ $header->musim_tanam }}

                        <input type="hidden"
                            name="id_musim_tanam"
                            value="{{ $header->id_musim_tanam }}">
                    </td>
                </tr>

            </table>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-opt">
                <thead>

        <tr class="bg-light">

            <th rowspan="3" class="bg-pink">THN</th>
            <th rowspan="3" class="bg-pink">BLN</th>
            <th rowspan="3" class="bg-pink">PER</th>

            <th rowspan="3" class="bg-hijau">KAB/KOTA</th>
            <th rowspan="3" class="bg-hijau">KEC</th>
            <th rowspan="3" class="bg-hijau">DESA</th>

            <th rowspan="3" class="bg-hijau">TAN</th>

            <th rowspan="3">VAR</th>
            <th rowspan="3">LUAS</th>

            <th rowspan="3" class="bg-hijau">OPT</th>

            <th colspan="5">
                Sisa Periode Sebelumnya (Ha)
            </th>

            <th rowspan="2">
                Luas Ter
                Kendali
            </th>

            <th rowspan="2">
                Luas
                Panen
            </th>

            <th colspan="5">
                Luas Tambah Serangan
                pada Periode Laporan
            </th>

            <th colspan="4">
                Luas Pengendalian
            </th>

            <th colspan="5">
                Luas Keadaan Serangan
                pada Periode Laporan
            </th>

            <th rowspan="3" class="bg-pink">
                MT
            </th>

            <th rowspan="3" class="bg-pink">
                TAHUN
            </th>

        </tr>

        <tr>

            <th>R</th>
            <th>S</th>
            <th>B</th>
            <th>P</th>
            <th>J</th>

            <th>R</th>
            <th>S</th>
            <th>B</th>
            <th>P</th>
            <th>J</th>

            <th>Kimia</th>
            <th>Hayati</th>
            <th>Cara Lain</th>
            <th>Jml</th>

            <th>R</th>
            <th>S</th>
            <th>B</th>
            <th>P</th>
            <th>J</th>

        </tr>

        <tr class="bg-kuning">

            <th>S_R</th>
            <th>S_S</th>
            <th>S_B</th>
            <th>S_P</th>
            <th>S_J</th>

            <th>TKENDALI</th>
            <th>PANEN</th>

            <th>T_R</th>
            <th>T_S</th>
            <th>T_B</th>
            <th>T_P</th>
            <th>T_J</th>

            <th>KIM</th>
            <th>HYT</th>
            <th>CL</th>
            <th>JML</th>

            <th>K_R</th>
            <th>K_S</th>
            <th>K_B</th>
            <th>K_P</th>
            <th>K_J</th>

        </tr>

        </thead>

        <tbody id="tbody-opt">
            @foreach($detail as $d)
            <tr>
                <input
                    type="hidden"
                    name="id_detail[]"
                    value="{{ $d->id_det_keadaan_serangan_opt_dan_pengendalian_di_wilayah }}">
            <!-- THN -->
                <td class="bg-pink">
                    {{ $d->id_tahun }}
                    <input type="hidden"
                        name="id_tahun[]"
                        value="{{ $d->id_tahun }}">
                </td>

            <!-- BLN -->
                <td class="bg-pink">
                    {{ $d->id_bulan }}
                    <input type="hidden"
                        name="id_bulan[]"
                        value="{{ $d->id_bulan }}">
                </td>

            <!-- PER -->
                <td class="bg-pink">
                    {{ $d->id_periode }}
                    <input type="hidden"
                        name="id_periode"
                        value="{{ $d->id_periode }}">
                </td>

            <!-- KABUPATEN -->
                <td class="bg-hijau">

                    {{ $header->nama_kabupaten_kota }}
                    <input type="hidden"
                        name="id_kabupaten_kota"
                        value="{{ $header->id_kabupaten_kota }}">
                </td>

            <!-- KECAMATAN -->
                <td class="bg-hijau">

                    {{ $header->nama_kecamatan }}
                    <input type="hidden"
                        name="id_kecamatan"
                        value="{{ $header->id_kecamatan }}">
                
                </td>

            <!-- DESA -->
            <td class="bg-hijau">

                <select name="id_desa[]" class="form-select desa">

                <option value="">-- Pilih DESA --</option>
                @foreach($desa as $desaItem)

                <option value="{{ $desaItem->id_desa }}"
                    {{ $desaItem->id_desa == $d->id_desa ? 'selected' : '' }}>

                    {{ $desaItem->nama_desa }}

                </option>

                @endforeach

                </select>

            </td>

            <!-- KOMODITAS -->
            <td class="bg-hijau">

                <select name="id_komoditas[]" class="form-select komoditas">

                <option value="">-- Pilih KOMODITAS --</option>

                @foreach($komoditas as $k)

                <option value="{{ $k->id_komoditas }}"
                    {{ $k->id_komoditas == $d->id_komoditas ? 'selected' : '' }}>

                    {{ $k->komoditas }}

                </option>

                @endforeach

                </select>

            </td>

                <!-- VAR -->
                <td>
                    <input type="text"
                            name="varietas[]"
                            value="{{ $d->varietas }}"
                            class="form-control">
                </td>

                <!-- LUAS -->
                <td>
                    <input type="number"
                            name="luas[]"
                            value="{{ $d->luas }}"
                            class="form-control">
                </td>

                <!-- OPT -->
                <td class="bg-hijau">
                    <select name="id_opt[]" class="form-select opt">

                    <option value="">-- Pilih OPT --</option>

                    @foreach($opt as $o)

                        <option
                            value="{{ $o->id_opt }}"
                            {{ $o->id_opt == $d->id_opt ? 'selected' : '' }}>

                            {{ $o->nama_opt }}

                        </option>

                    @endforeach

                </select>
                </td>

                <!-- S_R -->
                <td>
                    <input type="number"
                        name="s_r[]"
                        value="{{ $d->sisa_periode_sebelumnya_serangan_ringan }}"
                        class="form-control sr">
                </td>

                <!-- S_S -->
                <td>
                    <input type="number"
                        name="s_s[]"
                        value="{{ $d->sisa_periode_sebelumnya_sisa_serangan_sedang }}"
                        class="form-control ss">
                </td>
                <!-- S_B -->
                <td>
                    <input type="number"
                        name="s_b[]"
                        value="{{ $d->sisa_sisa_periode_sebelumnya_serangan_berat }}"
                        class="form-control sb">
                </td>
                <!-- S_P -->
                <td>
                    <input type="number"
                        name="s_p[]"
                        value="{{ $d->sisa_sisa_periode_sebelumnya_serangan_puso }}"
                        class="form-control sp">
                </td>
                <!-- S_J -->
                <td>
                    <input type="number"
                        name="s_j[]"
                        value="{{ $d->sisa_serangan_jumlah }}"
                        class="form-control sj readonly"
                        readonly>
                </td>

                <!-- TKENDALI -->
                <td>
                    <input type="number"
                        name="luas_terkendali[]"
                        value="{{ $d->luas_terkendali }}"
                        class="form-control">
                </td>

                <!-- PANEN -->
                <td>
                    <input type="number"
                        name="luas_panen[]"
                        value="{{ $d->luas_panen }}"
                        class="form-control">
                </td>

                <!-- T_R -->
                <td>
                    <input type="number"
                        name="t_r[]"
                        value="{{ $d->luas_tambah_serangan_ringan }}"
                        class="form-control tr">
                </td>
                <!-- T_S -->
                <td>
                    <input type="number"
                        name="t_s[]"
                        value="{{ $d->luas_tambah_serangan_sedang }}"
                        class="form-control ts">
                </td>
                <!-- T_B -->
               <td>
                    <input type="number"
                        name="t_b[]"
                        value="{{ $d->luas_tambah_serangan_berat }}"
                        class="form-control tb">
                </td>
                <!-- T_P -->
                <td>
                    <input type="number"
                        name="t_p[]"
                        value="{{ $d->luas_tambah_serangan_puso }}"
                        class="form-control tp">
                </td>
                <!-- T_J -->
                <td>
                    <input type="number"
                           name="t_j[]"
                           value="{{ $d->luas_tambah_serangan_jumlah }}"
                           class="form-control tj readonly"
                           readonly>
                </td>
                    <!-- KIM -->
                <td>
                    <input type="number"
                        name="kimia[]"
                        value="{{ $d->pestisida_kimia }}"
                        class="form-control kim">
                </td>
                <!-- HYT -->
                <td>
                    <input type="number"
                        name="hayati[]"
                        value="{{ $d->pestisida_hayati }}"
                        class="form-control hyt">
                </td>

                <!-- CL -->
                <td>
                    <input type="number"
                        name="cara_lain[]"
                        value="{{ $d->cara_lain }}"
                        class="form-control cl">
                </td>

                <!-- JML -->
                <td>
                    <input type="number"
                        name="jml[]"
                        value="{{ $d->jml }}"
                        class="form-control jml readonly"
                        readonly>
                </td>

                <!-- K_R -->
                <td>
                    <input type="number"
                        name="k_r[]"
                        value="{{ $d->luas_keadaan_serangan_ringan }}"
                        class="form-control kr readonly"
                        readonly>
                </td>

                <!-- K_S -->
                <td>
                    <input type="number"
                        name="k_s[]"
                        value="{{ $d->luas_keadaan_serangan_sedang }}"
                        class="form-control ks readonly"
                        readonly>
                </td>

                <!-- K_B -->
                <td>
                    <input type="number"
                        name="k_b[]"
                        value="{{ $d->luas_keadaan_serangan_berat }}"
                        class="form-control kb readonly"
                        readonly>
                </td>

                <!-- K_P -->
                <td>
                    <input type="number"
                        name="k_p[]"
                        value="{{ $d->luas_keadaan_serangan_puso }}"
                        class="form-control kp readonly"
                        readonly>
                </td>

                <!-- K_J -->
                <td>
                    <input type="number"
                        name="k_j[]"
                        value="{{ $d->luas_keadaan_serangan_jumlah }}"
                        class="form-control kj readonly"
                        readonly>
                </td>

                <!-- MT -->
                <td>
                    <input type="text"
                        name="mt[]"
                        value="{{ $d->mt }}"
                        class="form-control">
                </td>

                <!-- TAHUN -->
                <td class="bg-pink">

                    {{ $detail[0]->id_tahun }}

                </td>

            </tr>
            @endforeach

        </tbody>

    </table>

</div>

<div class="mt-3">

    @if($detail->count() > 1)

    <button type="button"
            id="tambahBaris"
            class="btn btn-primary">
        Tambah Baris
    </button>

    @endif

    <button type="submit"
            class="btn btn-success">
        Update
    </button>

    <a href="{{ route(
        'keadaan-serangan-opt.show',$header->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah) }}"
        class="btn btn-secondary">
            Kembali
    </a>

</div>
</form>
<script>

        document.addEventListener('input', function(e){

            let row = e.target.closest('tr');

            if(!row) return;

            let sr = parseFloat(row.querySelector('.sr')?.value || 0);
            let ss = parseFloat(row.querySelector('.ss')?.value || 0);
            let sb = parseFloat(row.querySelector('.sb')?.value || 0);
            let sp = parseFloat(row.querySelector('.sp')?.value || 0);

            let tr = parseFloat(row.querySelector('.tr')?.value || 0);
            let ts = parseFloat(row.querySelector('.ts')?.value || 0);
            let tb = parseFloat(row.querySelector('.tb')?.value || 0);
            let tp = parseFloat(row.querySelector('.tp')?.value || 0);

            let kim = parseFloat(row.querySelector('.kim')?.value || 0);
            let hyt = parseFloat(row.querySelector('.hyt')?.value || 0);
            let cl  = parseFloat(row.querySelector('.cl')?.value || 0);

            row.querySelector('.sj').value =
                sr + ss + sb + sp;

            row.querySelector('.tj').value =
                tr + ts + tb + tp;

            row.querySelector('.jml').value =
                kim + hyt + cl;

            row.querySelector('.kr').value =
                sr + tr;

            row.querySelector('.ks').value =
                ss + ts;

            row.querySelector('.kb').value =
                sb + tb;

            row.querySelector('.kp').value =
                sp + tp;

            row.querySelector('.kj').value =
                (sr + tr) +
                (ss + ts) +
                (sb + tb) +
                (sp + tp);

        });

</script>
<script>

document.getElementById('tambahBaris').addEventListener('click', function(){

    let tbody = document.getElementById('tbody-opt');

    console.log(tbody);
    console.log(tbody.lastElementChild);
    if(tbody.rows.length==0){

        alert('Tidak ada baris');

        return;

    }

    let row = tbody.rows[0].cloneNode(true);

    row.querySelectorAll('input').forEach(function(input){

    if(input.type !== 'hidden'){
        input.value = '';
    }

    });

    row.querySelectorAll('input').forEach(function(input){

    if(input.classList.contains('readonly')){

    input.value=0;

    }

    });

    let idDetail = row.querySelector('input[name="id_detail[]"]');

    if (idDetail) {
        idDetail.value = "";
    }

    row.querySelectorAll('select').forEach(function(select){

        select.selectedIndex = 0;

    });

    tbody.appendChild(row);

});

</script>
<script>
    document.addEventListener('change', function(e){

        if(!e.target.classList.contains('komoditas')) return;

        let row = e.target.closest('tr');
        let optSelect = row.querySelector('.opt');
        let idKomoditas = e.target.value;

        fetch('/keadaan-serangan-opt/get-opt/' + idKomoditas)
            .then(res => res.json())
            .then(data => {

                optSelect.innerHTML = '<option value="">-- Pilih OPT --</option>';

                data.forEach(function(opt){

                    optSelect.innerHTML += `
                        <option value="${opt.id_opt}">
                            ${opt.nama_opt}
                        </option>`;
                });

            });

    });
</script>
</body>
</html>
