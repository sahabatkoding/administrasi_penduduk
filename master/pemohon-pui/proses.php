<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}
$tgl_sekarang=date('y-m-d H:i:s');
$pemohon_nama= $_POST['pemohon_nama'];
$pemohon_nik= $_POST['pemohon_nik'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$ni1 = $_POST['ni1'];
$ni2 = $_POST['ni2'];
$npwp = $_POST['npwp'];
$penghasilan = $_POST['penghasilan'];
$telepon_1 = $_POST['telepon_1'];
$telepon_2 = $_POST['telepon_2'];
$email = $_POST['email'];
$jk=$_POST['jk'];
$agama=$_POST['agama'];



if($_GET['id']){
  $tabel  = "ap_pemohon";
  $id     = "pemohon_id= '".$_GET['id']."'";
  $sql    = delete($tabel,$id);
  query($sql);
}else if($_POST['pemohon_id']!=''){
  $tabel  = "ap_pemohon";
  $id     = "pemohon_id = '".$_POST['pemohon_id']."'";
  $data   = array(
            
            "tgl_update"=> $tgl_sekarang,
            "pemohon_nama"=>$pemohon_nama,
            "pemohon_tempat_lahir"=>$tempat_lahir,
            "pemohon_tanggal_lahir"=>$tgl_lahir,
            "pemohon_alamat"=>$alamat,  
            "pemohon_no_identitas_1"=>$ni1,
            "pemohon_no_identitas_2"=>$ni2,
            "pemohon_npwp"=>$npwp,
            "pemohon_penghasilan"=>$penghasilan,
            "pemohon_telepon_1"=>$telepon_1,
            "pemohon_telepon_2"=>$telepon_2,
            "pemohon_jk"=>$jk,
            "pemohon_agama"=>$agama,
            "pemohon_email"=> $email,
            );
  $sql    = update($tabel,$data,$id);
  query($sql);
}else{
  $tabel = "ap_pemohon";
  $data  = array(
    "pemohon_id" => newID($tabel,'pemohon_id'), 
    "pemohon_nik" => $pemohon_nik,
    "pemohon_nama" => $pemohon_nama,
    "pemohon_tempat_lahir"=>$tempat_lahir,
    "pemohon_tanggal_lahir"=>$tgl_lahir,
    "pemohon_alamat"=>$alamat,  
    "pemohon_no_identitas_1"=>$ni1,
    "pemohon_no_identitas_2"=>$ni2,
    "pemohon_npwp"=>$npwp,
    "pemohon_penghasilan"=>$penghasilan,
    "pemohon_telepon_1"=>$telepon_1,
    "pemohon_telepon_2"=>$telepon_2,
    "pemohon_jk"=>$jk,
    "pemohon_agama"=>$agama,
    "pemohon_email"=> $email,
    "tgl_update"=> $tgl_sekarang,
    "tgl_reg"=> $tgl_sekarang,
  );
  $sql = insert($tabel,$data);
  // echo $sql;
  query($sql);
}
?>
