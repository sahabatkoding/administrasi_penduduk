<?php 
require_once '../konektor.php';

if(@$admin==0 && @$kasi_3==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

$hasil = array();

$sql = "SELECT * FROM ap_pemohon ";
if(isset($_GET['id'])) $sql .= " WHERE pemohon_id = '".$_GET['id']."'";

$data = $koneksi->query($sql);

if(isset($_GET['id'])){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
    $isi['no']=$key+1;
    $isi['pemohon_nik']=$value['pemohon_nik'];
    $isi['pemohon_nama']=$value['pemohon_nama'];
    $isi['tempat_lahir']=$value['pemohon_tempat_lahir'].", ".tanggal_indo($value['pemohon_tanggal_lahir']);
   $isi['jk']=$value['pemohon_jk'];
    $isi['agama']=$value['pemohon_agama'];
    $isi['alamat']=$value['pemohon_alamat'];
    $isi['identitas_1']=$value['pemohon_no_identitas_1']."<br>".$value['pemohon_no_identitas_2'];
    
    $isi['npwp']=$value['pemohon_npwp'];
    $isi['penghasilan']=rupiah($value['pemohon_penghasilan']);
    $isi['telp_1']=$value['pemohon_telepon_1']."<br>".$value['pemohon_telepon_2'];
    
    $isi['email']=$value['pemohon_email'];
    $isi['tgl_reg']=waktu_tanggal($value['tgl_reg']); 
    $isi['tgl_update']=waktu_tanggal($value['tgl_update']);
     $isi['edit']='<center><a href="javascript:;" id="'.$value['pemohon_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
    $isi['hapus']='<center><a href="javascript:;" id="'.$value['pemohon_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}
echo json_encode($hasil);
 ?>
