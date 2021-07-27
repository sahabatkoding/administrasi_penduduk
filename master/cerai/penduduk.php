<?php 
require_once '../konektor.php';


if($admin==0 && $kasi_2==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}
     $sql = "SELECT * FROM ap_penduduk where penduduk_status_perkawinan = 'M' ";
     if($_GET['id_penduduk']) $sql .= " WHERE nik = '$_GET[id_penduduk]'";
     $query=$koneksi->query($sql);
     ?>
        <option  value="" >- Pilih penduduk -</option>
        <?php foreach($query as $data){ ?>
        <option  value="<?=$data['nik']?>"> <?=$data['nik']." - ".$data['penduduk_nama']?>&nbsp;</option>
        <?php } ?>