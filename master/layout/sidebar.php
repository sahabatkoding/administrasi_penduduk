<!-- sidebar untuk admin -->
<?php if($_SESSION['level']=='admin'): ?>
<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?= $ROOT ?>">
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
							<!-- <li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Laporan</a>
								<ul class="dropdown">
									<li><a href="">Intine Laporan</a></li>
									<li><a href="">Cetak KK</a></li>
								</ul>
							</li> -->

							
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Permintaan</span>
						</a>
						<ul class="submenu">
							<!-- <li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Data</a>
								<ul class="submenu">
									<li><a href="<?= $ROOT ?>penduduk/view.php">Penduduk</a></li>
								</ul>
							</li> -->
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Proses</a>
								<ul class="submenu">
									<li><a href="<?= $ROOT ?>nikah/index.php">Pernikahan</a></li>
									<li><a href="<?= $ROOT ?>cerai/index.php">Cerai</a></li>
									<li><a href="<?= $ROOT ?>kia/index.php">Kartu Identitas Anak</a></li>
								</ul>
							</li>
							<!-- <li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Laporan</a>
								<ul class="submenu">
									<li><a href="">Laporan ,,,,,</a></li>
								</ul>
							</li> -->
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Pengajuan</span>
						</a>
						<ul class="submenu">
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Data</a>
								<ul class="submenu">
									<li><a href="<?= $ROOT ?>pemohon-pui/index.php">Data Pemohon</a></li>
									
								</ul>
							</li>
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Proses</a>
								<ul class="submenu">
									
									<li><a href="<?= $ROOT ?>proposal/index.php">Proposal</a></li>
									<li><a href="<?= $ROOT ?>UMKM/index.php">UMKM</a></li>
									<li><a href="<?= $ROOT ?>IMB/index.php">Ijin Mendirikan Bangunan</a></li>
								</ul>
							</li>
							<!-- <li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle">Laporan</a>
								<ul class="submenu">
									<li><a href="">Laporan Proposal</a></li>
									<li><a href="">Laporan UMKM</a></li>
									<li><a href="">Laporan Ijin Mendirikan Bangunan</a></li>
								</ul>
							</li> -->
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-settings2"></span><span class="mtext">Manajemen</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= $ROOT ?>instansi/index.php">Instansi</a></li>
							<li><a href="<?= $ROOT ?>akun/index.php">Akun</a></li>
							<li><a href="<?= $ROOT ?>kota/provinsi.php">Kota</a></li>
							<li><a href="<?= $ROOT ?>pendidikan/index.php">Pendidikan</a></li>
							<li><a href="<?= $ROOT ?>agama/index.php">Agama</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
<?php endif; ?>
	<!-- sidebar untuk kasi_1 -->
<?php if($_SESSION['level']=='kasi_1'): ?>
<div class="left-side-bar bg-info">
		<div class="brand-logo">
			<a href="<?= $ROOT ?>">
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
					<li>
						<a href="<?= $ROOT ?>penduduk/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-table"></span><span class="mtext">Data Penduduk</span>
						</a>
					</li>
					<li>
						<a href="<?= $ROOT ?>kelahiran/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-table"></span><span class="mtext">Data Kelahiran</span>
						</a>
					</li>
					<li>
						<a href="<?= $ROOT ?>kematian/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-table"></span><span class="mtext">Data Kematian</span>
						</a>
					</li>
					<li>
						<a href="<?= $ROOT ?>pindah_datang/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-hourglass"></span><span class="mtext">Proses Pindah Datang</span>
						</a>
					</li>
					<li>
						<a href="<?= $ROOT ?>pindah_keluar/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-hourglass"></span><span class="mtext">Proses Pindah Keluar</span>
						</a>
					</li>
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-newspaper"></span><span class="mtext">Laporan</span>
						</a>
						<ul class="submenu">
								<a href="javascript:;" class="dropdown-toggle no-arrow">Laporan</a>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if($_SESSION['level']=='kasi_2'): ?>
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?= $ROOT ?>">
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
					<li>
						<a href="<?= $ROOT ?>penduduk/view.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-table"></span><span class="mtext">Data Penduduk</span>
						</a>
					</li>
					<li>
						<a href="<?= $ROOT ?>nikah/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-hourglass"></span><span class="mtext">Pendaftaran Nikah</span>
						</a>
					</li>
					<li>
						<a href="<?= $ROOT ?>cerai/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-hourglass"></span><span class="mtext">Pendaftaran Cerai</span>
						</a>
					</li>
					<li>
						<a href="<?= $ROOT ?>kia/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-hourglass"></span><span class="mtext">Pendaftaran KIA</span>
						</a>
					</li>
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-newspaper"></span><span class="mtext">Laporan</span>
						</a>
						<ul class="submenu">
								<a href="javascript:;" class="dropdown-toggle no-arrow">Laporan</a>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if($_SESSION['level']=='kasi_3'): ?>
<div class="left-side-bar bg-primary">
		<div class="brand-logo">
			<a href="<?= $ROOT ?>">
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
					<li>
						<a href="<?= $ROOT ?>pemohon-pui/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-table"></span><span class="mtext">Data Pemohon</span>
						</a>
					</li>
					<li>
						<a href="<?= $ROOT ?>proposal/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-hourglass"></span><span class="mtext">Pengajuan Proposal</span>
						</a>
					</li>
					<li>
						<a href="<?= $ROOT ?>UMKM/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-hourglass"></span><span class="mtext">Pengajuan UMKM</span>
						</a>
					</li>
					<li>
						<a href="<?= $ROOT ?>IMB/index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-hourglass"></span><span class="mtext">Pengajuan IMB</span>
						</a>
					</li>
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-newspaper"></span><span class="mtext">Laporan</span>
						</a>
						<ul class="submenu">
								<a href="javascript:;" class="dropdown-toggle no-arrow">Laporan</a>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>
	</div>
<?php endif; ?>