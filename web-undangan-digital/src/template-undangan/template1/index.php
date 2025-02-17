<?php
require '../../service/connection.php';

$id = $_GET['id'];

$sql = "SELECT * FROM send WHERE id=$id";

$hasil_send = $conn->query($sql);

$hasil_send = $hasil_send->fetch_array();


// $sql = "SELECT s.id, s.plus_id FROM send s JOIN plus p WHERE s.id = $id";
// $sql = "SELECT s.plus_id FROM plus p WHERE s.id = $id";
$sql = "SELECT * FROM plus WHERE plus_id = (SELECT plus_id FROM send WHERE id =$id)";

$hasil = $conn->query($sql);

$hasil = $hasil->fetch_array();
// // print_r($hasil);

// echo $nama;

$dokumentasi_query = "SELECT * FROM dokumentasi WHERE fid_undangan = (SELECT plus_id FROM send WHERE id = $id)";
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
  --bg: #e2e0e2;
  --beige: #cfb997;
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

.hero button {
  font-family: "Josefin Sans", serif;
    background-color: var(--beige);
    position: relative;
    transition: opacity 2s ease;
    z-index: 10;
}

.hero button:hover {
  background-color: #f1e8c9;
  color: black;
  cursor: pointer;
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
    margin-bottom: 15px;
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
    margin-bottom: 5px;
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
            width: 100vw;
            height: 100vh;
            background-color: var(--bg);
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
            border-radius: 5%;
            background-color: var(--beige);            
            margin-top: 50px;
            padding: 20px;
            /* Tambahkan padding untuk memberikan ruang */
        }

        .reservasi-kotak h2 {
            margin-bottom: 20px;
            /* Tambahkan jarak antara heading dan isi form */
            color: white;
            font-family: "Bona Nova SC", serif;
            font-size: 24px;
            /* Ukuran font lebih proporsional */
        }

      .reservasi button {
      font-family: "Josefin Sans", serif;
      background-color: var(--beige);
      position: relative;
      transition: opacity 2s ease;
      z-index: 10;
      }

    .reservasi button:hover {
    background-color: #f1e8c9;
    color: black;
    cursor: pointer;
    }

/*Terima kasih*/
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
    font-size: 10rem;
    top: -50px;
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
    font-size: 2.5rem;
    z-index: 2;
    margin-bottom: 5p7;
}

.terima-kasih p{
    position: relative;
    font-family: "Josefin Sans", serif;
    font-size: 2.5rem;
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

#hero {
      position: relative;
  }

  .bottom-left-image {
      position: absolute;
      bottom: 5px;
      left: 5px;
      width: 500px;
      height: auto;
      z-index: 10;
  }

  .bottom-right-image {
    position: absolute;
    top: 0;  /* Pindahkan ke atas */
    right: 0; /* Pindahkan ke kanan */
    width: 500px;
    height: auto;
    z-index: 10;
}

