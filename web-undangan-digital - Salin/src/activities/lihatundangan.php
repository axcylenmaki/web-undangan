<?php
session_start();
require '../service/connection.php'; // Pastikan koneksi ke database

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit();
}

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Query untuk mengambil data undangan dengan pencarian di beberapa kolom
$sql = "SELECT * FROM plus WHERE id = ? AND (judul_undangan LIKE ? OR nama_event LIKE ? OR start_event LIKE ? OR tempat_event LIKE ?)";
$stmt = $conn->prepare($sql);
$searchParam = "%$search%";
$stmt->bind_param("issss", $_SESSION['id'], $searchParam, $searchParam, $searchParam, $searchParam);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Undangan</title>
    <link href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #CADEF1;
        }
        .card {
            height: 100%; /* Menyamakan tinggi semua kartu */
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-img-top {
         height: 400px; /* Sesuaikan tinggi gambar */
        object-fit: cover; /* Pastikan gambar tetap proporsional */
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
        .btn-custom {
            background-color: #62809D;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #CADEF1;
            color: white;
        }
        .search-bar {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="w-100 position-relative">
        <a href="../admin.php" class="back-button">
            <i class="bi bi-arrow-left fs-3"></i>
        </a>
    </div>
    <div class="container mt-4">
        <h3 class="text-center mb-4 text-white">Daftar Undangan Digital</h3>

        <!-- Search Bar -->
        <form action="lihatundangan.php" method="GET" class="search-bar">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul, event, tanggal, atau tempat..." value="<?php echo htmlspecialchars($search); ?>">
                <button class="btn btn-custom" type="submit">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </form>

        <div class="row g-3">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <?php
                    // Ambil ID dari tabel send berdasarkan plus_id dari tabel plus
                    $sql1 = "SELECT id FROM send WHERE plus_id = ?";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->bind_param("i", $row['plus_id']);
                    $stmt1->execute();
                    $hasil_send = $stmt1->get_result();
                    $send_id = $hasil_send->fetch_assoc()['id'] ?? null;
                    $stmt1->close();
                    ?>

                    <div class="col-md-4">
                        <div class="card">
                            <img src="../img/image-event/<?php echo htmlspecialchars($row['logo_event']); ?>" class="card-img-top" alt="Undangan Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['judul_undangan']); ?></h5>
                                <p class="card-text">
                                    <strong>Event:</strong> <?php echo htmlspecialchars($row['nama_event']); ?><br>
                                    <strong>Tanggal:</strong> <?php echo htmlspecialchars(date('Y-m-d', strtotime($row['start_event']))); ?><br>
                                    <strong>Waktu:</strong> <?php echo htmlspecialchars(date('H:i', strtotime($row['start_event']))); ?><br>
                                    <strong>Tempat:</strong> <?php echo htmlspecialchars($row['tempat_event']); ?><br>
                                </p>
                                
                                <!-- Jika send_id ditemukan, kirim ke halaman detail -->
                                
                                    <a href="../activities/previewundangan.php?id=<?= $row['plus_id']; ?>" class="btn btn-custom btn-sm">Detail</a>
                                
                                    
                                

                                <a href="editundangan.php?id=<?= $row['plus_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="deleteundangan.php?id=<?= $row['plus_id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus undangan ini?')" class="btn btn-danger btn-sm">Hapus</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        Tidak ada undangan yang ditemukan.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>