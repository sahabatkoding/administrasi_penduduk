<?php 
require_once '../konektor.php';


if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$header = "Edit Password User";

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

	if (!isset($_GET['id'])) {
		echo '<script>window.location="index.php"</script>';
	}

	$id = filter($_GET['id']);
	$result = find('ap_user', 'user_id', $id);
	?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4"><?= $header ?></h4>
					</div>

					<div class="p-4">
						<form id="simpan" method="post">
						
						<input type="hidden" name="user_edi" value="<?= $result['user_id'] ?>">
						<div class="form-group row col-md-8">
							<label>Username</label>
							<input type="text" s value="<?= $result['username'] ?>" disabled="disabled" class="form-control" name="username">
						</div>
						<div class="form-group row col-md-8">
							<label>Password Lama</label>
							<input type="text"  required="" class="form-control" name="lama">
						</div>
						<div class="form-group row col-md-8">
							<label>Password Baru</label>
							<input type="text"  required="" name="baru" class="form-control">
						</div>
						
						<div class="col-md-12">
							<div class="row">
								<button type="submit" class="btn btn-primary ml-auto">Edit</button>
							</div>
						</div>
					</form>	
					</div>
				</div>
			</div>
			<?php require_once $LAYOUT.'footer.php'; ?>
		</div>
	</div>
	<!-- js -->
	

	<script type="text/javascript">
		 

		 $('#simpan').submit(function(e){
		    e.preventDefault();

		    let formdata = new FormData(this);
		    $.ajax({
		        url : 'proses-psw.php?action=edit',
		        data : formdata,
		        type : 'POST',
		        dataType : 'JSON',
		        processData: false,
		        contentType: false,
		        beforeSend: function() {
		          $('#button').attr('disable', 'disabled');
		          $('#button').html('<i class="fa fa-spinner fa-spin"></i>')
		        },
		        complete: function(response) {
		          $('#button').removeAttr('disabled');
		          $('#button').html('Edit');
		        },
		        success: function(response) {

		        	if (response.gagal) {
		        		$('#alert').html(response.gagal);
		        	}else{
		        		$('#alert').html(response.success);
		        		window.location.href="<?= $MASTER ?>master/akun/index.php"
		        	}
		            	
		        },
		        error: function(xhr, ajaxOptions, thrownError) {
		          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
		        }
		    });
		  });
	</script>
	<?php require_once $LAYOUT.'js.php'; ?>
</body>
</html>