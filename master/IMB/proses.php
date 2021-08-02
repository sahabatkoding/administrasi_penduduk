
<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}
$tgl_sekarang=date('y-m-d H:i:s');

$pemohon= pn($_POST['pemohon']);
$nama = $_POST['nama_bangunan'];
$jenis = $_POST['jenis_bangunan'];
$lokasi = $_POST['lokasi'];
$tahun = $_POST['tahun'];

$jenis_ijin=$_POST['jenis_ijin'];
$pemberi_ijin=$_POST['pemberi_ijin'];
$berlaku=$_POST['masa_berlaku'];
$status='Pengajuan';
$imb_kode=$_POST['imb_kode'];
$keterangan=$_POST['keterangan'];
$id_user=$_SESSION['user_id'];
$setatus=$_POST['setatus'];



if($_GET['id']){
  $tabel  = "ap_imb";
  $id     = "imb_id= '".$_GET['id']."'";
  $sql    = delete($tabel,$id);
  query($sql);
}else if($_POST['imb_id']!=''){
  $tabel  = "ap_imb";
  $id     = "imb_id = '".$_POST['imb_id']."'";
  $data   = array(
            
    "nik_pemohon" => $pemohon,
    "imb_nama_bangunan" => $nama,
    "imb_kode" => $imb_kode,
    "imb_lokasi_bangunan" => $lokasi,
    "imb_jenis_bangunan"=> $jenis,  
    "imb_pemberi_ijin"=> $pemberi_ijin,
    "imb_jenis_perijinan"=> $jenis_ijin,
    "imb_tahun_perijinan"=> $tahun,
    "imb_berlaku_sampai"=> $berlaku,
    "imb_status_persetujuan"=> $setatus,
    "imb_keterangan"=>$keterangan,
    "tgl_update"=> $tgl_sekarang,
    "id_user"=>$id_user,
            );
  $sql    = update($tabel,$data,$id);
  query($sql);
}else{
  $tabel = "ap_imb";
  $data  = array(
    "imb_id" => newID($tabel,'imb_id'), 
    "nik_pemohon" => $pemohon,
    "imb_nama_bangunan" => $nama,
    "imb_kode" => $imb_kode,
    "imb_lokasi_bangunan" => $lokasi,
    "imb_jenis_bangunan"=> $jenis,  
    "imb_pemberi_ijin"=> $pemberi_ijin,
    "imb_jenis_perijinan"=> $jenis_ijin,
    "imb_tahun_perijinan"=> $tahun,
    "imb_berlaku_sampai"=> $berlaku,
    "imb_status_persetujuan"=> $status,
    "imb_keterangan"=>$keterangan,
    "tgl_update"=> $tgl_sekarang,
    "tgl_registrasi"=> $tgl_sekarang,
    "id_user"=>$id_user,
  );
  $sql = insert($tabel,$data);
  // echo $sql;
  query($sql);
}
?>
