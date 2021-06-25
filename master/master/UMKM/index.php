<?php 
require_once '../konektor.php';
require_once $LIB.'session.php';
require_once $LIB.'function.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Data UMKM";
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
                  <th>Kode UMKM</th>
									<th>Nama Usaha</th>
                  <th>Jenis Usaha</th>
                  <th>Pendiri</th>
                  <th>Lokasi</th>
                  <th>Jenis Perizinan</th>
                  <th>Pemberi Izin</th>
                  <th>Tahun Perizinan</th>
                  <th>Masa Berlaku Izin</th>
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
                              <input type="hidden" name="umkm_id" id="umkm_id">
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
                                  <label for="">UMKM Kode</label>
                                  <input type="text" name="umkm_kode" id="umkm_kode" class="form-control" required >
                                </div>
                              </div>
                            </div> 

                            <div class="modal-body">  
                              <div class="row">  
                                <div class="col-md-6">
                                  <label for="">Nama Usaha</label>
                                  <input type="text" name="nama_usaha" id="nama_usaha" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="">Jenis Usaha</label>
                                  <input type="text" name="jenis_usaha" id="jenis_usaha" class="form-control" required="">
                                </div>
                                
                                </div>
                            </div> 
                            <div class="modal-body">  
                              <div class="row">  
                                
                                <div class="col-md-6">
                                  <label for="">Lokasi Usaha</label>
                                  <input type="text" name="lokasi" id="lokasi" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="">Pemberi Ijin</label>
                                  <input type="text" name="pemberi_ijin" id="pemberi_ijin" class="form-control" required="">
                                </div>
                                
                                </div>
                            </div>
                            <div class="modal-body">  
                              <div class="row">  
                                
                                <div class="col-md-6">
                                  <label for="">Jenis Perijinan</label>
                                  <input type="text" name="jenis_ijin" id="jenis_ijin" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="">Tahun Perijinan</label>
                                  <input type="text" name="tahun" id="tahun" class="form-control" required onkeydown="return hanyaAngka(event)">
                                </div>
                                
                                </div>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                
                                
                                <div class="col-md-6">
                                  <label for="">Masa Berlaku Sampai</label>
                                  <input type="date" name="masa_berlaku" id="masa_berlaku" class="form-control" required >
                                </div>
                                <div class="col-md-6">
                                  <label for="">Keterangan</label>
                                  <input type="text"  name="keterangan" id="keterangan" class="form-control" required >
                                </div>
                              </div>
                            </div>

                             
                            <div class="modal-body" > 
                            <div class="row">   
                                
                                

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
           $('#umkm_id').val('');
           $('#modal_form')[0].reset();
           $('#edit').css('display','none');
           $('#simpan').css('display','inline-block');
          
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
                   {"data": "umkm_kode"},
                   {"data": "nama_usaha"},
                   {"data": "jenis_usaha"},
                   {"data": "pemohon_nama"},
                   
                   
                   {"data": "lokasi_usaha"},
                   {"data": "jenis_perijinan"},
                   
                   {"data": "pemberi_ijin"},
                   {"data": "tahun_perijinan"},
                   {"data": "berlaku_sampai"},
                   
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
         	$('#umkm_id').val(isi);
         	$('#edit').css('display','inline-block');
         	$('#simpan').css('display','none');
          $('#stts').css('display','inline-block');
          //var select = document.getElementById('pemohon');
         	$.getJSON('data.php', {id: isi}, function(json) {
              
         			
              $('#umkm_kode').val(json.umkm_kode);
              $('#nama_usaha').val(json.umkm_nama_usaha);
              $('#jenis_usaha').val(json.umkm_jenis_usaha);
              $('#lokasi').val(json.umkm_lokasi_usaha);
              $('#tahun').val(json.umkm_tahun_perijinan);
              $('#jenis_ijin').val(json.umkm_jenis_perijinan);
              $('#pemberi_ijin').val(json.umkm_pemberi_ijin);
              $('#masa_berlaku').val(json.umkm_berlaku_sampai);
              
              $('#keterangan').val(json.umkm_keterangan);
              $('#ops').html(json.umkm_status_persetujuan);
              
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