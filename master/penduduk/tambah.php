<?php 
require_once '../konektor.php';



if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Tambah Data Penduduk";

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
						<h4 class="text-blue h4"><?= $header ?></h4>
					</div>


					<div class="p-4">
						<form id="simpan" method="post" enctype="multipart/form-data">
						<div class="form-group row col-md-6">
							<label>Tanggal Registrasi</label>
							<input type="date" value="<?= date('Y-m-d') ?>" class="form-control" required="" name="tgl_registrasi">
						</div>
						<div class="form-group row col-md-8">
							<label>NIK</label>
							<input type="text" required="" class="form-control" name="nik">
						</div>
						<div class="form-group row col-md-8">
							<label>No KK</label>
							<input type="text" required="" class="form-control" name="no_kk">
						</div>
						<div class="form-group row col-md-8">
							<label>No Akta</label>
							<input type="text" required="" name="no_akta" class="form-control">
						</div>
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" required="" class="form-control" name="nama_lengkap">
						</div>

						<div class="row">
							<div class="form-group col-md-4">
								<label>Tempat Lahir</label>
								<input type="text" required="" class="form-control" name="tempat_lahir">
							</div>
							<div class="form-group col-md-4">
								<label>Tanggal Lahir</label>
								<input type="date" required="" class="form-control" name="tanggal_lahir">
							</div>
						</div>
						
						<div class="form-group row col-md-4">
							<label>Jenis Kelamin</label>
							<select required="" class="form-control" name="jenis_kelamin">
								<option value="">Pilih</option>
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
						<div class="form-group row col-md-4">
							<label>Golongan Darah</label>
							<select required="" class="form-control" name="golongan_darah">
								<option value="-">Tidak Diketahui</option>
								<option value="O">O</option>
								<option value="A">A</option>
								<option value="A">B</option>
								<option value="A">AB</option>
							</select>
						</div>

						<div class="form-group row col-md-6">
							<label>Provinsi</label>
							<select required="" class="form-control" name="provinsi">
								<option value="">Pilih</option>
								<?php  
								$select_provinsi = "SELECT * FROM ap_provinsi ORDER BY provinsi_nama ASC";

								$data_provinsi = $koneksi->query($select_provinsi);
								?>
								<?php foreach ($data_provinsi as $key => $value): ?>
									<option value="<?= $value['provinsi_id'] ?>"><?= $value['provinsi_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group row col-md-6">
							<label>Kabupaten</label>
							<select required="" class="form-control" name="kabupaten">
								
							</select>
						</div>

						<div class="form-group row col-md-6">
							<label>Kecamatan</label>
							<select required="" class="form-control" name="kecamatan">
							</select>
						</div>
						
						<div class="form-group row col-md-6">
							<label>Kelurahan</label>
							<select required="" class="form-control" name="kelurahan">
							</select>
						</div>
						
						<div class="row">
							<div class="form-group col-md-8">
								<label>Alamat Dukuh, Jalan</label>
								<input type="text" required="" class="form-control" name="alamat">
							</div>
							<div class="form-group col-md-2">
								<label>RT</label>
								<input type="text" required="" class="form-control" name="rt">
							</div>
							<div class="form-group col-md-2">
								<label>RW</label>
								<input type="text" required="" class="form-control" name="rw">
							</div>
						</div>

						<div class="form-group row col-md-4">
							<label>Agama</label>
							<select required="" class="form-control" name="agama">
								<option value="">Pilih Agama</option>
								<?php 
								$select_agama = "SELECT * FROM ap_agama ORDER BY agama_id ASC";

								$data_agama = $koneksi->query($select_agama);

								foreach ($data_agama as $key => $value): ?>
									<option value="<?= $value['agama_id'] ?>"><?= $value['agama_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group row col-md-4">
							<label>Status Perkawinan</label>
							<select required="" class="form-control" name="status_perkawinan">
								<option value="BM">Belum Menikah</option>
								<option value="M">Menikah</option>
								<option value="CM">Cerai Mati</option>
								<option value="CH">Cerai Hidup</option>
							</select>
						</div>
						<div class="form-group row col-md-4">
							<label>Pendidikan</label>
							<select required="" class="form-control" name="pendidikan">
								<option value="">Pilih Pendidikan</option>
								<?php 
								$select_pendidikan = "SELECT * FROM ap_pendidikan ORDER BY pendidikan_id ASC";

								$data_pendidikan = $koneksi->query($select_pendidikan);

								foreach ($data_pendidikan as $key => $value): ?>
									<option value="<?= $value['pendidikan_id'] ?>"><?= $value['pendidikan_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label>Pekerjaan</label>
							<input type="text" required="" class="form-control" name="pekerjaan">
						</div>
						<div class="form-group row col-md-4">
							<label>Kewarganegaraan</label>
							<select required="" class="form-control" name="kewarganegaraan">
								<option value="WNI">Warga Negara Indonesia (WNI)</option>
								<option value="WNA">Warga Negara Asing (WNA)</option>
							</select>
						</div>
						<div class="form-group row col-md-6">
							<label>No Passport *khusus WNA</label>
							<input type="text" class="form-control" name="no_passport">
						</div>
						<div class="form-group row col-md-6">
							<label>No KITAS (Kartu Ijin Tinggal Terbatas ) *khusus WNA</label>
							<input type="text" class="form-control" name="no_kitas">
						</div>
						<div class="form-group">
							<label>Nama Ayah</label>
							<input type="text" required="" class="form-control" name="nama_ayah">
						</div>
						<div class="form-group">
							<label>Nama Ibu</label>
							<input type="text" required="" class="form-control" name="nama_ibu">
						</div>
						<div class="form-group  row col-md-4">
							<label>Status Keluarga</label>
							<select required="" class="form-control" name="status_keluarga">
								<option value="KK">Kepala Keluarga</option>
								<option value="I">Istri</option>
								<option value="A">Anak</option>
								<option value="M">Menantu</option>
								<option value="Mr">Mertua</option>
								<option value="F">Family Lain</option>
							</select>
						</div>
						<div class="form-group row col-md-4">
							<label>Status</label>
							<select required="" class="form-control" name="status">
								<option value="B">Baru</option>
								<option value="L">Lama</option>
								<option value="M">Meninggal</option>
								<option value="P">Pindah</option>
							</select>
						</div>
						<div class="form-group row col-md-6">
							<label>Telepon</label>
							<input type="text" required="" class="form-control" name="telepon">
						</div>
						<div class="form-group row col-md-6">
							<label>Photo</label>
							<input type="file" required="" class="form-control" name="photo">
						</div>
						<div class="col-md-12">
							<div class="row">
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

	$(function () {
           /* Isi Table */
             $('#table').DataTable({
             	   dom: "Bfrtip",
       			 buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
       					 ],
               "scrollX": true,
             
               "ajax": {
                   "url": "data.php",
                   "dataSrc": ""
                 },
             });
           /* Isi Table */
         });


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

	</script>

	<script type="text/javascript">
		 $('select[name="provinsi"]').change(function(){

		    var id_provinsi= $('select[name="provinsi"]').val();

		    $.ajax({
		        url : 'proses.php?action=get_kabupaten',
		        type : 'GET',
		        dataType : 'HTML',
		        data : {id_provinsi:id_provinsi},
		        beforeSend: function() {
		           $('select[name="kabupaten"]').html('<option>loading...</option>');
		        },
		        // complete: function(response) {
		        // 	$('input[name="provinsi"]').val('load');
		        // },
		        success: function(response) {
		        	console.log(response);
		        	$('select[name="kabupaten"]').html(response);
		        	$('select[name="kecamatan"]').html('');
		        	$('select[name="kelurahan"]').html('');
		        },
		        error: function(xhr, ajaxOptions, thrownError) {
		          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
		        }
		    });
		  });


		  $('select[name="kabupaten"]').change(function(){

		    var id_kabupaten= $('select[name="kabupaten"]').val();

		    $.ajax({
		        url : 'proses.php?action=get_kecamatan',
		        type : 'GET',
		        dataType : 'HTML',
		        data : {id_kabupaten:id_kabupaten},
		        beforeSend: function() {
		           $('select[name="kecamatan"]').html('<option>loading...</option>');
		        },
		        // complete: function(response) {
		        // 	$('input[name="kabupaten"]').val('load');
		        // },
		        success: function(response) {
		        	console.log(response);
		        	$('select[name="kecamatan"]').html(response);
		        	$('select[name="kelurahan"]').html('');
		        },
		        error: function(xhr, ajaxOptions, thrownError) {
		          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
		        }
		    });
		  });


		  $('select[name="kecamatan"]').change(function(){

		    var id_kecamatan= $('select[name="kecamatan"]').val();

		    console.log(id_kecamatan);

		    $.ajax({
		        url : 'proses.php?action=get_kelurahan',
		        type : 'GET',
		        dataType : 'HTML',
		        data : {id_kecamatan:id_kecamatan},
		        success: function(response) {
		        	$('select[name="kelurahan"]').html(response);
		        },
		        error: function(xhr, ajaxOptions, thrownError) {
		          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
		        }
		    });
		  });

		 $('#simpan').submit(function(e){
		    e.preventDefault();

		    let formdata = new FormData(this);
		    $.ajax({
		        url : 'proses.php?action=simpan',
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
		        		window.location.href="<?= $MASTER ?>master/penduduk/index.php"
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