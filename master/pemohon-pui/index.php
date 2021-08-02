<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Data Pemohon Proposal/UMKM/IMB";

$dt_option=mysqli_query($koneksi,"SELECT * FROM ap_agama");

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
				<!-- <div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>DataTable</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">DataTable</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2018
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4"><?= $header ?>

						<span class="pull-right">
							<button class="btn btn-primary " data-toggle="modal" data-target="#modal" id="tambah" name="tambah">Tambah</button>
						</span>
						</h4>
					</div>
					<div class="pb-20">
						<!-- <table class="table striped hover nowrap" id="table" width="100%"> -->
							<table class="table hover stripe nowrap table-bordered" id="table" width="100%">
							<thead>
								<tr>
									<th>No</th>
                  <th>NIK</th>
									<th>Nama Pemohon</th>
                  <th>Tempat, Tgl lahir</th>
                  <th>JK</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>No Identitas</th>
                  <th>NPWP</th>
                  <th>Penghasilan</th>
                  <th>No Telp</th>
                  <th>Email</th>
                  <th>Tgl Reg</th>
                  <th>Tgl Update</th>
									<th>Edit</th>
									<th>Hapus</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
				<!-- modal -->

                      <div class="modal fade " id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo $header ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="modal_form">
                              <input type="hidden" name="pemohon_id" id="pemohon_id">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="">Pemohon</label>
                                  <input type="text" name="pemohon_nama" id="pemohon_nama" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="">NIK</label>
                                  <input type="text" name="pemohon_nik" id="pemohon_nik" class="form-control" required onkeydown="return hanyaAngka(event)">
                                  <input type="text" name="pemohon_nik" id="pemohon_nik_b" disabled="disabled" class="form-control" required onkeydown="return hanyaAngka(event)">
                                  
                                </div>
                              </div>
                            </div> 

                            <div class="modal-body">  
                              <div class="row">  
                                <div class="col-md-6">
                                  <label for="">Tempat Lahir</label>
                                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="">Tanggal Lahir</label>
                                  <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required="">
                                </div>
                                
                                </div>
                            </div>
                             <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="">Jenis Kelamin</label>
                                  <select class="form-control" name="jk" id="jk">
                                    <option id="ijk">Silahkan Pilih</option>
                                     
                                    <option>L</option>
                                    <option>P</option>
                                    
                                  </select>
                                </div>
                                <div class="col-md-6">
                                  <label for="">Agama</label>
                                  <select class="form-control" name="agama" id="agama">
                                     
                                     <option id="ag">Silahkan Pilih</option>
                                     

                                     <?php while($vale=mysqli_fetch_array($dt_option)){
                                      ?>
                                      <option>
                                        <?= $vale['agama_nama'];?>
                                      </option>
                                    <?php } ?>
                                   
                                  </select>
                                </div>
                              </div>
                            </div> 
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="">Alamat</label>
                                  <input type="text" name="alamat" id="alamat" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="">Email</label>
                                  <input type="email" name="email" id="email" class="form-control" required="">
                                </div>
                              </div>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="">No Identitas 1 (SIM)</label>
                                  <input type="text" name="ni1" id="ni1" class="form-control" required onkeydown="return hanyaAngka(event)">
                                </div>
                                <div class="col-md-6">
                                  <label for="">No Identitas 2 (NIP)</label>
                                  <input type="text" name="ni2" id="ni2" class="form-control" required onkeydown="return hanyaAngka(event)">
                                </div>
                              </div>
                            </div>  
                            <div class="modal-body"> 
                            <div class="row">   
                                <div class="col-md-6">
                                  <label for="">NPWP</label>
                                  <input type="text" name="npwp" id="npwp" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="">Penghasilan</label>
                                  <input type="text" name="penghasilan" id="penghasilan" class="form-control" required onkeydown="return hanyaAngka(event)">
                                </div>
                                </div>
                            </div>  
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="">No Telepon</label>
                                  <input type="text" name="telepon_1" id="telepon_1" class="form-control" required onkeydown="return hanyaAngka(event)">
                                </div>
                                <div class="col-md-6">
                                  <label for="">No Telepon Alternatif</label>
                                  <input type="text" name="telepon_2" id="telepon_2" class="form-control" required onkeydown="return hanyaAngka(event)">
                                </div>
                                </div>
                            </div>  
                            
                              

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
                                <button type="button" class="btn btn-success" id="edit" style="display:none">Edit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- modal -->
			</div>
			<?php require_once $LAYOUT.'footer.php'; ?>
		</div>
	</div>
	<!-- js -->
	<script>
	 	function kosong(){
           $('#pemohon_id').val('');
           $('#modal_form')[0].reset();
           $('#edit').css('display','none');
           $('#simpan').css('display','inline-block');
           $('#pemohon_nik').css('display','inline-block');
           $('#pemohon_nik_b').css('display','none');
           $('#ijk').html('Silahkan Pilih');
           $('#ag').html('Silahkan Pilih');
         }


	$(function () {
           /* Isi Table */
             $('#table').DataTable({
             	   dom: "Bfrtip",
       			 buttons: [
           ],
               "scrollX": true,
             
               "ajax": {
                   "url": "data.php",
                   "dataSrc": ""
                 },
                 "columns": [
                   {"data": "no"},
                   {"data": "pemohon_nik"},
                   {"data": "pemohon_nama"},
                   {"data": "tempat_lahir"},
                   {"data": "jk"},
                   {"data": "agama"},

                   {"data": "alamat"},
                   {"data": "identitas_1"},
                   
                   {"data": "npwp"},
                   {"data": "penghasilan"},
                   {"data": "telp_1"},
                   
                   {"data": "email"},
                   {"data": "tgl_reg"},
                   {"data": "tgl_update"},
                   {"data": "edit"},
                   {"data": "hapus"},
                 ]
             });
           /* Isi Table */
         });


         $('#tambah').on('click',function(){
         	kosong();
         })

         $('#simpan').on('click',function(){
         	$.ajax({
         		url: 'proses.php',
         		type: 'POST',
         		dataType: 'HTML',
         		data: $('#modal_form').serialize(),
         		// console.log(data);
         		success:function(isi){
         		$('#modal').modal('hide');
                kosong();
                $('#table').DataTable().ajax.reload();
         		}
         	})
         	.fail(function() {
         		console.log("error");
         	})         	
         })

         function edit(isi){
         	$('#pemohon_id').val(isi);
         	$('#edit').css('display','inline-block');
         	$('#simpan').css('display','none');
           $('#pemohon_nik').css('display','none');
           $('#pemohon_nik_b').css('display','inline-block');
         	$.getJSON('data.php', {id: isi}, function(json) {
         			$('#pemohon_nama').val(json.pemohon_nama);
              $('#pemohon_nik_b').val(json.pemohon_nik);
              $('#tempat_lahir').val(json.pemohon_tempat_lahir);
              $('#tgl_lahir').val(json.pemohon_tanggal_lahir);
              $('#alamat').val(json.pemohon_alamat);
              $('#email').val(json.pemohon_email);
             $('#ni1').val(json.pemohon_no_identitas_1);
             $('#ni2').val(json.pemohon_no_identitas_2);
             $('#npwp').val(json.pemohon_npwp);
             $('#penghasilan').val(json.pemohon_penghasilan);
             $('#telepon_1').val(json.pemohon_telepon_1);
             $('#telepon_2').val(json.pemohon_telepon_2);
             $('#ag').html(json.pemohon_agama);
             $('#ijk').html(json.pemohon_jk);
         	});
         }

         $('#edit').on('click',function(){
         	$.ajax({
         		url:'proses.php',
         		type:'POST',
         		dataType:'HTML',
         		data:$('#modal_form').serialize(),
         		success:function(isi){
         			$('#modal').modal('hide');
         			kosong();
         			$('#table').DataTable().ajax.reload()
         		}
         	})
         	.fail(function(){
         		console.log("error");
         	})
         })

         function hapus(isi){
         	var n = confirm('Yakin Hapus?');

         	if(n){
         	$.ajax({
         		url:'proses.php',
         		type:'GET',
         		dataType:'HTML',
         		data: {id:isi},
         		success:function(isi){
         			$('#modal').modal('hide');
         			kosong();
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