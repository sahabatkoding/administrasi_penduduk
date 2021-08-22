<?php 
require_once '../konektor.php';


if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$id = filter($_GET['id']);
$data = find('ap_pindah_keluar', 'pk_id', $id);

$header = "Edit Data Pindah Keluar";

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
				<div class="card mb-30 row col-md-8">
					<div class="pd-20">
						<h4 class="text-blue h4"><?= $header ?></h4>
					</div>
					<div class="p-4">
						<form id="simpan" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?= $data['pk_id'] ?>">
						<div class="form-group">
							<label>Tanggal Registrasi</label>
							<input type="date" value="<?= $data['tgl_registrasi'] ?>" class="form-control" required="" name="tgl_registrasi">
						</div>
						<div class="form-group">
							<label>Tanggal Pindah</label>
							<input type="date" value="<?= $data['tgl_pindah'] ?>" class="form-control" required="" name="tgl_pindah">
						</div>
						<div class="form-group">
							<label>NIK Penduduk</label>
							<?php  
							$penduduk = $koneksi->query("SELECT * FROM ap_penduduk ORDER BY no_kk ASC");
							?>
							<select required="" class="form-control custom-select2" name="nik">
								<option value="">Pilih</option>
								<?php foreach ($penduduk as $key => $value): ?>
									<option <?= ($data['nik_penduduk'] == $value['nik'])? 'selected' : '' ?> value="<?= $value['nik'] ?>"><?= $value['penduduk_nama'] ?> | <?= $value['nik'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label>Alamat Tujuan</label>
							<input type="text" required="" value="<?= $data['pk_alamat_tujuan'] ?>" class="form-control" name="alamat_pindah">
						</div>
						<div class="form-group">
							<label>Alasan Pindah</label>
							<input type="text" required="" value="<?= $data['pk_alasan_pindah'] ?>" class="form-control" name="alasan_pindah">
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" required="" value="<?= $data['pk_keterangan'] ?>" class="form-control" name="keterangan">
						</div>
						<div class="col-md-12">
							<div class="row">
								<a href="index.php" class="btn btn-secondary">Kembali</a>
								<button type="submit" class="btn btn-primary ml-auto">Simpan</button>
							</div>
						</div>
					</form>	
					</div>
				</div>
			</div>
			<?php require_once $LAYOUT.'footer.php'; ?>
		</div>
	</div>
	<!-- js -->
	<script>


         $('#simpan').on('click',function(){
         	$.ajax({
         		url: 'proses.php',
         		type: 'POST',
         		dataType: 'HTML',
         		data: $('#modal_form').serialize(),
         		// console.log(data);
         		success:function(isi){
         		$('#modal').modal('hide');
                $('#table').DataTable().ajax.reload();
         		}
         	})
         	.fail(function() {
         		console.log("error");
         	})         	
         })

		 $('#simpan').submit(function(e){
		    e.preventDefault();

		    let formdata = new FormData(this);
		    $.ajax({
		        url : 'proses.php?action=edit',
		        data : formdata,
		        type : 'POST',
		        dataType : 'JSON',
		        processData: false,
		        contentType: false,
		        beforeSend: function() {
		          $('#button').attr('disable', 'disabled');
		          $('#button').html('<i class="fa fa-spinner fa-spin"></i>')
		        },
		        complete: function(response) {
		          $('#button').removeAttr('disabled');
		          $('#button').html('Masuk');
		        },
		        success: function(response) {

		        	if (response.gagal) {
		        		$('#alert').html(response.gagal);
		        	}else{
		        		$('#alert').html(response.success);
		        		window.location.href="<?= $MASTER ?>master/pindah_keluar/index.php"
		        	}
		        },
		        error: function(xhr, ajaxOptions, thrownError) {
		          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
		        }
		    });
		  });
	</script>
	<?php require_once $LAYOUT.'js.php'; ?>
</body>
</html>