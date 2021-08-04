<?php 
require_once '../konektor.php';

if($admin==0 && $kasi_1==0 && $kasi_2==0 && $kasi_3==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Data Penduduk";

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
        "scrollX": false,
         "ajax": {
             "url": "data.php",
             "dataSrc": ""
           },
       });
     /* Isi Table */
   });


         function hapus(isi){
         	var n = confirm('Yakin Hapus?');
         	if(n){
         	$.ajax({
         		url:'proses.php?action=hapus',
         		type:'GET',
         		dataType:'JSON',
         		data: {id:isi},
         		success:function(response){
         			$('#alert').html(response.alert);
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