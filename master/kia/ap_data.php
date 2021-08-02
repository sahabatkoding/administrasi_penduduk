<?php 
require_once '../konektor.php';
  
if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
} 
switch ($_GET['aksi']) {
  case 'ortu':
    $sql = "SELECT no_kk FROM ap_penduduk WHERE nik = '".$_GET['nik_ortu']."' ";
    $query = query($sql);
    $data = fetch($query);
    // echo json_encode($data);
    // var_dump($data)
    break;
  case 'anak':
    $sql = "SELECT nik,penduduk_nama FROM ap_penduduk WHERE no_kk = '".$_GET['no_kk']."' AND penduduk_status_keluarga = 'A' ";
    $query = query($sql);
    $data = fetchall($query);
    // echo json_encode($data);
    if($data == '' || $data == null) {
      echo '<option value=""> Tidak Ada Data </option>';
    }else{
      echo '<option value=""> Pilih NIK Anak </option>';
    }
   ?>
        <?php foreach($data as $value){ ?>
        <option  value="<?=$value['nik']?>"> <?=$value['nik']." - ".$value['penduduk_nama']?>&nbsp;</option>
        <?php } ?>
   <?php
  break;
  case'id_anak':
    $sql = "SELECT * FROM ap_penduduk WHERE nik = '".$_GET['nik_anak']."'";
    $query = query($sql);
    $data = fetch($query);
    echo json_encode($data);
  break;
  default:
    // code...
    break;
}

?>