<?php
require '../../service/connection.php';

$id = $_GET['id'];

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
    <title>Undangan</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&display=swap" rel="stylesheet">
    </noscript>
    <link rel="stylesheet" href="simplyCountdown.js-master/dist/themes/default.css">
    <link rel="stylesheet" href="style.css">
    <style>
      :root {
  --bg: #7c2946;
  --beige: rgb(207, 185, 151);
  --shadow: 0 2px 2px rgba(0, 0, 0 / 0.5);
}

@font-face {
    font-family: 'Josefin Sans';
    src: url('/fonts/josefin-sans.woff2') format('woff2'),
         url('/fonts/josefin-sans.woff') format('woff');
    font-display: swap;
}

body{
    background-color: var(--bg);
    min-height: 100px;
    font-size: 1.2rem;
    font-family: Arial, sans-serif;
    overflow-x: hidden; /* Sembunyikan area di luar layar horizontal */ 
    overflow: hidden; /* Menghindari scroll saat transisi */
    overflow: auto;
}

body.fonts-loaded {
    font-family: 'Josefin Sans', Arial, sans-serif; /* Gunakan font web */
}

#container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}



/*Open Invitation*/
.hero {
    min-height: 100vh;
    background-color: var(--bg);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    z-index: 10;
    overflow: hidden; /* Nonaktifkan scroll di halaman pertama */
}

.hero h1{
    font-family: "Jersey 10", serif;
    font-size: 9.5rem;
}

.image-wrapper .log1 {
    width: 150px; /* Ukuran diameter lingkaran */
    height: 150px;
    background-color: #FFFFFF; /* Warna background putih */
    border-radius: 50%; /* Membuat background bulat */
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Opsional: Tambahkan bayangan */
    margin-right: 10px;
    padding: 15px;
    margin-bottom: 40px;
}

.image-wrapper .log2 {
    width: 150px; /* Ukuran diameter lingkaran */
    height: 150px;
    background-color: #FFFFFF; /* Warna background putih */
    border-radius: 50%; /* Membuat background bulat */
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Opsional: Tambahkan bayangan */
    padding: 20px;
    margin-bottom: 40px;
}

.log1 {
    width: 100px; /* Sesuaikan ukuran gambar */
    height: auto;
    max-width: 80%;
    object-fit: contain; /* Opsional: Memastikan gambar tetap proporsional */
}

.log2 {
    width: 100px; /* Sesuaikan ukuran gambar */
    height: auto;
    max-width: 80%;
    object-fit: contain; /* Opsional: Memastikan gambar tetap proporsional */
}

.hero h4{
    position: relative;
    font-family: "Josefin Sans", serif;
    font-size: 2rem;
    z-index: 2;
}

.hero h4.dua{
    position: relative;
    font-family: "Lilita One", serif;
    font-size: 2.5rem;
    z-index: 2;
}

button {
    position: relative;
    transition: opacity 2s ease;
    z-index: 10;
}

.fade-out {
    opacity: 0;
    transition: opacity 0.5s ease-out;
}

.show-next-page {
    opacity: 1;
}



/*section1*/
#hero1 {
  min-height: 100vh;
    background-color: var(--bg);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    z-index: 10;
    overflow: hidden; /* Nonaktifkan scroll di halaman pertama */
    }


#hero1 h1{
    position: relative;
    font-family: "Jersey 10", serif;
    font-size: 10rem;
    top: -80px;
    z-index: 2;
}

#hero1 h4{
    position: relative;
    font-family: "Josefin Sans", serif;
    font-size: 2.5rem;
    z-index: 2;
    margin-bottom: 10px;
}

#hero1 h4.dua{
    position: relative;
    font-family: "Lilita One", serif;
    font-size: 4rem;
    z-index: 2;
    margin-bottom: 5p7;
}

#hero1 h4.tiga{
    position: relative;
    font-family: "Josefin Sans", serif;
    font-size: 2.3rem;
    z-index: 2;
}



/*section2*/
#hero2 {
  min-height: 100vh;
    background-color: var(--bg);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    z-index: 10;
    overflow: hidden; /* Nonaktifkan scroll di halaman pertama */
    }

.hero2 h1{
    position: relative;
    font-family: "Jersey 10", serif;
    font-size: 7rem;
    top: -80px;
    z-index: 2;
}

