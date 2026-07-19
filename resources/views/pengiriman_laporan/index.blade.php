<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Pengiriman Laporan</title>
</head>
<body>

<h2>Daftar Pengiriman Laporan</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Kecamatan</th>
        <th>Periode</th>
        <th>Tanggal Kirim</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

   @foreach($data as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->data->petugas->kecamatan->nama_kecamatan }}</td>
        <td>{{ $item->data->periode->periode_pengamatan }}</td>

        <td>
            {{ $item->tanggal_kirim
                ? \Carbon\Carbon::parse($item->tanggal_kirim)->format('d-m-Y H:i')
                : '-' }}
        </td>

        <td>{{ ucfirst($item->status) }}</td>

        <td>
            <a href="{{ route('sp.create', $item->id_data) }}">
                Verifikasi
            </a>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>