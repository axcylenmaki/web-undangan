-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Feb 2025 pada 10.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `undangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id` int(11) NOT NULL,
  `fid_undangan` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `dokumentasi`
--

INSERT INTO `dokumentasi` (`id`, `fid_undangan`, `image`) VALUES
(19, 28, '67a45a4767f5f.jpg'),
(21, 30, '67a5a8ad13624.png'),
(22, 30, '67a5a8ad15914.jpg'),
(23, 30, '67a5a8ad16921.jpg'),
(24, 31, '67a5b355d9f51.png'),
(25, 31, '67a5b355dcb63.jpg'),
(26, 31, '67a5b355dd54e.jpg'),
(27, 32, '67a5b46e97b4f.jpg'),
(28, 32, '67a5b46e992c1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fid_dokumentasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `image`
--

INSERT INTO `image` (`id`, `image`, `fid_dokumentasi`) VALUES
(19, '67a45a4767f5f.jpg', 19),
(21, '67a5a8ad13624.png', 21),
(24, '67a5b355d9f51.png', 24),
(26, '67a5b355dd54e.jpg', 26),
(27, '67a5b46e97b4f.jpg', 27),
(28, '67a5b46e992c1.jpg', 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `plus`
--

CREATE TABLE `plus` (
  `plus_id` int(11) NOT NULL,
  `judul_undangan` varchar(100) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `logo_event` varchar(100) NOT NULL,
  `logo_event2` varchar(100) NOT NULL,
  `desc_event` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `tempat_event` varchar(122) NOT NULL,
  `alamat_event` text NOT NULL,
  `template` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `plus`
--

INSERT INTO `plus` (`plus_id`, `judul_undangan`, `nama_event`, `logo_event`, `logo_event2`, `desc_event`, `start_event`, `end_event`, `tempat_event`, `alamat_event`, `template`, `id`) VALUES
(28, 'reyhan', 'pameran', '67a45a47666e6.jpg', '67a45a4766a2e.jpg', 'ajojfanffiouefuionfjsknjksfnsdfjkn', '2025-02-07 13:44:00', '2025-02-08 13:44:00', 'kating bersatu', 'njasdlasdnaslkdlaskdldas', 1, 2),
(30, 'Andika', 'Pameran', '67a5a8ad11af2.jpg', '67a5a8ad1210c.jpg', 'jandjanineunefneuf', '2025-02-08 13:30:00', '2025-02-09 13:30:00', 'Gedung Dika', 'Jl.Cipinang Indah', 1, 2),
(31, 'Coba', 'Event', '67a5b355d9394.jpg', '67a5b355d96ec.jpg', 'jakdjbdjandjasndjasjkdajsbdjasbjdad', '2025-02-08 14:16:00', '2025-02-09 14:16:00', 'Gedung P4', 'Jl. Anggrek No 7', 1, 2),
(32, 'jnandakndkandklasw', 'pameran', '67a5b46e93d95.jpg', '67a5b46e94106.jpg', 'ajdkndjkasndjknajdndanjdanjknjdasn', '2025-02-09 14:21:00', '2025-02-10 14:21:00', 'gedung', 'jl anggrek', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reset_password`
--

CREATE TABLE `reset_password` (
  `email` varchar(200) NOT NULL,
  `reset_token` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `send`
--

CREATE TABLE `send` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `level` enum('VIP','REGULAR') NOT NULL,
  `plus_id` int(150) NOT NULL,
  `telepon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id` int(150) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` int(150) NOT NULL,
  `token` int(150) NOT NULL,
  `fid_events` int(150) NOT NULL,
  `level` enum('VIP','REGULAR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'yuki', 'yuki21@gmail.com', '8fe41aefcdb82e345d9c3fdc41260f79;14b63c086cae11f77c517a6fe1a25aca876e17a926f24cfb497e94089ddb637f'),
(2, 'ridho', 'ridho@gmail.com', '5f073db88de8c82ea9988f1d8329db32;1a55989729aefb80d3ef46e7034870aefbc515badc21395cd591a28ce08e478f'),
(3, 'SMKN 71 JAKARTA', 'admin123@gmail.com', 'a07acc292da8ccd59e4627cd9cd7b6b4;70ab54f3201f25783000f7e326d2ed8e0898a6531bc78d4ac78a92e693ca3386');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fid_undangan` (`fid_undangan`);

--
-- Indeks untuk tabel `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fid_dokumentasi` (`fid_dokumentasi`);

--
-- Indeks untuk tabel `plus`
--
ALTER TABLE `plus`
  ADD PRIMARY KEY (`plus_id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plus_id` (`plus_id`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `plus`
--
ALTER TABLE `plus`
  MODIFY `plus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `send`
--
ALTER TABLE `send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD CONSTRAINT `dokumentasi_ibfk_1` FOREIGN KEY (`fid_undangan`) REFERENCES `plus` (`plus_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`fid_dokumentasi`) REFERENCES `dokumentasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `plus`
--
ALTER TABLE `plus`
  ADD CONSTRAINT `plus_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `send`
--
ALTER TABLE `send`
  ADD CONSTRAINT `send_ibfk_1` FOREIGN KEY (`plus_id`) REFERENCES `plus` (`plus_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
