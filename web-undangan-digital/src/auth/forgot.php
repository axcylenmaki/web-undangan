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
    <link href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> -->
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

<body>
    <!-- Gambar Awan -->
    <img src="../assets/img/awan1.png" alt="Cloud Left" class="cloud-left">
    <img src="../assets/img/awan2.png" alt="Cloud Right" class="cloud-right">

<div class="w-100 position-relative" style="z-index: 3;">
        <a href="login.php" class="back-button">
            <i class="bi bi-arrow-left fs-3"></i>
        </a>
    </div>

    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-8 col-10">
            <div class="login-box shadow p-4 rounded">
                <form action="../service/auth.php" method="post">
                    <div class="mb-4">
                        <h2 class="text-center">Reset Password</h2>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="username" class="form-label">username</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                        </div>
                    </div>

                    <div>
                        <a href="login.php">Already have an account?</a>
                    </div>
                    <br>
                    <center>
                        <div class="d-grid mb-4">
                            <button type="submit" name="type" value="find_email" class="btn btn-primary">Reset</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
