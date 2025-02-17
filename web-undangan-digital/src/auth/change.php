<?php
session_start();
include '../service/utility.php';

if (isset($_SESSION['email'])) {
    return redirect("../admin.php");
}

if (!isset($_GET['reset'])) {
    return redirect("auth/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    .login-box {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    h2 {
        font-weight: bold;
    }

    label {
        font-weight: normal;
        display: block;
        margin-bottom: 5px;
    }

    input[type="email"] {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #ddd;
        width: 100%;
    }

    button {
        background-color: #8199B1;
        color: #ffffff;
        padding: 10px;
        border-radius: 5px;
        border: none;
        font-size: 16px;
    }

    button:hover {
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
        margin-bottom: 20px;
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
    <!-- Tombol Kembali -->
    <div class="w-100">
        <a href="forgot.php" class="text-dark">
            <i class="bi bi-arrow-left fs-3"></i>
        </a>
    </div>

    <!-- Gambar Awan -->
    <img src="../assets/img/awan1.png" alt="Cloud Left" class="cloud-left">
    <img src="../assets/img/awan2.png" alt="Cloud Right" class="cloud-right">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-4 col-md-6 col-sm-8 col-10"> <!-- Bootstrap grid -->
            <div class="login-box shadow p-4 rounded bg-white">
                <form action="../service/auth.php" method="POST">
                    <input type="hidden" name="reset" value="<?= $_GET['reset'] ?>">
                    <div class="mb-4">
                        <h2 class="text-center">Change Password</h2>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="new_password" placeholder="Enter password" required>
                        </div>
                    </div>


                    <div class="form-group mb-4">
                        <label for="password" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="confirm_new_password" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <!-- Tombol Sign In -->
                    <div class="d-grid mb-4">
                        <button type="submit" name="type" value="edit_password" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w-100 text-center py-3 mt-auto">
        <p>© 2024 Kelompok 1. Semua hak dilindungi.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>