<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?= $ROOT ?>">
				<img src="<?= $ROOT ?>assets/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="<?= $ROOT ?>assets/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
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
							<li><a href="<?= $ROOT ?>penduduk/index.php">Penduduk</a></li>
							<li><a href="<?= $ROOT ?>kelahiran/index.php">Kelahiran</a></li>
							<li><a href="<?= $ROOT ?>kematian/index.php">Kematian</a></li>
							<li><a href="<?= $ROOT ?>pindah_datang/index.php">Pindah Datang</a></li>
							<li><a href="<?= $ROOT ?>pindah_keluar/index.php">Pindah Keluar</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Permintaan</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= $ROOT ?>nikah/index.php">Pernikahan</a></li>
							<li><a href="<?= $ROOT ?>cerai/index.php">Cerai</a></li>
							<li><a href="<?= $ROOT ?>kia/index.php">Kartu Identitas Anak</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Pengajuan</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= $ROOT ?>proposal/index.php">Proposal</a></li>
							<li><a href="<?= $ROOT ?>UMKM/index.php">UMKM</a></li>
							<li><a href="<?= $ROOT ?>IMB/index.php">Ijin Mendirikan Bangunan</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-settings2"></span><span class="mtext">Manajemen</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= $ROOT ?>instansi/index.php">Instansi</a></li>
							<li><a href="<?= $ROOT ?>akun/index.php">Akun</a></li>
							<li><a href="<?= $ROOT ?>kota/index.php">Kota</a></li>
							<li><a href="<?= $ROOT ?>pendidikan/index.php">Pendidikan</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>