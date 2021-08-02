<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$hasil = array();

$sql = "SELECT * FROM ap_imb join ap_pemohon on ap_imb.nik_pemohon=ap_pemohon.pemohon_nik ";
if(isset($_GET['id'])) $sql .= " WHERE imb_id = '".$_GET['id']."'";

$data = $koneksi->query($sql);

if(isset($_GET['id'])){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
    $isi['no']=$key+1;
   
    $isi['pemohon_nama']=$value['pemohon_nama'];
    $isi['imb_kode']=$value['imb_kode'];
    $isi['nama_bangunan']=$value['imb_nama_bangunan'];
    $isi['jenis_bangunan']=$value['imb_jenis_bangunan'];
    $isi['lokasi_bangunan']=$value['imb_lokasi_bangunan'];
    $isi['jenis_perijinan']=$value['imb_jenis_perijinan'];
    $isi['pemberi_ijin']=$value['imb_pemberi_ijin'];
    $isi['tahun_perijinan']=$value['imb_tahun_perijinan'];
    $isi['berlaku_sampai']=tanggal_indo($value['imb_berlaku_sampai']);
    $isi['status']=$value['imb_status_persetujuan']; 
    $isi['keterangan']=$value['imb_keterangan'];
    $isi['tgl_reg']=waktu_tanggal($value['tgl_registrasi']);  
     $isi['edit']='<center><a href="javascript:;" id="'.$value['imb_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
    $isi['hapus']='<center><a href="javascript:;" id="'.$value['imb_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}
echo json_encode($hasil);
 ?>
