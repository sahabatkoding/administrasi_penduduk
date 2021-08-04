<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

$header = "Data Akun";

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
									<th>Nama User</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Edit Password</th>
									<th>Edit Data</th>
									<th>Hapus</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
				<!-- Simple Datatable End -->
				<!-- modal -->

                      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo $header ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="modal_form">
                              <input type="hidden" name="user_id" id="user_id">
                              
                              <div class="modal-body">  
                              <div class="row">  
                                <div class="col-md-6">
                                 <label for="">Nama User</label>
                                <input type="text" name="nama_user" id="nama_user" class="form-control" required="">
                                </div>
                                <div class="col-md-6">
                                  <label for="">Username</label>
                                  <input type="text" name="username" id="username" class="form-control" required="">
                                </div>
                                <div class="col-md-6" id="pss">
                                  <label for="">Password</label>
                                  <input type="text" name="password" id="password" class="form-control" required="">
                                </div>
                                <div class="col-md-6">
                                <label for="">Level</label>
                                  <select class="form-control" name="level" id="level" >
                                    <option id="il">- Silahkan Pilih -</option>
                                     
                                    <option>admin</option>
                                    <option>kasi_1</option>
                                    <option>kasi_2</option>
                                    <option>kasi_3</option>
                                    
                                  </select>
                                </div>
                                </div>
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
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
           $('#user_id').val('');
           $('#modal_form')[0].reset();
           $('#edit').css('display','none');
           $('#simpan').css('display','inline-block');
           $('#pss').css('display','inline-block');
           $('#il').html('- Silahkan Pilih -');
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
                   "url": "data.php",
                   "dataSrc": ""
                 },
                 "columns": [
                   {"data": "no"},
                   {"data": "nama_user"},
                   {"data": "username"},
                   {"data": "level"},
                   {"data": "ep"},
                   {"data": "edit"},
                   {"data": "hapus"},
                 ]
             });
           /* Isi Table */
         });


         $('#tambah').on('click',function(){
         	kosong();
         });

         $('#modal_form').submit(function(e){
          e.preventDefault();
          $.ajax({
            url: 'proses.php',
            type: 'POST',
            dataType: 'HTML',
            data: $(this).serialize(),
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
         	$('#user_id').val(isi);
         	$('#edit').css('display','inline-block');
         	$('#simpan').css('display','none');
          $('#pss').css('display','none');
          $('#pss').attr('disabled','true');
         	$.getJSON('data.php', {id: isi}, function(json) {
         			$('#nama_user').val(json.nama_user);
              $('#username').val(json.username);
              $('#il').html(json.level);
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