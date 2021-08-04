
<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}
$tgl_sekarang=date('y-m-d H:i:s');

$pemohon= pn($_POST['pemohon']);
$nama = $_POST['nama_kegiatan'];
$jenis = $_POST['jenis_kegiatan'];
$lokasi = $_POST['lokasi_kegiatan'];
$tujuan = $_POST['tujuan_kegiatan'];
$tujuan_proposal = $_POST['tujuan_proposal'];
$tgl_kegiatan = $_POST['tanggal_kegiatan'];

$status='Pengajuan';
$proposal_kode=$_POST['proposal_kode'];
$keterangan=$_POST['keterangan'];
$id_user=$_SESSION['user_id'];
$setatus=$_POST['setatus'];

$bentuk=$_POST['bantuan_bentuk'];
if($bentuk=="Uang"){
$b_uang=$_POST['bantuan_uang'];
$b_barang="-";
}else if($bentuk=="Barang"){
$b_uang="0";
$b_barang=$_POST['bantuan_barang'];

}else{
$b_uang=$_POST['bantuan_uang'];
$b_barang=$_POST['bantuan_barang'];
}


if($_GET['id']){
  $tabel  = "ap_proposal";
  $id     = "proposal_id= '".$_GET['id']."'";
  $sql    = delete($tabel,$id);
  query($sql);
}else if($_POST['proposal_id']!=''){
   $tabel  = "ap_proposal";
  $id     = "proposal_id = '".$_POST['proposal_id']."'";
  $data   = array(
            
            "tgl_update"=> $tgl_sekarang,
            "tgl_kegiatan"=>$tgl_kegiatan,
            "proposal_kode"=>$proposal_kode,
                   "proposal_nama_kegiatan"=>$nama,
                   "proposal_jenis_kegiatan"=>$jenis,
                   "proposal_lokasi_kegiatan"=>$lokasi,  
                   "proposal_tujuan_kegiatan"=>$tujuan,
                   "proposal_bantuan_bentuk"=>$bentuk,
                   "proposal_bantuan_uang"=>$b_uang,
                   "proposal_bantuan_barang"=>$b_barang,
                   "nik_pemohon"=>$pemohon,
                   "proposal_status"=>$setatus,
                   "proposal_tujuan"=>$tujuan_proposal,
                   "proposal_keterangan"=>$keterangan,
            );
  $sql    = update($tabel,$data,$id);
  query($sql);
 
}else{
  $tabel = "ap_proposal";
  $data  = array(
  "proposal_id" => newID($tabel,'proposal_id'),
  "tgl_update"=> $tgl_sekarang,
  "tgl_registrasi"=> $tgl_sekarang,
  "tgl_kegiatan"=>$tgl_kegiatan,
  "proposal_kode"=>$proposal_kode,
  "proposal_nama_kegiatan"=>$nama,
  "proposal_jenis_kegiatan"=>$jenis,
  "proposal_lokasi_kegiatan"=>$lokasi,  
  "proposal_tujuan_kegiatan"=>$tujuan,
  "proposal_bantuan_bentuk"=>$bentuk,
  "proposal_bantuan_uang"=>$b_uang,
  "proposal_bantuan_barang"=>$b_barang,
  "nik_pemohon"=>$pemohon,
  "proposal_status"=>$status,
  "proposal_tujuan"=>$tujuan_proposal,
  "proposal_keterangan"=>$keterangan,
  "id_user"=>$id_user,
   );
  $sql = insert($tabel,$data);
  // echo $sql;
  query($sql);
  
}

?>
