-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2025 at 01:22 AM
-- Server version: 10.1.48-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id` int(11) NOT NULL,
  `fid_undangan` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumentasi`
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
(28, 32, '67a5b46e992c1.jpg'),
(29, 33, '67a956f72bfb2.jpeg'),
(30, 33, '67a956f741d7b.jpeg'),
(31, 33, '67a956f784f95.jpeg'),
(32, 33, '67a956f7a1d2e.jpeg'),
(33, 33, '67a956f7b2472.jpeg'),
(34, 34, '67abed499c05c.jpeg'),
(35, 34, '67abed49b03f8.jpeg'),
(36, 34, '67abed49c4d3c.jpeg'),
(37, 34, '67abed49f2e6c.jpeg'),
(38, 34, '67abed4a154d4.jpeg'),
(39, 35, '67abf3f51f292.jpeg'),
(40, 35, '67abf3f54c369.jpeg'),
(41, 35, '67abf3f570f18.jpeg'),
(42, 35, '67abf3f599bcd.jpeg'),
(43, 35, '67abf3f5ba336.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fid_dokumentasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image`, `fid_dokumentasi`) VALUES
(19, '67a45a4767f5f.jpg', 19),
(21, '67a5a8ad13624.png', 21),
(24, '67a5b355d9f51.png', 24),
(26, '67a5b355dd54e.jpg', 26),
(27, '67a5b46e97b4f.jpg', 27),
(28, '67a5b46e992c1.jpg', 28),
(29, '67a956f72bfb2.jpeg', 29),
(30, '67a956f741d7b.jpeg', 30),
(31, '67a956f784f95.jpeg', 31),
(32, '67a956f7a1d2e.jpeg', 32),
(33, '67a956f7b2472.jpeg', 33),
(34, '67abed499c05c.jpeg', 34),
(35, '67abed49b03f8.jpeg', 35),
(36, '67abed49c4d3c.jpeg', 36),
(37, '67abed49f2e6c.jpeg', 37),
(38, '67abed4a154d4.jpeg', 38),
(39, '67abf3f51f292.jpeg', 39),
(40, '67abf3f54c369.jpeg', 40),
(41, '67abf3f570f18.jpeg', 41),
(42, '67abf3f599bcd.jpeg', 42),
(43, '67abf3f5ba336.jpeg', 43);

-- --------------------------------------------------------

--
-- Table structure for table `plus`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plus`
--

INSERT INTO `plus` (`plus_id`, `judul_undangan`, `nama_event`, `logo_event`, `logo_event2`, `desc_event`, `start_event`, `end_event`, `tempat_event`, `alamat_event`, `template`, `id`) VALUES
(28, 'reyhan', 'pameran', '67a45a47666e6.jpg', '67a45a4766a2e.jpg', 'ajojfanffiouefuionfjsknjksfnsdfjkn', '2025-02-07 13:44:00', '2025-02-08 13:44:00', 'kating bersatu', 'njasdlasdnaslkdlaskdldas', 1, 2),
(30, 'Andika', 'Pameran', '67a5a8ad11af2.jpg', '67a5a8ad1210c.jpg', 'jandjanineunefneuf', '2025-02-08 13:30:00', '2025-02-09 13:30:00', 'Gedung Dika', 'Jl.Cipinang Indah', 1, 2),
(31, 'Coba', 'Event', '67a5b355d9394.jpg', '67a5b355d96ec.jpg', 'jakdjbdjandjasndjasjkdajsbdjasbjdad', '2025-02-08 14:16:00', '2025-02-09 14:16:00', 'Gedung P4', 'Jl. Anggrek No 7', 1, 2),
(32, 'jnandakndkandklasw', 'pameran', '67a5b46e93d95.jpg', '67a5b46e94106.jpg', 'ajdkndjkasndjknajdndanjdanjknjdasn', '2025-02-09 14:21:00', '2025-02-10 14:21:00', 'gedung', 'jl anggrek', 2, 2),
(33, 'Ridho & Ibnu', 'Pernikahan', '67a956f70ec7e.jpeg', '67a956f70fbde.jpeg', 'vuucyyueeee', '2025-02-11 08:31:00', '2025-02-12 08:31:00', 'IBIS HOTEL', 'jl anggrek 1 no.8 jatikramat', 1, 3),
(34, 'Spiderman & Eddie Brok', 'Nikah', '67abed497bd2c.jpeg', '67abed49882ac.jpeg', 'tsbjknk6rmurbyhbrvmbnyufntjymbfytdrehf bhthmhfnvrgew ngbhry4b hvhtrgve nfgbhth vdrby5hdry', '2025-02-13 07:36:00', '2025-02-14 07:36:00', 'Rumah Ridho', 'Jl Bintara 8,Bekasi', 2, 3),
(35, 'Ridho & Ibnu', 'Pernikahan', '67abf3f50f6e4.jpeg', '67abf3f5104b9.jpeg', 'wfwifhw', '2025-02-13 08:05:00', '2025-02-14 08:05:00', 'IBIS HOTEL', 'jl bintara 8,Bekasi', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `email` varchar(200) NOT NULL,
  `reset_token` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE `send` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `level` enum('VIP','REGULAR') NOT NULL,
  `plus_id` int(150) NOT NULL,
  `telepon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `send`
--

INSERT INTO `send` (`id`, `nama`, `level`, `plus_id`, `telepon`) VALUES
(52, 'Yuki', 'VIP', 34, '085697011994'),
(53, 'Renat', 'REGULAR', 33, '082213521461'),
(54, 'Bu Fadhillah', 'VIP', 35, '082169070191');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id` int(150) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` int(150) NOT NULL,
  `token` int(150) NOT NULL,
  `fid_events` int(150) NOT NULL,
  `level` enum('VIP','REGULAR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'yuki', 'yuki21@gmail.com', '8fe41aefcdb82e345d9c3fdc41260f79;14b63c086cae11f77c517a6fe1a25aca876e17a926f24cfb497e94089ddb637f'),
(2, 'ridho', 'ridho@gmail.com', '5f073db88de8c82ea9988f1d8329db32;1a55989729aefb80d3ef46e7034870aefbc515badc21395cd591a28ce08e478f'),
(3, 'SMKN 71 JAKARTA', 'admin123@gmail.com', '59d5396578ed135cf066fbf8ddd6f0d2;7a5f8402658bcc9007a53000f69e04b69d4cb61032bca32e8878d0b8a003fb37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fid_undangan` (`fid_undangan`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fid_dokumentasi` (`fid_dokumentasi`);

--
-- Indexes for table `plus`
--
ALTER TABLE `plus`
  ADD PRIMARY KEY (`plus_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plus_id` (`plus_id`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `plus`
--
ALTER TABLE `plus`
  MODIFY `plus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `send`
--
ALTER TABLE `send`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD CONSTRAINT `dokumentasi_ibfk_1` FOREIGN KEY (`fid_undangan`) REFERENCES `plus` (`plus_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`fid_dokumentasi`) REFERENCES `dokumentasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plus`
--
ALTER TABLE `plus`
  ADD CONSTRAINT `plus_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `send`
--
ALTER TABLE `send`
  ADD CONSTRAINT `send_ibfk_1` FOREIGN KEY (`plus_id`) REFERENCES `plus` (`plus_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
