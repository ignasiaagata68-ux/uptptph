<!DOCTYPE html>
<html>
<head>
    <title>Data Bulan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Data Bulan</h2>

    <a href="{{ route('bulan.create') }}"
       class="btn btn-primary mb-3">
        Tambah Data
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th>Bulan</th>
                <th style="width:140px">
                    Aksi
                </th>
            </tr>

        </thead>

        <tbody>

        @foreach($data as $row)

        <tr>

            <td>{{ $row->id_bulan }}</td>

            <td>{{ $row->bulan }}</td>

            <td>

                <a href="{{ route('bulan.edit',$row->id_bulan) }}"
                   class="btn btn-warning btn-sm me-2">
                    Edit
                </a>

                <form action="{{ route('bulan.destroy',$row->id_bulan) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data?')">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>