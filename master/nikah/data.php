<?php 
require_once '../konektor.php';
  

if($admin==0 && $kasi_2==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

$hasil = array();

$sql = "SELECT a.* , b.penduduk_nama , b.penduduk_tempat_lahir , b.penduduk_tanggal_lahir , 
		b.penduduk_pekerjaan , b.penduduk_alamat FROM ap_permohonan_nikah a LEFT JOIN ap_penduduk b ON a.nik_pemohon = b.nik  ";
if($_GET['id']!='') $sql .= " WHERE pnikah_id = '".$_GET['id']."'";
$data = $koneksi->query($sql)or die($koneksi->error);
if($_GET['id']){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
  	$isi["no"] = $key+1;
	$isi["kode"] = $value["pnikah_kode"]; 
	$isi["tanggal_reg"] = waktu_tanggal($value["tgl_registrasi"]); 
	$isi["tanggal_acara"] = tanggal_indo($value["tgl_nikah"]); 
	$isi["nik"] = $value["nik_pemohon"]; 
	$isi["nama"] = $value["penduduk_nama"]; 
	$isi["ttl"] = $value["penduduk_tempat_lahir"].", ".tanggal_indo($value['penduduk_tanggal_lahir']); 
	$isi["pekerjaan"] = $value["penduduk_pekerjaan"]; 
	$isi["alamat"] = $value["penduduk_alamat"]; 
	$isi["tempat"] = $value["pnikah_tempat"]; 
	$isi["keterangan"] = $value["pnikah_keterangan"]; 
    $isi['edit']='<center><a href="javascript:;" id="'.$value['pnikah_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
    $isi['hapus']='<center><a href="javascript:;" id="'.$value['pnikah_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}
echo json_encode($hasil);
 ?>
