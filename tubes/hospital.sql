-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 05:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id_app` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id_app`, `nama`, `no_telp`, `keluhan`, `status`) VALUES
(1, 'Ujang bin Bucky', '0987654321', 'sakit kepala abis kalap belaja pake shopeepay later', 'Finished'),
(2, 'Albarra', '081234567890', 'sakit perut gara gara gacoan soalnya pedes banget sampe perut mules dan brot brot', 'Pending'),
(3, 'Eugene Crabs', '08987654321', 'Suka duit tapi banyak duit tapi ga mau di belanja in soalnya cinta banget sama duit', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_poliklinik` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `gender`, `no_telp`, `id_poliklinik`, `foto`) VALUES
(1, 'Ayu Spectre', 'wanita', '080000000000', 1, '6299fa881d6denenek-tapasya.jpg'),
(2, 'Andry Setiawan', 'pria', '081312345678', 1, '6299fb4276b42soba.jpg'),
(3, 'Widia Sari', 'pria', '081212345678', 1, '6299facbb5a66reze.jpg'),
(4, 'Ilyas Sidiq', 'pria', '081812345678', 1, '6299fb784dd99spongebob.jpg'),
(5, 'Melly Kustiani', 'wanita', '0819123456789', 1, '6299e2b34ab8amrs-puff.png'),
(15, 'Usup bin Odin', 'pria', '0800000000005', 3, '6298b8560324eWren Is Coming Back to _Pretty Little Liars_ During Season 7B.jpg'),
(16, 'Squidward Tempoles', 'pria', '0891234567890', 5, '6299e161a64a1pria-tampan.jpg'),
(18, 'sdawad', 'pria', '0890000000', 3, '<br />\r\n<b>Notice</b>:  Undefined index: gambar in <b>D:xampphtdocspw2022_d_213040108	ubesadmindokteredit.php</b> on line <b>110</b><br />\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `ruangan` varchar(30) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_dokter`, `hari`, `ruangan`, `open`, `close`) VALUES
(1, 1, 'Senin', 'R012', '09:30:00', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat`, `tgl_lahir`, `gender`) VALUES
(1, 'Muhammad Brimstone', 'Jalan Fracture', '2022-05-01', 'Pria'),
(6576, 'Barra AlKhasyani Unch', 'Jalan rumahnya', '2022-05-16', 'Pria'),
(6577, 'Nur Fade', 'Jalan Haven no 1', '2022-05-01', 'wanita'),
(6578, 'Steven Grant', 'Jalan Malam Hari no 55', '2022-02-22', 'pria'),
(6588, 'syasya', 'Jalan jalan kemana aja no 1', '2022-06-12', 'wanita');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id_poliklinik` int(11) NOT NULL,
  `nama_poliklinik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`id_poliklinik`, `nama_poliklinik`) VALUES
(1, 'Umum'),
(3, 'Jantung'),
(5, 'THT');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rekmed` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_poliklinik` int(11) NOT NULL,
  `riwayat_penyakit` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `hasil_pemeriksaan` varchar(255) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rekmed`, `id_dokter`, `id_pasien`, `id_poliklinik`, `riwayat_penyakit`, `keluhan`, `diagnosa`, `hasil_pemeriksaan`, `tgl_input`) VALUES
(2, 1, 1, 3, '-', 'Sakit gigi', 'Gigi berlubang', 'Cabut aja lah biar cepet sembuh', '2022-05-18 10:29:28'),
(4, 1, 6576, 1, 'sdsad', 'sadaw', 'wafsa', 'sfawf', '2022-05-30 05:35:22'),
(7, 1, 6577, 3, 'kagetan banget orangnya', 'kaget', 'mengkaget', 'jantungan jadi jantung nya harus di ganti silicon', '2022-06-07 22:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '1234567890', 'admin'),
(2, 'user', '1234567890', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id_app`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_poliklinik` (`id_poliklinik`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id_poliklinik`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekmed`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_poliklinik` (`id_poliklinik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6589;

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id_poliklinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rekmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_poliklinik`) REFERENCES `poliklinik` (`id_poliklinik`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `rekam_medis_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `rekam_medis_ibfk_4` FOREIGN KEY (`id_poliklinik`) REFERENCES `poliklinik` (`id_poliklinik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
