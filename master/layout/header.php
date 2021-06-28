<div class="header">
		<div class="header-left">
			<div id="alert" style="margin-bottom: -15px ;"></div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle mt-2 mr-3" href="#" role="button" data-toggle="dropdown">
						<!-- <span class="user-icon">
							<img src="<?= $ROOT ?>assets/vendors/images/photo1.jpg" alt="">
						</span> -->
						<span class="user-name"><?= $dataAdm['nama_user'] ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<!-- <a href="<?= $ROOT ?>profil/index.php"><button  class="dropdown-item"><i class="dw dw-user"></i> Profil</button></a> -->
						<a href="<?= $MASTER ?>login/logout.php"><button onclick="return confirm('Keluar Dari Sistem')" class="dropdown-item"><i class="dw dw-logout"></i> Log Out</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>