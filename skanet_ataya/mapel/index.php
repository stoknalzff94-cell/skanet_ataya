<?php
include "../koneksi.php";

/* =========================
   DATA MAPEL
========================= */

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM mapel ORDER BY id_mapel DESC"
);


/* =========================
   STATISTIK
========================= */

$total_mapel = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM mapel")
);

$total_guru = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM guru")
);

$total_siswa = mysqli_num_rows(
    mysqli_query($koneksi, "SELECT * FROM siswa")
);
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">

<title>Data Mata Pelajaran</title>


<!-- Bootstrap -->

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">


<!-- Bootstrap Icons -->

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<style>

/* =========================
   GLOBAL
========================= */

body {
    margin: 0;
    background: #f1f5f9;
    font-family: Arial, sans-serif;
    color: #1e293b;
}


/* =========================
   NAVBAR
========================= */

.navbar-custom {
    background: #0f172a;
    box-shadow: 0 4px 20px rgba(15, 23, 42, .25);
}

.navbar-brand {
    font-weight: 800;
    font-size: 21px;
    color: white !important;
}

.navbar-custom .nav-link {
    color: #cbd5e1 !important;
    font-weight: 500;
    padding: 9px 14px !important;
    margin-left: 4px;
    border-radius: 8px;
    transition: .25s;
}

.navbar-custom .nav-link:hover {
    background: #1e293b;
    color: white !important;
}

.navbar-custom .nav-link.active {
    background: #2563eb;
    color: white !important;
}


/* =========================
   HERO
========================= */

.hero {
    margin-top: 35px;
    padding: 30px;
    border-radius: 20px;

    background:
        linear-gradient(
            135deg,
            #0f172a,
            #1e3a8a,
            #2563eb
        );

    color: white;

    box-shadow:
        0 15px 35px rgba(37, 99, 235, .25);
}

.hero h1 {
    font-weight: 800;
    margin-bottom: 8px;
}

.hero p {
    color: #dbeafe;
    margin-bottom: 0;
}

.hero-icon {
    font-size: 70px;
    opacity: .9;
}


/* =========================
   STAT CARD
========================= */

.stat-card {
    border: none;
    border-radius: 16px;
    background: white;

    box-shadow:
        0 8px 25px rgba(15, 23, 42, .08);

    transition: .25s;
}

.stat-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 15px 30px rgba(15, 23, 42, .13);
}

