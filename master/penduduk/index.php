<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Data Pendidikan";

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
							<a href="<?= $MASTER ?>master/penduduk/tambah.php" class="btn btn-primary" name="tambah">Tambah</a>
						</span>
						</h4>
					</div>

					<div class="pb-20">
						<!-- <table class="table striped hover nowrap" id="table" width="100%"> -->
							<table class="table hover stripe nowrap table-bordered" id="table" width="100%">
							<thead>
								<tr>
									<th>NIK</th>
									<th>NO KK</th>
									<th>NO AKTA</th>
									<th>NAMA LENGKAP</th>
									<th>TEMPAT, TANGGAL LAHIR</th>
									<th>JENIS KELAMIN</th>
									<th>GOL.DARAH</th>
									<th>ALAMAT</th>
									<th>RT/RW</th>
									<th>KELURAHAN</th>
									<th>KECAMATAN</th>
									<th>KABUPATEN</th>
									<th>PROVINSI</th>
									<th>AGAMA</th>
									<th>STATUS PERKAWINAN</th>
									<th>PENDIDIKAN</th>
									<th>PEKERJAAN</th>
									<th>KEWARGANEGARAAN</th>
									<th>NO PASSPORT</th>
									<th>NO KITAS</th>
									<th>NAMA AYAH</th>
									<th>NAMA IBU</th>
									<th>STATUS KELUARGA</th>
									<th>STATUS</th>
									<th>TELEPHONE</th>
									<th>PHOTO</th>
									<th>USER INPUT</th>
									<th>EDIT</th>
									<th>HAPUS</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<?php require_once $LAYOUT.'footer.php'; ?>
		</div>
	</div>
	<!-- js -->
	<script>
	 	function kosong(){
           $('#pendidikan_id').val('');
           $('#modal_form')[0].reset();
           $('#edit').css('display','none');
           $('#simpan').css('display','inline-block');
         }


	// $(function () {
 //           /* Isi Table */
 //             $('#table').DataTable({
 //             	   order : false,
 //               "scrollX": true,
 //               "ajax": {
 //                   "url": "data.php",
 //                   "dataSrc": ""
 //                 },
 //             });
 //           /* Isi Table */
 //         });

	//		  {
   //            "className":'details-control',
   //            "orderable":false,
   //            "data":"kode_barang",
   //            "defaultContent":''
   //         },

   $(function () {
     /* Isi Table */
       $('#table').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        ordering:false,
        responsive: true,
        columnDefs: [{
          targets: "datatable-nosort",
          orderable: false,
        }],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
          "info": "_START_-_END_ of _TOTAL_ entries",
          searchPlaceholder: "Search",
          paginate: {
            next: '<i class="ion-chevron-right"></i>',
            previous: '<i class="ion-chevron-left"></i>'  
          }
        },
      //       dom: "Bfrtip",
      //   buttons: [
      // 'copy', 'csv', 'excel', 'pdf', 'print'
      //      ],
        "scrollX": false,
         "ajax": {
             "url": "data.php",
             "dataSrc": ""
           },
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