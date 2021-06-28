<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

// var awal

// $provinsi_id   = anti_inject($_POST['provinsi_id']);
// $provinsi_nama = anti_inject($_POST['provinsi_nama']);

switch ($_GET['aksi']) {
	case 'add_provinsi':
		$table = "ap_provinsi";
		$data = array(
					"provinsi_id"=>newID($table,'provinsi_id'),
					"provinsi_nama"=>anti_inject($_POST['provinsi_nama']),
					);
		$sql = insert($table,$data);
		query($sql);
		break;
	case 'edit_provinsi':
		$table = "ap_provinsi";
		$id    = "provinsi_id = '".$_POST['provinsi_id']."'";
		$data  = array(
							"provinsi_nama"=>anti_inject($_POST['provinsi_nama']),
							);
		$sql	 = update($table,$data,$id);
		query($sql);
		break;
	case 'del_provinsi':
		$table = "ap_provinsi";
		$id    = "provinsi_id = '".$_POST['provinsi_id']."'";
		$sql   = delete($table,$id);
		query($sql);
	case 'kabupaten':
		$table = "ap_kabupaten";
		$key   = (!$_POST['kabupaten_id'])?newID($table,"kabupaten_id"):$_POST['kabupaten_id'];
		$id    = "kabupaten_id = '".$key."'"; 
		$data = array(
				"kabupaten_id"=>$key,
				"id_provinsi"=>$_POST['id_provinsi'],
				"kabupaten_nama"=>$_POST['kabupaten_nama'],
				);
		$sql = (!$_POST['kabupaten_id'])?insert($table,$data):update($table,$data,$id);
		// echo $sql;
		query($sql);
		break;
	case 'del_kabupaten':
		$table = "ap_kabupaten";
		$id    = "kabupaten_id = '".$_POST['kabupaten_id']."'";
		$sql   = delete($table,$id);
		query($sql); 
	break;

	default:
		break;
}

 ?>