<?php
require '../service/connection.php';

$id = $_GET['id'];



// $sql = "SELECT s.id, s.plus_id FROM send s JOIN plus p WHERE s.id = $id";
// $sql = "SELECT s.plus_id FROM plus p WHERE s.id = $id";
$sql = "SELECT * FROM plus WHERE plus_id = $id";

$hasil = $conn->query($sql);

$hasil = $hasil->fetch_array();
// // print_r($hasil);

// echo $nama;

$dokumentasi_query = "SELECT * FROM dokumentasi WHERE fid_undangan = $id";
$stmt = $conn->query($dokumentasi_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Undangan Pameran</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./style.css">

    <!-- <script>
        // function fadeAndRedirect() {
        //     const heroSection = document.querySelector('#hero');
        //     heroSection.classList.add('fade-out');
        //     setTimeout(() => {
        //         window.location.href = 'undangan.html'; // Ganti dengan URL halaman selanjutnya
        //     }, 1); // Tunggu hingga animasi selesai (500ms)
        // }
    </script> -->

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #7c2946;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 1px solid #d3cfcf;
            position: relative;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: 15px;
            border: 2px solid #d3cfcf;
            border-radius: 30px;
            pointer-events: none;
        }

        .container h1 {
            font-size: 24px;
            font-weight: 400;
            color: #6b5f5f;
            margin: 0;
        }

        .container h2 {
            font-size: 36px;
            font-weight: 600;
            color: #867d7d;
            margin: 10px 0;
            font-family: 'Cursive', sans-serif;
        }

        .details {
            margin: 20px 0;
            color: #6b5f5f;
        }

        .details span {
            display: block;
            margin: 5px 0;
            font-size: 18px;
        }

        .details .highlight {
            font-size: 22px;
            font-weight: 600;
            color: #6b5f5f;
        }

        .footer {
            font-size: 16px;
            color: #6b5f5f;
            margin-top: 20px;
        }

        .floral {
            margin-top: 20px;
        }

        .floral img {
            width: 100%;
            height: auto;
            border-radius: 12px;
        }

        .back-button {
            position: relative;
            /* Pastikan posisi diatur untuk mengaktifkan z-index */
            z-index: 3;
            /* Lebih tinggi daripada awan */
            font-size: 1.2rem;
            text-decoration: none;
            color: black;
            padding: 10px;
            border-radius: 5px;
        }
        
        .back-button:hover {
            background-color: #cfb997;
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
            background-color: #7c2946;
            color: white;
        }
    </style>
</head>

<body>
    <div class="w-100 position-relative" style="z-index: 3;">
        <a href="../activities/lihatundangan.php" class="back-button">
            <i class="bi bi-arrow-left fs-3"></i>
        </a>
    </div>
    <section id="hero" class="hero w-100 h-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
        <main>
            <h1><?= $hasil['judul_undangan'] ?></h1>

            <div class="image-wrapper">
            <img class="log1" src="../img/image-event/<?= $hasil['logo_event'] ?>" alt="logo71">
            <?php if (!empty($hasil['logo_event2'])): ?>
            <img class="log1" src="../img/image-event/<?= htmlspecialchars($hasil['logo_event2']) ?>" alt="logo71">
            <?php endif; ?>

                <!-- <img class="log2" src="../assets/img/LOGO RPL.png" alt="logo-rpl"> -->
            </div>

            <h4>Kami turut mengundang Anda, dalam acara</h4>
            <h4 class="dua"><?= $hasil['nama_event'] ?></h4>
            <a href="#invitation-container" class="btn btn-light shadow rounded-4 mt-3">
                <i class="fa-solid fa-envelope-open me-2"></i>Open Invitation
            </a>
        </main>
    </section>

    <div class="container" id="invitation-container">
        <h1>Undangan <?= $hasil['nama_event'] ?></h1>
        <h2><?= $hasil['judul_undangan'] ?></h2>
        <div class="details">
            <span>Yang akan diselenggarakan pada waktu dan tempat berikut:</span>
            <span class="highlight">
            <?= date('l, d F Y', strtotime($hasil['start_event'])); ?>
            </span>
            <span>
                <?= date('H:i', strtotime($hasil['start_event'])); ?>
            </span>

            <span class="highlight"><?= $hasil['tempat_event'] ?></span>
            <span><?= $hasil['alamat_event'] ?></span>
        </div>
        <div class="floral">
            <img class="log1" src="../img/image-event/ <?= $hasil['logo_event'] ?>">
        </div>
    </div>

        <div class="container">
            <h1>Lokasi Acara</h1>
            <h2><?= $hasil['judul_undangan'] ?></h2>
            <div class="details">
                <span>Berikut adalah lokasi acara:</span>
            </div>
            <div id="map-container" class="floral" style="margin-top: 20px; height: 400px; width: 100%;">
                <?php if (!empty($hasil['alamat_event'])): ?>
                    <iframe
                        src="https://www.google.com/maps?q=<?= urlencode($hasil['alamat_event']) ?>&output=embed"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                <?php else: ?>
                    <p>Alamat acara belum tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>

</body>

</html>