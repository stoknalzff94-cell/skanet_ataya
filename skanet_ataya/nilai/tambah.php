<?php
include "../koneksi.php";

/* Ambil data siswa */
$siswa = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nama ASC");

/* Ambil data guru */
$guru = mysqli_query($koneksi, "SELECT * FROM guru ORDER BY nama ASC");

/* Ambil data mapel */
$mapel = mysqli_query($koneksi, "SELECT * FROM mapel ORDER BY nama_mapel ASC");
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Data Nilai</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <style>

        body {
            background: #eef4f8;
            font-family: Arial, sans-serif;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar-custom {
            background: #0f172a;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.25);
        }

        .navbar-brand {
            color: white !important;
            font-weight: 700;
            font-size: 21px;
        }

        .navbar-custom .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            margin-left: 5px;
            padding: 8px 15px !important;
            border-radius: 8px;
            transition: 0.3s;
        }

        .navbar-custom .nav-link:hover {
            color: white !important;
            background: #1e293b;
        }

        .navbar-custom .nav-link.active {
            color: white !important;
            background: #2563eb;
        }

        .navbar-toggler {
            border-color: #64748b;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }


        /* =========================
           CARD
        ========================= */

        .form-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.10);
        }

        .card-header-custom {
            background: #0f172a;
            color: white;
            padding: 22px;
        }

        .card-header-custom h3 {
            margin: 0;
            font-weight: 700;
        }


        /* =========================
           FORM
        ========================= */

        .form-label {
            font-weight: 600;
            color: #334155;
        }

        .form-control,
        .form-select {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 0.2rem rgba(37, 99, 235, 0.15);
        }


        /* =========================
           BUTTON
        ========================= */

        .btn-simpan {
            background: #2563eb;
            color: white;
            border: none;
        }

        .btn-simpan:hover {
            background: #1d4ed8;
            color: white;
        }

        .btn-kembali {
            background: #64748b;
            color: white;
            border: none;
        }

        .btn-kembali:hover {
            background: #475569;
            color: white;
        }

    </style>

</head>


<body>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar navbar-expand-lg navbar-custom">

    <div class="container">


        <!-- BRAND -->

        <a
            class="navbar-brand"
            href="../index.php">

            🎓 Sistem Informasi Sekolah

        </a>


        <!-- MOBILE BUTTON -->

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
                        class="nav-link"
                        href="../index.php">

                        🏠 Home

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../siswa/index.php">

                        👨‍🎓 Siswa

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../guru/index.php">

                        👨‍🏫 Guru

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../mapel/index.php">

                        📚 Mapel

                    </a>

                </li>


                <li class="nav-item">

                    <a
                        class="nav-link active"
                        href="index.php">

                        📝 Nilai

                    </a>

                </li>


            </ul>

        </div>

    </div>

</nav>



<!-- =========================
     CONTENT
========================= -->

<div class="container mt-5 mb-5">


    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-7">


            <div class="card form-card">


                <!-- HEADER -->

                <div class="card-header-custom">

                    <h3>
                        📝 Tambah Data Nilai
                    </h3>

                    <small>
                        Masukkan nilai siswa
                    </small>

                </div>


                <!-- BODY -->

                <div class="card-body p-4">


                    <form
                        action="simpan.php"
                        method="POST">


                        <!-- SISWA -->

                        <div class="mb-3">

                            <label
                                for="nis"
                                class="form-label">

                                Nama Siswa

                            </label>


                            <select
                                name="nis"
                                id="nis"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Siswa --
                                </option>


                                <?php
                                while ($data = mysqli_fetch_assoc($siswa)) {
                                ?>

                                    <option
                                        value="<?= $data['nis']; ?>">

                                        <?= $data['nama']; ?>

                                        -
                                        <?= $data['nis']; ?>

                                    </option>

                                <?php
                                }
                                ?>

                            </select>

                        </div>



                        <!-- GURU -->

                        <div class="mb-3">

                            <label
                                for="nip"
                                class="form-label">

                                Guru

                            </label>


                            <select
                                name="nip"
                                id="nip"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Guru --
                                </option>


                                <?php
                                while ($data = mysqli_fetch_assoc($guru)) {
                                ?>

                                    <option
                                        value="<?= $data['nip']; ?>">

                                        <?= $data['nama']; ?>

                                        -
                                        <?= $data['nip']; ?>

                                    </option>

                                <?php
                                }
                                ?>

                            </select>

                        </div>



                        <!-- MAPEL -->

                        <div class="mb-3">

                            <label
                                for="id_mapel"
                                class="form-label">

                                Mata Pelajaran

                            </label>


                            <select
                                name="id_mapel"
                                id="id_mapel"
                                class="form-select"
                                required>

                                <option value="">
                                    -- Pilih Mata Pelajaran --
                                </option>


                                <?php
                                while ($data = mysqli_fetch_assoc($mapel)) {
                                ?>

                                    <option
                                        value="<?= $data['id_mapel']; ?>">

                                        <?= $data['nama_mapel']; ?>

                                    </option>

                                <?php
                                }
                                ?>

                            </select>

                        </div>



                        <!-- NILAI -->

                        <div class="mb-4">

                            <label
                                for="nilai"
                                class="form-label">

                                Nilai

                            </label>


                            <input
                                type="number"
                                name="nilai"
                                id="nilai"
                                class="form-control"
                                placeholder="Masukkan nilai"
                                min="0"
                                max="100"
                                required>

                            <div class="form-text">

                                Masukkan nilai antara 0 sampai 100.

                            </div>

                        </div>



                        <!-- BUTTON -->

                        <div class="d-flex gap-2">


                            <button
                                type="submit"
                                class="btn btn-simpan">

                                💾 Simpan

                            </button>


                            <a
                                href="index.php"
                                class="btn btn-kembali">

                                ← Kembali

                            </a>


                        </div>


                    </form>


                </div>

            </div>


        </div>

    </div>


</div>



<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>