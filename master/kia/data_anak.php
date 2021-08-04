<?php 
require_once '../konektor.php';
  
if($admin==0 && $kasi_2==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}
		$sql = "SELECT a.kia_id,a.tgl_registrasi,a.kia_kode,a.kia_nik,a.nik_orang_tua,b.penduduk_nama AS `nama_anak`,b.penduduk_tempat_lahir,b.penduduk_tanggal_lahir,c.penduduk_nama AS 'nama_ortu',c.nik,a.kia_berlaku,a.id_user,c.no_kk FROM ap_kia a LEFT JOIN ap_penduduk b ON a.kia_nik = b.nik LEFT JOIN ap_penduduk c on a.nik_orang_tua = c.nik WHERE kia_id = '".$_GET['kia_id']."'";
		$query = query($sql);
		$dataForm = fetchall($query);
		//echo json_encode($dataTable);
		$data = [];

	    foreach($dataForm as $value){    

	      array_push($data, [
	          // 'tgl_registrasi'   => $value['tgl_registrasi'],
	          // 'kia_id'   => $value['kia_id'],
	          'kia_kode'   => $value['kia_kode'],
	          'no_kk'   => $value['no_kk'],
	          'kia_nik'   => $value['kia_nik'],
	          // 'nik'   => $value['nik'],
	          'nama_anak'   => $value['nama_anak'],
	          'ttl_anak'   => $value['penduduk_tempat_lahir'].', '.$value['penduduk_tanggal_lahir'],
	          'kia_berlaku'   => $value['kia_berlaku']
	        ]);
	    }
	    echo json_encode($data);  

?>