.stat-icon {
    width: 50px;
    height: 50px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    font-size: 23px;
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

.stat-number {
    font-size: 27px;
    font-weight: 800;
}

.stat-title {
    color: #64748b;
    font-size: 14px;
}


/* =========================
   TABLE CARD
========================= */

.table-card {
    border: none;
    border-radius: 18px;
    overflow: hidden;

    box-shadow:
        0 8px 25px rgba(15, 23, 42, .08);
}

.table-header {
    background: white;
    padding: 20px;
    border-bottom: 1px solid #e2e8f0;
}

.table-header h4 {
    font-weight: 700;
    margin: 0;
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
    border-bottom: 2px solid #e2e8f0;

    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .5px;

    padding: 15px;
}

.table tbody td {
    padding: 15px;
    vertical-align: middle;
    border-color: #f1f5f9;
}

.table tbody tr {
    transition: .2s;
}

.table tbody tr:hover {
    background: #f8fafc;
}


/* =========================
   MAPEL ICON
========================= */

.mapel-icon {
    width: 42px;
    height: 42px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    background: #dbeafe;
    color: #2563eb;

    border-radius: 10px;

    margin-right: 10px;

    font-size: 18px;
}


/* =========================
   BUTTON
========================= */

.btn-tambah {
    background: #2563eb;
    color: white;
    border: none;

    border-radius: 9px;

    padding: 9px 15px;
}

.btn-tambah:hover {
    background: #1d4ed8;
    color: white;
}

.btn-edit {
    background: #f59e0b;
    color: white;
    border: none;
}

.btn-edit:hover {
    background: #d97706;
    color: white;
}

.btn-hapus {
    background: #ef4444;
    color: white;
    border: none;
}

.btn-hapus:hover {
    background: #dc2626;
    color: white;
}


/* =========================
   FOOTER
========================= */

.footer {
    text-align: center;
    color: #94a3b8;
    font-size: 13px;
    margin-top: 35px;
    margin-bottom: 25px;
}

</style>

</head>


<body>


<!-- ==================================================
     NAVBAR
================================================== -->

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

<div class="container">


<a
class="navbar-brand"
href="../index.php">

<i class="bi bi-mortarboard-fill"></i>

&nbsp; Sistem Informasi Sekolah

</a>


<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarMenu">

<span class="navbar-toggler-icon"></span>

</button>


<div
class="collapse navbar-collapse"
id="navbarMenu">


<ul class="navbar-nav ms-auto">


<li class="nav-item">

<a
class="nav-link"
href="../index.php">

<i class="bi bi-house-fill"></i>

Home

</a>

</li>


<li class="nav-item">

<a
class="nav-link"
href="../siswa/index.php">

<i class="bi bi-people-fill"></i>

Siswa

</a>

</li>


<li class="nav-item">

<a
class="nav-link"
href="../guru/index.php">

<i class="bi bi-person-workspace"></i>

Guru

</a>

</li>


<li class="nav-item">

<a
class="nav-link active"
href="index.php">

<i class="bi bi-book-fill"></i>

Mapel

</a>

</li>


<li class="nav-item">

<a
class="nav-link"
href="../nilai/index.php">

<i class="bi bi-bar-chart-fill"></i>

Nilai

</a>

</li>


</ul>

</div>

</div>

</nav>



<!-- ==================================================
     CONTENT
================================================== -->

<div class="container">


<!-- =========================
     HERO
========================= -->

<div class="hero">

<div class="row align-items-center">

<div class="col-md-8">

<h1>

<i class="bi bi-book-half"></i>

Data Mata Pelajaran

</h1>

<p>

Kelola daftar mata pelajaran dan guru pengampu.

</p>

</div>


<div class="col-md-4 text-md-end text-center">

<i class="bi bi-journal-bookmark-fill hero-icon"></i>

</div>

</div>

</div>



<!-- =========================
     STATISTICS
========================= -->

<div class="row g-3 mt-1">


<!-- TOTAL MAPEL -->

<div class="col-md-4">

<div class="card stat-card">

<div class="card-body">


<div class="d-flex align-items-center gap-3">


<div class="stat-icon icon-blue">

<i class="bi bi-book-fill"></i>

</div>


<div>

<div class="stat-number">

<?= $total_mapel; ?>

</div>

<div class="stat-title">

Total Mata Pelajaran

</div>

</div>


</div>

</div>

</div>

</div>



<!-- TOTAL GURU -->

<div class="col-md-4">

<div class="card stat-card">

<div class="card-body">


<div class="d-flex align-items-center gap-3">


<div class="stat-icon icon-purple">

<i class="bi bi-person-workspace"></i>

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

</div>

</div>



<!-- TOTAL SISWA -->

<div class="col-md-4">

<div class="card stat-card">

<div class="card-body">


<div class="d-flex align-items-center gap-3">


<div class="stat-icon icon-green">

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

</div>

</div>


</div>



<!-- =========================
     TABLE
========================= -->

<div class="card table-card mt-4">


<div class="table-header">


<div class="d-flex
            justify-content-between
            align-items-center
            flex-wrap
            gap-2">


<div>

<h4>

<i class="bi bi-table"></i>

Daftar Mata Pelajaran

</h4>

<small class="text-secondary">

Data mata pelajaran dan guru pengampu

</small>

</div>


<a
href="tambah.php"
class="btn btn-tambah">

<i class="bi bi-plus-lg"></i>

Tambah Mapel

</a>


</div>

</div>



<div class="table-responsive">


<table class="table table-hover">


<thead>

<tr>

<th width="80">
No
</th>

<th>
Nama Mata Pelajaran
</th>

<th>
Guru Pengampu
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


<!-- MAPEL -->

<td>

<div class="d-flex align-items-center">


<span class="mapel-icon">

<i class="bi bi-book-fill"></i>

</span>


<strong>

<?= $data['nama_mapel']; ?>

</strong>


</div>

</td>


<!-- GURU -->

<td>

<i class="bi bi-person-circle text-secondary"></i>

&nbsp;

<?= $data['guru']; ?>

</td>


<!-- AKSI -->

<td class="text-center">


<a
href="edit.php?id_mapel=<?= $data['id_mapel']; ?>"
class="btn btn-edit btn-sm">

<i class="bi bi-pencil-fill"></i>

Edit

</a>


<a
href="hapus.php?id_mapel=<?= $data['id_mapel']; ?>"
class="btn btn-hapus btn-sm"

onclick="return confirm(
'Yakin ingin menghapus mata pelajaran ini?'
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
colspan="4"
class="text-center py-5">


<i
class="bi bi-journal-x"
style="font-size:42px;color:#94a3b8;">

</i>


<div class="mt-2 text-secondary">

Belum ada data mata pelajaran.

</div>


</td>

</tr>


<?php

}

?>


</tbody>

</table>

</div>

</div>



<!-- FOOTER -->

<div class="footer">

© <?= date('Y'); ?> Sistem Informasi Sekolah

</div>


</div>



<!-- Bootstrap JS -->

<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>