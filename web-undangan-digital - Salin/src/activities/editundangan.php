<?php
session_start();
require '../service/connection.php';

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data undangan berdasarkan ID
    $sql = "SELECT * FROM plus WHERE plus_id = ? AND id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id, $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $undangan = $result->fetch_assoc();

    if (!$undangan) {
        echo "Data undangan tidak ditemukan!";
        exit();
    }
} else {
    echo "ID undangan tidak disediakan!";
    exit();
}

// Proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul_undangan = $_POST['judul_undangan'];
    $nama_event = $_POST['nama_event'];
    $desc_event = mysqli_real_escape_string($conn, $_POST['desc_event']);
    $start_event = $_POST['start_event'];
    $end_event = $_POST['end_event'];
    $tempat_event = $_POST['tempat_event'];
    $alamat_event = $_POST['alamat_event'];
    $template = $_POST['template'];

    $updateSql = "UPDATE plus SET judul_undangan = ?, nama_event = ?, desc_event = ?, start_event = ?, end_event = ?, tempat_event = ?, alamat_event = ?, template = ? WHERE plus_id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("sssssssii", $judul_undangan, $nama_event, $desc_event, $start_event, $end_event, $tempat_event, $alamat_event, $template, $id);


    if ($updateStmt->execute()) {
        header("Location: lihatundangan.php?msg=success");
        exit();
    } else {
        echo "Gagal mengupdate undangan!";
    }
}
?>
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
    max-width: 1000px; 
    /* Batas lebar form */
}

button.btn-submit {
    background-color: white; 
    color: black; 
    padding: 5px; 
    border-radius: 5px; 
    border: none; 
    font-size: 16px;
}

button.btn-submit:hover {
    background-color: #62809D; 
    color: white;
}
.back-button {
    display: inline-block;
    font-size: 1.2rem;
    text-decoration: none;
    color: white;
    background-color: #8199B1;
    padding: 10px 15px;
    border-radius: 8px;
    position: absolute;
    top: 20px;
    left: 20px;
    transition: background-color 0.3s ease;
}

.back-button i {
    font-size: 1.5rem;
}

.back-button:hover {
    background-color: #62809D;
    color: black;
}



</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Undangan</title>
    <link href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
</head>

<body style="background-color: #CADEF1;">

<img src="../assets/img/awan1.png" alt="Cloud Left" class="cloud-left">
<img src="../assets/img/awan2.png" alt="Cloud Right" class="cloud-right">

<div class="w-100 position-relative">
        <a href="../activities/lihatundangan.php" class="back-button">
            <i class="bi bi-arrow-left fs-3"><</i>
        </a>
    </div>
           <!-- Form Edit -->
<div class="form-container">
    <h3 class="mb-4">Edit Undangan</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-2">
            <label for="judul_undangan" class="form-label">Judul Undangan</label>
            <input type="text" class="form-control form-control-sm" id="judul_undangan" name="judul_undangan" value="<?= htmlspecialchars($undangan['judul_undangan']); ?>" placeholder="Masukkan judul undangan" required>
        </div>
        
        <div class="mb-2">
            <label for="nama_event" class="form-label">Nama Event</label>
            <input type="text" class="form-control form-control-sm" id="nama_event" name="nama_event" value="<?= htmlspecialchars($undangan['nama_event']); ?>" placeholder="Masukkan nama event" required>
        </div>

        <div class="mb-2">
    <label for="logo_event" class="form-label">Logo Event</label>
    <input type="file" class="form-control form-control-sm" id="logo_event" name="logo_event" placeholder="Masukan logo event" value="<?= htmlspecialchars($undangan['logo_event']); ?>" >
    <small class="text-muted">Kosongkan jika tidak ingin mengganti logo event.</small>
</div>

<div class="mb-2">
    <label for="logo_event2" class="form-label">Logo Event 2</label>
    <input type="file" class="form-control form-control-sm" id="logo_event2" name="logo_event2" placeholder="Masukkan logo event kedua" value="<?= htmlspecialchars($undangan['logo_event2']); ?>" >
    <small class="text-muted">Kosongkan jika tidak ingin mengganti logo event 2.</small>
