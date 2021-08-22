<!-- kelahiran_id tgl_registrasi	tgl_update	kelahiran_kode	nik_pemohon	kelahiran_nama	kelahiran_jk	kelahiran_alamat	kelahiran_agama	kelahiran_tempat_lahir	kelahiran_tanggal_lahir	id_user -->

<?php 
require_once '../konektor.php';

if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}



$header = "Data Pindah Keluar";

 ?>

<!DOCTYPE html>
<html>
<head>
<?php require_once $LAYOUT.'head.php'; ?>
</head>
<body>
	<?php require_once $LAYOUT.'header.php'; ?>
	<?php require_once $LAYOUT.'sidebar.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4"><?= $header ?>
						<span class="pull-right">
							<a href="<?= $MASTER ?>master/pindah_keluar/tambah.php" class="btn btn-primary" name="tambah">Tambah</a>
						</span>
						</h4>
					</div>

					<div class="pb-20">
						<!-- <table class="table striped hover nowrap" id="table" width="100%"> -->
							<table class="table hover stripe nowrap table-bordered" id="table" width="100%">
							<thead>
								<tr>
									<th>KODE</th>
									<th>TGL REGISTRASI</th>
									<th>TGL DATANG</th>
									<th>NIK</th>
									<th>NAMA</th>
									<th>ALAMAT TUJUAN</th>
									<th>ALASAN PINDAH</th>
									<th>EDIT</th>
									<th>HAPUS</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<?php require_once $LAYOUT.'footer.php'; ?>
		</div>
	</div>
	<!-- js -->
	<script>
   $(function () {
     /* Isi Table */
	    $('#table').DataTable({
	        "scrollX": true,
	         "ajax": {
	             "url": "data.php",
	             "dataSrc": ""
	           },
	       });
	   });


         function hapus(isi){
         	var n = confirm('Yakin Hapus?');
         	if(n){
         	$.ajax({
         		url:'proses.php?action=hapus',
         		type:'GET',
         		dataType:'JSON',
         		data: {id:isi},
         		success:function(response){
         			$('#alert').html(response.alert);
         			$('#table').DataTable().ajax.reload()
         		}
         	})
         	.fail(function(){
         		console.log("error");
         	})	
         	}
         }
	</script>
	<?php require_once $LAYOUT.'js.php'; ?>
</body>
</html>