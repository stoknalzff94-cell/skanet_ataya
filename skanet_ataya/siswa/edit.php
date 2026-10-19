<?php
include "../koneksi.php";

$nis = $_GET['nis'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM siswa WHERE nis='$nis'"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data siswa tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Data Siswa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body {
            background: #f1f5f9;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #0f172a;
        }

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .10);
        }

        .card-header {
            background: linear-gradient(
                135deg,
                #0f172a,
                #1e3a8a,
                #2563eb
            );

            color: white;
            border-radius: 18px 18px 0 0 !important;
        }

        .form-control {
            border-radius: 10px;
            padding: 11px;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .15);
        }

        .btn-simpan {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 9px;
        }

        .btn-simpan:hover {
            background: #1d4ed8;
            color: white;
        }

        .btn-kembali {
            background: #64748b;
            color: white;
            border: none;
            border-radius: 9px;
        }

        .btn-kembali:hover {
            background: #475569;
            color: white;
        }

    </style>

</head>

<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark">

    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="../index.php">

            <i class="bi bi-mortarboard-fill"></i>

            Sistem Informasi Sekolah

        </a>

    </div>

</nav>


<!-- CONTENT -->

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card">


                <!-- HEADER -->

                <div class="card-header p-4">

                    <h4 class="mb-1">

                        <i class="bi bi-pencil-square"></i>

                        Edit Data Siswa

                    </h4>

                    <small>
                        Perbarui informasi siswa
                    </small>

                </div>


                <!-- BODY -->

                <div class="card-body p-4">


                    <form
                        action="update.php"
                        method="POST">


                        <!-- NIS LAMA -->

                        <input
                            type="hidden"
                            name="nis_lama"
                            value="<?= htmlspecialchars($data['nis']); ?>">


                        <!-- NIS -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                NIS
                            </label>

                            <input
                                type="text"
                                name="nis"
                                class="form-control"
                                value="<?= htmlspecialchars($data['nis']); ?>"
                                required>

                        </div>


                        <!-- NAMA -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">
                                Nama Siswa
                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control"
                                value="<?= htmlspecialchars($data['nama']); ?>"
                                required>

                        </div>


                        <!-- ALAMAT -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                Alamat
                            </label>

                            <textarea
                                name="alamat"
                                class="form-control"
                                rows="4"
                                required><?= htmlspecialchars($data['alamat']); ?></textarea>

                        </div>


                        <!-- BUTTON -->

                        <div class="d-flex gap-2">

                            <a
                                href="index.php"
                                class="btn btn-kembali">

                                <i class="bi bi-arrow-left"></i>
                                Kembali

                            </a>


                            <button
                                type="submit"
                                name="update"
                                class="btn btn-simpan">

                                <i class="bi bi-check-lg"></i>
                                Simpan Perubahan

                            </button>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>