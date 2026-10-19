<?php
session_start();

/* =========================
   LOGOUT
========================= */

if (isset($_GET['logout'])) {

    session_unset();
    session_destroy();

    header("Location: login.php");
    exit;
}


/* =========================
   KONEKSI DATABASE
========================= */

include "koneksi.php";


/* =========================
   HITUNG DATA
========================= */

$query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
$total_siswa = mysqli_num_rows($query_siswa);

$query_guru = mysqli_query($koneksi, "SELECT * FROM guru");
$total_guru = mysqli_num_rows($query_guru);

$query_mapel = mysqli_query($koneksi, "SELECT * FROM mapel");
$total_mapel = mysqli_num_rows($query_mapel);

$query_nilai = mysqli_query($koneksi, "SELECT * FROM nilai");
$total_nilai = mysqli_num_rows($query_nilai);

?>

<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">

<title>
    Home - Sistem Informasi Sekolah
</title>


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
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">


<style>

/* =========================
   BODY
========================= */

* {
    box-sizing: border-box;
}

body {

    margin: 0;

    background: #f1f5f9;

    font-family: 'Poppins', sans-serif;

    color: #1e293b;

}


/* =========================
   NAVBAR
========================= */

.navbar-custom {

    background: #0f172a;

    padding: 14px 0;

    box-shadow:
        0 4px 15px
        rgba(15, 23, 42, .15);

}

.navbar-brand {

    color: white !important;

    font-size: 22px;

    font-weight: 800;

}

.navbar-brand i {

    color: #60a5fa;

}


