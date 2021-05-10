<?php 
require_once '../database/config.php';
require_once '../assets/library/anti_inject.php';

$username = anti_inject($_POST['username']);
$password = anti_inject(md5($_POST['password']));

$sql = "SELECT * FROM ap_user WHERE username = '$username' AND password = '$password' ";
$result = $koneksi->query($sql);
$rows = $result->num_rows;
$data = $result->fetch_array();


iF($rows>0){
	$_SESSION['user_id'] = $data['user_id'];
	$_SESSION['nama_user'] = $data['nama_user'];
	if($data['level'] != ''){
		$_SESSION['level'] = $data['level'];
	}else{
		echo '<script>alert("Maaf Anda Dilarang Masuk")</script>';
	}
}else{
	echo '<script>$("#fail_login").css("display","block")</script>';
}


 ?>
