<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

$username = $_POST['username'];
$nama_user=$_POST['nama_user'];
$level=$_POST['level'];
$password=md5($_POST['password']);


if($_GET['id']){
  $tabel  = "ap_user";
  $id     = "user_id = '".$_GET['id']."'";
  $sql    = delete($tabel,$id);
  query($sql);
}else if($_POST['user_id']!=''){
  $tabel  = "ap_user";
  $id     = "user_id = '".$_POST['user_id']."'";
  $data   = array(
            "username" => $username,
            "nama_user" => $nama_user,
            "level" => $level,
            );
  $sql    = update($tabel,$data,$id);
  query($sql);
}else{
  $tabel = "ap_user";
  $data  = array(
    "user_id" => newID($tabel,'user_id'), 
    "username" => $username,
    "nama_user" => $nama_user,
    "password" => $password,
    "level" => $level,
  );
  $sql = insert($tabel,$data);
  // echo $sql;
  query($sql);
}


?>