.hero2 h4{
    position: relative;
    font-family: "Josefin Sans", serif;
    font-size: 2.5rem;
    z-index: 2;
    margin-bottom: 10px;
}

.hero2 h4.dua{
    position: relative;
    font-family: "Lilita One", serif;
    font-size: 3rem;
    z-index: 2;
    margin-bottom: 5p7;
}

.hero2 h4.tiga{
    position: relative;
    font-family: "Josefin Sans", serif;
    font-size: 2.3rem;
    z-index: 2;
}

.countdown {
    font-size: 2rem;
    margin-top: 20px;
}



/* Dokumentasi */
.dok {
  min-height: 100vh;
  background-color: var(--bg);
  color: #333;
  padding: 60px 20px;
  text-align: center;
}

.dok h1 {
  font-family: "Jersey 10", serif;
  font-size: 7rem;
  margin-bottom: 20px;
}

.dok h4 {
  font-family: "Josefin Sans", serif;
  font-size: 1.8rem;
  margin-bottom: 10px;
}

#carouselDok .carousel-inner img {
  max-height: 500px; /* Atur tinggi gambar carousel */
  object-fit: cover; /* Menyesuaikan gambar agar tidak terdistorsi */
}



/* Lokasi */
.lokasi {
  min-height: 100vh;
  background-color: var(--bg);
  color: #333;
  padding: 60px 20px;
  text-align: center;
}

.lokasi h1 {
  font-family: "Jersey 10", serif;
  font-size: 7rem;
  margin-bottom: 20px;
}

.lokasi h4 {
  font-family: "Josefin Sans", serif;
  font-size: 1.8rem;
  margin-bottom: 10px;
}

#map-container {
  margin-top: 30px;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
}

iframe {
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}



/* Reservasi */
.reservasi {
  min-height: 100vh;
  background-color: var(--bg);
  color: #fff;
  padding: 60px 20px;
  text-align: center;
}

.reservasi h1 {
  font-family: "Jersey 10", serif;
  font-size: 7rem;
  margin-bottom: 20px;
}

.reservasi h4 {
  font-family: "Josefin Sans", serif;
  font-size: 2rem;
  margin-bottom: 20px;
}

.reservation-form {
  max-width: 600px;
  margin: 0 auto;
}

.reservation-form .form-control {
  font-size: 1.2rem;
  padding: 10px;
  border-radius: 8px;
  margin-bottom: 15px;
}

.reservation-form button {
  font-size: 1.2rem;
  padding: 10px 20px;
  border-radius: 8px;
  background-color: var(--beige);
  color: var(--bg);
  border: none;
}

.reservation-form button:hover {
  background-color: #f1e8c9;
  color: var(--bg);
  cursor: pointer;
}



.terima-kasih {
  min-height: 100vh;
    background-color: var(--bg);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    z-index: 10;
    overflow: hidden; /* Nonaktifkan scroll di halaman pertama */
    }

.terima-kasih h1{
    position: relative;
    font-family: "Jersey 10", serif;
    font-size: 7rem;
    top: -80px;
    z-index: 2;
}

.terima-kasih h4{
    position: relative;
    font-family: "Josefin Sans", serif;
    font-size: 2.5rem;
    z-index: 2;
    margin-bottom: 10px;
}

.terima-kasih h4.dua{
    position: relative;
    font-family: "Josefin Sans", serif;
    font-size: 3rem;
    z-index: 2;
    margin-bottom: 5p7;
}

.terima-kasih p{
    position: relative;
    font-family: "Josefin Sans", serif;
    font-size: 2.3rem;
    z-index: 2;
}




/*navbar*/
.navbar {
    position: fixed;
    bottom: 0%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(207, 185, 151, 0.95);
    padding: 8px 30px;
    border-radius: 20px;
    z-index: 10;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    opacity: 0;
    transition: opacity 0.3s ease-in-out, transform 0.5s ease-out;
    width: auto;
    max-width: 40%;
}

.navbar.show-navbar {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
}

.navbar-nav {
    display: flex; /* Mengatur layout horizontal */
    justify-content: center; /* Menengahkan elemen */
    align-items: center; /* Vertikal tengah */
    gap: 20px; /* Jarak antar item */
    list-style: none; /* Hilangkan bullet points */
}

