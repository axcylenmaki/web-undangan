<?php
session_start();
include '../service/utility.php';

if (isset($_SESSION['email'])) {
    return redirect("admin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Form</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> -->
     <link rel="stylesheet" href="../assets/bootstrap-icons-1.11.3/font/bootstrap-icons.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    ::-webkit-scrollbar {
    display: none;
}
@keyframes move-cloud-left {
    0% {
        transform: translateX(100%); /* Mulai di luar layar sebelah kanan */
    }
    100% {
        transform: translateX(-100%); /* Berakhir di luar layar sebelah kiri */
    }
}

@keyframes move-cloud-right {
    0% {
        transform: translateX(-100%); /* Mulai di luar layar sebelah kiri */
    }
    100% {
        transform: translateX(100%); /* Berakhir di luar layar sebelah kanan */
    }
}

.cloud-left {
    position: absolute;
    top: 0%;
    left: 0;
    width: 120%; /* 50% dari lebar layar */
    max-width: 2000px; /* Maksimal lebar */
    height: auto;
    opacity: 0.8;
    z-index: -1;
    animation: move-cloud-right 35s linear infinite; /* Durasi 20 detik, berulang */
}

.cloud-right {
    position: absolute;
    top: 60%;
    right: 0;
    width: 120%; /* 50% dari lebar layar */
    max-width: 2000px; /* Maksimal lebar */
    height: auto;
    opacity: 0.8;
    z-index: -1;
    animation: move-cloud-left 35s linear infinite; /* Durasi 25 detik, berulang */
}
    body {
        background-color: #CADEF1;
        font-family: Arial, sans-serif;
        height: 100%;
        overflow-x: hidden; /* Sembunyikan area di luar layar horizontal */ 
    }

    .login-box {
        background-color: #cfb997;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        position: relative;
        z-index: 2;
    }

    h2 {
        font-weight: bold;
    }

    label {
        font-weight: normal;
        display: block;
        margin-bottom: 5px;
    }

    input[type="email"],
    input[type="password"] {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #ddd;
        width: 100%;
    }

    button.btn-primary {
        background-color: #8199B1; 
        color: #ffffff; /* Warna teks */
        padding: 10px;
        border-radius: 5px;
        border: none;
        font-size: 16px;
    }

    button.btn-primary:hover {
        background-color: #CADEF1;
    }

    a {
        color: #8199B1;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .login-box {
        margin-top: 80px;
        margin-bottom: 100px;
    }
    .back-button {
            font-size: 1.2rem;
            text-decoration: none;
            color: black;
            padding: 5px;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #8199B1;
        }
</style>

<body>
    <!-- Gambar Awan -->
    <img src="../assets/img/awan1.png" alt="Cloud Left" class="cloud-left">
    <img src="../assets/img/awan2.png" alt="Cloud Right" class="cloud-right">
    <div class="w-100 position-relative">
        <a href="../landing.html" class="back-button">
            <i class="bi bi-arrow-left fs-3"></i>
        </a>
    </div>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-4 col-md-6 col-sm-8 col-10"> <!-- Bootstrap grid -->
            <div class="login-box shadow p-4 rounded bg-white">
                <form action="../service/auth.php" method="POST">
                    <div class="mb-4">
                        <h2 class="text-center">Login</h2>
                    </div>

                    <!-- Input Email dengan Ikon -->
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                    </div>

                    <!-- Input Password dengan Ikon -->
                    <div class="form-group mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                    </div>

                    <!-- Tombol Sign In -->
                    <div class="d-grid mb-4">
                        <button type="submit" name="type" value="login" class="btn btn-primary">Sign in</button>
                    </div>

                    <!-- Link Tambahan -->
                    <div class="text-center">
                        <a href="forgot.php" class="d-block mb-2">Forgot your password?</a>
                        <span>Don't have an account yet? <a href="register.php">Register here</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

    <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

    <?php
    if (isset($_SESSION['success'])) {
        if (strlen($_SESSION['success']) > 3) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '" . $_SESSION['success'] . "',
                showConfirmButton: true
            });
        </script>";
        }
        unset($_SESSION['success']); // Clear the session variable
    }

    if (isset($_SESSION['error'])) {
        if (strlen($_SESSION['error']) > 3) {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '" . $_SESSION['error'] . "',
                showConfirmButton: true
            });
        </script>";
        }
        unset($_SESSION['error']); // Clear the session variable
    }
    ?>
</body>

</html>