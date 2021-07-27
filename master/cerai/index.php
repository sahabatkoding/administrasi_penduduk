<?php 
require_once '../konektor.php';


if($admin==0 && $kasi_2==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Data Pengajuan Perceraian";

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
									<!-- <th>Tanggal Acara</th> -->
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

                      <div class="modal fade bd-example-modal-lg" id="modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo $header ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="modal_form">
                              <input type="hidden" name="pcerai_id" id="pcerai_id">
                              <!-- <input type="hidden" name="nik_pemohon" id="nik_pemohon"> -->
                              <input type="hidden" name="id_user" id="id_user" value="<?php echo $dataAdm['user_id'] ?>">
                              <!-- <input type="text" name="tgl_update" id="tgl_update" > -->
                              <div class="modal-body">
                              <div class="col-sm-12 col-md-12">
	                                 <label for="">Tanggal Registrasi</label>
	                                <input type="text" name="tgl_reg" id="tgl_reg" class="form-control" value="<?=date('Y-m-d H:i:s')?>" readonly>
                            	</div><div class="col-sm-12 col-md-12">
	                                <label for="">Kode</label>
	                                <input type="text" name="pcerai_kode" id="pcerai_kode" class="form-control" value="Cerai/<?=date('Y/m/d')."/".newID('ap_permohonan_cerai','pcerai_id')?>" >
                            	</div>
                            	<div class="col-sm-12 col-md-12">
	                                <label for="">NIK / Nama penduduk</label>
	                                <select class="custom-select2 form-control" name="penduduk" id="penduduk" style="width: 100%;" required="required">
	                                	
	                                </select>
                            	</div>
                            	<!-- <div class="col-sm-12 col-md-12">
	                                <label for="">Tanggal Rencana Perceraian</label>
	                                <input type="date" name="tgl_cerai" id="tgl_cerai" class="form-control" >
                            	</div> -->
                            	<div class="col-sm-12 col-md-12">
	                                <label for="">Tempat Rencana Perceraian</label>
	                                <input type="text" name="pcerai_tempat" id="pcerai_tempat" class="form-control" >
                            	</div>
                            	<div class="col-sm-12 col-md-12">
	                                <label for="">Keterangan</label>
	                                <textarea class="form-control" name="pcerai_keterangan" id="pcerai_keterangan" rows="5"></textarea>
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

// $(document).ready(function() {
// $('#penduduk').select2({
// 	allowClear:true,
// 	placeholder:'Penduduk'
// })
// })
// $(function(){
// 	$('#penduduk').select2();
// })

		// $(function(){
		// 	$('#penduduk').on('keyup',function(){
		// 	var data = $('#penduduk').val();
		// 	if(data!=''){
		// 		$.ajax({
		// 			url : "penduduk.php",
		// 			method : "POST",
		// 			data : {query:data},
		// 			success:function(data)
		// 			{
  //                     $('#pendudukList').fadeIn();  
  //                     $('#pendudukList').html(data);  
		// 			}
		// 		})
		// 	}
		// 	})
		// 	 $(document).on('click', 'li', function(value){
		// 	   var nik = $(this).text().split('-',1);
		// 	   $('#penduduk').val($(this).text());
		// 	   $('#nik_pemohon').val(nik);
  //       	   $('#pendudukList').fadeOut();  
  //     });  
		// })

	 	function kosong(){
           $('#pcerai_id').val('');
           $('#modal_form')[0].reset();
           $('#edit').css('display','none');
           $('#simpan').css('display','inline-block');
           penduduk();
         }

         function penduduk(data){
              var id_penduduk = data;
              $.ajax({
                type:"GET",
                url:'penduduk.php',
                // data:'id_kurikulum='+id_kurikulum,
                success:function(isi){
                  $('#penduduk').html(isi);
                  $('#penduduk').val(id_penduduk);
                }
              })
            }


	$(function () {
           /* Isi Table */
             $('#table').DataTable({
             	   dom: "Bfrtip",
       			 buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
       					 ],
               "scrollX": false,
                "scrollCollapse": true,
				        "autoWidth": false,
				        "responsive": true,

             
               "ajax": {
                   "url": "data.php",
                   "dataSrc": ""
                 },
                 "columns": [
                  {"data":"no"},
									{"data":"kode"},
									{"data":"tanggal_reg"},
									// {"data":"tanggal_acara"},
									{"data":"nik"},
									{"data":"nama"},
									{"data":"ttl"},
									{"data":"pekerjaan"},
									{"data":"alamat"},
									{"data":"tempat"},
									{"data":"keterangan"},
									{"data":"edit"},
									{"data":"hapus"},
                 ]
             });
           /* Isi Table */
         });


         $('#tambah').on('click',function(){
         	kosong();
         	$('#pcerai_kode').attr('readonly',false)
         	        	$('#penduduk').prop('readonly',false);
         })

         $('#simpan').on('click',function(){ 	
         	$.ajax({
         		url: 'proses.php?aksi=cerai                              ',
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
         	$('#pcerai_id').val(isi);
         	$('#edit').css('display','inline-block');
         	$('#pcerai_kode').attr('readonly',true);
         	$('#penduduk').prop('readonly',true);
         	$('#simpan').css('display','none');
         			$.getJSON('data.php', {id: isi}, function(json) {
         				// console.log(json);
         				$('#tgl_reg').val(json.tgl_registrasi);
         				$('#pcerai_kode').val(json.pcerai_kode);
         				penduduk(json.nik_pemohon);
         				$('#tgl_cerai').val(json.tgl_cerai);
         				$('#pcerai_tempat').val(json.pcerai_tempat);
         				$('#pcerai_keterangan').val(json.pcerai_keterangan);
         	});
         }

         $('#edit').on('click',function(){
         	var isi = $('#modal_form').serialize();
         	$.ajax({
         		url:'proses.php?aksi=cerai',
         		type:'POST',
         		dataType:'HTML',
         		data:$('#modal_form').serialize(),
         		success:function(isi){
         			$('#modal').modal('hide');
         		console.log(isi);
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
         		url:'proses.php?aksi=del_cerai',
         		type:'POST',
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