.nav-link {
    text-decoration: none; /* Hilangkan garis bawah */
    color: black; /* Warna teks */
    font-size: 16px; /* Ukuran font */
    display: flex; /* Flex untuk ikon dan teks */
    align-items: center; /* Vertikal tengah */
    gap: 8px; /* Jarak ikon dan teks */
}

.nav-link img {
    display: inline-block;
    width: 24px; /* Ukuran ikon */
    height: 24px; /* Ukuran ikon */
}

.nav-link span {
    font-family: 'Josefin Sans', sans-serif; /* Font untuk teks */
    font-size: 14px; /* Ukuran teks */
}

.nav-item {
    margin: 0; /* Hilangkan margin default */
}




/*animasi cloud*/
@keyframes move-cloud-left {
    0% {
        transform: translateX(100%); /* Mulai di luar layar sebelah kanan */
    }
    100% {
        transform: translateX(0%); /* Berakhir di luar layar sebelah kiri */
    }
}

@keyframes move-cloud-right {
    0% {
        transform: translateX(-100%); /* Mulai di luar layar sebelah kiri */
    }
    100% {
        transform: translateX(0%); /* Berakhir di luar layar sebelah kanan */
    }
}

.cloud-left {
    position: absolute;
    top: -18%;
    left: 0;
    width: 30%; /* 50% dari lebar layar */
    max-width: 2000px; /* Maksimal lebar */
    height: auto;
    opacity: 0.8;
    z-index: 1;
    animation: move-cloud-right 3s; /* Durasi 20 detik, berulang */
}

.cloud-right {
    position: absolute;
    top: 70%;
    right: 0;
    width: 30%; /* 50% dari lebar layar */
    max-width: 2000px; /* Maksimal lebar */
    height: auto;
    opacity: 0.8;
    z-index: 1;
    animation: move-cloud-left 3s; /* Durasi 25 detik, berulang */
}

