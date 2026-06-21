<!DOCTYPE html>
<html>
<head>
    <title>Data Keadaan Serangan OPT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Keadaan Serangan OPT</h2>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Kabupaten/Kota</th>
    <th>Kecamatan</th>
    <th>Periode</th>
    <th>Aksi</th>
</tr>
</thead>

    <tbody>

    @foreach($data as $row)

    <tr>

        <td>
            {{ $row->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah }}
        </td>

        <td>
            {{ $row->nama_kabupaten_kota }}
        </td>

        <td>
            {{ $row->nama_kecamatan }}
        </td>

        <td>
            {{ $row->periode_pengamatan }}
        </td>

        <td style="white-space:nowrap;">

            <a href="{{ route('keadaan-serangan-opt.show', $row->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah) }}" 
                class="btn btn-primary btn-sm"> 
                    Detail 
            </a> 
        
            <a href="{{ route('keadaan-serangan-opt.edit', $row->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah) }}" 
                class="btn btn-warning btn-sm"> 
                    Edit 
            </a>

        </td>

    </tr>

    @endforeach

    </tbody>
    </table>

</div>

</body>
</html>