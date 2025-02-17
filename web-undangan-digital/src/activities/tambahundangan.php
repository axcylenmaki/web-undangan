<?php
session_start();
require '../service/connection.php'; // Pastikan koneksi database

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan semua variabel tidak kosong
    $judul_undangan = $_POST['judul_undangan'];
    $nama_event = $_POST['nama_event'];
    $desc_event = mysqli_real_escape_string($conn, $_POST['desc_event']);
    $start_event = $_POST['start_event'];
    $end_event = $_POST['end_event'];
    $tempat_event = $_POST['tempat_event'];
    $alamat_event = $_POST['alamat_event'];
    $template = $_POST['template'];
    $id = $_SESSION['id'];

    $logo_event = upload();
    $logo_event2 = upload2();

    if(!$logo_event || !$logo_event2) {
        return false;
    }

    // Query untuk menyimpan undangan
    $sql = "INSERT INTO plus (judul_undangan, nama_event, desc_event, logo_event, logo_event2, start_event, end_event, tempat_event, alamat_event, template, id)
            VALUES ('$judul_undangan', '$nama_event', '$desc_event', '$logo_event', '$logo_event2', '$start_event', '$end_event', '$tempat_event', '$alamat_event', '$template', '$id')";

    if ($conn->query($sql) === TRUE) {
        $plus_id = $conn->insert_id; // Ambil ID terakhir yang dimasukkan

        // Proses upload banyak gambar dokumentasi
        if (!empty($_FILES['documentation_event']['name'][0])) {
            $documentation_files = $_FILES['documentation_event'];
            foreach ($documentation_files['name'] as $index => $filename) {
                $tmpName = $documentation_files['tmp_name'][$index];
                $uploadedFile = uploadMultiple($filename, $tmpName);

                if ($uploadedFile) {
                    // Masukkan ke tabel dokumentasi
                    $sql_dokumentasi = "INSERT INTO dokumentasi (fid_undangan, image) VALUES ($plus_id, '$uploadedFile')";
                    if ($conn->query($sql_dokumentasi)) {
                        $dokumentasi_id = $conn->insert_id;

                        $sql_image = "INSERT INTO image (image, fid_dokumentasi) VALUES ('$uploadedFile', $dokumentasi_id)";
                        $conn->query($sql_image);
                    }
                }
            }
        }

        $success_message = "Undangan dan dokumentasi berhasil disimpan.";
    } else {
        $error_message = "Error: " . $conn->error;
    }
}

function upload()
{
    if (!isset($_FILES['logo_event'])) {
        return false;
    }

    $namaFile = $_FILES['logo_event']['name'];
    $ukuranFile = $_FILES['logo_event']['size'];
    $error = $_FILES['logo_event']['error'];
    $tmpName = $_FILES['logo_event']['tmp_name'];

    if ($error === 4) {
        return false;
    }

    if ($ukuranFile > 1000000) {
        return false;
    }

    $fileExt = pathinfo($namaFile, PATHINFO_EXTENSION);
    $newFileName = uniqid() . '.' . $fileExt;

    $uploadDir = realpath(__DIR__ . '/../img/image-event') . '/';
    $uploadPath = $uploadDir . $newFileName;

    return move_uploaded_file($tmpName, $uploadPath) ? $newFileName : false;
}

function upload2()
{
    if (!isset($_FILES['logo_event2'])) {
        return false;
    }

    $namaFile = $_FILES['logo_event2']['name'];
    $ukuranFile = $_FILES['logo_event2']['size'];
    $error = $_FILES['logo_event2']['error'];
    $tmpName = $_FILES['logo_event2']['tmp_name'];

    if ($error === 4) {
        return false;
    }

    if ($ukuranFile > 1000000) {
        return false;
    }

    $fileExt = pathinfo($namaFile, PATHINFO_EXTENSION);
    $newFileName = uniqid() . '.' . $fileExt;

    $uploadDir = realpath(__DIR__ . '/../img/image-event') . '/';
    $uploadPath = $uploadDir . $newFileName;

    return move_uploaded_file($tmpName, $uploadPath) ? $newFileName : false;
}