.cloud-container {
    overflow: hidden;
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 1;
}
.dokumentasi {
            width: 100vw;
            height: 100vh;
            background-color: var(--bg);
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .dokumentasi-kotak {
            width: 850px;
            height: 650px;
            border-radius: 5%;
            background-color: var(--beige);
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

        .countdown1 {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
        font-family: Arial, sans-serif;
    }

    .countdown-item {
        background:rgb(80, 33, 49); /* Warna latar belakang */
        color: white; /* Warna teks */
        padding: 15px 20px;
        border-radius: 10px;
        text-align: center;
        font-weight: bold;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        min-width: 80px;
    }

    .countdown-item span {
        display: block;
        font-size: 24px;
        font-weight: bold;
    }

    /* Responsive */
    @media (max-width: 600px) {
        .countdown1 {
            flex-wrap: wrap;
            gap: 10px;
        }

        .countdown-item {
            padding: 10px 15px;
            min-width: 70px;
        }

        .countdown-item span {
            font-size: 20px;
        }
    }
    </style>
  </head>
  <body>
    <div id="container">
        
      <!-- Open Invitation -->
      <section id="hero" class="hero w-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
        <main>
          <h1>HOLLA!!</h1>
          <div class="image-wrapper">
            <img class="log1" src="../../img/image-event/<?= $hasil['logo_event']?>">
            <img class="log2" src="../../img/image-event/<?= $hasil['logo_event2']?>">
          </div>
          <h4>Kami turut mengundang Anda dalam acara</h4>
          <h4 class="dua"><?= $hasil['nama_event'] ?> <?= $hasil['judul_undangan'] ?></h4>
          <button type="button" class="btn btn-light shadow rounded-4 mt-3" onclick="scrollToSection('hero1'); showNavbar()">Open Invitation</button>
        </main>
      </section>

  <!-- Halaman Hero 1 -->
  <section id="hero1" class="hero1 w-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
    <div>
      <h1><?= $hasil['judul_undangan'] ?></h1>
      <h4>Kepada Bapak/Ibu/Saudara/i</h4>
      <h4 class="dua">Anda</h4>
      <h4 class="tiga">Tanpa mengurangi rasa hormat, <br> kami turut mengundang anda untuk hadir di acara <?= $hasil['nama_event'] ?> kami.</h4>
    </div>
  </section>

  <!-- Halaman Hero 2 -->
  <section id="hero2" class="hero2 w-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
    <div>
      <h1>Tanggal & Waktu</h1>
      <h4><?= $hasil['desc_event']?></h4>
      <h4><?=
        date('l, d F Y H:i', strtotime($hasil['start_event'])); ?></h4>
      <h5>S.d.</h5>
      <h4><?=date('l, d F Y H:i', strtotime($hasil['end_event'])); ?></h4>
      <!-- <div class="countdown simply-countdown"></div> -->
      <div class="countdown1">
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
      <button type="button" class="btn btn-light shadow rounded-4 mt-3" onclick="addToGoogleCalendar()">Tandai di Kalender</button>

      

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
    </div>
  </section>
  
<!-- Halaman Lokasi -->
<section id="lokasi" class="lokasi w-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
    <div>
      <h1>Lokasi Acara</h1>
      <h4><strong><?= $hasil['alamat_event']?></strong></h4>
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
  </section>  

  <!-- Halaman Dokum -->

<div id="dok" class="dokumentasi">
        <div class="dokumentasi-kotak">
            <h2 class="bona-nova-sc-regular">Dokumentasi</h2>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                    <?php
                    $firstItem = true;
                    while ($result = $stmt->fetch_assoc()){
                        $imagePath = "../../img/documentation/" . $result['image'];
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



<script>
        // Set target date
        const targetDate = new Date("<?= $hasil['start_event']?>").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const difference = targetDate - now;

            const days = Math.floor(difference / (1000 * 60 * 60 * 24));
            const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((difference % (1000 * 60)) / 1000);

            document.getElementById("days").textContent = days;
            document.getElementById("hours").textContent = hours;
            document.getElementById("minutes").textContent = minutes;
            document.getElementById("seconds").textContent = seconds;
        }

        setInterval(updateCountdown, 1000);
</script>

<!-- Halaman Terima Kasih -->
<section id="terima-kasih" class="terima-kasih w-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white" style="background-color: var(--bg);">
  <div>
    <h1>Terima Kasih!</h1>
    <h4>Atas perhatian dan partisipasi Anda dalam acara kami.</h4>
    <h4 class="dua">Kami sangat menghargai kehadiran Anda!</h4>
    <p class="mt-4">Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan lebih lanjut atau ingin <br>berbagi kesan dan pesan setelah acara.</p>
  </div>
</section>


    <!-- Navbar di bagian bawah -->
    <nav class="navbar fixed-bottom bg-beige">
      <div class="container-fluid justify-content-center">
        <ul class="navbar-nav d-flex flex-row mb-0">
          <li class="nav-item me-4">
            <a class="nav-link" href="#hero">
              <img src="img/icon/home.png" alt="Home" style="width: 24px; height: 24px; margin-right: 8px;">
            </a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="#hero1">
              <img src="img/icon/invitation.png" alt="Invitation" style="width: 24px; height: 24px; margin-right: 8px;">
            </a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="#hero2">
              <img src="img/icon/time.png" alt="Time" style="width: 24px; height: 24px; margin-right: 8px;">
            </a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="#lokasi">
              <img src="img/icon/location.png" alt="Info" style="width: 24px; height: 24px; margin-right: 8px;">
            </a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="#dok">
              <img src="img/icon/dok.png" alt="Info" style="width: 24px; height: 24px; margin-right: 8px;">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#terima-kasih">
              <img src="img/icon/thanks.png" alt="Info" style="width: 24px; height: 24px; margin-right: 8px;">
            </a>
          </li>
        </ul>
        </div>
    </nav>
    </div>

    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
// Fungsi untuk scroll ke section tertentu
function scrollToSection(sectionId) {
    var element = document.getElementById(sectionId);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
    }
}

// Fungsi untuk menampilkan navbar setelah scroll
function showNavbar() {
  var navbar = document.querySelector('.navbar');
  navbar.classList.add('show-navbar');
}

// Fungsi untuk menyembunyikan navbar saat kembali ke hero section
function hideNavbarOnScroll() {
    var heroSection = document.getElementById('hero');
    var navbar = document.querySelector('.navbar');
    
    // Memeriksa apakah kita berada di section hero
    var heroSectionRect = heroSection.getBoundingClientRect();
    
    if (heroSectionRect.top >= 0 && heroSectionRect.bottom <= window.innerHeight) {
        navbar.classList.remove('show-navbar'); // Sembunyikan navbar
    } else {
        navbar.classList.add('show-navbar'); // Tampilkan navbar
    }
}

// Menambahkan event listener untuk scroll
window.addEventListener('scroll', hideNavbarOnScroll);

    </script>

  </body>
</html>
