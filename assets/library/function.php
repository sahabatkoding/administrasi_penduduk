<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

function cekLogin(){
   if (!isset($_SESSION['login_admin'])) {
      echo "<script>window.location='".BASE_URL."login'</script>";
      exit;
   }
}


function alert($message, $alert){
    return '<div class="alert alert-'.$alert.' alert-dismissible fade show" role="alert">
        <strong>'.$message.'</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}


<<<<<<< Updated upstream
function anti_inject($kata){
  $filter = stripslashes(stripcslashes(strip_tags(htmlspecialchars($kata,ENT_QUOTES))));
  return $filter;
}

=======
<<<<<<< HEAD
function filter($data){
  global $koneksi;
  return mysqli_real_escape_string($koneksi, htmlspecialchars($data));
}

function query($query){
  global $koneksi;
  return mysqli_query($koneksi, $query);
}
=======
function anti_inject($kata){
  $filter = stripslashes(stripcslashes(strip_tags(htmlspecialchars($kata,ENT_QUOTES))));
  return $filter;
}
>>>>>>> Stashed changes

>>>>>>> 347ab4c14707b9de78fc515c00aed349eaa1bd6b

function find($tabel, $kolom, $id){
  global $koneksi;
  $query = mysqli_query($koneksi, "SELECT * FROM ".$tabel." WHERE ".$kolom."='$id' ");
  return mysqli_fetch_array($query);
}

function findAll($tabel, $kolom, $id=null){
  global $koneksi;

  if ($id != null) {
    $query = mysqli_query($koneksi, "SELECT * FROM ".$tabel." WHERE $kolom='$id' ");
  }else{
    $query = mysqli_query($koneksi, "SELECT * FROM ".$tabel);
  }

  return $query;
  
}


function setValidasi($pesan, $tipe){
      $_SESSION['validasi']=[
      'pesan'=>$pesan,
      'tipe' =>$tipe
     ];
}

function validasi(){
  if (isset($_SESSION['validasi'])) {
      echo '<div class="alert alert-'.$_SESSION['validasi']['tipe'] .' alert-dismissible fade show" role="alert">'.$_SESSION['validasi']['pesan'] .' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
      </button>
      </div>';
      unset($_SESSION['validasi']);
    }
}

?>