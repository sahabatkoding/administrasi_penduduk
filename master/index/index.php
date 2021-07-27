<?php 
require_once '../konektor.php';

if($_SESSION['level']==''){
	?>
	<script>location.href="<?=$MASTER?>login/logout.php"</script>
	<?php
}

// SQL COUNT DATA
$sql = " SELECT count(nik) as jumlah FROM ap_penduduk ";
$query =  query($sql);
$penduduk = $query->fetch_array();
// var_dump($penduduk);

$sql = " SELECT count(pd_id) as jumlah FROM ap_pindah_datang ";
$query =  query($sql);
$datang = $query->fetch_array();
// var_dump($penduduk);

$sql = " SELECT count(pk_id) as jumlah FROM ap_pindah_keluar ";
$query =  query($sql);
$keluar = $query->fetch_array();
// var_dump($penduduk);

$sql = " SELECT count(pnikah_id) as jumlah FROM ap_permohonan_nikah ";
$query =  query($sql);
$nikah = $query->fetch_array();
// var_dump($penduduk);

$sql = " SELECT count(pcerai_id) as jumlah FROM ap_permohonan_cerai ";
$query =  query($sql);
$cerai = $query->fetch_array();

$sql = " SELECT count(proposal_id) as jumlah FROM ap_proposal ";
$query =  query($sql);
$proposal = $query->fetch_array();

$sql = " SELECT count(umkm_id) as jumlah FROM ap_umkm ";
$query =  query($sql);
$umkm = $query->fetch_array();

$sql = " SELECT count(imb_id) as jumlah FROM ap_imb ";
$query =  query($sql);
$imb = $query->fetch_array();
// var_dump($penduduk);


 ?>

<!DOCTYPE html>
<html>
<head>
<?php require_once $LAYOUT.'head.php'; ?>
</head>
<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="<?= $ROOT ?>assets/vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

	<?php require_once $LAYOUT.'header.php'; ?>
	<?php require_once $LAYOUT.'sidebar.php'; ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<!-- <div class="col-md-4">
						<img src="<?= $ROOT ?>assets/vendors/images/banner-img.png" alt="">
					</div> -->
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue"><?= $dataAdm['nama_user']; ?></div>
						</h4>
						<p class="font-18 max-width-600"></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?=$penduduk['jumlah']?></div>
								<div class="weight-600 font-14">Penduduk</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?=$datang['jumlah']?></div>
								<div class="weight-600 font-14">Pindah Datang</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?=$keluar['jumlah']?></div>
								<div class="weight-600 font-14">Pindah Keluar</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">$6060</div>
								<div class="weight-600 font-14">Worth</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php require_once $LAYOUT.'footer.php'; ?>
		</div>
	</div>
	<!-- js -->
	<?php require_once $LAYOUT.'js.php'; ?>
</body>
</html>