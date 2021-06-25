
<?php 
require_once '../konektor.php';
require_once $LIB.'session.php';
require_once $LIB.'tgl_indo.php';
if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}
$tgl_sekarang=date('y-m-d H:i:s');

$pemohon= pn($_POST['pemohon']);
$nama = $_POST['nama_usaha'];
$jenis = $_POST['jenis_usaha'];
$lokasi = $_POST['lokasi'];
$tahun = $_POST['tahun'];

$jenis_ijin=$_POST['jenis_ijin'];
$pemberi_ijin=$_POST['pemberi_ijin'];
$berlaku=$_POST['masa_berlaku'];
$status='Pengajuan';
$umkm_kode=$_POST['umkm_kode'];
$keterangan=$_POST['keterangan'];
$id_user=$_SESSION['user_id'];
$setatus=$_POST['setatus'];



if($_GET['id']){
  $sql = "DELETE FROM ap_umkm WHERE umkm_id = '$_GET[id]'";
  $query = $koneksi->query($sql)or die($koneksi->error);
}else if($_POST['umkm_id']!=''){
  $sql = "UPDATE ap_umkm SET  tgl_update='$tgl_sekarang',
                   
  								 umkm_kode='$umkm_kode',
  								 umkm_nama_usaha='$nama',
  								 umkm_jenis_usaha='$jenis',
  								 umkm_lokasi_usaha='$lokasi',	
  								 umkm_jenis_perijinan='$jenis_ijin',
  								 umkm_pemberi_ijin='$pemberi_ijin',
  								 umkm_tahun_perijinan='$tahun',
  								 umkm_berlaku_sampai='$berlaku',
  								 nik_pemohon='$pemohon',
  								 umkm_status_persetujuan='$setatus',
  								 umkm_keterangan = '$keterangan' WHERE umkm_id ='$_POST[umkm_id]'";
  $query = $koneksi->query($sql)or die($koneksi->error);
}else{
  $sql = "INSERT INTO ap_umkm (umkm_id,tgl_registrasi,tgl_update,
  umkm_kode,
  nik_pemohon,
  umkm_nama_usaha,
  umkm_jenis_usaha,
  umkm_lokasi_usaha,
  umkm_jenis_perijinan,
  umkm_pemberi_ijin,
  umkm_tahun_perijinan,
  umkm_berlaku_sampai,
  umkm_status_persetujuan,
  umkm_keterangan,
  id_user) 
  VALUES 
  ('','$tgl_sekarang','$tgl_sekarang','$umkm_kode','$pemohon','$nama','$jenis','$lokasi','$jenis_ijin','$pemberi_ijin','$tahun','$berlaku','$status','$keterangan','$id_user')";
  $query = $koneksi->query($sql)or die($koneksi->error);
}

?>
