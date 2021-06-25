<?php 
require_once '../konektor.php';
require_once $LIB.'session.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

$pendidikan_nama = $_POST['pendidikan_nama'];

if($_GET['id']){
  $sql = "DELETE FROM ap_pendidikan WHERE pendidikan_id = '$_GET[id]'";
  $query = $koneksi->query($sql)or die($koneksi->error);
}else if($_POST['pendidikan_id']!=''){
  $sql = "UPDATE ap_pendidikan SET  pendidikan_nama = '$pendidikan_nama' WHERE pendidikan_id ='$_POST[pendidikan_id]'";
  $query = $koneksi->query($sql)or die($koneksi->error);
}else{
  $sql = "INSERT INTO ap_pendidikan (pendidikan_id,pendidikan_nama) VALUES ('','$pendidikan_nama')";
  $query = $koneksi->query($sql)or die($koneksi->error);
}

?>
