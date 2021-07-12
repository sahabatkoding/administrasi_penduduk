<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$hasil = array();

$sql = "SELECT * FROM ap_umkm join ap_pemohon on ap_umkm.nik_pemohon=ap_pemohon.pemohon_nik ";
if(isset($_GET['id'])) $sql .= " WHERE umkm_id = '".$_GET['id']."'";

$data = $koneksi->query($sql);

if(isset($_GET['id'])){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
    $isi['no']=$key+1;
   
    $isi['pemohon_nama']=$value['pemohon_nama'];
    $isi['umkm_kode']=$value['umkm_kode'];
    $isi['nama_usaha']=$value['umkm_nama_usaha'];
    $isi['jenis_usaha']=$value['umkm_jenis_usaha'];
    $isi['lokasi_usaha']=$value['umkm_lokasi_usaha'];
    $isi['jenis_perijinan']=$value['umkm_jenis_perijinan'];
    $isi['pemberi_ijin']=$value['umkm_pemberi_ijin'];
    $isi['tahun_perijinan']=$value['umkm_tahun_perijinan'];
    $isi['berlaku_sampai']=tanggal_indo($value['umkm_berlaku_sampai']);
    $isi['status']=$value['umkm_status_persetujuan']; 
    $isi['keterangan']=$value['umkm_keterangan'];
    $isi['tgl_reg']=waktu_tanggal($value['tgl_registrasi']);  
     $isi['edit']='<center><a href="javascript:;" id="'.$value['umkm_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
    $isi['hapus']='<center><a href="javascript:;" id="'.$value['umkm_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}
echo json_encode($hasil);
 ?>
