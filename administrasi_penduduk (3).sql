-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 10 Bulan Mei 2021 pada 13.31
-- Versi server: 5.7.31
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `ap_agama`
--

DROP TABLE IF EXISTS `ap_agama`;
CREATE TABLE IF NOT EXISTS `ap_agama` (
  `agama_id` int(11) NOT NULL AUTO_INCREMENT,
  `agama_nama` varchar(20) DEFAULT '',
  PRIMARY KEY (`agama_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_imb`
--

DROP TABLE IF EXISTS `ap_imb`;
CREATE TABLE IF NOT EXISTS `ap_imb` (
  `imb_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `imb_kode` varchar(255) DEFAULT NULL,
  `imb_lokasi_bangunan` varchar(255) DEFAULT NULL,
  `imb_jenis_bangunan` varchar(255) DEFAULT NULL,
  `imb_jenis_perijinan` varchar(255) DEFAULT NULL,
  `imb_pemberi_ijin` varchar(255) DEFAULT NULL,
  `imb_tahun_perijinan` year(4) DEFAULT NULL,
  `imb_berlaku_sampai` date DEFAULT NULL,
  `imb_status_persetujuan` varchar(255) DEFAULT NULL,
  `imb_keterangan` text,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`imb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_instansi`
--

DROP TABLE IF EXISTS `ap_instansi`;
CREATE TABLE IF NOT EXISTS `ap_instansi` (
  `instansi_id` int(11) NOT NULL,
  `instansi_nama` varchar(255) DEFAULT NULL,
  `instansi_alamat` text,
  `instansi_telepon` varchar(20) DEFAULT NULL,
  `instansi_email` varchar(255) DEFAULT NULL,
  `instansi_fax` varchar(255) DEFAULT NULL,
  `instansi_pemimpin` varchar(255) DEFAULT NULL,
  `instansi_kode` varchar(100) DEFAULT NULL,
  `instansi_logo` text,
  PRIMARY KEY (`instansi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_kabupaten`
--

DROP TABLE IF EXISTS `ap_kabupaten`;
CREATE TABLE IF NOT EXISTS `ap_kabupaten` (
  `kabupaten_id` int(11) NOT NULL AUTO_INCREMENT,
  `kabupaten_nama` varchar(255) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  PRIMARY KEY (`kabupaten_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_kecamatan`
--

DROP TABLE IF EXISTS `ap_kecamatan`;
CREATE TABLE IF NOT EXISTS `ap_kecamatan` (
  `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan_nama` varchar(255) DEFAULT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  PRIMARY KEY (`kecamatan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_kelahiran`
--

DROP TABLE IF EXISTS `ap_kelahiran`;
CREATE TABLE IF NOT EXISTS `ap_kelahiran` (
  `kelahiran_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `kelahiran_kode` varchar(255) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`kelahiran_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_kelurahan`
--

DROP TABLE IF EXISTS `ap_kelurahan`;
CREATE TABLE IF NOT EXISTS `ap_kelurahan` (
  `kelurahan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelurahan_nama` varchar(255) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  PRIMARY KEY (`kelurahan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_kematian`
--

DROP TABLE IF EXISTS `ap_kematian`;
CREATE TABLE IF NOT EXISTS `ap_kematian` (
  `kematian_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `kematian_kode` varchar(255) DEFAULT NULL,
  `tgl_kematian` date DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`kematian_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_kia`
--

DROP TABLE IF EXISTS `ap_kia`;
CREATE TABLE IF NOT EXISTS `ap_kia` (
  `kia_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `kia_kode` varchar(255) DEFAULT NULL,
  `id_anak` int(255) DEFAULT NULL,
  `id_orang_tua` int(255) DEFAULT NULL,
  `id_user` int(255) DEFAULT NULL,
  `kia_berlaku` date DEFAULT NULL,
  PRIMARY KEY (`kia_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_pendidikan`
--

DROP TABLE IF EXISTS `ap_pendidikan`;
CREATE TABLE IF NOT EXISTS `ap_pendidikan` (
  `pendidikan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pendidikan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ap_pendidikan`
--

INSERT INTO `ap_pendidikan` (`pendidikan_id`, `pendidikan_nama`) VALUES
(1, 'Tidak / Belum Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_penduduk`
--

DROP TABLE IF EXISTS `ap_penduduk`;
CREATE TABLE IF NOT EXISTS `ap_penduduk` (
  `penduduk_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `no_kk` varchar(30) DEFAULT NULL,
  `no_akta` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `penduduk_nama` varchar(255) DEFAULT NULL,
  `penduduk_tempat_lahir` varchar(255) DEFAULT NULL,
  `penduduk_tanggal_lahir` date DEFAULT NULL,
  `penduduk_jenis_kelamin` enum('L','P') DEFAULT NULL,
  `penduduk_golongan_darah` enum('O','A','B','AB') DEFAULT NULL,
  `penduduk_alamat` varchar(255) DEFAULT NULL,
  `penduduk_rt` varchar(2) DEFAULT NULL,
  `penduduk_rw` varchar(2) DEFAULT NULL,
  `id_kelurahan` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `penduduk_status_perkawinan` enum('BM','M','CM','CH') DEFAULT NULL COMMENT 'BM=Belum Menikah,M=Menikah,CM=Cerai Mati ,CH=Cerai Hidup',
  `id_pendidikan` int(11) DEFAULT NULL,
  `penduduk_pekerjaan` varchar(200) DEFAULT NULL,
  `penduduk_kewarganeraan` enum('WNI','WNA') DEFAULT NULL,
  `penduduk_no_passport` varchar(255) DEFAULT NULL,
  `penduduk_no_kitas` varchar(255) DEFAULT NULL,
  `penduduk_nama_ayah` varchar(255) DEFAULT NULL,
  `penduduk_nama_ibu` varchar(255) DEFAULT NULL,
  `penduduk_status_keluarga` enum('KK','I','A','M','O','Mr','F') DEFAULT NULL COMMENT 'KK=Kepala Keluarga,I=Istri,A=Anak,M=Menantu,Mr=Mertua,F=Family Lain',
  `penduduk_status` enum('B','L','M','D','K') DEFAULT NULL COMMENT 'B=Baru,L=Lama,M=Meninggal,P=Pindah',
  `penduduk_telepon` varchar(20) DEFAULT NULL,
  `penduduk_photo` text,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`penduduk_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_permohonan_cerai`
--

DROP TABLE IF EXISTS `ap_permohonan_cerai`;
CREATE TABLE IF NOT EXISTS `ap_permohonan_cerai` (
  `pcerai_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `pcerai_kode` varchar(255) DEFAULT NULL,
  `tgl_cerai` date DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `pcerai_tempat` varchar(255) DEFAULT NULL,
  `pcerai_keterangan` text,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`pcerai_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_permohonan_nikah`
--

DROP TABLE IF EXISTS `ap_permohonan_nikah`;
CREATE TABLE IF NOT EXISTS `ap_permohonan_nikah` (
  `pnikah_id` int(11) NOT NULL,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `pnikah_kode` varchar(255) DEFAULT NULL,
  `tgl_nikah` date DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `pnikah_tempat` varchar(255) DEFAULT NULL,
  `pnikah_keterangan` varchar(0) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`pnikah_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_pindah_datang`
--

DROP TABLE IF EXISTS `ap_pindah_datang`;
CREATE TABLE IF NOT EXISTS `ap_pindah_datang` (
  `pd_id` int(11) NOT NULL,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `pd_kode` varchar(255) DEFAULT NULL,
  `tgl_datang` date DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `pd_alamat_asal` varchar(255) DEFAULT NULL,
  `pd_alasan_pindah` varchar(255) DEFAULT NULL,
  `pd_keterangan` text,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`pd_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_pindah_keluar`
--

DROP TABLE IF EXISTS `ap_pindah_keluar`;
CREATE TABLE IF NOT EXISTS `ap_pindah_keluar` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `pk_kode` varchar(255) DEFAULT NULL,
  `tgl_pindah` date DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `pk_alamat_tujuan` varchar(255) DEFAULT NULL,
  `pk_alasan_pindah` varchar(255) DEFAULT NULL,
  `pk_keterangan` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_proposal`
--

DROP TABLE IF EXISTS `ap_proposal`;
CREATE TABLE IF NOT EXISTS `ap_proposal` (
  `proposal_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_pemohon` int(11) DEFAULT NULL,
  `proposal_tujuan` varchar(255) DEFAULT NULL,
  `proposal_status` varchar(255) DEFAULT NULL,
  `proposal_keterangan` text,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`proposal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_provinsi`
--

DROP TABLE IF EXISTS `ap_provinsi`;
CREATE TABLE IF NOT EXISTS `ap_provinsi` (
  `provinsi_id` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`provinsi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_umkm`
--

DROP TABLE IF EXISTS `ap_umkm`;
CREATE TABLE IF NOT EXISTS `ap_umkm` (
  `umkm_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_registrasi` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `umkm_kode` varchar(255) DEFAULT NULL,
  `umkm_nama_usaha` varchar(255) DEFAULT NULL,
  `umkm_jenis_usaha` varchar(255) DEFAULT NULL,
  `umkm_lokasi_usaha` varchar(255) DEFAULT NULL,
  `umkm_jenis_perijinan` varchar(255) DEFAULT NULL,
  `umkm_pemberi_ijin` varchar(255) DEFAULT NULL,
  `umkm_tahun_perijinan` year(4) DEFAULT NULL,
  `umkm_berlaku_sampai` date DEFAULT NULL,
  `umkm_status_persetujuan` varchar(255) DEFAULT NULL,
  `umkm_keterangan` text,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`umkm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_user`
--

DROP TABLE IF EXISTS `ap_user`;
CREATE TABLE IF NOT EXISTS `ap_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) DEFAULT '',
  `username` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `level` enum('admin','kasi_1','kasi_2','kasi_3') DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ap_user`
--

INSERT INTO `ap_user` (`user_id`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'kasi_1', 'kasi_1', '50cab2fc7228cb2b138a7eafd338cfae', 'kasi_1'),
(3, 'kasi_2', 'kasi_2', '75f18b88782a8d49eb122bc1fa0badca', 'kasi_2'),
(4, 'kasi_3', 'kasi_3', '7861341b06105a680653c0c7d172a3cd', 'kasi_3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
