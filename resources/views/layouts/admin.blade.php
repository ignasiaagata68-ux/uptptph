<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>

<div class="wrapper">

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <div class="logo">

            <img src="{{ asset('images/logo.png') }}" alt="Logo">

            <h5>UPT PTPH</h5>

            <small>Provinsi Kalimantan Barat</small>

        </div>

        <div class="menu-title">
            MAIN MENU
        </div>

        <ul>

            <li>

                <a href="/dashboard-pengelola">

                    <i class="bi bi-speedometer2"></i>

                    Dashboard

                </a>

            </li>

            <li>

                <a href="/data-opt">

                    <i class="bi bi-bug-fill"></i>

                    Data OPT

                </a>

            </li>

            <li>

                <a href="/data-dpi">

                    <i class="bi bi-cloud-rain-heavy-fill"></i>

                    Data DPI

                </a>

            </li>

            <li>

                <a href="/master-data">

                    <i class="bi bi-database-fill"></i>

                    Master Data

                </a>

            </li>

            <li>

                <a href="/laporan">

                    <i class="bi bi-file-earmark-text-fill"></i>

                    Laporan

                </a>

            </li>

            <li>

                <a href="/manajemen-sistem">

                    <i class="bi bi-gear-fill"></i>

                    Manajemen Sistem

                </a>

            </li>

        </ul>

        <div class="sidebar-footer">

            <div class="user-box">

                <i class="bi bi-person-circle"></i>

                <div>

                    <b>{{ session('username') }}</b>

                    <br>

                    <small>{{ session('role') }}</small>

                </div>

            </div>

            <a href="/logout" class="logout-btn">

                <i class="bi bi-box-arrow-right"></i>

                Logout

            </a>

        </div>

    </aside>

    <!-- ================= CONTENT ================= -->

    <main class="content">

        <!-- TOPBAR -->

        <div class="topbar">

            <div>

                <h4>@yield('title')</h4>

            </div>

            <div class="top-right">

                <i class="bi bi-calendar-event"></i>

                {{ date('d M Y') }}

                &nbsp;&nbsp;

                <i class="bi bi-person-circle"></i>

                {{ session('username') }}

            </div>

        </div>

        <!-- PAGE -->

        <div class="page-content">

            @yield('content')

        </div>

    </main>

</div>

</body>

</html>