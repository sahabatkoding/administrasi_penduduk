<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}



if ($_GET['action'] == 'edit') {
  $id = $_POST['user_edi'];
  $lama = md5($_POST['lama']);
  $baru =  md5($_POST['baru']);
  
  $sql = "SELECT * FROM ap_user WHERE user_id = '".$id."'";
  $data = $koneksi->query($sql);
  $hasil = $data->fetch_array();
  $psw=$hasil['password'];

  
    if($psw != $lama){
        $msg = [
              'gagal' => alert('Password lama anda salah','danger'),
            ];
            echo json_encode($msg);
      }else{
        

  $tabel  = "ap_user";
  $id     = "user_id = '".$id."'";
  $data  = array(
    "password" => $baru, 
  );

  $sql    = update($tabel,$data,$id);
  query($sql);

  if ($query) {
      $msg = [
      'success' => alert('Berhasil Disimpan','success'),
      ];  
    }else{
      $msg = [
      'gagal' => alert('Simpan Gagal','danger'),
      ];  
    }

    echo json_encode($msg);
      }
}



?>
