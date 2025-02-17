<?php
require '../service/connection.php';

$id = $_GET['id'];


// $sql = "SELECT s.id, s.plus_id FROM send s JOIN plus p WHERE s.id = $id";
// $sql = "SELECT s.plus_id FROM plus p WHERE s.id = $id";
$sql = "SELECT * FROM plus WHERE plus_id =$id";

$hasil = $conn->query($sql);

$hasil = $hasil->fetch_array();

if ($hasil['template'] == 1) {
    header("Location: ../template-preview/template-formal.php?id=" . $hasil['plus_id']);
    exit();
} elseif ($hasil['template'] == 2) {
    header("Location: ../template-preview/template1/index.php?id=" . $hasil['plus_id']);
    exit();
} elseif ($hasil['template'] == 3) {
    header("Location: ../template-preview/template2/index.php?id=" . $hasil['plus_id']);
    exit();
} else {
    echo "Template tidak ditemukan.";
}
?>