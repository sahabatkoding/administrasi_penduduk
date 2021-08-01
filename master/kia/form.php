<?php require_once('../konektor.php');
$header = 'Kartu Identitas Anak';
if($master=='0' && $kasi_2=='0'){
?><script>location.href=<?php echo $MASTER?>"login/logout.php"</script>
<?php
}
 ?>
<!DOCTYPE html>
<html>
<head>
<?php require_once($LAYOUT.'head.php') ?>
</head>
<body>
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
					<form action="<?php echo  ($_GET['kia_nik']) ? 'proses.php?aksi=edit&kia_nik='.$_GET['kia_nik']: 'proses.php?aksi=simpan' ?>" method="POST">
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
										<option value="<?=$dataOrtu['nik']?>" <?php if($_POST['nik_orang_tua']==$dataOrtu['nik']) echo "selected" ?>><?=$dataOrtu['nik'].' - '.$dataOrtu['penduduk_nama']?></option>	
									<?php endforeach; ?>	
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2">No Kartu Keluarga</label>
							<div class="col-md-10 col-sm-12">
								<input type="text" name="no_kk" id="no_kk" class="form-control" readonly="readonly" >
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
								<input type="text" name="kia_kode" id="kia_kode" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2">Nama Anak</label>
							<div class="col-md-10 col-sm-12">
								<input type="text" name="nama_anak" id="nama_anak" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2">Tempat Tanggal Lahir</label>
							<div class="col-md-10 col-sm-12">
								<input type="text" name="ttl_anak" id="ttl_anak" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-md-2">Berlaku Sampai</label>
							<div class="col-md-10 col-sm-12">
								<input type="date" name="kia_berlaku" id="kia_berlaku" class="form-control">
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

function nik_anak(data){
              var no_kk = data;
              $.ajax({
                type:"GET",
                url:'ap_data.php?aksi=anak',
                data:'no_kk='+no_kk ,
                success:function(isi){
                  $('#kia_anak').html(isi);
                  // $('#penduduk').val(id_penduduk);
                }
              })
            }

            function identitas_anak(data){
            	// console.log(data);
            	var nik_anak = data;
            	$.getJSON('ap_data.php', {aksi:'id_anak',nik_anak:nik_anak}, function(json) {
            			/*optional stuff to do after success */
            			// console.log(json);
            			var tahun = json.penduduk_tanggal_lahir.split('-');
            			// console.log(tahun);
            			$('#kia_kode').val(tahun[0]+json.nik.split('').reverse().join(''));
            			$('#nama_anak').val(json.penduduk_nama);
            			$('#ttl_anak').val(json.penduduk_tempat_lahir+', '+json.penduduk_tanggal_lahir);

            	});
            }

	</script>
	<?php require_once($LAYOUT.'js.php'); ?>
</body>
</html>