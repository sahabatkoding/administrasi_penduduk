<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

$pendidikan_nama = $_POST['pendidikan_nama'];

if($_GET['id']){
  $tabel  = "ap_pendidikan";
  $id     = "pendidikan_id = '".$_GET['id']."'";
  $sql    = delete($tabel,$id);
  query($sql);
}else if($_POST['pendidikan_id']!=''){
  $tabel  = "ap_pendidikan";
  $id     = "pendidikan_id = '".$_POST['pendidikan_id']."'";
  $data   = array(
            "pendidikan_id" => $_POST['pendidikan_id'],
            "pendidikan_nama" => $pendidikan_nama,
            );
  $sql    = update($tabel,$data,$id);
  query($sql);
}else{
  $tabel = "ap_pendidikan";
  $data  = array(
    "pendidikan_id" => "", 
    "pendidikan_nama" => $pendidikan_nama,
  );
  $sql = insert($tabel,$data);
  query($sql);

}

?>