.nav-link {

    color: #cbd5e1 !important;

    font-weight: 500;

    padding: 9px 15px !important;

    border-radius: 8px;

    margin-left: 5px;

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
   LOGOUT
========================= */

.btn-logout {

    border-radius: 8px;

    font-weight: 500;

    padding: 8px 15px;

}


/* =========================
   HERO
========================= */

.hero {

    background:
        linear-gradient(
            120deg,
            #172554,
            #2563eb
        );

    border-radius: 20px;

    padding: 40px 45px;

    color: white;

    box-shadow:
        0 15px 35px
        rgba(37, 99, 235, .20);

    position: relative;

    overflow: hidden;

}


.hero h1 {

    font-size: 36px;

    font-weight: 800;

    margin-bottom: 10px;

}


.hero p {

    color: #dbeafe;

    margin-bottom: 0;

}


.hero-icon {

    font-size: 80px;

}


/* =========================
   STAT CARD
========================= */

.stat-card {

    background: white;

    border: none;

    border-radius: 18px;

    padding: 24px;

    box-shadow:
        0 8px 25px
        rgba(15, 23, 42, .08);

    transition: .25s;

}


.stat-card:hover {

    transform: translateY(-5px);

    box-shadow:
        0 15px 30px
        rgba(15, 23, 42, .12);

}


.stat-icon {

    width: 55px;

    height: 55px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 14px;

    font-size: 25px;

}


.icon-blue {

    background: #dbeafe;

    color: #2563eb;

}


.icon-green {

    background: #dcfce7;

    color: #16a34a;

}


.icon-purple {

    background: #ede9fe;

    color: #7c3aed;

}


.icon-orange {

    background: #ffedd5;

    color: #ea580c;

}


.stat-number {

    font-size: 28px;

    font-weight: 800;

    margin-top: 8px;

}


.stat-title {

    color: #64748b;

    font-size: 14px;

}


/* =========================
   MENU CARD
========================= */

.menu-card {

    background: white;

    border-radius: 18px;

    padding: 25px;

    border: none;

    box-shadow:
        0 8px 25px
        rgba(15, 23, 42, .08);

    height: 100%;

    transition: .25s;

}


.menu-card:hover {

    transform: translateY(-5px);

}


.menu-icon {

    width: 60px;

    height: 60px;

    border-radius: 15px;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 28px;

    margin-bottom: 18px;

}


.menu-card h5 {

    font-weight: 700;

}


.menu-card p {

    color: #64748b;

    font-size: 14px;

}


.menu-card .btn {

    border-radius: 8px;

}


.section-title {

    font-weight: 700;

}


.section-subtitle {

    color: #64748b;

    font-size: 14px;

}


footer {

    color: #64748b;

    font-size: 13px;

    padding: 25px 0;

}

</style>

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar navbar-expand-lg navbar-custom">

<div class="container">


    <!-- LOGO -->

    <a
        class="navbar-brand"
        href="index.php">

        <i class="bi bi-mortarboard-fill"></i>

        Sistem Informasi Sekolah

    </a>


    <!-- TOGGLE MOBILE -->

    <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarMenu">

        <i class="bi bi-list text-white"></i>

    </button>


    <!-- MENU -->

    <div
        class="collapse navbar-collapse"
        id="navbarMenu">


        <ul class="navbar-nav ms-auto">


            <!-- HOME -->

            <li class="nav-item">

                <a
                    href="index.php"
                    class="nav-link active">

                    <i class="bi bi-house-fill"></i>

                    Home

                </a>

            </li>


            <!-- SISWA -->

            <li class="nav-item">

                <a
                    href="siswa/index.php"
                    class="nav-link">

                    <i class="bi bi-people-fill"></i>

                    Siswa

                </a>

            </li>


            <!-- GURU -->

            <li class="nav-item">

                <a
                    href="guru/index.php"
                    class="nav-link">

                    <i class="bi bi-person-workspace"></i>

                    Guru

                </a>

            </li>


            <!-- MAPEL -->

            <li class="nav-item">

                <a
                    href="mapel/index.php"
                    class="nav-link">

                    <i class="bi bi-book-fill"></i>

                    Mapel

                </a>

            </li>


            <!-- NILAI -->

            <li class="nav-item">

                <a
                    href="nilai/index.php"
                    class="nav-link">

                    <i class="bi bi-bar-chart-fill"></i>

                    Nilai

                </a>

            </li>


            <!-- LOGOUT -->

            <li class="nav-item ms-lg-2 mt-2 mt-lg-0">

                <a
                    href="index.php?logout=1"
                    class="btn btn-danger btn-logout"

                    onclick="
                    return confirm(
                        'Yakin ingin keluar dari sistem?'
                    );
                    ">

                    <i class="bi bi-box-arrow-right"></i>

                    Logout

                </a>

            </li>


        </ul>

    </div>

</div>

</nav>



<!-- =========================
     CONTENT
========================= -->

<div class="container py-5">


    <!-- HERO -->

    <div class="hero mb-4">

        <div class="row align-items-center">


            <div class="col-md-9">

                <h1>

                    Selamat Datang 👋

                </h1>

                <p>

                    Sistem Informasi Sekolah untuk
                    mengelola data siswa, guru,
                    mata pelajaran, dan nilai.

                </p>

            </div>


            <div
                class="col-md-3
                       text-center
                       d-none
                       d-md-block">

                <i
                    class="bi bi-mortarboard-fill hero-icon">
                </i>

            </div>


        </div>

    </div>



    <!-- =========================
         STATISTIK
    ========================= -->

    <div class="row g-4 mb-5">


        <!-- SISWA -->

        <div class="col-md-6 col-lg-3">

            <div class="stat-card">

                <div
                    class="stat-icon icon-blue">

                    <i class="bi bi-people-fill"></i>

                </div>

                <div class="stat-number">

                    <?= $total_siswa; ?>

                </div>

                <div class="stat-title">

                    Total Siswa

                </div>

            </div>

        </div>


        <!-- GURU -->

        <div class="col-md-6 col-lg-3">

            <div class="stat-card">

                <div
                    class="stat-icon icon-green">

                    <i class="bi bi-person-workspace"></i>

                </div>

                <div class="stat-number">

                    <?= $total_guru; ?>

                </div>

                <div class="stat-title">

                    Total Guru

                </div>

            </div>

        </div>


        <!-- MAPEL -->

        <div class="col-md-6 col-lg-3">

            <div class="stat-card">

                <div
                    class="stat-icon icon-purple">

                    <i class="bi bi-book-fill"></i>

                </div>

                <div class="stat-number">

                    <?= $total_mapel; ?>

                </div>

                <div class="stat-title">

                    Mata Pelajaran

                </div>

            </div>

        </div>


        <!-- NILAI -->

        <div class="col-md-6 col-lg-3">

            <div class="stat-card">

                <div
                    class="stat-icon icon-orange">

                    <i class="bi bi-bar-chart-fill"></i>

                </div>

                <div class="stat-number">

                    <?= $total_nilai; ?>

                </div>

                <div class="stat-title">

                    Data Nilai

                </div>

            </div>

        </div>


    </div>



    <!-- =========================
         MENU UTAMA
    ========================= -->

    <div class="mb-4">

        <h3 class="section-title">

            <i class="bi bi-grid-fill"></i>

            Menu Utama

        </h3>

        <div class="section-subtitle">

            Pilih menu yang ingin kamu kelola.

        </div>

    </div>


    <div class="row g-4">


        <!-- SISWA -->

        <div class="col-md-6 col-lg-3">

            <div class="menu-card">

                <div
                    class="menu-icon icon-blue">

                    <i class="bi bi-people-fill"></i>

                </div>

                <h5>

                    Data Siswa

                </h5>

                <p>

                    Kelola data siswa yang
                    terdaftar di sekolah.

                </p>

                <a
                    href="siswa/index.php"
                    class="btn btn-primary">

                    Lihat Siswa

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>


        <!-- GURU -->

        <div class="col-md-6 col-lg-3">

            <div class="menu-card">

                <div
                    class="menu-icon icon-green">

                    <i class="bi bi-person-workspace"></i>

                </div>

                <h5>

                    Data Guru

                </h5>

                <p>

                    Kelola data guru yang
                    mengajar di sekolah.

                </p>

                <a
                    href="guru/index.php"
                    class="btn btn-success">

                    Lihat Guru

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>


        <!-- MAPEL -->

        <div class="col-md-6 col-lg-3">

            <div class="menu-card">

                <div
                    class="menu-icon icon-purple">

                    <i class="bi bi-book-fill"></i>

                </div>

                <h5>

                    Mata Pelajaran

                </h5>

                <p>

                    Kelola daftar mata
                    pelajaran sekolah.

                </p>

                <a
                    href="mapel/index.php"
                    class="btn btn-primary">

                    Lihat Mapel

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>


        <!-- NILAI -->

        <div class="col-md-6 col-lg-3">

            <div class="menu-card">

                <div
                    class="menu-icon icon-orange">

                    <i class="bi bi-bar-chart-fill"></i>

                </div>

                <h5>

                    Data Nilai

                </h5>

                <p>

                    Kelola nilai siswa
                    berdasarkan mata pelajaran.

                </p>

                <a
                    href="nilai/index.php"
                    class="btn btn-warning">

                    Lihat Nilai

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>


    </div>



    <!-- FOOTER -->

    <footer class="text-center mt-5">

        © <?= date('Y'); ?>

        Sistem Informasi Sekolah

    </footer>


</div>



<!-- BOOTSTRAP JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>