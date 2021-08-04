<?php 
require_once '../konektor.php';
if($admin==0 && $kasi_2==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
} 
switch ($_GET['aksi']) {
  case 'ortu':
    $sql = "SELECT no_kk FROM ap_penduduk WHERE 1=1 ";
    $sql .= " AND nik = '".$_GET['nik_ortu']."' ";
    $query = query($sql);
    $data = fetch($query);
    echo json_encode($data);
    // var_dump($data);
    break;
  case 'anak':
    $sql = "SELECT nik,penduduk_nama FROM ap_penduduk WHERE penduduk_status_keluarga = 'A' ";
   $sql .= " AND no_kk = '".$_GET['no_kk']."'";
    // echo $sql;
    $query = query($sql);
    $data = fetchall($query);
    echo json_encode($data);
  break;
  case'id_anak':
    $sql = "SELECT * FROM ap_penduduk WHERE 1=1 ";
   $sql .= " AND nik = '".$_GET['nik_anak']."'";
    $query = query($sql);
    $data = fetch($query);
    echo json_encode($data);
  break;
  default:
    // code...
    break;
}

?>