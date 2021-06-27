<?php 
session_start();
require_once '../database/config.php';
require_once '../assets/library/function.php';

$username = anti_inject($_POST['username']);
$password = anti_inject(md5($_POST['password']));

$sql = "SELECT * FROM ap_user WHERE username = '$username' AND password = '$password' ";
$result = $koneksi->query($sql);
$rows = $result->num_rows;
$data = $result->fetch_array();


	if($rows>0){
		$_SESSION['user_id'] = $data['user_id'];
		$_SESSION['nama_user'] = $data['nama_user'];
		$_SESSION['level'] = $data['level'];

		$msg = [
			'success' => alert('Berhasil Login','success'),
			];
	}else{

		$msg = [
			'gagal' => alert('Username/password salah', 'danger'),
		];
	}

	echo json_encode($msg);

?>