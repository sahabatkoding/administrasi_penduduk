ALTER TABLE `administrasi_penduduk`.`ap_permohonan_cerai` 
DROP COLUMN `tgl_cerai`;

ALTER TABLE `administrasi_penduduk`.`ap_kia` 
CHANGE COLUMN `kia_id` `kia_nik` varchar(20) NOT NULL FIRST,
CHANGE COLUMN `nik_anak` `no_kk` varchar(20) NULL DEFAULT NULL AFTER `nik_orang_tua`,
MODIFY COLUMN `nik_orang_tua` varchar(20) NULL DEFAULT NULL AFTER `kia_kode`,
ADD COLUMN `kia_tempat_lahir` varchar(255) NULL AFTER `no_kk`,
ADD COLUMN `kia_tgl_lahir` date NULL AFTER `kia_tempat_lahir`,
ADD COLUMN `kia_nama_anak` varchar(255) NULL AFTER `kia_tgl_lahir`,
ADD COLUMN `kia_jenis_kelamin` enum('L','P') NULL AFTER `kia_nama_anak`,
ADD COLUMN `kia_agama` int NULL AFTER `kia_jenis_kelamin`,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`kia_nik`) USING BTREE;
MODIFY COLUMN `kia_nama_anak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL AFTER `no_kk`;
DROP COLUMN `no_kk`,
DROP COLUMN `kia_nama_anak`,
DROP COLUMN `kia_tempat_lahir`,
DROP COLUMN `kia_tgl_lahir`,
DROP COLUMN `kia_jenis_kelamin`,
DROP COLUMN `kia_agama`;