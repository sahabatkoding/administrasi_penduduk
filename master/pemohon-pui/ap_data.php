<?php 
require_once '../konektor.php';
  
if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
} 
switch ($_GET['aksi']) {
  case 'nik':
    $sql = "SELECT nik,penduduk_nama,penduduk_tempat_lahir,penduduk_tanggal_lahir,penduduk_jenis_kelamin,penduduk_telepon,agama_nama FROM ap_penduduk join ap_agama on ap_penduduk.id_agama=ap_agama.agama_id WHERE nik = '".$_GET['getPemohon']."' ";
    $query = query($sql);
    $data = fetch($query);
    echo json_encode($data);
    // var_dump($data)
    break;
 
}

?>