<?php 
require_once '../konektor.php';


if($admin==0 && $kasi_2==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}
switch ($_GET['aksi']) {
  case 'cerai':
  $table = 'ap_permohonan_cerai';
  $key = (!$_POST['pcerai_id'])?newID($table,'pcerai_id'):$_POST['pcerai_id'];
  (!$_POST['pcerai_id'])?$reg = date('Y-m-d H:i:s'):$reg = $_POST['tgl_reg'];
  ($_POST['pcerai_id'])?$update=date('Y-m-d H:i:s'):$update=date('Y-m-d H:i:s');
  $id = "pcerai_id = ".$key;
  $data = array(
          'pcerai_id' => $key,
          'tgl_registrasi' => $reg,
          'tgl_update' => $update,
          'pcerai_kode' => $_POST['pcerai_kode'],
          // 'tgl_cerai' => $_POST['tgl_cerai'],
          'nik_pemohon' => $_POST['penduduk'],
          'pcerai_tempat' => $_POST['pcerai_tempat'],
          'pcerai_keterangan' => $_POST['pcerai_keterangan'],
          'id_user' => $_POST['id_user'],
            );
  $sql = (!$_POST['pcerai_id'])?insert($table,$data):update($table,$data,$id);
  // echo($sql);
  query($sql);
    break;
  case 'del_cerai':
  $table="ap_permohonan_cerai";
  $id="pcerai_id = ".$_POST['id'];
  $sql = delete($table,$id);
  query($sql);

  break;
  default:
    // code...
    break;
}

?>