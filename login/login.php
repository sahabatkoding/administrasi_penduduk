<?php 
require_once '../database/config.php';
require_once '../assets/library/anti_inject.php';

$username = anti_inject($_POST['username']);
$password = anti_inject(md5($_POST['password']));

$sql = "SELECT * FROM ap_user WHERE username = '$username' AND password = '$username' ";
$result = $koneksi->query($qsl);
$rows = $result->num_rows;
$data = $result->fetch_array();

var_dump($sql);

 ?>