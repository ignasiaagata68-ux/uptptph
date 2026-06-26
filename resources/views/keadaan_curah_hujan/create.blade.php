<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <title>Keadaan Curah Hujan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

<style>

body{
    font-size:12px;
    font-family:Times New Roman,serif;
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

.bg-biru{
    background:#b8cce4;
}

.bg-pink{
    background:#e6b8b7;
}

.bg-hijau{
    background:#d8e4bc;
}

.bg-kuning{
    background:#ffff00;
}

.judul{
    text-align:center;
    font-size:22px;
    font-weight:bold;
}

.subjudul{
    text-align:center;
    font-size:13px;
    font-weight:bold;
    margin-bottom:10px;
}

input{
    border:none!important;
    border-radius:0!important;
    box-shadow:none!important;
    text-align:center;
    font-size:12px;
}

input:focus{
    box-shadow:none!important;
}

.kotak-ttd{
    background:#e6b8b7;
    display:inline-block;
    padding:8px 35px;
    min-width:260px;
    text-align:center;
}

.keterangan{
    font-size:12px;
    line-height:18px;
}

</style>

</head>

<body>

<div class="container-fluid mt-2">

<div class="judul">

KEADAAN CURAH HUJAN

</div>

<div class="subjudul">

(Padi)

</div>

<form method="POST"
action="{{ route('keadaan-curah-hujan.store') }}">

@csrf

<div class="row mb-2">

<div class="col-md-6">

<table>

<tr>

<td width="170">
Kabupaten/Kota
</td>

<td class="bg-pink">

{{ $data->petugas->kecamatan->kabupaten->nama_kabupaten_kota }}

</td>

</tr>

<tr>

<td>
Kecamatan
</td>

<td class="bg-pink">

{{ $data->petugas->kecamatan->nama_kecamatan }}

</td>

</tr>

</table>

</div>

<div class="col-md-3 offset-md-3">

<table>

<tr>

<td width="90">
Bulan
</td>

<td class="bg-pink">

{{ $data->bulan->bulan }}

</td>

</tr>

<tr>

<td>

MT

</td>

<td class="bg-pink">

{{ $data->musimTanam->musim_tanam }}

</td>

</tr>

</table>

</div>

</div>

<table>

<thead>

<tr>

<th colspan="2" class="bg-biru">

Tanggal Penakaran
(Dasarian I)

</th>

<th colspan="2" class="bg-biru">

Tanggal Penakaran
(Dasarian II)

</th>

<th colspan="2" class="bg-biru">

Tanggal Penakaran
(Dasarian III)

</th>

</tr>

<tr>

<th class="bg-biru" width="80">
Tanggal
</th>

<th class="bg-biru" width="80">
Curah Hujan
(mm)
</th>

<th class="bg-biru" width="80">
Tanggal
</th>

<th class="bg-biru" width="80">
Curah Hujan
(mm)
</th>

<th class="bg-biru" width="80">
Tanggal
</th>

<th class="bg-biru" width="80">
Curah Hujan
(mm)
</th>

</tr>

<tr class="bg-kuning">

<th>1</th>

<th>2</th>

<th>3</th>

<th>4</th>

<th>5</th>

<th>6</th>

</tr>

</thead>

<tbody>
    {{-- ================= DASARIAN I - II - III ================= --}}

@for($i=1;$i<=11;$i++)

<tr>

    {{-- ================= DASARIAN I ================= --}}

    @if($i<=10)

        <td class="bg-hijau">

            {{ $i }}

            <input
                type="hidden"
                name="tanggal_penakaran[]"
                value="{{ $i }}">

            <input
                type="hidden"
                name="dasarian[]"
                value="I">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                class="form-control ch1"
                name="curah_hujan_mm[]">

        </td>

    @else

        <td colspan="2" class="bg-biru">

            Jumlah

        </td>

    @endif


    {{-- ================= DASARIAN II ================= --}}

    @php

        $tgl2 = $i + 10;

    @endphp

    @if($tgl2<=20)

        <td class="bg-hijau">

            {{ $tgl2 }}

            <input
                type="hidden"
                name="tanggal_penakaran[]"
                value="{{ $tgl2 }}">

            <input
                type="hidden"
                name="dasarian[]"
                value="II">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                class="form-control ch2"
                name="curah_hujan_mm[]">

        </td>

    @else

        <td colspan="2" class="bg-biru">

            Jumlah

        </td>

    @endif


    {{-- ================= DASARIAN III ================= --}}

    @php

        $tgl3 = $i + 20;

    @endphp

    @if($tgl3<=31)

        <td class="bg-hijau">

            {{ $tgl3 }}

            <input
                type="hidden"
                name="tanggal_penakaran[]"
                value="{{ $tgl3 }}">

            <input
                type="hidden"
                name="dasarian[]"
                value="III">

        </td>

        <td>

            <input
                type="number"
                step="0.01"
                class="form-control ch3"
                name="curah_hujan_mm[]">

        </td>

    @else

        <td></td>

        <td></td>

    @endif

</tr>

@endfor


{{-- ====================== REKAP ====================== --}}

<tr>

    <td colspan="2" class="bg-biru text-start">
        Jumlah CH
    </td>

    <td colspan="2" class="bg-biru text-start">
        Jumlah CH
    </td>

    <td colspan="2" class="bg-biru text-start">
        Jumlah CH
    </td>

</tr>

<tr>

    <td class="bg-pink">
        CH
    </td>

    <td id="jumlah1" class="bg-pink">0</td>

    <td class="bg-pink">
        CH
    </td>

    <td id="jumlah2" class="bg-pink">0</td>

    <td class="bg-pink">
        CH
    </td>

    <td id="jumlah3" class="bg-pink">0</td>

</tr>

<tr>

    <td>
        HH
    </td>

    <td id="hh1" class="bg-pink">0</td>

    <td>
        HH
    </td>

    <td id="hh2" class="bg-pink">0</td>

    <td>
        HH
    </td>

    <td id="hh3" class="bg-pink">0</td>

</tr>

<tr>

    <td>
        Deret Hari Kering
    </td>

    <td id="kering1" class="bg-pink">0</td>

    <td>
        Deret Hari Basah
    </td>

    <td id="basah2" class="bg-pink">0</td>

    <td>
        CH Max
    </td>

    <td id="max3" class="bg-pink">0</td>

</tr>
<script>

document.addEventListener("input", function () {

    hitungDasarian("ch1", "jumlah1", "hh1", "kering1", null);
    hitungDasarian("ch2", "jumlah2", "hh2", null, "basah2");
    hitungDasarian("ch3", "jumlah3", "hh3", null, null, "max3");

});

function hitungDasarian(kelas, idCH, idHH, idKering = null, idBasah = null, idMax = null){

    let data=[];

    document.querySelectorAll("."+kelas).forEach(function(item){

        let v=item.value.trim();

        if(v==""){

            data.push(null);

        }else{

            data.push(parseFloat(v));

        }

    });

    /* ==========================
       CH
    =========================== */

    let jumlah=0;

    data.forEach(function(v){

        if(v!=null)
            jumlah+=v;

    });

    document.getElementById(idCH).innerHTML=jumlah;



    /* ==========================
       HH
       Hari dengan CH > 0
    =========================== */

    let hh=0;

    data.forEach(function(v){

        if(v!=null && v>0)
            hh++;

    });

    document.getElementById(idHH).innerHTML=hh;



    /* ==========================
       Deret Hari Kering
       dihitung dari hari terakhir
    =========================== */

    if(idKering){

        let deret=0;

        for(let i=data.length-1;i>=0;i--){

            if(data[i]==null || data[i]==0){

                deret++;

            }else{

                break;

            }

        }

        document.getElementById(idKering).innerHTML=deret;

    }



    /* ==========================
       Deret Hari Basah
       dihitung dari hari terakhir
    =========================== */

    if(idBasah){

        let deret=0;

        for(let i=data.length-1;i>=0;i--){

            if(data[i]!=null && data[i]>0){

                deret++;

            }else{

                break;

            }

        }

        document.getElementById(idBasah).innerHTML=deret;

    }



    /* ==========================
       CH MAX
    =========================== */

    if(idMax){

        let maks=0;

        data.forEach(function(v){

            if(v!=null && v>maks)
                maks=v;

        });

        document.getElementById(idMax).innerHTML=maks;

    }

}

</script>

</body>
</html>

</tbody>

</table>
<div class="row mt-3">

    <!-- KETERANGAN -->

    <div class="col-md-6">

        <div class="keterangan">

            <strong>Keterangan :</strong><br>

            1) Jumlah curah hujan dalam milimeter.<br>

            - Pemeriksaan curah hujan tiap pagi jam 07.00.<br>

            - Jika tidak hujan diisi (-).<br>

            - Jika banyaknya CH kurang dari 0,5 mm ditulis 0,
            tetapi tetap dinyatakan sebagai hari hujan.<br>

            - Sedangkan jika banyaknya CH lebih dari 0,5 mm
            dibulatkan menjadi 1 mm.<br><br>

            <strong>

                PENAKAR HUJAN SENANTIASA HARUS<br>
                DIPERIKSA BOCOR ATAU TIDAK

            </strong>

        </div>

    </div>


    <!-- TANDA TANGAN -->

    <div class="col-md-6 text-center">

        <div class="kotak-ttd">

            <strong>

                {{ $data->petugas->kecamatan->nama_kecamatan }},
                {{ now()->translatedFormat('d F Y') }}

            </strong>

            <br>

            POPT Kec.

            {{ $data->petugas->kecamatan->nama_kecamatan }}

        </div>

        <br><br><br>

        <div class="kotak-ttd">

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
        type="submit"
        class="btn btn-success">

        Simpan

    </button>

    <a
        href="{{ route('keadaan-curah-hujan.index') }}"
        class="btn btn-secondary">

        Kembali

    </a>

</div>

</form>