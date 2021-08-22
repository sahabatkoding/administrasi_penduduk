<?php 
require_once '../konektor.php';


$hasil = array();

$sql = "SELECT * FROM ap_penduduk 
  LEFT JOIN ap_kelurahan ON ap_kelurahan.kelurahan_id=ap_penduduk.id_kelurahan 
  LEFT JOIN ap_kecamatan ON ap_kecamatan.kecamatan_id=ap_penduduk.id_kecamatan 
  LEFT JOIN ap_kabupaten ON ap_kabupaten.kabupaten_id=ap_penduduk.id_kabupaten 
  LEFT JOIN ap_provinsi ON ap_provinsi.provinsi_id=ap_penduduk.id_provinsi 
  LEFT JOIN ap_agama ON ap_agama.agama_id=ap_penduduk.id_agama
  LEFT JOIN ap_pendidikan ON ap_pendidikan.pendidikan_id=ap_penduduk.id_pendidikan 
  LEFT JOIN ap_user ON ap_user.user_id=ap_penduduk.id_user ";
if(@$_GET['id']!='') $sql .= " WHERE nik = '".@$_GET['id']."'";

$data = $koneksi->query($sql);

if(isset($_GET['id'])){
  $hasil = $data->fetch_array();
}else{
  foreach($data as $key=>$value){
    $isi = [];
    $isi[]=$value['nik'];
    $isi[]=$value['no_kk'];
    $isi[]=$value['no_akta'];
    $isi[]=$value['penduduk_nama'];
    $isi[]=$value['penduduk_tempat_lahir'].', '.   $value['penduduk_tanggal_lahir'];
    $isi[]=$value['penduduk_jenis_kelamin'];
    $isi[]=$value['penduduk_golongan_darah'];
    $isi[]=$value['penduduk_alamat'];
    $isi[]=$value['penduduk_rt'].'/'.$value['penduduk_rw'];
    $isi[]=$value['kelurahan_nama'];
    $isi[]=$value['kecamatan_nama'];
    $isi[]=$value['kabupaten_nama'];
    $isi[]=$value['provinsi_nama'];
    $isi[]=$value['agama_nama'];
    $isi[]=$value['penduduk_status_perkawinan'];
    $isi[]=$value['pendidikan_nama'];
    $isi[]=$value['penduduk_pekerjaan'];
    $isi[]=$value['penduduk_kewarganegaraan'];
    $isi[]=$value['penduduk_no_passport'];
    $isi[]=$value['penduduk_no_kitas'];
    $isi[]=$value['penduduk_nama_ayah'];
    $isi[]=$value['penduduk_nama_ibu'];
    $isi[]=$value['penduduk_status_keluarga'];
    $isi[]=$value['penduduk_status'];
    $isi[]=$value['penduduk_telepon'];
    $isi[]='<img href="../../assets/photo/'.$value['penduduk_photo'].'">';
    $isi[]=$value['nama_user'];
    $isi[]='<center><a href="edit.php?nik='.$value['nik'].'"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
    $isi[]='<center><a href="javascript:;" id="'.$value['nik'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
    array_push($hasil,$isi);
  }
}
echo json_encode($hasil);
?>
