<!DOCTYPE html>
<html>
<head>
    <title>Detail Keadaan OPT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>Detail Keadaan OPT Pada Petak Pengamatan Tetap</h3>
    
    <table class="table table-bordered table-striped">

        <thead class="table-dark">

        <tr>
            <th>No</th>
            <th>Desa</th>
            <th>Komoditas</th>
            <th>Varietas</th>
            <th>Umur</th>
            <th>OPT</th>
            <th>Intensitas</th>
            <th>Populasi Rumpunan</th>
            <th>Populasi Musuh Alami</th>
            <th>MA</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>

        </thead>

        <tbody>

        @foreach($detail as $row)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $row->desa->nama_desa ?? '-' }}
            </td>

            <td>
                {{ $row->komoditas->komoditas ?? '-' }}
            </td>

            <td>
                {{ $row->varietas }}
            </td>

            <td>
                {{ $row->umur }}
            </td>

            <td>
                {{ $row->opt->nama_opt ?? '-' }}
            </td>

            <td>
                {{ $row->intensitas }}
            </td>

            <td>
                {{ $row->populasi_rumpunan }}
            </td>

            <td>
                {{ $row->populasi_musuh_alami }}
            </td>

            <td>
                {{ $row->ma->nama_ma ?? '-' }}
            </td>

            <td>

                @if($row->status_verifikasi == 'benar')

                    <span class="badge bg-success">
                        Benar
                    </span>

                @elseif($row->status_verifikasi == 'salah')

                    <span class="badge bg-danger">
                        Salah
                    </span>

                @elseif($row->status_verifikasi == 'menunggu')

                    <span class="badge bg-warning text-dark">
                        Menunggu
                    </span>

                @else

                    <span class="badge bg-secondary">
                        -
                    </span>

                @endif

            </td>

            <td>
                {{ $row->keterangan_verifikasi ?? '-' }}
            </td>

        </tr>

        @endforeach

        </tbody>

    </table>
    
    <br>
    <div class="mb-3">
    <div class="row mt-5">

    <div class="col-md-4 offset-md-8 text-center">

    </div>

</div>
        <a href="{{ route('keadaan-opt-pada-petak-pengamatan-tetap.index') }}"
        class="btn btn-secondary">
            Kembali
        </a>

    </div>


</div>

</body>
</html>


</div>

</body>
</html>