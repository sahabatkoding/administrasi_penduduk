<?php 
require_once '../konektor.php';


if($admin==0 && $kasi_2==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}
switch ($_GET['aksi']) {
  case 'nikah':
  $table = 'ap_permohonan_nikah';
  $key = (!$_POST['pnikah_id'])?newID($table,'pnikah_id'):$_POST['pnikah_id'];
  (!$_POST['pnikah_id'])?$reg = date('Y-m-d H:i:s'):$reg = $_POST['tgl_reg'];
  ($_POST['pnikah_id'])?$update=date('Y-m-d H:i:s'):$update=date('Y-m-d H:i:s');
  $id = "pnikah_id = ".$key;
  $data = array(
          'pnikah_id' => $key,
          'tgl_registrasi' => $reg,
          'tgl_update' => $update,
          'pnikah_kode' => $_POST['pnikah_kode'],
          'tgl_nikah' => $_POST['tgl_nikah'],
          'nik_pemohon' => $_POST['penduduk'],
          'pnikah_tempat' => $_POST['pnikah_tempat'],
          'pnikah_keterangan' => $_POST['pnikah_keterangan'],
          'id_user' => $_POST['id_user'],
            );
  $sql = (!$_POST['pnikah_id'])?insert($table,$data):update($table,$data,$id);
  // echo($sql);
  query($sql);
    break;
  
  default:
    // code...
    break;
}

?>