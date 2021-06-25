<?php
// error_reporting(0);
session_start();
if($_SESSION['level']=='admin'){
  $admin  =1;
  $kasi_1 =0;
  $kasi_2 =0;
  $kasi_3 =0;
}else if($_SESSION['level']=='kasi_1'){
  $admin=0;
  $kasi_1=1;
  $kasi_2=0;
  $kasi_3=0;
}else if($_SESSION['level']=='kasi_2'){
  $admin=0;
  $kasi_1=0;
  $kasi_2=1;
  $kasi_3=0;
}else if($_SESSION['level']=='kasi_3'){
  $admin=0;
  $kasi_1=0;
  $kasi_2=0;
  $kasi_3=1;
}else{
  $admin=0;
  $kasi_1=0;
  $kasi_2=0;
  $kasi_3=0;
}

$sql="SELECT * FROM ap_user WHERE user_id = '$_SESSION[user_id]'";
$query=$koneksi->query($sql);
$dataAdm = $query->fetch_array();
$countAdm = $query->num_rows;

if($countAdm<=1){
$dataAdm['nama'] = $dataAdm['nama_user'];
$dataAdm['level'] = $dataAdm['level'];
}

// data Instansi
$sql ="SELECT * FROM ap_instansi";
$result = $koneksi->query($sql);
$dataInstansi = $result->fetch_array();
?>