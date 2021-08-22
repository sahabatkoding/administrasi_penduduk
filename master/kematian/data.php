<?php 
require_once '../konektor.php';



if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$hasil = array();

$sql = "SELECT * FROM ap_kematian 
  LEFT JOIN ap_penduduk ON ap_penduduk.nik=ap_kematian.nik_penduduk
  ";

$data = $koneksi->query($sql);

if(isset($_GET['id'])){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
    $isi = [];
    $isi[]=$key+1;
    $isi[]=tanggal_indo($value['tgl_registrasi']);
    $isi[]=tanggal_indo($value['tgl_kematian']);
    $isi[]=$value['nik_penduduk'];
    $isi[]=$value['penduduk_nama'];
    $isi[]=$value['nik_pemohon'];
    $isi[]='<center><a href="edit.php?id='.$value['kematian_id'].'"><i class="dw dw-edit2" style="font-size:20px"></i></a></center>';
    $isi[]='<center><a href="javascript:;" id="'.$value['kematian_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}

echo json_encode($hasil);
?>
