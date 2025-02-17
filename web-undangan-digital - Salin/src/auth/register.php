<?php
session_start();
include '../service/utility.php';

if (isset($_SESSION['email'])) {
    return redirect("login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <style>
@keyframes move-cloud-left {
    0% {
        transform: translateX(100%); /* Mulai di luar layar sebelah kanan */
    }
    100% {
        transform: translateX(-100%); /* Berakhir di luar layar sebelah kiri */
    }
}

::-webkit-scrollbar {
    display: none;
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
    z-index: 1;
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
    z-index: 1;
    animation: move-cloud-left 35s linear infinite; /* Durasi 25 detik, berulang */
}

        .register-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin-top: 80px;
            margin-bottom: 200px;
            position: relative;
            z-index: 2;
        }

        body {
            background-color: #CADEF1;
        }

        footer {
            background-color: #8199B1;
            color: #fff;
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

    .back-button {
    position: relative; /* Pastikan posisi diatur untuk mengaktifkan z-index */
    z-index: 3; /* Lebih tinggi daripada awan */
    font-size: 1.2rem;
    text-decoration: none;
    color: black;
    padding: 10px;
    border-radius: 5px;
    
}

.back-button:hover {
    background-color: #8199B1;
}
    </style>
</head>

<body>
    <!-- Gambar Awan -->
    <img src="../assets/img/awan1.png" alt="Cloud Left" class="cloud-left">
    <img src="../assets/img/awan2.png" alt="Cloud Right" class="cloud-right">

    <div class="container d-flex flex-column min-vh-100 justify-content-center align-items-center">

    <div class="w-100 position-relative" style="z-index: 3;">
        <a href="login.php" class="back-button">
            <i class="bi bi-arrow-left fs-3"></i>
        </a>
    </div>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-4 col-md-6 col-sm-8 col-10"> <!-- Bootstrap grid -->
            <!-- Form Registrasi -->
            <div class="register-box">
                <h3 class="text-center mb-4">Register</h3>
                <form action="../service/auth.php" method="POST">
                    <!-- Nama Lengkap -->
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="username" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                    </div>
                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>
                    <!-- Konfirmasi Password -->
                    <div class="form-group mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="c_password" placeholder="Konfirmasi password" required>
                    </div>
                    <br>
                    <!-- Tombol Sign Up -->
                    <div class="d-grid mb-3">
                        <button type="submit" name="type" value="register" class="btn btn-primary">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>