</div>

        <div class="mb-2">
                    <label for="desc_event" class="form-label">Description Event</label>
                    <input type="text" class="form-control form-control-sm" id="desc_event" name="desc_event" value="<?= htmlspecialchars($undangan['desc_event']); ?>" placeholder="Masukkan deskripsi event" required>
                </div>

        <div class="mb-2">
            <label for="documentation_event" class="form-label">Dokumentasi Event</label>
            <input type="file" class="form-control form-control-sm" id="documentation_event" name="documentation_event" multiple>
            <small class="text-muted">Kosongkan jika tidak ingin mengganti dokumentasi.</small>
        </div>

        

        <div class="mb-2">
            <label for="start_event" class="form-label">Start Event</label>
            <input type="datetime-local" class="form-control form-control-sm" id="start_event" name="start_event" value="<?= htmlspecialchars($undangan['start_event']); ?>" required>
        </div>
        <div class="mb-2">
            <label for="end_event" class="form-label">End Event</label>
            <input type="datetime-local" class="form-control form-control-sm" id="end_event" name="end_event" value="<?= htmlspecialchars($undangan['end_event']); ?>" required>
        </div>

        <div class="mb-2">
            <label for="tempat_event" class="form-label">Tempat Event</label>
            <input type="text" class="form-control form-control-sm" id="tempat_event" name="tempat_event" value="<?= htmlspecialchars($undangan['tempat_event']); ?>" placeholder="Masukkan tempat event" required>
        </div>

        <div class="mb-2">
            <label for="alamat_event" class="form-label">Alamat Event</label>
            <textarea class="form-control form-control-sm" id="alamat_event" name="alamat_event" rows="2" placeholder="Masukkan alamat event" required><?= htmlspecialchars($undangan['alamat_event']); ?></textarea>
        </div>
        <div class="d-flex justify-content-center gap-5" style="margin-top: 2rem;">
        <!-- Template 1 -->
        <div class="template-box" onclick="setTemplate(1)" id="template1">
            <img src="../assets/templates/2.png" width="200px;" alt="Template 1">
        </div>
        <!-- Template 2 -->
        <div class="template-box" onclick="setTemplate(2)" id="template2">
            <img src="../assets/templates/1.png" width="200px;" alt="Template 2">
        </div>
        <!-- Template 3 -->
        <div class="template-box" onclick="setTemplate(3)" id="template3">
            <img src="../assets/templates/3.png" width="200px;" alt="Template 3">
        </div>
    </div>
    <input type="hidden" name="template" id="selected_template" value="<?= htmlspecialchars($undangan['template']); ?>">
    <div class="text-center" style="margin-top: 20px;   ">
            <button type="submit" class="btn btn-submit btn-sm mt-3">Simpan Perubahan</button>
        </div>

        <div class="text-center mt-2">
            <a href="lihatundangan.php" class="btn btn-secondary btn-sm">Batal</a>
        </div>
</div>
        
        <div class="mb-3">
    <label class="form-label">Pilih Template</label>
    
    </form>
</div>
    </div>
</body>
<script>
    function setTemplate(value) {
        document.getElementById('selected_template').value = value;
        highlightSelected(value);
    }

    function highlightSelected(value) {
        document.getElementById('template1').style.border = value == 1 ? '2px solid blue' : '1px solid #ccc';
        document.getElementById('template2').style.border = value == 2 ? '2px solid blue' : '1px solid #ccc';
        document.getElementById('template3').style.border = value == 3 ? '2px solid blue' : '1px solid #ccc';
    }

    // Pilih template yang sudah tersimpan saat halaman dimuat
    window.onload = function() {
        let selectedTemplate = document.getElementById('selected_template').value;
        if (selectedTemplate) {
            highlightSelected(selectedTemplate);
        }
    };
</script>
</html>
