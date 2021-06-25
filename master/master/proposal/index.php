<?php 
require_once '../konektor.php';
require_once $LIB.'session.php';
require_once $LIB.'function.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Data Proposal";
$dt_option=mysqli_query($koneksi,"SELECT * FROM ap_pemohon");

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
                  <th>Kode Proposal</th>
									<th>Nama Kegiatan</th>
                  <th>Jenis Kegiatan</th>
                  <th>Penyelenggara</th>
                  <th>Tgl Kegiatan</th>
                  <th>Lokasi</th>
                  <th>Tujuan</th>
                  <th>Bentuk Bantuan</th>
                  <th>Uang</th>
                  <th>Barang</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>Tgl Reg</th>
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
                              <input type="hidden" name="proposal_id" id="proposal_id">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="">Pemohon</label>
                                  <select class="form-control" name="pemohon" id="pemohon">
                                     
                                     <option id="atas">Silahkan Pilih</option>
                                     

                                     <?php while($vale=mysqli_fetch_array($dt_option)){
                                      ?>
                                      <option >
                                        <?= $vale['pemohon_nik']." - ".$vale['pemohon_nama'];?>
                                      </option>
                                    <?php } ?>
                                   
                                  </select>
                                  
                                </div>
                                <div class="col-md-6">
                                  <label for="">Proposal Kode</label>
                                  <input type="text" name="proposal_kode" id="proposal_kode" class="form-control" required >
                                </div>
                              </div>
                            </div> 

                            <div class="modal-body">  
                              <div class="row">  
                                <div class="col-md-6">
                                  <label for="">Nama Kegiatan</label>
                                  <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="">Jenis Kegiatan</label>
                                  <input type="text" name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" required="">
                                </div>
                                
                                </div>
                            </div> 
                            <div class="modal-body">  
                              <div class="row">  
                                <div class="col-md-6">
                                  <label for="">Tanggal Kegiatan</label>
                                  <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="">Lokasi Kegiatan</label>
                                  <input type="text" name="lokasi_kegiatan" id="lokasi_kegiatan" class="form-control" required>
                                </div>
                                
                                </div>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                
                                <div class="col-md-6">
                                  <label for="">Tujuan Kegiatan</label>
                                  <input type="text" name="tujuan_kegiatan" id="tujuan_kegiatan" class="form-control" required="">
                                </div>
                                <div class="col-md-6">
                                  <label for="">Permohonan Bantuan</label>
                                  <select class="form-control" name="bantuan_bentuk" id="bantuan_bentuk">
                                    <option id="pb">Silahkan Pilih</option>
                                     
                                    <option>Uang</option>
                                    <option>Barang</option>
                                    <option>Uang dan Barang</option>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="modal-body">
                              <div class="row">
                                
                                <div class="col-md-6">
                                  <label for="">Bantuan Uang</label>
                                  <input type="text" name="bantuan_uang" id="bantuan_uang" class="form-control" required onkeydown="return hanyaAngka(event)">
                                </div>
                                <div class="col-md-6">
                                  <label for="">Bantuan Barang</label>
                                  <input type="text" name="bantuan_barang" id="bantuan_barang" class="form-control" required>
                                </div>
                              </div>
                            </div>  
                            <div class="modal-body"> 
                            <div class="row">   
                                
                                <div class="col-md-6">
                                  <label for="">Keterangan</label>
                                  <input type="text"  name="keterangan" id="keterangan" class="form-control" required >
                                </div>

                                <div class="col-md-6" id="stts" style="display:none">
                                  <label for="">Status Proposal</label>
                                  <select class="form-control" name="setatus">
                                    <option id="ops"></option>
                                    <option>Pengajuan</option>
                                    <option>Diterima</option>
                                    <option>Ditolak</option>
                                  </select>
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
           $('#proposal_id').val('');
           $('#modal_form')[0].reset();
           $('#edit').css('display','none');
           $('#simpan').css('display','inline-block');
          $('#pb').html('Silahkan Pilih');
          $('#atas').html('Silahkan Pilih');
           $('#stts').css('display','none');
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
                   {"data": "proposal_kode"},
                   {"data": "nama_kegiatan"},
                   {"data": "jenis_kegiatan"},
                   {"data": "pemohon_nama"},
                   {"data": "tgl_kegiatan"},
                   
                   {"data": "lokasi_kegiatan"},
                   {"data": "tujuan_kegiatan"},
                   
                   {"data": "bentuk_bantuan"},
                   {"data": "bantuan_uang"},
                   {"data": "bantuan_barang"},
                   
                   {"data": "status"},
                   {"data": "keterangan"},
                   {"data": "tgl_reg"},
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
         	$('#proposal_id').val(isi);
         	$('#edit').css('display','inline-block');
         	$('#simpan').css('display','none');
          $('#stts').css('display','inline-block');
          //var select = document.getElementById('pemohon');
         	$.getJSON('data.php', {id: isi}, function(json) {
              $('#pb').html(json.proposal_bantuan_bentuk);
         			
              $('#proposal_kode').val(json.proposal_kode);
              $('#nama_kegiatan').val(json.proposal_nama_kegiatan);
              $('#jenis_kegiatan').val(json.proposal_jenis_kegiatan);
              $('#lokasi_kegiatan').val(json.proposal_lokasi_kegiatan);
              $('#tanggal_kegiatan').val(json.tgl_kegiatan);
              $('#tujuan_kegiatan').val(json.proposal_tujuan_kegiatan);
              $('#bantuan_uang').val(json.proposal_bantuan_uang);
              $('#bantuan_barang').val(json.proposal_bantuan_barang);
              $('#bantuan_uang').val(json.proposal_bantuan_uang);
              $('#keterangan').val(json.proposal_keterangan);
              $('#ops').html(json.proposal_status);
              
              $('#atas').html(json.pemohon_nik +' - '+json.pemohon_nama);

              //$(select).append('<option value=' + json.pemohon_id + '>' + json.pemohon_nama + '</option>');

              
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