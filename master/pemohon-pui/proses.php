<?php 
require_once '../konektor.php';


if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}
$tgl_sekarang=date('y-m-d H:i:s');
$p_nama = $_POST['p_nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$ni1 = $_POST['ni1'];
$ni2 = $_POST['ni2'];
$npwp = $_POST['npwp'];
$penghasilan = $_POST['penghasilan'];
$telepon_1 = $_POST['telepon_1'];
$telepon_2 = $_POST['telepon_2'];
$email = $_POST['email'];



if($_GET['id']){
  $sql = "DELETE FROM ap_pemohon WHERE pemohon_id = '$_GET[id]'";
  $query = $koneksi->query($sql)or die($koneksi->error);
}else if($_POST['pemohon_id']!=''){
  $sql = "UPDATE ap_pemohon SET  tgl_update='$tgl_sekarang',
  								 pemohon_nama='$p_nama',
  								 pemohon_tempat_lahir='$tempat_lahir',
  								 pemohon_tanggal_lahir='$tgl_lahir',
  								 pemohon_alamat='$alamat',	
  								 pemohon_no_identitas_1='$ni1',
  								 pemohon_no_identitas_2='$ni2',
  								 pemohon_npwp='$npwp',
  								 pemohon_penghasilan='$penghasilan',
  								 pemohon_telepon_1='$telepon_1',
  								 pemohon_telepon_2='$telepon_2',
  								 pemohon_email = '$email' WHERE pemohon_id ='$_POST[pemohon_id]'";
  $query = $koneksi->query($sql)or die($koneksi->error);
}else{
  $sql = "INSERT INTO ap_pemohon (pemohon_id,tgl_reg,tgl_update,pemohon_nama,pemohon_tempat_lahir,pemohon_tanggal_lahir,pemohon_alamat,pemohon_no_identitas_1,pemohon_no_identitas_2,pemohon_npwp,pemohon_penghasilan,pemohon_telepon_1,pemohon_telepon_2,pemohon_email) VALUES ('','$tgl_sekarang','$tgl_sekarang','$p_nama','$tempat_lahir','$tgl_lahir','$alamat','$ni1','$ni2','$npwp','$penghasilan','$telepon_1','$telepon_2','$email')";
  $query = $koneksi->query($sql)or die($koneksi->error);
}

?>
