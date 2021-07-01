<?php  
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

if ($_GET['action'] == 'simpan' ) {

	$nik = filter($_POST['nik']);
	$tgl_registrasi =  filter($_POST['tgl_registrasi']);
	$tgl_update = null;
	$no_kk = filter($_POST['no_kk']);
	$no_akta =  filter($_POST['no_akta']);
	$penduduk_nama =  filter($_POST['nama_lengkap']);
	$penduduk_tempat_lahir =  filter($_POST['tempat_lahir']);
	$penduduk_tanggal_lahir = filter($_POST['tanggal_lahir']);
	$penduduk_jenis_kelamin = filter($_POST['jenis_kelamin']);
	$penduduk_golongan_darah = filter($_POST['golongan_darah']);
	$penduduk_alamat = filter($_POST['alamat']); 
	$penduduk_rt =  filter($_POST['rt']);
	$penduduk_rw = filter($_POST['rw']);
	$id_kelurahan = filter($_POST['kelurahan']);
	$id_kecamatan = filter($_POST['kecamatan']);
	$id_kabupaten = filter($_POST['kabupaten']);
	$id_provinsi = filter($_POST['provinsi']);
	$id_agama = filter($_POST['agama']);
	$penduduk_status_perkawinan = filter($_POST['status_perkawinan']);
	$id_pendidikan = filter($_POST['pendidikan']);
	$penduduk_pekerjaan= filter($_POST['pekerjaan']);
	$penduduk_kewarganegaraan = filter($_POST['kewarganegaraan']); 
	$penduduk_no_passport= filter($_POST['no_passport']);
	$penduduk_no_kitas =  filter($_POST['no_kitas']);
	$penduduk_nama_ayah =  filter($_POST['nama_ayah']);
	$penduduk_nama_ibu = filter($_POST['nama_ibu']);
	$penduduk_status_keluarga =  filter($_POST['status_keluarga']);
	$penduduk_status =  filter($_POST['status']); 
	$penduduk_telepon =  filter($_POST['telepon']);
	$id_user =  $_SESSION['user_id'];
	$penduduk_photo =  $_FILES['photo']['name'];
	$penduduk_photo_tmp =  $_FILES['photo']['tmp_name'];	
	$size_file = $_FILES['photo']['size'];
	$ekstensi = explode('.', $penduduk_photo);
	$type = strtolower(end($ekstensi)); 

	if ($penduduk_photo != '') {
		if($type != 'jpg' && $type != 'jpeg' && $type != 'png'){
				$msg = [
		        	alert('Format yang diperbolehkan jpg, png, jpeg','danger'),
		      	];
			
			}else if($size_file >4397152){
				$msg = [
		        	alert('File size terlalu besar, max 3 mb','danger'),
		      	];
			
			}else{
				$ekstensi = explode('.', $penduduk_photo);
				$penduduk_photo = "logo-".round(microtime(true)).".".end($ekstensi);
				move_uploaded_file($penduduk_photo_tmp, "../../assets/photo/$penduduk_photo");
			}

	}else{
		$penduduk_photo = 'default.png';
	}

	// var_dump((int)$id_kelurahan);
	// die;

	$tabel = "ap_penduduk";
  $data  = array(
    "nik" => $nik, 
    "tgl_registrasi" => $tgl_registrasi,
    "tgl_update" => null, 
    "no_kk" => $no_kk, 
    "no_akta" => $no_akta, 
    "penduduk_nama" => $penduduk_nama, 
    "penduduk_tempat_lahir" => $penduduk_tempat_lahir, 
    "penduduk_tanggal_lahir" => $penduduk_tanggal_lahir, 
    "penduduk_jenis_kelamin" => $penduduk_jenis_kelamin, 
    "penduduk_golongan_darah" => $penduduk_golongan_darah, 
    "penduduk_alamat" => $penduduk_alamat, 
    "penduduk_rt" => $penduduk_rt, 
    "penduduk_rw" => $penduduk_rw, 
    "id_kelurahan" => (int)o$id_kelurahan, 
    "id_kecamatan" => $id_kecamatan, 
    "id_kabupaten" => $id_kabupaten, 
    "id_provinsi" => $id_provinsi, 
    "id_agama" => $id_agama, 
    "penduduk_status_perkawinan" => $penduduk_status_perkawinan, 
    "id_pendidikan" => $id_pendidikan, 
    "penduduk_pekerjaan" => $penduduk_pekerjaan, 
    "penduduk_kewarganegaraan" => $penduduk_pekerjaan, 
    "penduduk_no_passport" => $penduduk_no_passport, 
    "penduduk_no_kitas" => $penduduk_no_kitas, 
    "penduduk_nama_ayah" => $penduduk_nama_ayah, 
    "penduduk_nama_ibu" => $penduduk_nama_ibu,
    "penduduk_status_keluarga" => $penduduk_status_keluarga,
    "penduduk_status" => $penduduk_status, 
    "penduduk_telepon" => $penduduk_telepon, 
    "penduduk_photo" => $penduduk_photo, 
    "id_user" => $id_user
  );
  $sql = insert($tabel,$data);
  
  $query = query($sql);

		if ($query) {
			$msg = [
			'success' => alert('Berhasil Disimpan','success'),
			];	
		}else{
			$msg = [
			'gagal' => alert('Simpan Gagal','danger'),
			];	
		}

		echo json_encode($msg);
}

if ($_GET['action'] == 'get_kabupaten' ) {

	$id_provinsi = filter($_GET['id_provinsi']);

	$sql = "SELECT * FROM ap_kabupaten WHERE id_provinsi='".$id_provinsi."' ORDER BY kabupaten_nama ASC";

	$data = $koneksi->query($sql);

	$val = '';
	foreach($data as $row){
		$val .= "<option value='".$row['kabupaten_id']."'>".$row['kabupaten_nama']."</option>";
	}

	echo $val;
}

if ($_GET['action'] == 'get_kecamatan' ) {

	$id_kabupaten = filter($_GET['id_kabupaten']);

	$sql = "SELECT * FROM ap_kecamatan WHERE id_kabupaten='".$id_kabupaten."' ORDER BY kecamatan_nama ASC";

	$data = $koneksi->query($sql);

	$val = '';
	foreach($data as $row){
		$val .= "<option value='".$row['kecamatan_id']."'>".$row['kecamatan_nama']."</option>";
	}

	echo $val;
}

if ($_GET['action'] == 'get_kelurahan' ) {

	$id_kecamatan = filter($_GET['id_kecamatan']);

	$sql = "SELECT * FROM ap_kelurahan WHERE id_kecamatan='".$id_kecamatan."' ORDER BY kelurahan_nama ASC";

	$data = $koneksi->query($sql);

	$val = '';
	foreach($data as $row){
		$val .= "<option value='".$row['kelurahan_id']."'>".$row['kelurahan_nama']."</option>";
	}

	echo $val;
}
?>