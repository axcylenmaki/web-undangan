<?php 
session_start();
require_once 'service/connection.php'; // Koneksi ke database

if(!isset($_SESSION['username'])){
    header('location:auth/login.php');
    exit();
  }

// Cek apakah user sudah login
if (isset($_SESSION['id'])) {
    // Ambil id dari sesi
    $id = $_SESSION['id'];
    
    // Query untuk mendapatkan username dari database
    $stmt = $conn->prepare("SELECT username FROM user WHERE id = ?");
    $stmt->bind_param("i", $id); 
    $stmt->execute();
    $stmt->bind_result($username);
    if ($stmt->fetch()) {
        // Tampilkan nama siswa
        $displayName = htmlspecialchars($username);
    } else {
        $displayName = "Guest";
    }
    $stmt->close();
} else {
    // Jika user belum login, tampilkan teks default
    $displayName = "Guest";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }
        @keyframes move-cloud-left {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        @keyframes move-cloud-right {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        .cloud-left {
            position: absolute;
            top: 0%;
            left: 0;
            width: 120%;
            max-width: 2000px;
            height: auto;
            opacity: 0.8;
            z-index: -1;
            animation: move-cloud-right 35s linear infinite;
            pointer-events: none; /* Tambahkan ini */
        }
        .cloud-right {
            position: absolute;
            top: 60%;
            right: 0;
            width: 120%;
            max-width: 2000px;
            height: auto;
            opacity: 0.8;
            z-index: -1;
            animation: move-cloud-left 35s linear infinite;
            pointer-events: none; /* Tambahkan ini */
        }
        @font-face {
            font-family: 'CustomFont';
            src: url('fonts/customfont.ttf') format('truetype');
        }
        body {
            background-color: #8199B1;
            background-image: url('images/cloud1.png');
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            font-family: 'Arial', sans-serif;
            text-align: center;
            overflow: hidden;
            position: relative;
        }
        h1 {
            font-family: 'CustomFont', cursive;
            font-size: 3rem;
            margin-top: 20px;
        }
        p {
            font-family: 'CustomFont', cursive;
            font-size: 1.5rem;
        }
        .welcome {
            margin-top: 50px;
        }
        .logo img {
            width: 110px;
            height: 90px;
            border-radius: 50%;
            margin: 20px auto;
        }
        .icons {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .icon-btn {
            background-color: white;
            border: none;
            border-radius: 10px;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .icon-btn i {
            font-size: 20px;
            color: #5a2a3a;
        }
        .icon-btn:hover {
            background-color: #CADEF1;
        }
        .logout-btn {
            margin-top: 20px;
            background-color: #62809D;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: #7d4c56;
        }
    </style>
</head>
<body>
    <!-- Gambar Awan -->
    <img src="assets/img/awan1.png" alt="Cloud Left" class="cloud-left">
    <img src="assets/img/awan2.png" alt="Cloud Right" class="cloud-right">

    <div class="w-100 position-relative" style="z-index: 3;">
        <a href="auth/login.php" class="back-button">
            <i class="bi bi-arrow-left fs-3"></i>
        </a>
    </div>
    <div class="welcome">
        <h1>Undangan</h1>
        <div class="logo">
            <img src="assets/img/Logo 71 (1).png " alt="Logo SMK Negeri 71">
        </div>
        <p>Selamat Datang</p>
        <h3>
    <?php echo $displayName; ?>
</h3>

        <p>Silahkan Pilih Aktivitas di bawah!</p>

        <div class="icons">
            <button class="icon-btn" onclick="window.location.href='activities/tambahundangan.php'"><i class="bi bi-plus"></i></button>
            <button class="icon-btn" onclick="window.location.href='activities/kirimundangan.php'"><i class="bi bi-send"></i></button>
            <button class="icon-btn" onclick="window.location.href='activities/lihatundangan.php'"><i class="bi bi-eye"></i></button>
        </div>

        <button class="logout-btn" onclick="window.location.href='auth/logout.php'">Logout</button>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <?php
    if (isset($_SESSION['success'])) {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '" . $_SESSION['success'] . "',
                showConfirmButton: true
            });
        </script>";
        unset($_SESSION['success']);
    }
    ?>
    <!-- Bootstrap Icons -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> -->
</body>
</html>
