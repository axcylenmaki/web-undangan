<?php
session_start();
include 'konekyuki.php'; // Pastikan file koneksi sudah benar

if (!isset($_SESSION['user_data'])) {
    header("Location: forgot_password.php"); // Arahkan kembali jika tidak ada data pengguna
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $nisn = $_SESSION['user_data']['NISN'];

    // Hash password baru sebelum menyimpannya
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update password di database
    $sql = "UPDATE siswa SET PASSWORD = ? WHERE NISN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashed_password, $nisn);
    $stmt->execute();

    $_SESSION['message'] = "Kata sandi berhasil diubah.";
    $stmt->close();
    $conn->close();

    // Menghapus data pengguna dari session
    unset($_SESSION['user_data']);
    header("Location: loginsiswa.php");
    exit();
}

$user_data = $_SESSION['user_data'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Kata Sandi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Reset Kata Sandi</h2>
    <form method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" value="<?php echo $user_data['EMAIL']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nisn">NISN:</label>
            <input type="text" class="form-control" name="nisn" value="<?php echo $user_data['NISN']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="new_password">Kata Sandi Baru:</label>
            <input type="password" class="form-control" name="new_password" placeholder="Kata Sandi Baru" required>
        </div>
        <button type="submit" class="btn btn-primary">Ganti Kata Sandi</button>
    </form>
    
    <?php
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-success mt-3'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
    }
    ?>
</div>
</body>
</html>
