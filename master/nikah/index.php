<?php 
require_once '../konektor.php';


if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Data Pengajuan Pernikahan";

 ?>

<!DOCTYPE html>
<html>
<head>
<?php require_once $LAYOUT.'head.php'; ?>
<!-- css tambahan -->
<style>
      #ul1{
        background-color:#eee;
        cursor:pointer;
        position: relative;
        width: 95%;
      }
      #li1{
        padding:12px;
        border:thin solid #F0F8FF;
      }
      #li1:hover{
        background-color:#7FFFD4;
      }
    </style>
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
									<th>Kode</th>
									<th>Tanggal Reg</th>
									<th>NIK</th>
									<th>Nama Pemohon</th>
									<th>Tempat Tanggal Lahir</th>
									<th>Pekerjaan</th>
									<th>Alamat</th>
									<th>Tempat </th>
									<th>Keterangan</th>
									<th>Edit</th>
									<th>Hapus</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
				<!-- modal -->

                      <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo $header ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="modal_form">
                              <input type="text" name="pnikah_id" id="pnikah_id">
                              <input type="text" name="nik_pemohon" id="nik_pemohon">
                              <input type="text" name="id_user" id="id_user" value="<?php echo $dataAdm['user_id'] ?>">
                              <input type="text" name="tgl_update" id="tgl_update" >
                              <div class="modal-body">
                              <div class="col-sm-12 col-md-12">
	                                 <label for="">Tanggal Registrasi</label>
	                                <input type="text" name="tgl_reg" id="tgl_reg" class="form-control" value="<?=date('Y-m-d')?>" readonly>
                            	</div><div class="col-sm-12 col-md-12">
	                                <label for="">Kode</label>
	                                <input type="text" name="pnikah_kode" id="pnikah_kode" class="form-control" value="Nikah/<?=date('Y')."/".newID('ap_permohonan_nikah','pnikah_id')?>" >
                            	</div>
                            	<div class="col-sm-12 col-md-12">
	                                <label for="">Nama penduduk</label>
	                                <input type="text" name="penduduk" id="penduduk" class="form-control" placeholder="ketik nik / nama" required>
	                                <div id="pendudukList"></div>
                            	</div>
                            	<div class="col-sm-12 col-md-12">
	                                <label for="">Tanggal Rencana Pernikahan</label>
	                                <input type="date" name="tgl_nikah" id="tgl_nikah" class="form-control" >
                            	</div>
                            	<div class="col-sm-12 col-md-12">
	                                <label for="">Tempat Rencana Pernikahan</label>
	                                <input type="text" name="pnikah_tempat" id="pnikah_tempat" class="form-control" >
                            	</div>
                            	<div class="col-sm-12 col-md-12">
	                                <label for="">Keterangan</label>
	                                <textarea class="form-control" name="pnikah_keterangan" id="pnikah_keterangan" rows="5"></textarea>
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

		$(function(){
			$('#penduduk').on('keyup',function(){
			var data = $('#penduduk').val();
			if(data!=''){
				$.ajax({
					url : "penduduk.php",
					method : "POST",
					data : {query:data},
					success:function(data)
					{
                      $('#pendudukList').fadeIn();  
                      $('#pendudukList').html(data);  
					}
				})
			}
			})
			 $(document).on('click', 'li', function(value){
			   var nik = $(this).text().split('-',1);
			   $('#penduduk').val($(this).text());
			   $('#nik_pemohon').val(nik);
        	   $('#pendudukList').fadeOut();  
      });  
		})

	 	function kosong(){
           $('#pnikah_id').val('');
           $('#modal_form')[0].reset();
           $('#edit').css('display','none');
           $('#simpan').css('display','inline-block');
         }


	$(function () {
           /* Isi Table */
             $('#table').DataTable({
             	   // dom: "Bfrtip",
       			 // buttons: [
            // 'copy', 'csv', 'excel', 'pdf', 'print'
       					 // ],
               "scrollX": true,
             
               "ajax": {
                   "url": "data.php",
                   "dataSrc": ""
                 },
                 "columns": [
                  {"data":"no"},
									{"data":"kode"},
									{"data":"tanggal_reg"},
									{"data":"nik"},
									{"data":"nama"},
									{"data":"ttl"},
									{"data":"pekerjaan"},
									{"data":"alamat"},
									{"data":"tempat "},
									{"data":"keterangan"},
									{"data":"edit"},
									{"data":"hapus"},
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
         	$('#pendidikan_id').val(isi);
         	$('#edit').css('display','inline-block');
         	$('#simpan').css('display','none');
         			$.getJSON('data.php', {id: isi}, function(json) {
         				$('#pendidikan_nama').val(json.pendidikan_nama);
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