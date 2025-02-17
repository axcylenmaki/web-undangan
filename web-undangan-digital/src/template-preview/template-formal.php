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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan SMK Negeri 71</title>
    <link href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.11.3/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bona+Nova+SC:ital,wght@0,400;0,700;1,400&family=Mulish&family=Praise&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }

        .mulish {
            font-family: "Mulish", serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }

        .praise-regular {
            font-family: "Praise", serif;
            font-weight: 400;
            font-style: normal;
        }

        .dancing-script {
            font-family: "Dancing Script", serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }

        .bona-nova-sc-regular {
            font-family: "Bona Nova SC", serif;
            font-weight: 400;
            font-style: normal;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            padding: 0;
            margin: 0;
            height: 100%;

        }

        .invitation-section {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f8ff;
            background-image: url('../assets/img/template-formal/bg-bukund.png');
            background-size: 100% 100%;
            /* Mengatur agar gambar menutupi seluruh elemen */
            background-position: center;
            /* Menempatkan gambar di tengah */
            background-repeat: no-repeat;
            /* Agar gambar tidak diulang */
            padding: 20px;
        }

        .invitation-container {
            background-color: white;
            border: 2px solid #1e90ff;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
        }

        .content {
            position: relative;
        }

        .logos {
            display: flex;
            justify-content: center;
            gap: 20px;
            /* margin-bottom: 40px; */
        }

        .logos img {
            width: 100px;
            height: auto;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1e90ff;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #1e90ff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #005bb5;
        }

        /* Hero1 section */
        .hero1 {
            width: 100vw;
            height: 100vh;
            background-color: #f0f8ff;
            background-image: url('../assets/img/template-formal/bg-pamer.png');
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero1 h1 {
            margin-top: 6rem;
            margin-bottom: 10px;
            color: black;
            font-family: "Praise", serif;
            font-size: 100px;
            margin-right: 70px;
            ;
        }

        .hero1 h4 {
            margin: 10px 0;
            color: black;
        }

        .hero1 .satu {
            font-size: 35px;
        }

        .hero1 .dua {
            font-weight: bold;
        }

        .hero1 .tiga {
            font-size: 30px;
            line-height: 1.5;
        }

        .logo {
            margin-bottom: 110px;
        }

        .anjay {
            width: 100vw;
            height: 100vh;
            background-color: #f0f8ff;
            background-image: url('../assets/img/template-formal/bg-waktu.png');
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;

        }

        .anjay h1 {
            margin: 10px 0;
            margin-bottom: 40px;
            color: black;
            font-family: "Praise", serif;
            font-size: 100px;
            margin-right: 70px;
        }

        .anjay h1 {
            margin: 10px 0;
            margin-bottom: 40px;
            color: black;
            font-family: "Praise", serif;
            font-size: 100px;
            margin-right: 70px;
        }

        .highlights{
            margin-bottom: 10px;  
        }

        .highlight{
            margin-bottom: 20px;  
        }

        .countdown {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            justify-content: center;
        }

        .countdown-item {
            background: white;
            color: black;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            font-weight: bold;
        }

        .countdown-item span {
            display: block;
            font-size: 1.5rem;
        }

        .btn-reminder {
            background-color: black;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .btn-reminder:hover {
            background-color: #005bb5;
        }

        .lokasi {
            width: 100vw;
            height: 100vh;
            background-color: #f0f8ff;
            background-image: url('../assets/img/template-formal/bg-lokasi.png');
            background-size: 100% 100%;
            /* Mengatur agar gambar menutupi seluruh elemen */
            background-position: center;
            /* Menempatkan gambar di tengah */
            background-repeat: no-repeat;
            /* Agar gambar tidak diulang */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;

        }

        .container {
            width: 50%;
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

        .dokumentasi {
            width: 100vw;
            height: 100vh;
            background-color: #f0f8ff;
            background-image: url('../assets/img/template-formal/bg-dokumen.png');
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .dokumentasi-kotak {
            width: 1000px;
            height: 575px;
            border-radius: 15%;
            background-color: #274C6E;
            margin-top: 50px;
            overflow: hidden;
            padding: 20px;
        }

        .dokumentasi-kotak h2 {
            margin: 10px 0;
            color: white;
            font-family: "Bona Nova SC", serif;
            font-size: 50px;
        }

        .carousel-inner {
            height: 400px;
            /* Batasi tinggi carousel */
            display: flex;
            align-items: center;
            /* Pusatkan gambar secara vertikal */
            /* justify-content: center; */
            /* Pusatkan gambar secara horizontal */
        }

        .carousel-item img {
            max-height: 100%;
            /* Batasi tinggi gambar */
            max-width: 100%;
            /* Batasi lebar gambar */
            object-fit: contain;
            /* Pastikan gambar tetap proporsional */
            margin: auto;
            /* Pusatkan gambar */
        }

        .reservasi {
            width: 100vw;
            height: 100vh;
            background-color: #f0f8ff;
            background-image: url('../assets/img/template-formal/bg-reservasi.png');
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .reservasi-kotak {
            width: 500px;
            height: auto;
            /* Sesuaikan tinggi dengan isi */
            border-radius: 15%;
            background-color: #274C6E;
            margin-top: 50px;
            padding: 20px;
            /* Tambahkan padding untuk memberikan ruang */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            /* Tambahkan efek bayangan agar lebih menarik */
        }

        .reservasi-kotak h2 {
            margin-bottom: 20px;
            /* Tambahkan jarak antara heading dan isi form */
            color: white;
            font-family: "Bona Nova SC", serif;
            font-size: 24px;
            /* Ukuran font lebih proporsional */
        }

        .mb-3 {
            margin-bottom: 15px;
            /* Beri jarak antar elemen form */
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
        }

        .btn-submit {
            background-color: #2E8BC0;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #1E6A9E;
        }

            .navbar-bawah {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 60px;
        background-color: #274C6E;
        display: flex;
        justify-content: space-around;
        align-items: center;
        box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.2);
        z-index: 1000;

        /* Awalnya navbar tidak terlihat */
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.1s ease-in-out, visibility 0.2s;
    }

    .nav-item {
        color: white;
        text-decoration: none;
        font-size: 24px;
        transition: transform 0.2s ease, color 0.2s ease;
    }

    .nav-item:hover {
        color: black;
        transform: scale(1.2);
    }

    .nav-item i {
        display: block;
    }
    </style>
</head>

<body>
    <!-- Undangan -->
    <div class="invitation-section">
        <div class="invitation-container">
            <div class="logos">
                <img src="../img/image-event/<?= $hasil['logo_event']?>">
                <img src="../img/image-event/<?= $hasil['logo_event2']?>">
            </div>
            <h2 style="margin-top: 1rem;">Kami turut mengundang Anda dalam acara <?= $hasil['nama_event'] ?></h2>
            <h1><?= $hasil['judul_undangan'] ?></h1>
            <!-- Tombol menuju hero1 -->
            <a href="#hero1" class="btn btn-primary">Buka Undangan</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div id="hero1" class="hero1">
        <!-- <img src="../assets/img/template-formal/bg-hero1.png" alt="bg-img"> -->
        <div>
            <h1 class="praise-regular"><?= $hasil['judul_undangan'] ?></h1>
            <div class="logo">
                <div class="logos" style="margin-right: 70px;">
                    <img src="../img/image-event/<?= $hasil['logo_event']?>" class="logo">
                    <img src="../img/image-event/<?= $hasil['logo_event2']?>" class="logo">
                </div>
                <div style="margin-right: 70px;">
                    <h4 class="satu dancing-script">Kepada Bapak/Ibu/Saudara/i</h4>
                    <h4 class="dua mulish">Anda</h4>
                    <h4 class="tiga">
                        Tanpa mengurangi rasa hormat, <br> Kami turut mengundang Anda untuk hadir di acara <?= $hasil['nama_event'] ?> kami.
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="anjay" id="anjay">
        <h1 class="praise-regular"><?= $hasil['nama_event'] ?> <?= $hasil['judul_undangan'] ?></h1>
        <span class="highlights"><?=
        date('l, d F Y H:i', strtotime($hasil['start_event'])); ?> - 
        <?=date('l, d F Y H:i', strtotime($hasil['end_event'])); ?></span>
        <span class="highlight"><?= $hasil['desc_event']?></span>

        <div class="countdown">
            <div class="countdown-item">
                <span id="days">0</span>
                DAYS
            </div>
            <div class="countdown-item">
                <span id="hours">0</span>
                HOURS
            </div>
            <div class="countdown-item">
                <span id="minutes">0</span>
                MINUTES
            </div>
            <div class="countdown-item">
                <span id="seconds">0</span>
                SECONDS
            </div>
        </div>
        <button id="reminderButton" onclick="addToGoogleCalendar()" class="btn btn-primary btn-reminder" style="margin-top: 20px;">Ingatkan
            Saya</button>
    </div>

    <div class="lokasi" id="lokasi">
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

    <div class="dokumentasi" id="dokumentasi">
        <div class="dokumentasi-kotak">
            <h2 class="bona-nova-sc-regular">Dokumentasi</h2>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                    <?php
                    $firstItem = true;
                    while ($result = $stmt->fetch_assoc()){
                        $imagePath = "../img/documentation/" . $result['image'];
                    ?>
                    <div class="carousel-item <?= $firstItem ? 'active' : "" ?>">
                        <img src="<?= $imagePath ?>"  class="d-block w-100" alt="Gambar <?= $result['id']?>">
                    </div>
                    <?php
                        $firstItem = false;
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" style="background-color: black; border-radius: 20%; width: 40px; height: 40px; top: 50%; transform: translateY(-50%);" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Prev</span>
                </button>
                <button class="carousel-control-next" style="background-color: black; border-radius: 20%; width: 40px; height: 40px; top: 50%; transform: translateY(-50%);" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    

    <div class="navbar-bawah">
        <a href="#hero1" class="nav-item">
            <i class="bi bi-envelope-fill"></i>
        </a>
        <a href="#anjay" class="nav-item">
            <i class="bi bi-calendar-event-fill"></i>
        </a>
        <a href="#lokasi" class="nav-item">
            <i class="bi bi-geo-alt-fill"></i>
        </a>
        <a href="#dokumentasi" class="nav-item">
            <i class="bi bi-camera-fill"></i>
        </a>
        
        <a href="#reservasi" class="nav-item">
            <i class="bi bi-file-text-fill"></i>
        </a>
        
    </div>

    <script>
  function addToGoogleCalendar() {
      const eventTitle = "<?= $hasil['nama_event'] ?> <?= $hasil['judul_undangan'] ?>";
      const eventDetails = "<?= $hasil['desc_event']?>";
      const eventLocation = "<?= $hasil['alamat_event']?>";
      
      // Ensure the dates are in the correct format: YYYYMMDDTHHmmss
      const startDate = "<?= date('Ymd\THis', strtotime($hasil['start_event'])) ?>";
      const endDate = "<?= date('Ymd\THis', strtotime($hasil['end_event'])) ?>";

      const googleCalendarUrl = `https://www.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(eventTitle)}&details=${encodeURIComponent(eventDetails)}&location=${encodeURIComponent(eventLocation)}&dates=${encodeURIComponent(startDate)}/${encodeURIComponent(endDate)}`;

      window.open(googleCalendarUrl, "_blank");
  }
</script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let bukaUndanganBtn = document.querySelector(".btn.btn-primary");

        bukaUndanganBtn.addEventListener("click", function (event) {
            

            // Ambil navbar
            let navbar = document.querySelector(".navbar-bawah");

            // Tambahkan delay sebelum navbar muncul
            setTimeout(() => {
                navbar.style.opacity = "1";
                navbar.style.visibility = "visible";
            }, 500); // Delay 0.5 detik sebelum navbar muncul

            // Opsional: Scroll ke hero1 setelah navbar muncul
            setTimeout(() => {
                window.location.href = bukaUndanganBtn.getAttribute("href");
            }, 500); // Delay lebih lama agar efek fade-in terlihat
        });
    });
    </script>




<script>
    // Set target date
    const targetDate = new Date("<?= $hasil['start_event']?>").getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        let difference = targetDate - now;

        let days = 0, hours = 0, minutes = 0, seconds = 0;

        if (difference > 0) {
            days = Math.floor(difference / (1000 * 60 * 60 * 24));
            hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            seconds = Math.floor((difference % (1000 * 60)) / 1000);
        }

        document.getElementById("days").textContent = days;
        document.getElementById("hours").textContent = hours;
        document.getElementById("minutes").textContent = minutes;
        document.getElementById("seconds").textContent = seconds;
    }

    setInterval(updateCountdown, 1000);


        function initMap() {
            const location = { lat: -6.2327, lng: 106.9237 }; // Ganti dengan koordinat lokasi Anda
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: location,
            });

            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: "SMK Negeri 71 Jakarta",
            });
        }

    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>

    <script>
        function checkQRCode(){
            const qrImage = document.getElementById('qrImage');
            const downloadBtn = document.getElementById('downloadBtn');

            if (qrImage && qrImage.src){
                downloadBtn.style.display = 'inline-block';
            } else {
                downloadBtn.style.display = 'none';
            }
        }

        window.addEventListener('load', checkQRCode)

        document.addEventListener('submit', function(){
            setTimeout(checkQRCode, 500);
        });

        document.getElementById('downloadBtn').addEventListener('click', function(){
            const qrImage = document.getElementById('qrimage');
            if (qrImage){
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');

                const img = new Image();
                img.crossOrigin = 'anonymous';
                img.src = qrImage.src;

                img.onload = function(){
                    canvas.width = img.width;
                    canvas.height = img.height;
                    ctx.drawImage(img, 0 , 0);

                    const link = document.createElement('a');
                    link.download = 'qr-code.jpg';
                    link.href = canvas.toDataURL('image/jpeg', 1.0);
                    link.click();
                };

                img.onerror = function(){
                    alert('Failed to load QR code image');
                };
            } else{
                alert('QR code is not generated yet.');
            }
        });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>

</body>

</html>