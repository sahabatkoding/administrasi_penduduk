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
-- Table structure for table `ap_umkm`
--

CREATE TABLE `ap_umkm` (
  `umkm_id` int(11) NOT NULL,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `umkm_kode` varchar(255) DEFAULT NULL,
  `nik_pemohon` varchar(20) DEFAULT NULL,
  `umkm_nama_usaha` varchar(255) DEFAULT NULL,
  `umkm_jenis_usaha` varchar(255) DEFAULT NULL,
  `umkm_lokasi_usaha` varchar(255) DEFAULT NULL,
  `umkm_jenis_perijinan` varchar(255) DEFAULT NULL,
  `umkm_pemberi_ijin` varchar(255) DEFAULT NULL,
  `umkm_tahun_perijinan` year(4) DEFAULT NULL,
  `umkm_berlaku_sampai` date DEFAULT NULL,
  `umkm_status_persetujuan` varchar(255) DEFAULT NULL,
  `umkm_keterangan` text,
  `id_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_umkm`
--

INSERT INTO `ap_umkm` (`umkm_id`, `tgl_registrasi`, `tgl_update`, `umkm_kode`, `nik_pemohon`, `umkm_nama_usaha`, `umkm_jenis_usaha`, `umkm_lokasi_usaha`, `umkm_jenis_perijinan`, `umkm_pemberi_ijin`, `umkm_tahun_perijinan`, `umkm_berlaku_sampai`, `umkm_status_persetujuan`, `umkm_keterangan`, `id_user`) VALUES
(1, '2021-06-24 00:00:00', '2021-06-24 00:00:00', 'GH/23/ASD/2021', '123123', 'Sahabat Coding', 'Bidang Jasa', 'Oslo', 'izin lahan', 'Bayu Aji', 2021, '2022-09-10', 'Pengajuan', 'Jos', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ap_umkm`
--
ALTER TABLE `ap_umkm`
  ADD PRIMARY KEY (`umkm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ap_umkm`
--
ALTER TABLE `ap_umkm`
  MODIFY `umkm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
