<?php 
require_once '../konektor.php';

if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$hasil = array();

$sql = "SELECT * FROM ap_kelahiran 
  LEFT JOIN ap_penduduk ON ap_penduduk.nik=ap_kelahiran.nik_pemohon 
  LEFT JOIN ap_agama ON ap_agama.agama_id=ap_kelahiran.kelahiran_agama 
  ";
if(@$_GET['id']!='') $sql .= " WHERE nik = '".$_GET['id']."'";

$data = $koneksi->query($sql);

if(isset($_GET['id'])){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
    $isi = [];
    $isi[]=$key+1;
    $isi[]=tanggal_indo($value['tgl_registrasi']);
    $isi[]=$value['nik_pemohon'];
    $isi[]=$value['penduduk_nama'];
    $isi[]=$value['kelahiran_nama'];
    $isi[]=$value['kelahiran_jk'];
    $isi[]=$value['kelahiran_alamat'];
    $isi[]=$value['agama_nama'];
    $isi[]=$value['kelahiran_tempat_lahir'];
    $isi[]=tanggal_indo($value['kelahiran_tanggal_lahir']);
    $isi[]='<center><a href="edit.php?id='.$value['kelahiran_id'].'"><i class="dw dw-edit2" style="font-size:20px"></i></a></center>';
    $isi[]='<center><a href="javascript:;" id="'.$value['kelahiran_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}

echo json_encode($hasil);
?>
