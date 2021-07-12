<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?= $ROOT ?>">
				<!-- <img src="<?= $ROOT ?>assets/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="<?= $ROOT ?>assets/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo"> -->
				SI Administrasi
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="<?= $ROOT ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Beranda</span>
						</a>
					</li>
					<?php if($admin==1||$kasi_1==1): ?>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Master</span>
						</a>
						<ul class="submenu">
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Data</a>
								<ul class="submenu">
									<li><a href="<?php echo $ROOT ?>penduduk/index.php">Penduduk</a></li>
									<li><a href="<?= $ROOT ?>kelahiran/index.php">Kelahiran</a></li>
									<li><a href="<?= $ROOT ?>kematian/index.php">Kematian</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="javascript:;"  class="dropdown-toggle">Proses</a>
								<ul class="submenu">
									<li><a href="<?= $ROOT ?>pindah_datang/index.php">Pindah Datang</a></li>
									<li><a href="<?= $ROOT ?>pindah_keluar/index.php">Pindah Keluar</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Laporan</a>
								<ul class="dropdown">
									<li><a href="">Intine Laporan</a></li>
									<li><a href="">Cetak KK</a></li>
								</ul>
							</li>

							
						</ul>
					</li>
					<?php endif;  ?>
					<?php if($admin==1||$kasi_2==1): ?>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Permintaan</span>
						</a>
						<ul class="submenu">
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Proses</a>
								<ul class="submenu">
									<li><a href="<?= $ROOT ?>nikah/index.php">Pernikahan</a></li>
									<li><a href="<?= $ROOT ?>cerai/index.php">Cerai</a></li>
									<li><a href="<?= $ROOT ?>kia/index.php">Kartu Identitas Anak</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Laporan</a>
								<ul class="submenu">
									<li><a href="">Laporan ,,,,,</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<?php endif; ?>
					<?php if($admin==1||$kasi_3==1): ?>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Pengajuan</span>
						</a>
						<ul class="submenu">
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Proses</a>
								<ul class="submenu">
									<li><a href="<?= $ROOT ?>pemohon-pui/index.php">Data Pemohon</a></li>
									<li><a href="<?= $ROOT ?>proposal/index.php">Proposal</a></li>
									<li><a href="<?= $ROOT ?>UMKM/index.php">UMKM</a></li>
									<li><a href="<?= $ROOT ?>IMB/index.php">Ijin Mendirikan Bangunan</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Lapoaran</a>
								<ul class="submenu">
									<li><a href="">Laporan mu......</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<?php endif; ?>
					<?php if($admin==1){ ?>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-settings2"></span><span class="mtext">Manajemen</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= $ROOT ?>instansi/index.php">Instansi</a></li>
							<li><a href="<?= $ROOT ?>akun/index.php">Akun</a></li>
							<li><a href="<?= $ROOT ?>kota/provinsi.php">Kota</a></li>
							<li><a href="<?= $ROOT ?>pendidikan/index.php">Pendidikan</a></li>
						</ul>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
	</div>