<?php 
require_once '../konektor.php';
  
if($admin==0 && $kasi_2==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$hasil = array();

$sql = "SELECT a.kia_id,a.tgl_registrasi,a.kia_kode,a.kia_nik,b.penduduk_nama AS `nama_anak`,b.penduduk_tempat_lahir,b.penduduk_tanggal_lahir,c.penduduk_nama AS 'nama_ortu',a.kia_berlaku,a.id_user FROM ap_kia a LEFT JOIN ap_penduduk b ON a.kia_nik = b.nik LEFT JOIN ap_penduduk c on a.nik_orang_tua = c.nik";
if($_GET['id']!='') $sql .= " WHERE kia_id = '".$_GET['kia_id']."'";
$data = query($sql);
 // die();
if($_GET['id']){
  $hasil = fetch($data);
}else{
  foreach($data as $key=>$value){
    $isi["no"] = $key+1;
    $isi["registrasi"] = $value['tgl_registrasi'];
    $isi["kode"] = $value['kia_kode'];
    $isi["nik_anak"] = $value['kia_nik'];
    $isi["nama_anak"] = $value['nama_anak'];
    $isi["ttl_anak"] = $value['penduduk_tempat_lahir'].", ".tanggal_indo($value['penduduk_tanggal_lahir']);
    $isi["nik_orang_tua"] = $value['nama_ortu'];
    $isi["kia_berlaku"] = $value['kia_berlaku'];
     $isi['edit']='<center><a href="form.php?kia_id='.$value['kia_id'].'"><i class="dw dw-edit2" style="font-size:20px"></i></a></center>';
    $isi['hapus']='<center><a href="javascript:;" id="'.$value['kia_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    // $isi['detail']='<center><a href="javascript:;" id="'.$value['pendidikan_id'].'" onclick="edit(this.id)"><i class="dw dw-search2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
    array_push($hasil,$isi);
  }
}
echo json_encode($hasil);
 ?>
