<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

// var awal

$provinsi_id   = anti_inject($_POST['provinsi_id']);
$provinsi_nama = anti_inject($_POST['provinsi_nama']);

switch ($_GET['aksi']) {
	case 'add_provinsi':
		query("INSERT INTO ap_provinsi values('','$provinsi_nama')");
		break;
	case 'edit_provinsi':
		query("UPDATE ap_provinsi SET provinsi_nama = '$provinsi_nama' WHERE provinsi_id='$provinsi_id'");
		break;
	case 'del_provinsi':
		query("DELETE FROM ap_provinsi WHERE provinsi_id = '$provinsi_id' ");
		break;
	case 'add_kabupaten':
		$table = "ap_kabupaten";
		$data = array(
				"kabupaten_id"=>"",
				"id_provinsi"=>$_GET['id_provinsi'],
				"kabupaten_nama"=>$_POST['kabupaten_nama'],
				);
		$sql = insert($table,$data);
		query($sql);
		break;
	default:
		break;
}

 ?>