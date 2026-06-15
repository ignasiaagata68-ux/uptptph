<!DOCTYPE html>
<html>
<head>
    <title>Login UPT PTPH</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card">

                <div class="card-header">
                    Login Sistem
                </div>

                <div class="card-body">

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="/proses-login" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>

                            <div class="input-group">
                                <input type="password"
                                    name="password"
                                    id="password"
                                    class="form-control"
                                    required>

                                <button type="button"
                                        class="btn btn-outline-secondary"
                                        onclick="togglePassword()">
                                    👁
                                </button>
                            </div>
                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
<script>
function togglePassword() {

    const password = document.getElementById('password');

    if (password.type === 'password') {
        password.type = 'text';
    } else {
        password.type = 'password';
    }

}
</script>
</body>
</html>