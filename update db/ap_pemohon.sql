-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 11:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `administrasi_penduduk`
--

-- --------------------------------------------------------

--
-- Table structure for table `ap_pemohon`
--

CREATE TABLE `ap_pemohon` (
  `pemohon_id` int(11) NOT NULL,
  `tgl_reg` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `pemohon_nik` varchar(20) DEFAULT NULL,
  `pemohon_nama` varchar(200) DEFAULT NULL,
  `pemohon_tempat_lahir` varchar(50) DEFAULT NULL,
  `pemohon_tanggal_lahir` date DEFAULT NULL,
  `pemohon_jk` enum('L','P') NOT NULL,
  `pemohon_agama` varchar(15) NOT NULL,
  `pemohon_alamat` text,
  `pemohon_no_identitas_1` varchar(30) DEFAULT NULL,
  `pemohon_no_identitas_2` varchar(30) DEFAULT NULL,
  `pemohon_npwp` varchar(50) DEFAULT NULL,
  `pemohon_penghasilan` double(20,2) DEFAULT NULL,
  `pemohon_telepon_1` varchar(16) DEFAULT NULL,
  `pemohon_telepon_2` varchar(16) DEFAULT NULL,
  `pemohon_email` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_pemohon`
--

INSERT INTO `ap_pemohon` (`pemohon_id`, `tgl_reg`, `tgl_update`, `pemohon_nik`, `pemohon_nama`, `pemohon_tempat_lahir`, `pemohon_tanggal_lahir`, `pemohon_jk`, `pemohon_agama`, `pemohon_alamat`, `pemohon_no_identitas_1`, `pemohon_no_identitas_2`, `pemohon_npwp`, `pemohon_penghasilan`, `pemohon_telepon_1`, `pemohon_telepon_2`, `pemohon_email`) VALUES
(1, '2021-06-18 14:39:45', '2021-06-24 14:13:23', '123123', 'bayu', 'klaten', '2021-06-18', 'L', 'Islam', 'Mojoasri', '2382382928', '2838288', '2323as', 2000000.00, '089777888', '09856', 'bayuajiseno99@gmail.com'),
(5, '2021-06-21 11:36:38', '2021-06-24 14:11:18', '293932', 'Gaburo', 'Klaten', '1998-06-15', 'L', 'Islam', 'sasd', '1232', '24224', 'as2324', 22222.00, '2323', '2323', 'as@ca'),
(6, '2021-06-24 14:16:35', '2021-06-24 15:03:44', '231223', 'Asada san', 'asdas', '2021-06-17', 'P', 'Silahkan Pilih', 'asdasd', '12321', '231231', '2313', 2323.00, '2323', '23', 'asd@sddsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ap_pemohon`
--
ALTER TABLE `ap_pemohon`
  ADD PRIMARY KEY (`pemohon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ap_pemohon`
--
ALTER TABLE `ap_pemohon`
  MODIFY `pemohon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
