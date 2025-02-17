<?php
session_start();
require '../service/connection.php'; // Pastikan koneksi ke database

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Hapus data terkait di tabel `image` terlebih dahulu
    $sql_delete_images = "DELETE FROM image WHERE fid_dokumentasi = ?";
    $stmt1 = $conn->prepare($sql_delete_images);
    $stmt1->bind_param("i", $id);
    $stmt1->execute();
    $stmt1->close();

    // Hapus data dari tabel `plus`
    $sql_delete_plus = "DELETE FROM plus WHERE plus_id = ? AND id = ?";
    $stmt2 = $conn->prepare($sql_delete_plus);
    $stmt2->bind_param("ii", $id, $_SESSION['id']);

    if ($stmt2->execute()) {
        $_SESSION['message'] = "Undangan berhasil dihapus.";
    } else {
        $_SESSION['message'] = "Gagal menghapus undangan.";
    }
    $stmt2->close();
}

// Redirect kembali ke halaman daftar undangan
header('Location: lihatundangan.php');
exit();
?>
