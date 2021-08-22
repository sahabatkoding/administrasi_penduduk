<div class="header">
		<div class="header-left">
			<div id="alert" class="ml-5" style="margin-bottom: -15px ;"></div>
			<div class="menu-icon dw dw-menu"></div>
		<!-- 	<div>Selamat Datang <?=$dataAdm['nama_user']?></div> -->
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle mt-2 mr-3" href="#" role="button" data-toggle="dropdown">
						<span class="user-name">Setting</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<!-- <a href="<?= $ROOT ?>profil/view.php">
							<button class="dropdown-item"><i class="dw dw-user"></i>Profil</button>
						</a> -->
						<a href="<?= $MASTER ?>login/logout.php">
							<button onclick="return confirm('Keluar Dari Sistem')" class="dropdown-item"><i class="dw dw-logout"></i> Log Out</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>