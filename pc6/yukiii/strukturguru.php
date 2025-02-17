<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Guru - Sekolah XYZ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">
</head>
<body>
    <?php session_start(); ?>
    
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <img class="logo img-fluid" src="cropped-logo71.png" alt="Logo">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="strukturguru.php">Struktur Kepemimpinan</a>
                    <a class="dropdown-item" href="kurikulum.php">Kurikulum</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="kesiswaanDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kesiswaan
                </a>
                <div class="dropdown-menu" aria-labelledby="kesiswaanDropdown">
                    <a class="dropdown-item" href="ekskul.php">Ekstrakurikuler</a>
                    <a class="dropdown-item" href="#">Osis</a>
                    <a class="dropdown-item" href="#">Prestasi</a>
                    <a class="dropdown-item" href="#">Lulusan</a>
                </div>
            </li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <li class="nav-item">
                    <a class="nav-link" href="akunsiswa.php">
                        <?php echo htmlspecialchars($_SESSION['nama']); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logoutsiswa.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="loginDropdown">
                        <a class="dropdown-item" href="#">Login sebagai Guru</a>
                        <a class="dropdown-item" href="loginsiswa.php">Login sebagai Siswa</a>
                        <a class="dropdown-item" href="#">Login sebagai Staff</a>
                    </div>
                </li>
            <?php endif; ?>
        </ul>

        <!-- Search Form -->
        <form class="form-inline ml-auto" action="search.php" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
     <!-- Content -->
     <div class="container">
        <h1 class="text-center my-4">Struktur Organisasi Sekolah</h1>
        <div class="organization-chart">

            <!-- Kepala Sekolah -->
            <div class="row mb-4 justify-content-center">
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="lambas.jpg" alt="Kepala Sekolah" class="img-fluid rounded-circle">
                        <h3>Kepala Sekolah</h3>
                        <p class="title">Drs. Lambas Pakpahan, MM</p>
                    </div>
                </div>
            </div>

            <!-- Wakil Kepala Sekolah -->
            <div class="row mb-4 justify-content-center">
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="suwarni.jpg" alt="Waka Kesiswaan" class="img-fluid rounded-circle">
                        <h3>Waka Kesiswaan</h3>
                        <p class="title">Dra. Suwarni</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="https://via.placeholder.com/250" alt="⁠Waka Kurikulum" class="img-fluid rounded-circle">
                        <h3>⁠Waka Kurikulum</h3>
                        <p class="title">Jenny Vera Nursjam, M.Pd</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="chomi.jpg" alt="Waka Sarpras" class="img-fluid rounded-circle">
                        <h3>Waka Sarpras</h3>
                        <p class="title">Chomi Sarihandayani Spd</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="umi.jpg" alt="Waka Hubin" class="img-fluid rounded-circle">
                        <h3>Waka Hubin</h3>
                        <p class="title"> Umi Haniah Spd</p>
                    </div>
                </div>
            </div>

            <!-- Guru Jurusan RPL -->
            <div class="row mb-4 justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="aziza.JPG" alt="Guru Jurusan RPL 1">
                        <h3>Guru Jurusan RPL 1</h3>
                        <p class="title">Azizah Khoiro Nisah, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="nanda.jpg" alt="Guru Jurusan RPL 2">
                        <h3>Guru Jurusan RPL 2</h3>
                        <p class="title">Nanda Arsya Murti, S.Kom</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="fadillah.jpg" alt="Guru Jurusan RPL 3">
                        <h3>Guru Jurusan RPL 3</h3>
                        <p class="title">Nurhayatul Fadillah, S.Pd</p>
                    </div>
                </div>
            </div>

            <!-- Guru Animasi -->
            <div class="row mb-4 justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="miftah.jpg" alt="Guru Animasi 1">
                        <h3>Guru Animasi 1</h3>
                        <p class="title">Miftahul Zannah, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="anisah.jpg" alt="Guru Animasi 2">
                        <h3>Guru Animasi 2</h3>
                        <p class="title">Anisha Oktaviana, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="fonny.jpg" alt="Guru Animasi 3">
                        <h3>Guru Animasi 3</h3>
                        <p class="title">Fonny Krisnawulan P, S.Ds</p>
                    </div>
                </div>
            </div>

             <!-- Guru DKV -->
             <div class="row mb-4 justify-content-center">
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="yahya.jpg" alt="Guru DKV 1" class="img-fluid rounded-circle">
                        <h3>Guru DKV 1</h3>
                        <p class="title">Nurhadi Yahya, S.Ds</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="ramat.jpg" alt="Guru DKV 2" class="img-fluid rounded-circle">
                        <h3>Guru DKV 2</h3>
                        <p class="title">Rahmat Setiawan, S.Ds</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="anggi.jpg" alt="Guru DKV 3" class="img-fluid rounded-circle">
                        <h3>Guru DKV 3</h3>
                        <p class="title">Anggi Laras Pratiwi, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="ipin.jpg" alt="Guru DKV 3" class="img-fluid rounded-circle">
                        <h3>Guru DKV 4</h3>
                        <p class="title">Khairul Arifin, S.Pd</p>
                    </div>
                </div>
            </div>

            <!-- Other Subjects -->
            <div class="row mb-4 justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="usman.jpg" alt="Guru Bahasa Indonesia 1">
                        <h3>Guru Agama Islam 1</h3>
                        <p class="title">M. Usman, S.Si</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="arif.jpg" alt="Guru Bahasa Indonesia 2">
                        <h3>Guru Agama Islam 2</h3>
                        <p class="title">Arif Rahmadi</p>
                    </div>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="samuel.jpg" alt="Guru Bahasa Indonesia 1">
                        <h3>Guru Agama Kristen</h3>
                        <p class="title">Samuel Wicaksana, M.Pd</p>
                    </div>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="umi.jpg" alt="Guru Bahasa Indonesia 1">
                        <h3>Guru Bahasa Indonesia 1</h3>
                        <p class="title">Umi Haniah, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="sigit.jpg" alt="Guru Bahasa Indonesia 2">
                        <h3>Guru Bahasa Indonesia 2</h3>
                        <p class="title">Sigit Prasetyo, S.Pd</p>
                    </div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="adi.jpg" alt="Guru Bahasa Inggris 1">
                        <h3>Guru Bahasa Inggris 1</h3>
                        <p class="title">Dwiadi Eliyanto, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="dalilah.jpg" alt="Guru Bahasa Inggris 2">
                        <h3>Guru Bahasa Inggris 2</h3>
                        <p class="title">Dalilah, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="https://via.placeholder.com/250" alt="Guru Bahasa Inggris 2">
                        <h3>Guru Bahasa Inggris 3</h3>
                        <p class="title">Jenny Vera Nursjam, M.Pd</p>
                    </div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="maxi.jpg" alt="Guru Matematika 1">
                        <h3>Guru Matematika 1</h3>
                        <p class="title">Dra Maxi Noviyanti</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="nur.jpg" alt="Guru Matematika 2">
                        <h3>Guru Matematika 2</h3>
                        <p class="title">Nur Muhammad Spi'ie, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="may.jpg" alt="Guru Matematika 2">
                        <h3>Guru Matematika 3</h3>
                        <p class="title">Maidya Nengsih, S.Pd</p>
                    </div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="chomi.jpg" alt="Guru IPAS">
                        <h3>Guru IPAS</h3>
                        <p class="title">Chomisari Handayani, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="position">
                        <img src="suwarni.jpg" alt="Guru PKN">
                        <h3>Guru PKN</h3>
                        <p class="title">Dra Suwarni</p>
                    </div>
                </div>
            </div>

            <div class="row mb-4 justify-content-center">
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="ipin.jpg" alt="Guru Lainnya 1">
                        <h3>Guru Seni Budaya Dan Mulok</h3>
                        <p class="title">Khairul Arifin, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="nurina.jpg" alt="Guru Lainnya 2">
                        <h3>Guru Pjok</h3>
                        <p class="title">Nurina Kartika Ayu, S.Pd</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="position">
                        <img src="dwi.jpg" alt="Guru Lainnya 3">
                        <h3>Guru Sejarah</h3>
                        <p class="title">Dwiyuni Astuti, S.Pd</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
