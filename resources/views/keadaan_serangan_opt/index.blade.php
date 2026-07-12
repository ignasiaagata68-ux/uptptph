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

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Kabupaten/Kota</th>
            <th>Kecamatan</th>
            <th>Periode</th>
            <th>Musim Tanam</th>
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

            <td>
                {{ $row->musim_tanam }}
            </td>

            <td style="white-space:nowrap;">

                <a href="{{ route('keadaan-serangan-opt.show', $row->id_keadaan_serangan_opt_dan_pengendalian_di_wilayah) }}"
                   class="btn btn-primary btn-sm">
                    Detail
                </a>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>