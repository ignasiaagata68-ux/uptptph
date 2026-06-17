<!DOCTYPE html>
<html>
<head>
    <title>Kelola Permission</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<form action="/role/{{ $role->id_role }}"
      method="POST">

    @csrf


<div class="container mt-4">
    
    <h2>
        Role : {{ $role->nama_role }}
    </h2>

    <hr>

    @foreach($permissions as $permission)

        <div class="form-check">

            <input
                 class="form-check-input"
                    type="checkbox"
                    name="permissions[]"
                    value="{{ $permission->id_permission }}"

                    @if(
                        $role->permissions
                            ->contains(
                                'id_permission',
                                $permission->id_permission
                            )
                    )
                        checked
                    @endif
            >

            <label class="form-check-label">
                {{ $permission->nama_permission }}
            </label>

        </div>

    @endforeach

    <button type="submit"
        class="btn btn-primary">
    Simpan Permission
    </button>

    <br>

    <a href="/role"
       class="btn btn-secondary">
        Kembali
    </a>

</div>
</form>
</body>
</html>