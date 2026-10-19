<?php
session_start();
include "koneksi.php";

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek username dan password
    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM user 
         WHERE username='$username' 
         AND password='$password'"
    );

    if (mysqli_num_rows($query) > 0) {

        $data = mysqli_fetch_assoc($query);

        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];

        header("Location: index.php");
        exit;

    } else {

        $error = "Username atau password salah!";

    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Informasi Sekolah</title>


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

        * {
            box-sizing: border-box;
        }

        body {

            margin: 0;

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            font-family: 'Poppins', sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #0f172a,
                    #1e3a8a,
                    #2563eb
                );

        }


        /* LOGIN CARD */

        .login-card {

            width: 100%;

            max-width: 430px;

            background: white;

            border-radius: 22px;

            padding: 35px;

            box-shadow:
                0 25px 60px
                rgba(0,0,0,.25);

        }


        /* LOGO */

        .login-icon {

            width: 75px;

            height: 75px;

            margin: 0 auto 20px;

            border-radius: 20px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #dbeafe;

            color: #2563eb;

            font-size: 38px;

        }


        .login-title {

            text-align: center;

            font-size: 26px;

            font-weight: 800;

            color: #0f172a;

            margin-bottom: 5px;

        }


        .login-subtitle {

            text-align: center;

            color: #64748b;

            font-size: 14px;

            margin-bottom: 30px;

        }


        /* INPUT */

        .form-label {

            font-weight: 600;

            color: #334155;

        }


        .input-group-text {

            background: #f8fafc;

            border-color: #cbd5e1;

            color: #2563eb;

        }


        .form-control {

            border-color: #cbd5e1;

            padding: 12px;

        }


        .form-control:focus {

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37,99,235,.12);

        }


        /* BUTTON */

        .btn-login {

            width: 100%;

            padding: 12px;

            border: none;

            border-radius: 10px;

            background:
                linear-gradient(
                    90deg,
                    #1d4ed8,
                    #2563eb
                );

            color: white;

            font-weight: 600;

            transition: .2s;

        }


        .btn-login:hover {

            transform: translateY(-2px);

            background:
                linear-gradient(
                    90deg,
                    #1e40af,
                    #1d4ed8
                );

            color: white;

        }


        /* FOOTER */

        .login-footer {

            text-align: center;

            color: #94a3b8;

            font-size: 12px;

            margin-top: 25px;

        }

    </style>

</head>


<body>


<div class="login-card">


    <!-- ICON -->

    <div class="login-icon">

        <i class="bi bi-mortarboard-fill"></i>

    </div>


    <!-- TITLE -->

    <h2 class="login-title">

        Sistem Informasi Sekolah

    </h2>


    <p class="login-subtitle">

        Silakan login untuk masuk ke sistem

    </p>


    <!-- ERROR -->

    <?php if ($error != "") { ?>

        <div
            class="alert alert-danger
                   d-flex align-items-center">

            <i
                class="bi bi-exclamation-circle-fill me-2">
            </i>

            <?= $error; ?>

        </div>

    <?php } ?>


    <!-- FORM -->

    <form method="POST">


        <!-- USERNAME -->

        <div class="mb-3">

            <label class="form-label">

                Username

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="bi bi-person-fill"></i>

                </span>

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    placeholder="Masukkan username"
                    required>

            </div>

        </div>


        <!-- PASSWORD -->

        <div class="mb-4">

            <label class="form-label">

                Password

            </label>

            <div class="input-group">

                <span class="input-group-text">

                    <i class="bi bi-lock-fill"></i>

                </span>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required>

            </div>

        </div>


        <!-- LOGIN -->

        <button
            type="submit"
            name="login"
            class="btn btn-login">

            <i class="bi bi-box-arrow-in-right me-2"></i>

            Login

        </button>


    </form>


    <div class="login-footer">

        © <?= date('Y'); ?>
        Sistem Informasi Sekolah

    </div>


</div>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>

