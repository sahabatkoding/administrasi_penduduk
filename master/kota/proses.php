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
	case 'kecamatan':
		$table = "ap_kecamatan";
		$key   = (!$_POST['kecamatan_id'])?newID($table,"kecamatan_id"):$_POST['kecamatan_id'];
		$id    = "kecamatan_id = '".$key."'"; 
		$data = array(
				"kecamatan_id"=>$key,
				"id_kabupaten"=>$_POST['id_kabupaten'],
				"kecamatan_nama"=>$_POST['kecamatan_nama'],
				);
		$sql = (!$_POST['kecamatan_id'])?insert($table,$data):update($table,$data,$id);
		// echo $sql;
		query($sql);
		break;
	case 'del_kecamatan':
		$table = "ap_kecamatan";
		$id    = "kecamatan_id = '".$_POST['kecamatan_id']."'";
		$sql   = delete($table,$id);
		// echo $sql;
		query($sql); 
	break;
	case 'kelurahan':
		$table = "ap_kelurahan";
		$key   = (!$_POST['kelurahan_id'])?newID($table,"kelurahan_id"):$_POST['kelurahan_id'];
		$id    = "kelurahan_id = '".$key."'"; 
		$data = array(
				"kelurahan_id"=>$key,
				"id_kecamatan"=>$_POST['id_kecamatan'],
				"kelurahan_nama"=>$_POST['kelurahan_nama'],
				);
		$sql = (!$_POST['kelurahan_id'])?insert($table,$data):update($table,$data,$id);
		// echo $sql;
		query($sql);
		break;
	case 'del_kelurahan':
		$table = "ap_kelurahan";
		$id    = "kelurahan_id = '".$_POST['kelurahan_id']."'";
		$sql   = delete($table,$id);
		// echo $sql;
		query($sql); 
	break;

	default:
		break;
}

 ?>