<?php 
include '../database/config.php';
include 'assets/library/session.php';

if($_SESSION['level']!=''){
	?>
	<script>location.href="index"</script>
	<?php
}else{
	?>
	<script>location.href="../login/index.php"</script>
	<?php
}
 ?>
