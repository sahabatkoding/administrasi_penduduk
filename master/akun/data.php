<?php 
require_once '../konektor.php';
  
if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$hasil = array();

$sql = "SELECT * FROM ap_user ";
if(@$_GET['id']!='') $sql .= " WHERE user_id = '".$_GET['id']."'";
$data = $koneksi->query($sql);
if(@$_GET['id']){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
    $isi['no']=$key+1;
    $isi['nama_user']=$value['nama_user'];
    $isi['username']=$value['username'];
     $isi['level']=$value['level'];
     $isi['ep']='<center><a href="edit-password.php?id='.$value['user_id'].'"><i class="dw dw-edit" style="font-size:20px" ></i></a></center>';
     $isi['edit']='<center><a href="javascript:;" id="'.$value['user_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
    $isi['hapus']='<center><a href="javascript:;" id="'.$value['user_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}
echo json_encode($hasil);
 ?>
