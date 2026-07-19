<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard LPHP</title>
</head>
<body>

<h1>Dashboard LPHP</h1>

<p>Login sebagai : {{ session('username') }}</p>
<p>Role : {{ session('role') }}</p>

<hr>

<h3>Menu LPHP</h3>

<ul>
    <li>
        <a href="{{ route('pengiriman-laporan.index') }}">
            Daftar Pengiriman Laporan
        </a>
    </li>
</ul>

<br>

<a href="{{ url('/logout') }}">Logout</a>

</body>
</html>