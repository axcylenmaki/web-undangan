<?php
session_start();
require '../service/connection.php';

if (!isset($_SESSION['username'])) {
    header('location: ../auth/login.php');
    exit();
}

$query = "SELECT nama_event FROM plus";
$result = $conn->query($query);

$getEvent = $conn->query("SELECT * FROM plus");

if ($getEvent->num_rows < 1) {
    return redirect("event", "Tambahkan event terlebih dahulu", "error");
}

while ($row = $getEvent->fetch_array()) {
    $nama_events[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $id_event = $_POST['event'];
    $level = $_POST['level'];

    $sql = "INSERT INTO send (nama, telepon, plus_id, level)
VALUES ('$nama', '$telepon', '$id_event', '$level')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "berhasil.";
    } else {
        $error_message = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kirim WhatsApp</title>
    <link href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            background-color: #CADEF1;
            /* Warna latar belakang */
            color: white;
            font-family: Arial, sans-serif;
        }

        .form-container {
            margin: 20px auto;
            /* Jarak ke atas dan bawah */
            margin-top: 75px;
            background-color: #8199B1;
            /* Warna latar belakang */
            padding: 20px;
            /* Jarak isi form ke tepi */
            border-radius: 10px;
            /* Sudut melengkung */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Bayangan */
            max-width: 500px;
            /* Batas lebar form */
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
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
            color: black;
            /* Warna teks */
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
            <h2>Form Kirim Undangan</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Tamu</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama tamu" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" required>
                </div>
                <div class="mb-3">
                    <label for="event" class="form-label">Pilih Acara</label>
                    <select class="form-control" id="event" name="event" required>
                        <option value="">-- Pilih Acara --</option>
                        <?php foreach ($nama_events as $event) : ?>
                            <option value="<?= $event['plus_id']?>"><?= $event['judul_undangan']?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="event" class="form-label">Pilih Level</label>
                    <select class="form-control" id="level" name="level" required>
                        <option name="level">-- Pilih Level --</option>
                        <option value="VIP">Vip</option>
                        <option value="REGULAR">Regular</option>
                    </select>
                    <div class="mb-3">
                    <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                    <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" placeholder="Masukkan nama pengirim (PT.Fri Fayer)" required>
                </div>
                    <button type="submit" class="btn btn-submit w-100 mt-3">Kirim Undangan</button>
            </form>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

    <?php
    include '../service/utility.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // $sql2 = "SELECT * FROM send WHERE fid_undangan = $undangan";
        // Ambil nama event berdasarkan ID
        $query = $conn->prepare("SELECT id FROM send WHERE telepon = ?");
        $query->bind_param("s", $telepon);
        $query->execute();
        $result = $query->get_result();
        $send_data = $result->fetch_assoc();
        $id = $send_data['id'] ?? null;

        $username = $_POST['nama_pengirim'];

        $link = "http://localhost/mkk-undangan/src/activities/undangan.php?id=$id";


        // // Variabel untuk pesan otomatis
        // $username = "Acara Hebat"; // Ganti dengan username Anda
        // $nama_event = "Pesta Pernikahan"; // Ganti dengan nama acara Anda
        // $link = "https://example.com/undangan"; // Ganti dengan link acara Anda

        // Membuat pesan otomatis
        $query = $conn->prepare("SELECT s.id, p.judul_undangan, s.nama AS events 
                         FROM send s 
                         JOIN plus p ON s.plus_id = p.plus_id 
                         WHERE s.id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        $event_data = $result->fetch_assoc();
        $nama_event = $event_data['events'];


        $pesan = "Halo $nama, kami dari $username turut mengundang Anda di acara $nama_event, silahkan akses melalui link berikut: $link";

        $token = "D9BdisAz1PfVEYqbgatK";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $telepon,
                'message' => $pesan,
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: $token"
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            $_SESSION['error'] = $error_msg;
        } else {
            $_SESSION['success'] = 'Undangan terkirim!';
        }

        if (!headers_sent()) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<script>window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
            exit();
        }
    }
    ?>

    <?php
    if (isset($_SESSION['error'])) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '" . $_SESSION['error'] . "',
                showConfirmButton: true
            });
        </script>";
        unset($_SESSION['error']);
    }

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

</body>

</html>