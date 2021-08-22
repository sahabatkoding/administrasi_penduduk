<?php 
require_once '../konektor.php';


if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

$hasil = array();

$sql = "SELECT * FROM ap_pindah_keluar JOIN ap_penduduk ON ap_pindah_keluar.nik_penduduk=ap_penduduk.nik  ORDER BY 1 DESC";

$data = $koneksi->query($sql);

if(isset($_GET['id'])){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
    $isi = [];
    $isi[]=$key+1;
    $isi[]=tanggal_indo($value['tgl_registrasi']);
    $isi[]=tanggal_indo($value['tgl_pindah']);
    $isi[]=$value['nik_penduduk'];
    $isi[]=$value['penduduk_nama'];
    $isi[]=$value['pk_alamat_tujuan'];
    $isi[]=$value['pk_alasan_pindah'];
    $isi[]='<center><a href="edit.php?id='.$value['pk_id'].'"><i class="dw dw-edit2" style="font-size:20px"></i></a></center>';
    $isi[]='<center><a href="javascript:;" id="'.$value['pk_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}

echo json_encode($hasil);
?>