<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Data Siswa</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>

        body {
            background: #f1f5f9;
        }

        /* Navbar */

        .navbar {
            background: #1e293b;
        }

        .navbar-brand {
            font-weight: 700;
        }

        /* Card */

        .card {
            border: none;
            border-radius: 15px;
        }

        .card-header {
            background: #1e293b;
            color: white;

            border-radius: 15px 15px 0 0 !important;
        }

        .judul {
            font-weight: 700;
        }

        /* Label */

        .form-label {
            font-weight: 600;
            color: #334155;
        }

        /* Input */

        .form-control {
            border-radius: 8px;
            border: 1px solid #cbd5e1;
        }

        .form-control:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 0.2rem rgba(37, 99, 235, 0.15);
        }

        /* Tombol Simpan */

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


<!-- Navbar -->

<nav class="navbar navbar-dark">

    <div class="container">

        <a
            class="navbar-brand"
            href="index.php">

            Sistem Informasi Sekolah

        </a>

        <a
            href="index.php"
            class="btn btn-outline-light btn-sm">

            Data Siswa

        </a>

    </div>

</nav>


<!-- Content -->

<div class="container mt-5 mb-5">


    <div class="row justify-content-center">

        <div class="col-md-6">


            <!-- Card -->

            <div class="card shadow">


                <!-- Header -->

                <div class="card-header">

                    <h4 class="mb-0 judul">
                        Tambah Data Siswa
                    </h4>

                    <small>
                        Masukkan data siswa baru
                    </small>

                </div>


                <!-- Body -->

                <div class="card-body p-4">


                    <form
                        action="simpan.php"
                        method="post">


                        <!-- NIS -->

                        <div class="mb-3">

                            <label class="form-label">
                                NIS
                            </label>

                            <input
                                type="text"
                                name="nis"
                                class="form-control"
                                placeholder="Masukkan NIS"
                                required>

                        </div>


                        <!-- Nama -->

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Siswa
                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                placeholder="Masukkan nama siswa"
                                required>

                        </div>


                        <!-- Alamat -->

                        <div class="mb-4">

                            <label class="form-label">
                                Alamat
                            </label>

                            <textarea
                                name="alamat"
                                class="form-control"
                                rows="4"
                                placeholder="Masukkan alamat siswa"
                                required></textarea>

                        </div>


                        <!-- Tombol -->

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