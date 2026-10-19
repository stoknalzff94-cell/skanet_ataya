<?php
include "../koneksi.php";

/* =========================
   DATA SISWA
========================= */

$query = mysqli_query($koneksi, "SELECT * FROM siswa");


/* =========================
   STATISTIK
========================= */

$total_siswa = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM siswa")
)['total'];

$total_guru = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM guru")
)['total'];

$total_mapel = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM mapel")
)['total'];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Data Siswa</title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Google Font -->

    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap"
        rel="stylesheet">


    <style>

        * {
            box-sizing: border-box;
        }

        body {

            margin: 0;

            background: #f1f5f9;

            font-family: 'Fredoka', sans-serif;

            color: #1e293b;

        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar-custom {

            background: #0f172a;

            min-height: 78px;

            box-shadow:
                0 4px 15px rgba(15, 23, 42, .15);

        }


        .navbar-brand {

            color: white !important;

            font-size: 24px;

            font-weight: 700;

        }


        .navbar-brand i {

            margin-right: 10px;

        }


        .nav-link {

            color: #cbd5e1 !important;

            padding: 10px 16px !important;

            margin-left: 4px;

            border-radius: 8px;

            transition: .2s;

        }


        .nav-link:hover {

            color: white !important;

            background: #1e293b;

        }


        .nav-link.active {

            background: #2563eb;

            color: white !important;

        }


        /* =========================
           CONTAINER
        ========================= */

        .main-container {

            max-width: 1260px;

            margin: 35px auto;

            padding: 0 15px;

        }


        /* =========================
           HERO
        ========================= */

        .hero {

            background:
                linear-gradient(
                    135deg,
                    #172554,
                    #2563eb
                );

            color: white;

            border-radius: 20px;

            padding: 38px 30px;

            min-height: 160px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            box-shadow:
                0 15px 35px rgba(37, 99, 235, .20);

        }


        .hero h1 {

            font-size: 42px;

            font-weight: 700;

            margin-bottom: 8px;

        }


        .hero p {

            margin: 0;

            color: #dbeafe;

            font-size: 16px;

        }


        .hero-icon {

            width: 70px;

            height: 70px;

            background: rgba(255,255,255,.9);

            color: #2563eb;

            border-radius: 12px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 40px;

        }


        /* =========================
           STATISTIK
        ========================= */

        .stat-card {

            background: white;

            border-radius: 16px;

            padding: 20px;

            height: 90px;

            display: flex;

            align-items: center;

            gap: 18px;

            box-shadow:
                0 8px 25px rgba(15,23,42,.08);

        }


        .stat-icon {

            width: 50px;

            height: 50px;

            border-radius: 12px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 24px;

        }


        .stat-blue {

            background: #dbeafe;

            color: #2563eb;

        }


        .stat-green {

            background: #dcfce7;

            color: #16a34a;

        }


        .stat-purple {

            background: #ede9fe;

            color: #7c3aed;

        }


        .stat-number {

            font-size: 26px;

            font-weight: 700;

            line-height: 1;

        }


        .stat-title {

            color: #64748b;

            font-size: 14px;

            margin-top: 5px;

        }


        /* =========================
           DATA CARD
        ========================= */

        .data-card {

            background: white;

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 8px 25px rgba(15,23,42,.08);

        }


        .data-header {

            padding: 22px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            border-bottom: 1px solid #e2e8f0;

        }


        .data-title {

            font-size: 25px;

            font-weight: 600;

            margin: 0;

        }


        .data-subtitle {

            color: #64748b;

            margin-top: 5px;

            font-size: 14px;

        }


        /* =========================
           TAMBAH
        ========================= */

        .btn-tambah {

            background: #2563eb;

            color: white;

            border: none;

            padding: 11px 18px;

            border-radius: 9px;

        }


        .btn-tambah:hover {

            background: #1d4ed8;

            color: white;

        }


        /* =========================
           TABLE
        ========================= */

        .table {

            margin-bottom: 0;

        }


        .table thead th {

            background: #f8fafc;

            color: #475569;

            border-bottom: 1px solid #cbd5e1;

            padding: 16px;

            font-size: 14px;

            text-transform: uppercase;

        }


        .table tbody td {

            padding: 16px;

            border-color: #e2e8f0;

            vertical-align: middle;

        }


        .table tbody tr:hover {

            background: #f8fafc;

        }


        /* =========================
           NIS
        ========================= */

        .nis-badge {

            background: #f1f5f9;

            color: #334155;

            padding: 7px 10px;

            border-radius: 7px;

            font-weight: 500;

        }


        /* =========================
           PROFILE SISWA
        ========================= */

        .siswa-profile {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .siswa-icon {

            width: 42px;

            height: 42px;

            border-radius: 50%;

            background: #dbeafe;

            color: #2563eb;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 19px;

        }


        .siswa-name {

            font-weight: 600;

            color: #111827;

        }


        /* =========================
           ALAMAT
        ========================= */

        .alamat {

            color: #64748b;

        }


        /* =========================
           BUTTON AKSI
        ========================= */

        .btn-edit {

            background: #f59e0b;

            color: white;

            border: none;

            border-radius: 7px;

        }


        .btn-edit:hover {

            background: #d97706;

            color: white;

        }


        .btn-hapus {

            background: #ef4444;

            color: white;

            border: none;

            border-radius: 7px;

        }


        .btn-hapus:hover {

            background: #dc2626;

            color: white;

        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .hero {

                padding: 25px;

            }

            .hero h1 {

                font-size: 30px;

            }

            .hero-icon {

                display: none;

            }

            .data-header {

                flex-direction: column;

                align-items: flex-start;

                gap: 15px;

            }

            .btn-tambah {

                width: 100%;

            }

        }

    </style>

</head>


<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="navbar navbar-expand-lg navbar-custom">

    <div class="container">


        <!-- LOGO -->

        <a
            href="../index.php"
            class="navbar-brand">

            <i class="bi bi-mortarboard-fill"></i>

            Sistem Informasi Sekolah

        </a>


        <!-- TOGGLE -->

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- MENU -->

        <div
            class="collapse navbar-collapse"
            id="navbarMenu">

            <ul class="navbar-nav ms-auto">


                <li class="nav-item">

                    <a
                        href="../index.php"
                        class="nav-link">

                        <i class="bi bi-house-fill"></i>

                        Home

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="index.php"
                        class="nav-link active">

                        <i class="bi bi-people-fill"></i>

                        Siswa

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="../guru/index.php"
                        class="nav-link">

                        <i class="bi bi-person-workspace"></i>

                        Guru

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="../mapel/index.php"
                        class="nav-link">

                        <i class="bi bi-book-fill"></i>

                        Mapel

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        href="../nilai/index.php"
                        class="nav-link">

                        <i class="bi bi-bar-chart-fill"></i>

                        Nilai

                    </a>

                </li>


            </ul>

        </div>

    </div>

</nav>



<!-- =====================================================
     MAIN
===================================================== -->

<div class="main-container">


    <!-- ================= HERO ================= -->

    <div class="hero mb-4">


        <div>

            <h1>

                <i class="bi bi-person-badge"></i>

                Data Siswa

            </h1>


            <p>

                Kelola data siswa yang terdaftar di sekolah.

            </p>

        </div>


        <div class="hero-icon">

            <i class="bi bi-person-badge"></i>

        </div>


    </div>



    <!-- ================= STATISTIK ================= -->

    <div class="row g-3 mb-4">


        <!-- SISWA -->

        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-icon stat-blue">

                    <i class="bi bi-people-fill"></i>

                </div>


                <div>

                    <div class="stat-number">

                        <?= $total_siswa; ?>

                    </div>

                    <div class="stat-title">

                        Total Siswa

                    </div>

                </div>

            </div>

        </div>



        <!-- GURU -->

        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-icon stat-green">

                    <i class="bi bi-person-badge-fill"></i>

                </div>


                <div>

                    <div class="stat-number">

                        <?= $total_guru; ?>

                    </div>

                    <div class="stat-title">

                        Total Guru

                    </div>

                </div>

            </div>

        </div>



        <!-- MAPEL -->

        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-icon stat-purple">

                    <i class="bi bi-book-fill"></i>

                </div>


                <div>

                    <div class="stat-number">

                        <?= $total_mapel; ?>

                    </div>

                    <div class="stat-title">

                        Mata Pelajaran

                    </div>

                </div>

            </div>

        </div>


    </div>



    <!-- ================= DAFTAR SISWA ================= -->

    <div class="data-card">


        <!-- HEADER -->

        <div class="data-header">


            <div>

                <h2 class="data-title">

                    <i class="bi bi-people-fill"></i>

                    Daftar Siswa

                </h2>


                <div class="data-subtitle">

                    Data siswa yang terdaftar

                </div>

            </div>


            <a
                href="tambah.php"
                class="btn btn-tambah">

                <i class="bi bi-plus-lg"></i>

                Tambah Siswa

            </a>


        </div>



        <!-- TABLE -->

        <div class="table-responsive">


            <table class="table">


                <thead>

                    <tr>

                        <th width="70">
                            No
                        </th>

                        <th width="150">
                            NIS
                        </th>

                        <th>
                            Nama Siswa
                        </th>

                        <th>
                            Alamat
                        </th>

                        <th width="180"
                            class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>


                <tbody>


                <?php

                $no = 1;


                if (mysqli_num_rows($query) > 0) {


                    while ($data = mysqli_fetch_assoc($query)) {

                ?>


                    <tr>


                        <!-- NO -->

                        <td>

                            <?= $no++; ?>

                        </td>


                        <!-- NIS -->

                        <td>

                            <span class="nis-badge">

                                <?= htmlspecialchars($data['nis']); ?>

                            </span>

                        </td>


                        <!-- NAMA -->

                        <td>

                            <div class="siswa-profile">


                                <div class="siswa-icon">

                                    <i class="bi bi-person-fill"></i>

                                </div>


                                <div class="siswa-name">

                                    <?= htmlspecialchars($data['nama']); ?>

                                </div>


                            </div>

                        </td>


                        <!-- ALAMAT -->

                        <td>

                            <div class="alamat">

                                <i class="bi bi-geo-alt"></i>

                                <?= htmlspecialchars($data['alamat']); ?>

                            </div>

                        </td>


                        <!-- AKSI -->

                        <td class="text-center">


                            <a
                                href="edit.php?nis=<?= urlencode($data['nis']); ?>"
                                class="btn btn-edit btn-sm">

                                <i class="bi bi-pencil-fill"></i>

                                Edit

                            </a>


                            <a
                                href="hapus.php?nis=<?= urlencode($data['nis']); ?>"
                                class="btn btn-hapus btn-sm"

                                onclick="return confirm(
                                    'Yakin ingin menghapus data siswa ini?'
                                );">

                                <i class="bi bi-trash-fill"></i>

                                Hapus

                            </a>


                        </td>


                    </tr>


                <?php

                    }


                } else {

                ?>


                    <tr>

                        <td
                            colspan="5"
                            class="text-center py-5">

                            <i
                                class="bi bi-inbox"
                                style="
                                    font-size:45px;
                                    color:#94a3b8;
                                ">
                            </i>

                            <br>

                            <strong>

                                Belum ada data siswa

                            </strong>

                            <br>

                            <small class="text-secondary">

                                Silakan tambahkan data siswa.

                            </small>

                        </td>

                    </tr>


                <?php

                }

                ?>


                </tbody>

            </table>

        </div>


    </div>


</div>



<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>