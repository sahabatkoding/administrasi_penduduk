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
-- Table structure for table `ap_proposal`
--

CREATE TABLE `ap_proposal` (
  `proposal_id` int(11) NOT NULL,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `tgl_kegiatan` date DEFAULT NULL,
  `proposal_kode` varchar(255) DEFAULT NULL,
  `proposal_nama_kegiatan` varchar(255) DEFAULT NULL,
  `proposal_jenis_kegiatan` varchar(255) DEFAULT NULL,
  `proposal_lokasi_kegiatan` varchar(255) DEFAULT NULL,
  `proposal_tujuan_kegiatan` varchar(255) DEFAULT NULL,
  `proposal_bantuan_bentuk` varchar(255) DEFAULT NULL,
  `proposal_bantuan_uang` double(255,0) DEFAULT NULL,
  `proposal_bantuan_barang` text,
  `nik_pemohon` varchar(20) NOT NULL,
  `proposal_tujuan` varchar(255) DEFAULT NULL,
  `proposal_status` varchar(255) DEFAULT NULL,
  `proposal_keterangan` text,
  `id_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ap_proposal`
--

INSERT INTO `ap_proposal` (`proposal_id`, `tgl_registrasi`, `tgl_update`, `tgl_kegiatan`, `proposal_kode`, `proposal_nama_kegiatan`, `proposal_jenis_kegiatan`, `proposal_lokasi_kegiatan`, `proposal_tujuan_kegiatan`, `proposal_bantuan_bentuk`, `proposal_bantuan_uang`, `proposal_bantuan_barang`, `nik_pemohon`, `proposal_tujuan`, `proposal_status`, `proposal_keterangan`, `id_user`) VALUES
(1, '2021-06-21 00:00:00', '2021-06-24 16:40:42', '2021-06-24', 'GH/123/AS2', 'Budidaya ikan lele', 'budidaya', 'Gawon', 'Budidaya', 'Uang', 200000, '-', '123123 ', '-', 'Pengajuan', 'Belum diadakan', 1),
(9, '2021-06-21 13:57:43', '2021-06-24 15:02:26', '2021-06-19', 'GK/2/2021', 'Jalan sehat', 'Kesehatan masyarakat', 'Desa dowon', 'Mensehatkan masyarakat', 'Uang dan Barang', 200000, 'Air mineral', '293932', '', 'Ditolak', 'air mineral 5 dus', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ap_proposal`
--
ALTER TABLE `ap_proposal`
  ADD PRIMARY KEY (`proposal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ap_proposal`
--
ALTER TABLE `ap_proposal`
  MODIFY `proposal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
