<?php

include 'konekyuki.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ambil value dari input
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $nilai = $_POST['nilai'];

    //menghindari penambahan nama berulang
    $query = $conn->query("SELECT * FROM daftarnilaiyuki WHERE nama = '$nama'");

    if ($query->fetch_row()[0] != null) {
        // echo "Error:" . mysqli_error($conn);
        header("location:belajar1.php");
    } else {
        // jika query berhasil dieksekusi
        // if(mysqli_num_rows($query) > 0 ){
        // }

    //query insert
    $sql = "INSERT INTO daftarnilaiyuki (nisn,nama,kelas,nilai) VALUES('$nisn','$nama','$kelas','$nilai')";

    if($conn->query($sql)){
        // echo "<script>window.location.href = 'belajar1.php'</script>";
    }
header("location:belajar1.php");
    
}
}