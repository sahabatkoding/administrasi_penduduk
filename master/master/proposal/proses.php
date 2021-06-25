
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
$nama = $_POST['nama_kegiatan'];
$jenis = $_POST['jenis_kegiatan'];
$lokasi = $_POST['lokasi_kegiatan'];
$tujuan = $_POST['tujuan_kegiatan'];
$tgl_kegiatan = $_POST['tanggal_kegiatan'];
$bentuk=$_POST['bantuan_bentuk'];
$b_uang=$_POST['bantuan_uang'];
$b_barang=$_POST['bantuan_barang'];
$status='Pengajuan';
$proposal_kode=$_POST['proposal_kode'];
$keterangan=$_POST['keterangan'];
$id_user=$_SESSION['user_id'];
$setatus=$_POST['setatus'];



if($_GET['id']){
  $sql = "DELETE FROM ap_proposal WHERE proposal_id = '$_GET[id]'";
  $query = $koneksi->query($sql)or die($koneksi->error);
}else if($_POST['proposal_id']!=''){
  $sql = "UPDATE ap_proposal SET  tgl_update='$tgl_sekarang',
                   tgl_kegiatan='$tgl_kegiatan',
  								 proposal_kode='$proposal_kode',
  								 proposal_nama_kegiatan='$nama',
  								 proposal_jenis_kegiatan='$jenis',
  								 proposal_lokasi_kegiatan='$lokasi',	
  								 proposal_tujuan_kegiatan='$tujuan',
  								 proposal_bantuan_bentuk='$bentuk',
  								 proposal_bantuan_uang='$b_uang',
  								 proposal_bantuan_barang='$b_barang',
  								 nik_pemohon='$pemohon',
  								 proposal_status='$setatus',
  								 proposal_keterangan = '$keterangan' WHERE proposal_id ='$_POST[proposal_id]'";
  $query = $koneksi->query($sql)or die($koneksi->error);
}else{
  $sql = "INSERT INTO ap_proposal (proposal_id,tgl_registrasi,tgl_update,tgl_kegiatan,
  proposal_kode,
  proposal_nama_kegiatan,
  proposal_jenis_kegiatan,
  proposal_lokasi_kegiatan,
  proposal_tujuan_kegiatan,
  proposal_bantuan_bentuk,
  proposal_bantuan_uang,
  proposal_bantuan_barang,
  nik_pemohon,
  proposal_tujuan,
  proposal_status,
  proposal_keterangan,
  id_user) 
  VALUES 
  ('','$tgl_sekarang','$tgl_sekarang','$tgl_kegiatan','$proposal_kode','$nama','$jenis','$lokasi','$tujuan','$bentuk','$b_uang','$b_barang','$pemohon','','$status','$keterangan','$id_user')";
  $query = $koneksi->query($sql)or die($koneksi->error);
}

?>
