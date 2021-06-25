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


function filter($data){
  global $conn;
  return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

function query($query){
  global $conn;
  return mysqli_query($conn, $query);
}

function find($tabel, $kolom, $id){
  global $conn;
  $query = mysqli_query($conn, "SELECT * FROM ".$tabel." WHERE ".$kolom."='$id' ");
  return mysqli_fetch_array($query);
}

function findAll($tabel, $kolom, $id=null){
  global $conn;

  if ($id != null) {
    $query = mysqli_query($conn, "SELECT * FROM ".$tabel." WHERE $kolom='$id' ");
  }else{
    $query = mysqli_query($conn, "SELECT * FROM ".$tabel);
  }

  return $query;
  
}


function mask_rupiah($angka){
  
  $hasil_rupiah = number_format($angka,0,'',',');
  return $hasil_rupiah;
 
}


function tanggal_indo($date){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4);               
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
        return($result);
}

  function waktu_tanggal($date){
       $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

       $tahun = substr($date, 0, 4);               
       $bulan = substr($date, 5, 2);
       $tgl   = substr($date, 8, 2);
       $jam   = substr($date, 11, 5);
       $result = $jam." ". $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
       return($result);
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