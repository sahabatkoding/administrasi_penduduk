-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 11:43 AM
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
-- Table structure for table `ap_imb`
--

CREATE TABLE `ap_imb` (
  `imb_id` int(11) NOT NULL,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `nik_pemohon` varchar(20) DEFAULT NULL,
  `imb_kode` varchar(255) DEFAULT NULL,
  `imb_lokasi_bangunan` varchar(255) DEFAULT NULL,
  `imb_jenis_bangunan` varchar(255) DEFAULT NULL,
  `imb_jenis_perijinan` varchar(255) DEFAULT NULL,
  `imb_pemberi_ijin` varchar(255) DEFAULT NULL,
  `imb_tahun_perijinan` year(4) DEFAULT NULL,
  `imb_berlaku_sampai` date DEFAULT NULL,
  `imb_status_persetujuan` varchar(255) DEFAULT NULL,
  `imb_keterangan` text,
  `id_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ap_imb`
--
ALTER TABLE `ap_imb`
  ADD PRIMARY KEY (`imb_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ap_imb`
--
ALTER TABLE `ap_imb`
  MODIFY `imb_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
