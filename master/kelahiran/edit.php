<?php 
require_once '../konektor.php';



if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$id = filter($_GET['id']);
$data = find('ap_kelahiran', 'kelahiran_id', $id);

$header = "Edit Data Kelahiran";

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
							<input type="hidden" name="id" value="<?= $data['kelahiran_id'] ?>">
						<div class="form-group">
							<label>Tanggal Registrasi</label>
							<input type="date" value="<?= $data['tgl_registrasi'] ?>" class="form-control" required="" name="tgl_registrasi">
						</div>
						<div class="form-group">
							<label>Pemohon | NIK</label>
							<?php  
							$penduduk = $koneksi->query("SELECT * FROM ap_penduduk ORDER BY no_kk ASC");
							?>
							<select required="" class="form-control custom-select2" name="nik_pemohon">
								<option value="">Pilih</option>
								<?php foreach ($penduduk as $key => $value): ?>
									<option <?= ($data['nik_pemohon'] == $value['nik'])? 'selected' :'' ?> value="<?= $value['nik'] ?>"><?= $value['penduduk_nama'] ?> | <?= $value['nik'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group row col-md-6">
							<label>Jenis Kelamin</label>
							<select required="" class="form-control" name="jenis_kelamin">
								<option value="">Pilih</option>
								<option <?= ($data['kelahiran_jk'] == 'L')? 'selected' :'' ?> value="L">Laki-laki</option>
								<option <?= ($data['kelahiran_jk'] == 'P')? 'selected' :'' ?> value="P">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Nama Anak</label>
							<input type="text" required="" class="form-control" name="nama" value="<?= $data['kelahiran_nama'] ?>">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" required="" class="form-control" name="alamat" value="<?= $data['kelahiran_alamat'] ?>">
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label>Tempat Lahir</label>
								<input type="text" required="" class="form-control" name="tempat_lahir"  value="<?= $data['kelahiran_tempat_lahir'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Tanggal Lahir</label>
								<input type="date" required="" class="form-control" name="tanggal_lahir"  value="<?= $data['kelahiran_tanggal_lahir'] ?>">
							</div>
						</div>
						<div class="form-group row col-md-6">
							<label>Agama</label>
							<select required="" class="form-control" name="agama">
								<option value="">Pilih Agama</option>
								<?php 
								$select_agama = "SELECT * FROM ap_agama ORDER BY agama_id ASC";

								$data_agama = $koneksi->query($select_agama);

								foreach ($data_agama as $key => $value): ?>
									<option <?= ($data['kelahiran_agama'] == $value['agama_id'])? 'selected' :'' ?> value="<?= $value['agama_id'] ?>"><?= $value['agama_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						
						<div class="col-md-12">
							<div class="row">
								<a href="index.php" class="btn btn-secondary">Kembali</a>
								<button type="submit" class="btn btn-primary ml-2" id="button">Simpan</button>
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
		        		window.location.href="<?= $MASTER ?>master/kelahiran/index.php"
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