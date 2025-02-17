<?php
require '../service/connection.php';

$id = $_GET['id'];

$sql = "SELECT * FROM send WHERE id=$id";

$hasil_send = $conn->query($sql);

$hasil_send = $hasil_send->fetch_array();


// $sql = "SELECT s.id, s.plus_id FROM send s JOIN plus p WHERE s.id = $id";
// $sql = "SELECT s.plus_id FROM plus p WHERE s.id = $id";
$sql = "SELECT * FROM plus WHERE plus_id = (SELECT plus_id FROM send WHERE id =$id)";

$hasil = $conn->query($sql);

$hasil = $hasil->fetch_array();

if ($hasil['template'] == 1) {
    header("Location: ../template-undangan/template-formal.php?id=" . $hasil_send['id']);
    exit();
} elseif ($hasil['template'] == 2) {
    header("Location: ../template-undangan/template1/index.php?id=" . $hasil_send['id']);
    exit();
} elseif ($hasil['template'] == 3) {
    header("Location: ../template-undangan/template2/index.php?id=" . $hasil_send['id']);
    exit();
} else {
    echo "Template tidak ditemukan.";
}
?>