.countdown1 {
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

    </style>
  </head>
  <body>
    <div id="container">
        
      <!-- Open Invitation -->
      <section id="hero" class="hero w-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-black">
        <main>
            <h1>HOLLA!!</h1>
            <div class="image-wrapper">
                <img class="log1" src="../../img/image-event/<?= $hasil['logo_event']?>">
                <img class="log2" src="../../img/image-event/<?= $hasil['logo_event']?>">
            </div>
            <h4>Kami turut mengundang Anda, <?= $hasil_send['nama']?> dalam acara</h4>
            <h4 class="dua"><?= $hasil['nama_event'] ?> <?= $hasil['judul_undangan'] ?></h4>
            <button type="button" class="btn btn-light shadow rounded-4 mt-3" onclick="scrollToSection('hero1'); showNavbar()">Open Invitation</button>
            
              <!-- Gambar di Pojok Kiri -->
          <img class="bottom-left-image" src="img/elemen/3.png" alt="Foto di Pojok Kiri">
          <!-- Gambar di Pojok Kanan -->
          <img class="bottom-right-image" src="img/elemen/1.png" alt="Foto di Pojok Kanan">
        </main>
    </section>
    

  <!-- Halaman Hero 1 -->
  <section id="hero1" class="hero1 w-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-black">
    <div>
      <h1><?= $hasil['judul_undangan'] ?></h1>
      <h4>Kepada Bapak/Ibu/Saudara/i</h4>
      <h4 class="dua"><?= $hasil_send['nama']?></h4>
      <h4 class="tiga">Tanpa mengurangi rasa hormat, <br> kami turut mengundang anda untuk hadir di acara <?= $hasil['nama_event'] ?> kami.</h4>
    </div>
  </section>

  <!-- Halaman Hero 2 -->
  <section id="hero2" class="hero2 w-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-black">
  
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
<section id="lokasi" class="lokasi w-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-black">
    <div>
      <h1>Lokasi Acara</h1>
      <h4><strong><?= $hasil['alamat_event']?></strong></h4>
    <div>   
            <h4><strong><?= $hasil['tempat_event'] ?></h4>
            <div class="details">
                <h5>Berikut adalah lokasi acara:</h5>
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
  </section>  


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


    <?php if ($hasil_send['level'] === 'VIP') : ?>
    <div class="reservasi" id="reservasi">
        <div class="reservasi-kotak">
            <h2 class="bona-nova-sc-regular">Reservasi Undangan</h2>
            <form method="POST" action="">
                <div class="mb-3" id="formnya">
                    <label for="nama" class="form-label" style="color: white;">Nama Tamu</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama tamu" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label" style="color: white;">Nomor Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label" style="color: white;">Alamat Asal</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Asal" required>
                </div>
                <button type="submit" name="generate" class="btn btn-submit w-50 mt-3">Submit Reservasi</button>
            </form>

            <div class="row">
                <div class="col-sm-12 text-center mt-3">
                    <?php
                    // Function to generate random string
                    function getRandomString($n) {
                        $characters = '0123456789';
                        $randomString = '';
                        for ($i = 0; $i < $n; $i++) {
                            $index = random_int(0, strlen($characters) - 1);
                            $randomString .= $characters[$index];
                        }
                        return $randomString;
                    }

                    // If form is submitted
                    if (isset($_POST['generate'])) {
                        $nama = htmlspecialchars($_POST['nama']);
                        $telepon = htmlspecialchars($_POST['telepon']);
                        $alamat = htmlspecialchars($_POST['alamat']);
                        $n = 6;
                        $token = getRandomString($n);
                        $code = $token . " " . $nama . " " . $telepon . " " . $alamat;

                        if (!empty($nama)) {
                            // Generate the QR code URL
                            $qrUrl = "https://quickchart.io/qr?text=" . urlencode($code);
                            ?>
                            <img src="<?= $qrUrl ?>" id="qrImage" alt="QR code" class="mt-3">
                            <p>Capture QR Code ini untuk registrasi.</p>
                            <?php
                        } else {
                            echo "<p>Nama tidak boleh kosong</p>";
                        }
                    }
                    ?>
                    <button id="downloadBtn" class="btn mt-2" onclick="downloadQRCode()">Download QR Code</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>



<script>
    function downloadQRCode() {
    var qrImage = document.getElementById("qrImage");
    if (!qrImage) {
        alert("QR Code tidak ditemukan!");
        return;
    }

    // Buat elemen canvas
    var canvas = document.createElement("canvas");
    var ctx = canvas.getContext("2d");

    // Buat objek gambar baru
    var img = new Image();
    img.crossOrigin = "anonymous"; // Hindari masalah CORS
    img.src = qrImage.src;

    img.onload = function () {
        canvas.width = img.width;
        canvas.height = img.height;
        ctx.drawImage(img, 0, 0);

        // Konversi canvas ke data URL
        var dataUrl = canvas.toDataURL("image/png");

        // Buat elemen 'a' untuk mengunduh file
        var link = document.createElement("a");
        link.href = dataUrl;
        link.download = "QR_Code.png"; // Nama file yang akan diunduh
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    };
}
</script>

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
<section id="terima-kasih" class="terima-kasih w-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-black" style="background-color: var(--bg);">
  <div>
    <h1>Terima Kasih!</h1>
    <h4>Atas perhatian dan partisipasi Anda dalam acara kami.</h4>
    <h4 class="dua">Kami sangat menghargai kehadiran Anda!</h4>
    <p class="mt-4">Jangan ragu untuk menghubungi kami jika Anda memiliki <br>pertanyaan lebih lanjut atau ingin berbagi kesan dan pesan setelah acara.</p>
  </div>
</section>


    <!-- Navbar di bagian bawah -->
    <nav class=" navbar fixed-bottom bg-beige">
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
          <?php if ($hasil_send['level'] === 'VIP') : ?>
          <li class="nav-item me-4">
            <a class="nav-link" href="#reservasi">
              <img src="img/icon/reservation.png" alt="Info" style="width: 24px; height: 24px; margin-right: 8px;">
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="#terima-kasih">
              <img src="img/icon/thanks.png" alt="Info" style="width: 24px; height: 24px; margin-right: 8px;">
            </a>
          </li>
        </ul>
        </div>
    </nav>
    </div>

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


<script>

import simplyCountdown from "simplyCountdown.js-master/src/core/simplyCountdown.ts";

// This is an example with default parameters
simplyCountdown('.countdown', {
    year: 2025, // Target year (required)
    month: 5, // Target month [1-12] (required)
    day: 21, // Target day [1-31] (required)
    hours: 0, // Target hour [0-23], default: 0
    minutes: 0, // Target minute [0-59], default: 0
    seconds: 0, // Target second [0-59], default: 0
    words: { // Custom labels, with lambda for plurals
        days: { root: 'day', lambda: (root, n) => n > 1 ? root + 's' : root },
        hours: { root: 'hour', lambda: (root, n) => n > 1 ? root + 's' : root },
        minutes: { root: 'minute', lambda: (root, n) => n > 1 ? root + 's' : root },
        seconds: { root: 'second', lambda: (root, n) => n > 1 ? root + 's' : root }
    },
    plural: true, // Use plurals for labels
    inline: false, // Inline format: e.g., "24 days, 4 hours, 2 minutes"
    inlineSeparator: ', ', // Separator for inline format, default: ", "
    inlineClass: 'simply-countdown-inline', // CSS class for inline countdown
    enableUtc: false, // Use UTC time if true
    refresh: 1000, // Refresh interval in ms, default: 1000
    sectionClass: 'simply-section', // CSS class for each countdown section
    amountClass: 'simply-amount', // CSS class for numeric values
    wordClass: 'simply-word', // CSS class for unit labels
    zeroPad: false, // Pad numbers with leading zero
    removeZeroUnits: false, // Remove units with zero value
    countUp: false, // Count up after reaching zero
    onEnd: () => {}, // Callback when countdown ends
    onStop: () => {}, // Callback when countdown is stopped
    onResume: () => {}, // Callback when countdown is resumed
    onUpdate: (params) => {} // Callback when countdown is updated
});

// Also, you can init with already existing Javascript Object.
let myElement = document.querySelector('.countdown');
simplyCountdown(myElement, { /* options */ });

let multipleElements = document.querySelectorAll('.countdown');
simplyCountdown(multipleElements, { /* options */ });
                    
</script>


<script src="simplyCountdown.js-master/dist/simplyCountdown.umd.js"></script>
<script>
    simplyCountdown(".countdown", {
        year: 2025,
        month: 5,
        day: 21,
    });
</script>

  </body>
</html>
