<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Sistem UPT PTPH</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{

    min-height:100vh;

    background:linear-gradient(135deg,#0d6efd,#0b5ed7,#0a58ca);

    display:flex;

    justify-content:center;

    align-items:center;

    overflow:hidden;

}

.login-container{

    width:1100px;

    max-width:95%;

    background:white;

    border-radius:25px;

    overflow:hidden;

    display:flex;

    box-shadow:0 25px 50px rgba(0,0,0,.25);

}

.left-panel{

    width:50%;

    background:linear-gradient(180deg,#0d6efd,#0a58ca);

    color:white;

    padding:60px;

    display:flex;

    flex-direction:column;

    justify-content:center;

    align-items:center;

    text-align:center;

}

.left-panel img{

    width:140px;

    margin-bottom:30px;

}

.left-panel h2{

    font-size:33px;

    font-weight:700;

    margin-bottom:15px;

}

.left-panel h5{

    font-weight:400;

    margin-bottom:30px;

}

.left-panel p{

    opacity:.9;

    line-height:30px;

    font-size:16px;

}

.right-panel{

    width:50%;

    background:white;

    padding:60px;

    display:flex;

    justify-content:center;

    align-items:center;

}

.login-card{

    width:100%;

}

.login-title{

    font-size:34px;

    font-weight:700;

    color:#0d6efd;

    margin-bottom:5px;

}

.login-subtitle{

    color:#6c757d;

    margin-bottom:35px;

}

.form-label{

    font-weight:600;

}

.input-group-text{

    background:white;

}

.form-control{

    height:48px;

}

.form-control:focus{

    border-color:#0d6efd;

    box-shadow:0 0 0 .15rem rgba(13,110,253,.25);

}

.btn-login{

    width:100%;

    height:50px;

    border-radius:10px;

    font-weight:600;

    font-size:17px;

    transition:.3s;

}

.btn-login:hover{

    transform:translateY(-2px);

    box-shadow:0 10px 20px rgba(13,110,253,.35);

}

.info-login{

    margin-top:18px;

    background:#eef5ff;

    border-radius:10px;

    padding:12px;

    font-size:14px;

}

.footer-text{

    margin-top:25px;

    text-align:center;

    color:#999;

    font-size:13px;

}

.alert{

    border-radius:10px;

}

@media(max-width:991px){

    .login-container{

        flex-direction:column;

    }

    .left-panel{

        width:100%;

        padding:40px;

    }

    .right-panel{

        width:100%;

        padding:40px;

    }

}

</style>

</head>

<body>

<div class="login-container">

    <div class="left-panel">

        <img src="{{ asset('assets/images/logo_dinas.png') }}" alt="Logo Dinas">

        <h2>
            Sistem Pengelolaan Data
        </h2>

        <p>

            SERANGAN ORGANISME PENGGANGGU TANAMAN 
            TANAMAN PANGAN DAN DATA DAMPAK PERUBAHAN 
            IKLIM 

            <br><br>

            UPT Perlindungan Tanaman Pangan
            dan Hortikultura
            Provinsi Kalimantan Barat.

        </p>

    </div>

    <div class="right-panel">

        <div class="login-card">
            @if(session('error'))
    <div class="alert alert-danger">

        <i class="bi bi-exclamation-triangle-fill"></i>

        {{ session('error') }}

    </div>
@endif

<h2 class="login-title">

    Selamat Datang

</h2>

<p class="login-subtitle">

    Silakan login untuk melanjutkan ke sistem.

</p>

<form action="/proses-login"
      method="POST"
      id="loginForm">

    @csrf

    <div class="mb-3">

        <label class="form-label">

            Username

        </label>

        <div class="input-group">

            <span class="input-group-text">

                <i class="bi bi-person-fill"></i>

            </span>

            <input

                type="text"

                name="username"

                class="form-control @error('username') is-invalid @enderror"

                value="{{ old('username') }}"

                autocomplete="off"

                required>

        </div>

        @error('username')

            <div class="text-danger mt-1">

                {{ $message }}

            </div>

        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">

            Password

        </label>

        <div class="input-group">

            <span class="input-group-text">

                <i class="bi bi-lock-fill"></i>

            </span>

            <input

                type="password"

                name="password"

                id="password"

                maxlength="8"

                minlength="8"

                class="form-control @error('password') is-invalid @enderror"

                required>

            <button

                class="btn btn-outline-secondary"

                type="button"

                onclick="togglePassword()">

                <i id="eyeIcon"
                   class="bi bi-eye-fill"></i>

            </button>

        </div>

        @error('password')

            <div class="text-danger mt-1">

                {{ $message }}

            </div>

        @enderror

    </div>

    <div class="info-login">

        <i class="bi bi-info-circle-fill text-primary"></i>

        <strong>Informasi Login</strong>

        <hr class="my-2">

        <div>

            ✔ Username bersifat <strong>Case Sensitive</strong>

        </div>

        <div>

            ✔ Password harus tepat <strong>8 karakter</strong>

        </div>

    </div>

    <button

        id="btnLogin"

        type="submit"

        class="btn btn-primary btn-login mt-4">

        <span id="btnText">

            <i class="bi bi-box-arrow-in-right"></i>

            Login

        </span>

    </button>

</form>

<div class="footer-text">

    © 2026

    <br>

    UPT Perlindungan Tanaman Pangan dan Hortikultura

    <br>

    Provinsi Kalimantan Barat

</div>

</div>

</div>

</div>

<script>

function togglePassword() {

    const password = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");

    if (password.type === "password") {
        password.type = "text";
        eyeIcon.classList.remove("bi-eye-fill");
        eyeIcon.classList.add("bi-eye-slash-fill");
    } else {
        password.type = "password";
        eyeIcon.classList.remove("bi-eye-slash-fill");
        eyeIcon.classList.add("bi-eye-fill");
    }

}

document.getElementById("loginForm").addEventListener("submit", function () {

    document.getElementById("btnLogin").disabled = true;

    document.getElementById("btnText").innerHTML =
        '<span class="spinner-border spinner-border-sm me-2"></span>Loading...';

});

</script>
</body>

</html>