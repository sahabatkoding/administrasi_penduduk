CREATE TABLE `ap_agama` (
`agama_id` int(11) NOT NULL AUTO_INCREMENT,
`agama_nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
PRIMARY KEY (`agama_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_imb` (
`imb_id` int(11) NOT NULL AUTO_INCREMENT,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`id_pemohon` int(11) NULL DEFAULT NULL,
`imb_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`imb_lokasi_bangunan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`imb_jenis_bangunan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`imb_jenis_perijinan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`imb_pemberi_ijin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`imb_tahun_perijinan` year NULL DEFAULT NULL,
`imb_berlaku_sampai` date NULL DEFAULT NULL,
`imb_status_persetujuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`imb_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
`id_user` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`imb_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_instansi` (
`instansi_id` int(11) NOT NULL,
`instansi_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`instansi_alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
`instansi_telepon` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`instansi_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`instansi_fax` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`instansi_pemimpin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`instansi_kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`instansi_logo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
PRIMARY KEY (`instansi_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_kabupaten` (
`kabupaten_id` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`id_provinsi` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`kabupaten_nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`kabupaten_id`) ,
INDEX `regencies_province_id_index` (`id_provinsi` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_kecamatan` (
`kecamatan_id` char(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`id_kabupaten` char(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`kabupaten_nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`kecamatan_id`) ,
INDEX `districts_id_index` (`id_kabupaten` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_kelahiran` (
`kelahiran_id` int(11) NOT NULL AUTO_INCREMENT,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`kelahiran_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`id_penduduk` int(11) NULL DEFAULT NULL,
`id_pemohon` int(11) NULL DEFAULT NULL,
`id_user` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`kelahiran_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_kelurahan` (
`kelurahan_id` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`id_kecamatan` char(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`kelurahan_nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`kelurahan_id`) ,
INDEX `villages_district_id_index` (`id_kecamatan` ASC) USING BTREE
)
ENGINE = InnoDB
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_kematian` (
`kematian_id` int(11) NOT NULL AUTO_INCREMENT,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`kematian_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`tgl_kematian` date NULL DEFAULT NULL,
`id_penduduk` int(11) NULL DEFAULT NULL,
`id_pemohon` int(11) NULL DEFAULT NULL,
`id_user` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`kematian_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_kia` (
`kia_id` int(11) NOT NULL AUTO_INCREMENT,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`kia_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`id_anak` int(255) NULL DEFAULT NULL,
`id_orang_tua` int(255) NULL DEFAULT NULL,
`id_user` int(255) NULL DEFAULT NULL,
`kia_berlaku` date NULL DEFAULT NULL,
PRIMARY KEY (`kia_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_pendidikan` (
`pendidikan_id` int(11) NOT NULL AUTO_INCREMENT,
`pendidikan_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`pendidikan_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_penduduk` (
`penduduk_id` int(11) NOT NULL AUTO_INCREMENT,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`no_kk` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`no_akta` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_tanggal_lahir` date NULL DEFAULT NULL,
`penduduk_jenis_kelamin` enum('L','P') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_golongan_darah` enum('O','A','B','AB') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_rt` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_rw` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`id_kelurahan` int(11) NULL DEFAULT NULL,
`id_kecamatan` int(11) NULL DEFAULT NULL,
`id_kabupaten` int(11) NULL DEFAULT NULL,
`id_provinsi` int(11) NULL DEFAULT NULL,
`id_agama` int(11) NULL DEFAULT NULL,
`penduduk_status_perkawinan` enum('BM','M','CM','CH') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'BM=Belum Menikah,M=Menikah,CM=Cerai Mati ,CH=Cerai Hidup',
`id_pendidikan` int(11) NULL DEFAULT NULL,
`penduduk_pekerjaan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_kewarganeraan` enum('WNI','WNA') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_no_passport` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_no_kitas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_nama_ayah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_nama_ibu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_status_keluarga` enum('KK','I','A','M','O','Mr','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'KK=Kepala Keluarga,I=Istri,A=Anak,M=Menantu,Mr=Mertua,F=Family Lain',
`penduduk_status` enum('B','L','M','D','K') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'B=Baru,L=Lama,M=Meninggal,P=Pindah',
`penduduk_telepon` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`penduduk_photo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
`id_user` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`penduduk_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_permohonan_cerai` (
`pcerai_id` int(11) NOT NULL AUTO_INCREMENT,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`pcerai_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`tgl_cerai` date NULL DEFAULT NULL,
`id_pemohon` int(11) NULL DEFAULT NULL,
`pcerai_tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`pcerai_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
`id_user` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`pcerai_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_permohonan_nikah` (
`pnikah_id` int(11) NOT NULL,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`pnikah_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`tgl_nikah` date NULL DEFAULT NULL,
`id_pemohon` int(11) NULL DEFAULT NULL,
`pnikah_tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`pnikah_keterangan` varchar(0) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`id_user` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`pnikah_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_pindah_datang` (
`pd_id` int(11) NOT NULL,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`pd_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`tgl_datang` date NULL DEFAULT NULL,
`id_penduduk` int(11) NULL DEFAULT NULL,
`pd_alamat_asal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`pd_alasan_pindah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`pd_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
`id_user` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`pd_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_pindah_keluar` (
`pk_id` int(11) NOT NULL AUTO_INCREMENT,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`pk_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`tgl_pindah` date NULL DEFAULT NULL,
`id_penduduk` int(11) NULL DEFAULT NULL,
`pk_alamat_tujuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`pk_alasan_pindah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`pk_keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`id_user` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`pk_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_proposal` (
`proposal_id` int(11) NOT NULL AUTO_INCREMENT,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`tgl_kegiatan` date NULL DEFAULT NULL,
`proposal_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`proposal_nama_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`proposal_jenis_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`proposal_lokasi_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`proposal_tujuan_kegiatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`proposal_bantuan_bentuk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`proposal_bantuan_uang` double(255,0) NULL DEFAULT NULL,
`proposal_bantuan_barang` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
`id_pemohon` int(11) NULL DEFAULT NULL,
`proposal_tujuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`proposal_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`proposal_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
`id_user` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`proposal_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_provinsi` (
`provinsi_id` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`provinsi_nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`provinsi_id`) 
)
ENGINE = InnoDB
AUTO_INCREMENT = 0
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_umkm` (
`umkm_id` int(11) NOT NULL AUTO_INCREMENT,
`tgl_registrasi` datetime NULL DEFAULT NULL,
`tgl_update` datetime NULL DEFAULT NULL,
`id_pemohon` int(11) NULL DEFAULT NULL,
`umkm_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`umkm_nama_usaha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`umkm_jenis_usaha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`umkm_lokasi_usaha` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`umkm_jenis_perijinan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`umkm_pemberi_ijin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`umkm_tahun_perijinan` year NULL DEFAULT NULL,
`umkm_berlaku_sampai` date NULL DEFAULT NULL,
`umkm_status_persetujuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
`umkm_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
`id_user` int(11) NULL DEFAULT NULL,
PRIMARY KEY (`umkm_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 1
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;
CREATE TABLE `ap_user` (
`user_id` int(11) NOT NULL AUTO_INCREMENT,
`nama_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
`username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
`password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
`level` enum('admin','kasi_1','kasi_2','kasi_3') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
PRIMARY KEY (`user_id`) 
)
ENGINE = MyISAM
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 0
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
KEY_BLOCK_SIZE = 0
MAX_ROWS = 0
MIN_ROWS = 0
ROW_FORMAT = Dynamic;

ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_proposal_1` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_proposal` (`id_pemohon`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_umkm_1` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_umkm` (`id_pemohon`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_permohonan_cerai_1` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_permohonan_cerai` (`id_pemohon`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_imb_1` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_imb` (`id_pemohon`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_pindah_keluar_1` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_pindah_keluar` (`id_penduduk`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_pindah_datang_1` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_pindah_datang` (`id_penduduk`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_permohonan_nikah_1` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_permohonan_nikah` (`id_pemohon`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_kematian_1` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_kematian` (`id_penduduk`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_kematian_2` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_kematian` (`id_pemohon`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_kia_1` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_kia` (`id_anak`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_kia_2` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_kia` (`id_orang_tua`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_kelahiran_1` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_kelahiran` (`id_penduduk`);
ALTER TABLE `ap_penduduk` ADD CONSTRAINT `fk_ap_penduduk_ap_kelahiran_2` FOREIGN KEY (`penduduk_id`) REFERENCES `ap_kelahiran` (`id_pemohon`);
ALTER TABLE `ap_agama` ADD CONSTRAINT `fk_ap_agama_ap_penduduk_1` FOREIGN KEY (`agama_id`) REFERENCES `ap_penduduk` (`id_agama`);
ALTER TABLE `ap_pendidikan` ADD CONSTRAINT `fk_ap_pendidikan_ap_penduduk_1` FOREIGN KEY (`pendidikan_id`) REFERENCES `ap_penduduk` (`id_pendidikan`);
ALTER TABLE `ap_provinsi` ADD CONSTRAINT `fk_ap_provinsi_ap_kabupaten_1` FOREIGN KEY (`provinsi_id`) REFERENCES `ap_kabupaten` (`id_provinsi`);
ALTER TABLE `ap_kabupaten` ADD CONSTRAINT `fk_ap_kabupaten_ap_kecamatan_1` FOREIGN KEY (`kabupaten_id`) REFERENCES `ap_kecamatan` (`id_kabupaten`);
ALTER TABLE `ap_kecamatan` ADD CONSTRAINT `fk_ap_kecamatan_ap_kelurahan_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `ap_kelurahan` (`id_kecamatan`);
ALTER TABLE `ap_provinsi` ADD CONSTRAINT `fk_ap_provinsi_ap_penduduk_1` FOREIGN KEY (`provinsi_id`) REFERENCES `ap_penduduk` (`id_provinsi`);
ALTER TABLE `ap_kabupaten` ADD CONSTRAINT `fk_ap_kabupaten_ap_penduduk_1` FOREIGN KEY (`kabupaten_id`) REFERENCES `ap_penduduk` (`id_kabupaten`);
ALTER TABLE `ap_kecamatan` ADD CONSTRAINT `fk_ap_kecamatan_ap_penduduk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `ap_penduduk` (`id_kecamatan`);
ALTER TABLE `ap_kelurahan` ADD CONSTRAINT `fk_ap_kelurahan_ap_penduduk_1` FOREIGN KEY (`kelurahan_id`) REFERENCES `ap_penduduk` (`id_kelurahan`);
ALTER TABLE `ap_user` ADD CONSTRAINT `fk_ap_user_ap_proposal_1` FOREIGN KEY (`user_id`) REFERENCES `ap_proposal` (`id_user`);
ALTER TABLE `ap_user` ADD CONSTRAINT `fk_ap_user_ap_umkm_1` FOREIGN KEY (`user_id`) REFERENCES `ap_umkm` (`id_user`);
ALTER TABLE `ap_user` ADD CONSTRAINT `fk_ap_user_ap_kelahiran_1` FOREIGN KEY (`user_id`) REFERENCES `ap_kelahiran` (`id_user`);
ALTER TABLE `ap_user` ADD CONSTRAINT `fk_ap_user_ap_kia_1` FOREIGN KEY (`user_id`) REFERENCES `ap_kia` (`id_user`);
ALTER TABLE `ap_user` ADD CONSTRAINT `fk_ap_user_ap_kematian_1` FOREIGN KEY (`user_id`) REFERENCES `ap_kematian` (`id_user`);
ALTER TABLE `ap_user` ADD CONSTRAINT `fk_ap_user_ap_permohonan_cerai_1` FOREIGN KEY (`user_id`) REFERENCES `ap_permohonan_cerai` (`id_user`);
ALTER TABLE `ap_kelahiran` ADD CONSTRAINT `fk_ap_kelahiran_ap_permohonan_nikah_1` FOREIGN KEY (`kelahiran_id`) REFERENCES `ap_permohonan_nikah` (`id_user`);
ALTER TABLE `ap_user` ADD CONSTRAINT `fk_ap_user_ap_penduduk_1` FOREIGN KEY (`user_id`) REFERENCES `ap_penduduk` (`id_user`);
ALTER TABLE `ap_user` ADD CONSTRAINT `fk_ap_user_ap_pindah_datang_1` FOREIGN KEY (`user_id`) REFERENCES `ap_pindah_datang` (`id_user`);
ALTER TABLE `ap_user` ADD CONSTRAINT `fk_ap_user_ap_pindah_keluar_1` FOREIGN KEY (`user_id`) REFERENCES `ap_pindah_keluar` (`id_user`);
ALTER TABLE `ap_user` ADD CONSTRAINT `fk_ap_user_ap_imb_1` FOREIGN KEY (`user_id`) REFERENCES `ap_imb` (`id_user`);

