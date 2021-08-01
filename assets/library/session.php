<?php
// error_reporting(0);
session_start();

switch ($_SESSION['level']) {
	case 'admin':
		($_SESSION['level']=='admin') ? $admin = 1 : 0 ;

		break;
	case 'kasi_1':
		($_SESSION['level']=='kasi_1') ? $kasi_1 = 1 : 0 ;
		
		break;
	case 'kasi_2':
		($_SESSION['level']=='kasi_2') ? $kasi_2 = 1 : 0 ;
		
		break;
	case 'kasi_3':
		($_SESSION['level']=='kasi_3') ? $kasi_3 = 1 : 0 ;
		
		break;
	default:
		0;
		break;
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