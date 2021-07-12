<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Data kecamatan ";

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
									<th>Kecamatan</th>
									<th>Detail</th>
									<th>Edit</th>
									<th>Hapus</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
				<!-- modal -->

                      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo $Header ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="modal_form">
                            	<input type="hidden" name="id_kabupaten" id="id_kabupaten" value="<?= $_GET['id_kabupaten'] ?>">
                              <input type="hidden" name="kecamatan_id" id="kecamatan_id">
                              <div class="modal-body">
                                <label for="">kecamatan</label>
                                <input type="text" name="kecamatan_nama" id="kecamatan_nama" class="form-control">
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
           $('#kecamatan_id').val('');
           $('#modal_form')[0].reset();
           $('#edit').css('display','none');
           $('#simpan').css('display','inline-block');
         }


	$(function () {
           /* Isi Table */
             $('#table').DataTable({
           //   	   dom: "Bfrtip",
       			 // buttons: [
           //  'copy', 'csv', 'excel', 'pdf', 'print'
       				// 	 ],
               "scrollX": true,
             
               "ajax": {
                   "url": "data.php?data=kecamatan&id_kabupaten="+$('#id_kabupaten').val(),
                   "dataSrc": ""
                 },
                 "columns": [
                   {"data": "no"},
                   {"data": "kecamatan"},
                   {"data": "detail"},
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
         		url: 'proses.php?aksi=kecamatan',
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
         	$('#kecamatan_id').val(isi);
         	$('#edit').css('display','inline-block');
         	$('#simpan').css('display','none');
         	$.getJSON('data.php?data=kecamatan&id_kabupaten='+$('#id_kabupaten').val(), {id: isi}, function(json) {
         			$('#kecamatan_nama').val(json.kecamatan_nama);
         	});
         }

         $('#edit').on('click',function(){
         	$.ajax({
         		url:'proses.php?aksi=kecamatan',
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
         		url:'proses.php?aksi=del_kecamatan',
         		type:'POST',
         		dataType:'HTML',
         		data: {kecamatan_id:isi},
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