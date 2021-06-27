<?php 
require_once '../konektor.php';


if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Edit Data Pemohon Proposal/UMKM/IMB";

 ?>

<!DOCTYPE html>
<html>
<head>
<?php require_once $LAYOUT.'head.php'; ?>
</head>
<body>
	<?php require_once $LAYOUT.'header.php'; ?>
	<?php require_once $LAYOUT.'sidebar.php'; ?>

<?php 
$edi=$_GET['id'];
$sql= "SELECT * FROM ap_pemohon WHERE pemohon_id = '$edi'";
$data = $koneksi->query($sql);
$hasil = $data->fetch_array();
?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4"><?= $header ?>

						<span class="pull-right">
							
						</span>
						</h4>
					</div>
					<div class="pb-20">
						<!-- <table class="table striped hover nowrap" id="table" width="100%"> -->
					<form id="form">
            <div class="col-md-12">
              <div class="row">             
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label >Pemohon</label>
                      <input type="text" name="p_nama" id="p_nama" class="form-control" value="<?=$hasil['pemohon_nama']?>" required>
                      <input type="hidden" name="pemohon_id" id="pemohon_id" class="form-control" value="<?=$hasil['pemohon_id']?>" >
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label >Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"  value="<?=$hasil['pemohon_tempat_lahir']?> "required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label >Tanggal Lahir</label>
                      <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?=$hasil['pemohon_tanggal_lahir']?>" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label >Alamat</label>
                      <input type="text" name="alamat" id="alamat" class="form-control" value="<?=$hasil['pemohon_alamat']?>" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                     <label >No Identitas 1 (KTP)</label>
                     <input type="text" name="ni1" id="ni1" class="form-control"  onkeydown="return hanyaAngka(event)" required value="<?=$hasil['pemohon_no_identitas_1']?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label >No Identitas 2 (SIM)</label>
                      <input type="text" name="ni2" id="ni2" class="form-control"  onkeydown="return hanyaAngka(event)" required value="<?=$hasil['pemohon_no_identitas_2']?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label >NPWP</label>
                      <input type="text" name="npwp" id="npwp" class="form-control" required value="<?=$hasil['pemohon_npwp']?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label >Penghasilan</label>
                      <input type="text" name="penghasilan" id="penghasilan" class="form-control" required onkeydown="return hanyaAngka(event)" value="<?=$hasil['pemohon_penghasilan']?>">
                    </div>
                </div>
                 <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label>No Telepon</label>
                      <input type="text" name="telepon_1" id="telepon_1" class="form-control" required onkeydown="return hanyaAngka(event)" value="<?=$hasil['pemohon_telepon_1']?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label >No Telepon Alternatif</label>
                      <input type="text" name="telepon_2" id="telepon_2" class="form-control" required onkeydown="return hanyaAngka(event)" value="<?=$hasil['pemohon_telepon_2']?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label >Email</label>
                      <input type="email" name="email" id="email" class="form-control" required value="<?=$hasil['pemohon_email']?>">
                    </div>
                </div>
              </div>
            </div>
                    
                              

                              <div class="col-sm-12" align="center">
                                <button type="button" class="btn btn-secondary" onclick="balik_kanan_wae()" >Batal</button>
                                <button type="button" class="btn btn-primary" id="edit">Edit Data</button>
                                
                              </div>
                            </form>

					</div>
				</div>
				<!-- Simple Datatable End -->
				<!-- modal -->

                      
                      <!-- modal -->
			</div>
			<?php require_once $LAYOUT.'footer.php'; ?>
		</div>
	</div>
	<!-- js -->
	<script>
        function balik_kanan_wae() {
            window.history.back();
          }

         $('#edit').on('click',function(){
         	$.ajax({
         		url:'proses.php',
         		type:'POST',
         		dataType:'HTML',
         		data:$('#form').serialize(),
         		success:function(isi){
         			window.history.back();
         		}
         	})
         	.fail(function(){
         		console.log("error");
         	})
         })

       
         
	</script>
	<?php require_once $LAYOUT.'js.php'; ?>
</body>
</html>