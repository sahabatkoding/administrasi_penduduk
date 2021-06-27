<?php 
require_once '../konektor.php';
  
if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$hasil = array();

$sql = "SELECT * FROM ap_pendidikan ";
if($_GET['id']!='') $sql .= " WHERE pendidikan_id = '".$_GET['id']."'";
$data = $koneksi->query($sql);
if($_GET['id']){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
    $isi['no']=$key+1;
    $isi['pendidikan']=$value['pendidikan_nama'];
     $isi['edit']='<center><a href="javascript:;" id="'.$value['pendidikan_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
    $isi['hapus']='<center><a href="javascript:;" id="'.$value['pendidikan_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}
echo json_encode($hasil);
 ?>
