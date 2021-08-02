<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$hasil = array();

$sql = "SELECT * FROM ap_proposal join ap_pemohon on ap_proposal.nik_pemohon=ap_pemohon.pemohon_nik ";
if(isset($_GET['id'])) $sql .= " WHERE proposal_id = '".$_GET['id']."'";

$data = $koneksi->query($sql);

if(isset($_GET['id'])){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
    $isi['no']=$key+1;
   
    $isi['pemohon_nama']=$value['pemohon_nama'];
    $isi['proposal_kode']=$value['proposal_kode'];
    $isi['nama_kegiatan']=$value['proposal_nama_kegiatan'];
    $isi['jenis_kegiatan']=$value['proposal_jenis_kegiatan'];
    $isi['lokasi_kegiatan']=$value['proposal_lokasi_kegiatan'];
    $isi['tujuan_kegiatan']=$value['proposal_tujuan_kegiatan'];
    $isi['bentuk_bantuan']=$value['proposal_bantuan_bentuk'];
    $isi['bantuan_uang']=rupiah($value['proposal_bantuan_uang']);
    $isi['bantuan_barang']=$value['proposal_bantuan_barang'];
    $isi['status']=$value['proposal_status']; 
    $isi['keterangan']=$value['proposal_keterangan'];
    $isi['tgl_reg']=waktu_tanggal($value['tgl_registrasi']); 
    $isi['tgl_kegiatan']=tanggal_indo($value['tgl_kegiatan']); 
     $isi['edit']='<center><a href="javascript:;" id="'.$value['proposal_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
    $isi['hapus']='<center><a href="javascript:;" id="'.$value['proposal_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}
echo json_encode($hasil);
 ?>