function uploadMultiple($fileName, $tmpName)
{
    if (!$fileName) {
        return false;
    }

    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = uniqid() . '.' . $fileExt;

    $uploadDir = realpath(__DIR__ . '/../img/documentation') . '/';
    $uploadPath = $uploadDir . $newFileName;

    return move_uploaded_file($tmpName, $uploadPath) ? $newFileName : false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Undangan</title>
    <!-- Bootstrap CSS -->
    <link href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        @keyframes move-cloud-left {
            0% {
                transform: translateX(100%);
                /* Mulai di luar layar sebelah kanan */
            }

            100% {
                transform: translateX(-100%);
                /* Berakhir di luar layar sebelah kiri */
            }
        }

        @keyframes move-cloud-right {
            0% {
                transform: translateX(-100%);
                /* Mulai di luar layar sebelah kiri */
            }

            100% {
                transform: translateX(100%);
                /* Berakhir di luar layar sebelah kanan */
            }
        }

        .cloud-left {
            position: absolute;
            top: 0%;
            left: 0;
            width: 120%;
            /* 50% dari lebar layar */
            max-width: 2000px;
            /* Maksimal lebar */
            height: auto;
            opacity: 0.8;
            z-index: -1;
            animation: move-cloud-right 35s linear infinite;
            /* Durasi 20 detik, berulang */
        }

        .cloud-right {
            position: absolute;
            top: 60%;
            right: 0;
            width: 120%;
            /* 50% dari lebar layar */
            max-width: 2000px;
            /* Maksimal lebar */
            height: auto;
            opacity: 0.8;
            z-index: -1;
            animation: move-cloud-left 35s linear infinite;
            /* Durasi 25 detik, berulang */
        }

        body {
            background-color: #CADEF1; /* Warna latar belakang */
            font-family: Arial, sans-serif;
            height: 100%;
            overflow-x: hidden; /* Sembunyikan area di luar layar horizontal */
        }

        .form-container {
            margin: 20px auto;
            /* Jarak ke atas dan bawah */
            background-color: #8199B1;
            /* Warna latar belakang */
            padding: 20px;
            /* Jarak isi form ke tepi */
            border-radius: 10px;
            /* Sudut melengkung */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Bayangan */
            max-width: 800px;
            /* Batas lebar form */
        }

        .template-box {
            height: 110px;
            /* Perkecil tinggi template */
            border: 1px solid #ccc;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .template-box:hover {
            transform: scale(1.05);
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

        button.btn-submit {
            background-color: white;
            color: black; /* Warna teks */
            padding: 5px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }

        button.btn-submit:hover {
            background-color: #62809D;
            color: white;
        }
    </style>
</head>

<body>
<img src="../assets/img/awan1.png" alt="Cloud Left" class="cloud-left">
<img src="../assets/img/awan2.png" alt="Cloud Right" class="cloud-right">

    <div class="w-100 position-relative">
        <a href="../admin.php" class="back-button">
            <i class="bi bi-arrow-left fs-3"></i>
        </a>
    </div>
    <div class="container">
        <div class="form-container">
            <h4 class="text-center mb-3">Buat Undangan Digital</h4>
            <!-- Pesan berhasil atau error -->
            <?php if (!empty($success_message)): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success_message; ?>
                </div>
            <?php elseif (!empty($error_message)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

            <!-- Form input -->
            <form action="tambahundangan.php" method="POST" enctype="multipart/form-data">
                <div class="mb-2">
                    <label for="judul_undangan" class="form-label">Judul Undangan</label>
                    <input type="text" class="form-control form-control-sm" id="judul_undangan" name="judul_undangan" placeholder="Masukkan judul undangan" required>
                </div>
                <div class="mb-2">
                    <label for="nama_event" class="form-label">Nama Event</label>
                    <input type="text" class="form-control form-control-sm" id="nama_event" name="nama_event" placeholder="Masukkan nama event" required>
                </div>
                <div class="mb-2">
    <label for="logo_event" class="form-label">Logo Event</label>
    <input type="file" class="form-control form-control-sm" id="logo_event" name="logo_event" placeholder="Masukan logo event" required>
</div>

<div class="mb-2">
    <label for="logo_event2" class="form-label">Logo Event 2</label>
    <input type="file" class="form-control form-control-sm" id="logo_event2" name="logo_event2" placeholder="Masukkan logo event kedua" required>
</div>

                
                <div class="mb-2">
                    <label for="desc_event" class="form-label">Description Event</label>
                    <input type="text" class="form-control form-control-sm" id="desc_event" name="desc_event" placeholder="Masukkan deskripsi event" required>
                </div>
                <div class="mb-2">
                    <label for="documentation_event" class="form-label">Documentation Event</label>
                    <input type="file" class="form-control form-control-sm" id="documentation_event" name="documentation_event[]" placeholder="Masukkan documentation event" multiple required>
                </div>
                <div class="mb-2">
                    <label for="start_event" class="form-label">Start Event</label>
                    <input type="datetime-local" class="form-control form-control-sm" id="start_event" name="start_event" required>
                </div>
                <div class="mb-2">
                    <label for="start_event" class="form-label">End Event</label>
                    <input type="datetime-local" class="form-control form-control-sm" id="end_event" name="end_event" required>
                </div>
                <div class="mb-2">
                    <label for="tempat_event" class="form-label">Tempat Event</label>
                    <input type="text" class="form-control form-control-sm" id="tempat_event" name="tempat_event" placeholder="Masukkan tempat event" required>
                </div>
                <div class="mb-2">
                    <label for="alamat_event" class="form-label">Alamat Event</label>
                    <textarea class="form-control form-control-sm" id="alamat_event" name="alamat_event" rows="2" placeholder="Masukkan alamat event" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Template</label>
                    <div class="d-flex justify-content-center gap-5">
                        <!-- Template 1 -->
                        <div class="template-box" onclick="setTemplate(1)" id="template1">
                            <img src="../assets/templates/2.png" width="200px;" alt="Template 1">
                        </div>
                        <!-- Template 2 -->
                        <div class="template-box" onclick="setTemplate(2)" id="template2">
                            <img src="../assets/templates/1.png" width="200px;" alt="Template 2">
                        </div>
                        <div class="template-box" onclick="setTemplate(3)" id="template3">
                            <img src="../assets/templates/3.png" width="200px;" alt="Template 3">
                        </div>
                    </div>
                    <input type="hidden" name="template" id="selected_template" value="0">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-submit btn-sm mt-3">Simpan Undangan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        function setTemplate(value) {
            document.getElementById('selected_template').value = value;
            document.getElementById('template1').style.border = value == 1 ? '2px solid blue' : '1px solid #ccc';
            document.getElementById('template2').style.border = value == 2 ? '2px solid blue' : '1px solid #ccc';
            document.getElementById('template3').style.border = value == 3 ? '2px solid blue' : '1px solid #ccc';
        }
    </script>
</body>

</html>