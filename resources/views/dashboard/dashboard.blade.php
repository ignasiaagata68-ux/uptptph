<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <title>Dashboard Pengelola Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        body{
            background:#f5f6fa;
        }

        .sidebar{

            width:260px;
            height:100vh;

            position:fixed;
            left:0;
            top:0;

            background:#0d6efd;

            color:white;

        }

        .sidebar h4{

            padding:20px;
            text-align:center;
            border-bottom:1px solid rgba(255,255,255,.2);

        }

        .sidebar a{

            color:white;

            display:block;

            padding:12px 20px;

            text-decoration:none;

        }

        .sidebar a:hover{

            background:rgba(255,255,255,.15);

        }

        .content{

            margin-left:260px;

            padding:25px;

        }

        .card-menu{

            transition:.3s;

            cursor:pointer;

        }

        .card-menu:hover{

            transform:translateY(-5px);

        }

    </style>

</head>

<body>

<div class="sidebar">

    <h4>Dinas Pertanian</h4>

    <a href="/dashboard-pengelola">
        <i class="bi bi-house"></i>
        Dashboard
    </a>

    <a href="/logout">
        <i class="bi bi-box-arrow-right"></i>
        Logout
    </a>

</div>

<div class="content">

    @yield('content')

</div>

</body>
</html>