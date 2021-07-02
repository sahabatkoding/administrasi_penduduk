<?php 
require_once '../konektor.php';


if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}

  // $hasil = array();
  if(isset($_POST["query"])){
    $output = '';
    $key = "%".strtoupper($_POST["query"])."%";
    $sql = "SELECT * FROM ap_penduduk WHERE upper(penduduk_nama) LIKE '$key' LIMIT 10";
    $query = $koneksi->query($sql);
    // var_dump($query->fetch_array());
    // die();
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($query) > 0){
      while ($row = $query->fetch_assoc()) {
        $output .= '<li>'.$row["nik"]."-".$row["penduduk_nama"].'</li>';  
      }
    } else {
      $output .= '<li>Tidak ada yang cocok.</li>';  
    }  
    $output .= '</ul>';
    echo $output;
    // array_push($hasil, $output);
    // echo json_encode($hasil);

  }
?>