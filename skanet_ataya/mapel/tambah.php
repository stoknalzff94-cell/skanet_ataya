<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Mata Pelajaran</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <style>

        body {
            background: #f1f5f9;
            font-family: Arial, sans-serif;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #1e293b;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 20px;
        }

        .navbar .nav-link {
            color: #cbd5e1;
            padding: 8px 15px;
            margin-left: 5px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .navbar .nav-link:hover {
            color: white;
            background: #334155;
        }

        .navbar .nav-link.active {
            color: white;
            background: #2563eb;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {
            margin-top: 40px;
            margin-bottom: 50px;
        }


        /* =========================
           CARD
        ========================= */

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .card-header {
            background: #1e293b;
            color: white;
            padding: 20px;
            border: none;
        }

        .judul {
            font-weight: 700;
        }


        /* =========================
           FORM
        ========================= */

        .form-label {
            font-weight: 600;
            color: #334155;
        }

        .form-control {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 12px;
        }

        .form-control:focus {
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

    </style>

</head>


<body>


<!-- ==================================================
     NAVBAR
================================================== -->

<nav class="navbar navbar-expand-lg navbar-dark">

    <div class="container">


        <!-- Nama Website -->

        <a
            class="navbar-brand"
            href="../index.php">

            Sistem Informasi Sekolah

        </a>


        <!-- Tombol Mobile -->

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- Menu -->

        <div
            class="collapse navbar-collapse"
            id="navbarMenu">

            <ul class="navbar-nav ms-auto">


                <!-- Home -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../index.php">

                        Home

                    </a>

                </li>


                <!-- Siswa -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../siswa/index.php">

                        Siswa

                    </a>

                </li>


                <!-- Guru -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../guru/index.php">

                        Guru

                    </a>

                </li>


                <!-- Mapel -->

                <li class="nav-item">

                    <a
                        class="nav-link active"
                        href="../mapel/index.php">

                        Mapel

                    </a>

                </li>


                <!-- Nilai -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="../nilai/index.php">

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

<div class="container content">


    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">


            <div class="card shadow-sm">


                <!-- HEADER -->

                <div class="card-header">

                    <h4 class="mb-1 judul">

                        Tambah Mata Pelajaran

                    </h4>

                    <small>

                        Masukkan data mata pelajaran baru

                    </small>

                </div>


                <!-- BODY -->

                <div class="card-body p-4">


                    <form
                        action="simpan.php"
                        method="POST">


                        <!-- NAMA MAPEL -->

                        <div class="mb-3">

                            <label
                                for="nama_mapel"
                                class="form-label">

                                Nama Mata Pelajaran

                            </label>

                            <input
                                type="text"
                                id="nama_mapel"
                                name="nama_mapel"
                                class="form-control"
                                placeholder="Contoh: Matematika"
                                required>

                        </div>


                        <!-- GURU -->

                        <div class="mb-4">

                            <label
                                for="guru"
                                class="form-label">

                                Guru

                            </label>

                            <input
                                type="text"
                                id="guru"
                                name="guru"
                                class="form-control"
                                placeholder="Masukkan nama guru"
                                required>

                        </div>


                        <!-- TOMBOL -->

                        <div class="d-flex gap-2">


                            <button
                                type="submit"
                                class="btn btn-simpan">

                                Simpan

                            </button>


                            <a
                                href="index.php"
                                class="btn btn-secondary">

                                Kembali

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