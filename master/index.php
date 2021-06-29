<?php 
error_reporting(0);
require_once '../database/config.php';
require_once '../assets/library/function.php';
require_once '../assets/library/session.php';
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
