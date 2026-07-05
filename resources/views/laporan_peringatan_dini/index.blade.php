

<!DOCTYPE html>
<html>
<head>
    <title>Data Laporan Peringatan Dini</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>Data Laporan Peringatan Dini</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

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

        @forelse($data as $d)

            <tr>

                <td>
                    {{ $d->id_laporan_peringatan_dini }}
                </td>

                <td>
                    {{ $d->kabupaten->nama_kabupaten_kota ?? '-' }}
                </td>

                <td>
                    {{ $d->kecamatan->nama_kecamatan ?? '-' }}
                </td>

                <td>
                    {{ $d->periode->periode_pengamatan ?? '-' }}

                </td>

                <td>
                    {{ $d->musimTanam->musim_tanam ?? '-' }}
                </td>

                <td>

                    <a href="{{ route('laporan-peringatan-dini.detail',$d->id_laporan_peringatan_dini) }}"
   class="btn btn-info btn-sm">
    Detail
</a>
                    <a href="{{ route('laporan-peringatan-dini.edit',$d->id_laporan_peringatan_dini) }}"
   class="btn btn-warning btn-sm">
    Edit
</a>
                    <a href="{{ route('laporan-peringatan-dini.verifikasi',$d->id_laporan_peringatan_dini) }}"
   class="btn btn-success btn-sm">
    Verifikasi
</a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="text-center">

                    Belum ada data

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</body>
</html>

