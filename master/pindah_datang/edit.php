<?php 
require_once '../konektor.php';


if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$id = filter($_GET['id']);
$data = find('ap_pindah_datang', 'pd_id', $id);

$header = "Edit Data Pindah Datang";

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
						<input type="hidden" name="id" value="<?= $data['pd_id'] ?>">
						<div class="form-group">
							<label>Tanggal Registrasi</label>
							<input type="date" value="<?= $data['tgl_registrasi'] ?>" class="form-control" required="" name="tgl_registrasi">
						</div>
						<div class="form-group">
							<label>Tanggal Datang</label>
							<input type="date" value="<?= $data['tgl_datang'] ?>" class="form-control" required="" name="tgl_datang">
						</div>
						<div class="form-group">
							<label>NIK</label>
							<input type="text" class="form-control" required="" name="nik" value="<?= $data['pd_nik'] ?>">
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" required="" name="nama" value="<?= $data['pd_nama'] ?>">
						</div>
						<div class="form-group row col-md-6">
							<label>Jenis Kelamin</label>
							<select required="" class="form-control" name="jenis_kelamin">
								<option value="">Pilih</option>
								<option <?= ( $data['pd_jk'] == 'L' )? 'selected' : '' ?> value="L">Laki-laki</option>
								<option <?= ( $data['pd_jk'] == 'P' )? 'selected' : '' ?> value="P">Perempuan</option>
							</select>
						</div>
						<div class="form-group row col-md-6">
							<label>Agama</label>
							<select required="" class="form-control" name="agama">
								<option value="">Pilih Agama</option>
								<?php 
								$select_agama = "SELECT * FROM ap_agama ORDER BY agama_id ASC";

								$data_agama = $koneksi->query($select_agama);

								foreach ($data_agama as $key => $value): ?>
									<option <?= ( $data['pd_agama'] == $value['agama_id'] )? 'selected' : '' ?> value="<?= $value['agama_id'] ?>"><?= $value['agama_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label>Tempat Lahir</label>
								<input type="text" required="" value="<?= $data['pd_tempat_lahir'] ?>" class="form-control" name="tempat_lahir">
							</div>
							<div class="form-group col-md-6">
								<label>Tanggal Lahir</label>
								<input type="date" required="" value="<?= $data['pd_tanggal_lahir'] ?>" class="form-control" name="tanggal_lahir">
							</div>
						</div>
						<div class="form-group">
							<label>Alamat Asal</label>
							<input type="text" required="" value="<?= $data['pd_alamat_asal'] ?>" class="form-control" name="alamat_asal">
						</div>
						<div class="form-group">
							<label>Alasan Pindah</label>
							<input type="text" required="" value="<?= $data['pd_alasan_pindah'] ?>" class="form-control" name="alasan_pindah">
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" required="" value="<?= $data['pd_keterangan'] ?>" class="form-control" name="keterangan">
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
		        		window.location.href="<?= $MASTER ?>master/pindah_datang/index.php"
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