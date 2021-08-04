<?php require_once('../konektor.php');
$header = 'Kartu Identitas Anak';
if($master=='0' && $kasi_2=='0'){
?><script>location.href=<?php echo $MASTER?>"login/logout.php"</script>
<?php
}
// untuk konfig select data;
if($_GET['kia_id']){
$sql = "SELECT a.kia_id,a.tgl_registrasi,a.kia_kode,a.kia_nik,a.nik_orang_tua,b.penduduk_nama AS `nama_anak`,b.penduduk_tempat_lahir,b.penduduk_tanggal_lahir,c.penduduk_nama AS 'nama_ortu',a.kia_berlaku,a.id_user,c.no_kk FROM ap_kia a LEFT JOIN ap_penduduk b ON a.kia_nik = b.nik LEFT JOIN ap_penduduk c on a.nik_orang_tua = c.nik WHERE kia_id = '".$_GET['kia_id']."'";
$query = query($sql);
$dataForm = fetch($query);
}
// echo json_encode($data);
 ?>
<!DOCTYPE html>
<html>
<head>
<?php require_once($LAYOUT.'head.php') ?>
</head>
<body >
	<?php require_once $LAYOUT.'header.php'; ?>
	<?php require_once $LAYOUT.'sidebar.php'; ?>
	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				
				<!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4"><?=$header?></h4>
							<p class="mb-30"></p>
						</div>
						<div class="pull-right">
							<!-- <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a> -->
							<button class="btn btn-primary" onclick="location.href='index.php'">Kembali</button>
						</div>
					</div>
					<!--  -->
					<form action="<?php echo  ($_GET['kia_id']) ? 'proses.php?aksi=edit&kia_id='.$_GET['kia_id']: 'proses.php?aksi=simpan' ?>" method="POST">
						<input type="text" name="kia_id" id="kia_id" value="<?=($_GET['kia_id']) ? $_GET['kia_id']: ''?>">
						<div class="form-group row">
							<label class="col-form-label col-md-2">Tanggal Registrasi</label>
							<div class="col-md-10 col-sm-12">
								<input type="text" name="tgl_registrasi" class="form-control" id="tgl_registrasi" value="<?=date('Y-m-d H:i:s')?>" readonly>
							</div>
						</div>

								<input hidden type="text" name="tgl_update" class="form-control" id="tgl_update" value="<?=date('Y-m-d H:i:s')?>" readonly>
								<input type="hidden" name="id_user" id="id_user" value="<?php echo $dataAdm['user_id'] ?>">
						
						<div class="form-group row">
							<label class="col-form-label col-md-2">NIK - Nama Orang Tua</label>
							<div class="col-md-10 col-sm-12">
								<select class="form-control custom-select2" id="nik_orang_tua" name="nik_orang_tua" onchange="nik_ortu(this.value)" >
									<!-- sql select data orang tua -->
									<?php $sql = query("SELECT * FROM ap_penduduk where penduduk_status_keluarga != 'A' ");
									foreach($sql as $dataOrtu): ?>
										<option value="<?=$dataOrtu['nik']?>" <?php if($dataForm['nik_orang_tua']==$dataOrtu['nik']) echo "selected" ?>><?=$dataOrtu['nik'].' - '.$dataOrtu['penduduk_nama']?></option>	
									<?php endforeach; ?>	
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2">No Kartu Keluarga</label>
							<div class="col-md-10 col-sm-12">
								<input type="text" name="no_kk" id="no_kk" class="form-control" readonly="readonly" value="<?php echo ($_GET['kia_id']) ? $dataForm['no_kk'] : '' ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">No ID Anak</label>
							<div class="col-sm-12 col-md-10">
								<!-- <input class="form-control" type="text" name="kia_nik" id="kia_nik"> -->
								<select class="custom-select2 form-control" name="kia_anak" id="kia_anak" onchange="identitas_anak(this.value)">
									
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2">KIA Kode</label>
							<div class="col-md-10 col-sm-12">
								<input type="text" name="kia_kode" id="kia_kode" class="form-control" readonly >
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2">Nama Anak</label>
							<div class="col-md-10 col-sm-12">
								<input type="text" name="nama_anak" id="nama_anak" class="form-control" readonly >
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2">Tempat Tanggal Lahir</label>
							<div class="col-md-10 col-sm-12">
								<input type="text" name="ttl_anak" id="ttl_anak" class="form-control" readonly >
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2">Berlaku Sampai</label>
							<div class="col-md-10 col-sm-12">
								<input type="date" name="kia_berlaku" id="kia_berlaku" class="form-control" >
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2"></label>
							<div class="col-md-10 col-sm-12">
								<button type="submit" class="btn btn-success pull-right" name="simpan">Simpan</button>
							</div>
						</div>
				<!-- Input Validation End -->

			</div>
			<?php require $LAYOUT.'footer.php'; ?>
		</div>
	</div>
	<!-- js -->
	<script type="text/javascript">
	function nik_ortu(data){
		var nik_ortu = data;
		$.getJSON('ap_data.php', {nik_ortu: nik_ortu ,aksi:'ortu'}, function(json) {
			// console.log('test');
			$('#no_kk').val(json.no_kk);
			nik_anak(json.no_kk);
		});
	}

function nik_anak(data,kia=null){
              var no_kk = data;
              var kia = kia;
              // console.log(kia);
              $.getJSON('ap_data.php',{no_kk:no_kk,aksi:'anak'},function(json){
              	$('#kia_anak').html("<option value=''>Pilih Nik / Nama Anak</option>");
              	$.each(json,function(index,val){
              		// console.log(json);
              		$('#kia_anak').append("<option value="+val.nik+">"+val.nik+" - "+val.penduduk_nama+"</option>");
              		$('#kia_anak').val(kia);
              	})
              })
            }

            function identitas_anak(data){
            	// console.log(data);
            	var nik_anak = data;
            	$.getJSON('ap_data.php', {aksi:'id_anak',nik_anak:nik_anak}, function(json) {
            		// if(json!==''){
            			/*optional stuff to do after success */
            			// console.log(json);
            			var tahun = json.penduduk_tanggal_lahir.split('-');
            			// console.log(tahun);
            			$('#kia_kode').val(tahun[0]+json.nik.split('').reverse().join(''));
            			$('#nama_anak').val(json.penduduk_nama);
            			$('#ttl_anak').val(json.penduduk_tempat_lahir+', '+json.penduduk_tanggal_lahir);
            	});
            }

            window.onload=dataAnak();
            function dataAnak(){
            	var kia_id = $('#kia_id').val();
            	$.getJSON('data_anak.php',{kia_id:kia_id},function(res){
            		console.log(res[0].kia_nik);
            		nik_anak(res[0].no_kk,res[0].kia_nik);
            		$('#kia_kode').val(res[0].kia_kode);
            		$('#nama_anak').val(res[0].nama_anak);
            		$('#ttl_anak').val(res[0].ttl_anak);
            		$('#kia_berlaku').val(res[0].kia_berlaku);
            	})
            }



	</script>
	<?php require_once($LAYOUT.'js.php'); ?>
</body>
</html>