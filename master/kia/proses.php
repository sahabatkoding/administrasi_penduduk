<?php 
require_once '../konektor.php';

if($admin==0 && $kasi_2==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

// $kia_id         = anti_inject($_POST['kia_id'])  
$kia_nik        = anti_inject($_POST['kia_anak']);
$tgl_registrasi = anti_inject($_POST['tgl_registrasi']);
$tgl_update     = anti_inject($_POST['tgl_update']);
$kia_kode       = anti_inject($_POST['kia_kode']);
$nik_orang_tua  = anti_inject($_POST['nik_orang_tua']);
$kia_berlaku    = anti_inject($_POST['kia_berlaku']);
$id_user        = anti_inject($_POST['id_user']);


switch ($_GET['aksi']) {
  case 'simpan':
  $table = 'ap_kia';
  $kia_id = newID($table,'kia_id');
  $data = array(
    'kia_id' => $kia_id,
    'kia_nik' => $kia_nik,
    'tgl_registrasi' => $tgl_registrasi,
    'kia_kode' => $kia_kode,
    'nik_orang_tua' => $nik_orang_tua,
    'kia_berlaku' => $kia_berlaku,
    'id_user' => $id_user,
  );
  $sql = insert($table,$data);
  query($sql);
  header('location:index.php');
  break;
  case'edit':
  $table = 'ap_kia';
  $kia_id = "kia_id = ".$_GET['kia_id'];
  $data = array(
    // 'kia_id' => $kia_id,
    'kia_nik' => $kia_nik,
    'tgl_update' => date('Y-m-d H:i:s'),
    'kia_kode' => $kia_kode,
    'nik_orang_tua' => $nik_orang_tua,
    'kia_berlaku' => $kia_berlaku,
    'id_user' => $id_user,
  );
  $sql = update($table,$data,$kia_id);
  query($sql);
  header('location:index.php');
  break;  
  case 'hapus':
  $table='ap_kia';
  $id = 'kia_id = '.$_GET['id'];
  $sql = delete($table,$id);
  // echo $sql;
  query($sql);
  header('location:index.php');
  break;
  default:
    // code...
    break;
}

?>
