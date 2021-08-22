<?php  
require_once '../konektor.php';


if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


if ($_GET['action'] == 'simpan' ) {
  $tgl_registrasi =  filter($_POST['tgl_registrasi']);
  $tgl_kematian =  filter($_POST['tgl_kematian']);
  $nik_penduduk = filter($_POST['nik_penduduk']);
  $nik_pemohon = filter($_POST['nik_pemohon']);
  $id_user =  $_SESSION['user_id'];

  if ($tgl_registrasi == '' || $tgl_kematian == '' || $nik_pemohon == '' || $nik_penduduk == '' || $nik_pemohon == '' ) {
    $msg = [
              alert('Harus Diisi','danger'),
            ];
  }else{
    $tabel = 'ap_kematian';
    $data = [
      'tgl_registrasi' => $tgl_registrasi,
      'tgl_kematian' => $tgl_kematian,
      'nik_penduduk' => $nik_penduduk,
      'nik_pemohon' => $nik_pemohon,
      'id_user' => $id_user,
    ];

    $sql = insert($tabel,$data);
    
    $query = query($sql);

    if ($query) {
      $msg = [
      'success' => alert('Berhasil Disimpan','success'),
      ];  
    }else{
      $msg = [
      'gagal' => alert('Simpan Gagal','danger'),
      ];  
    }

  }


  echo json_encode($msg);

}


if ($_GET['action'] == 'edit' ) {
  $id = filter($_POST['id']);
  $tgl_registrasi =  filter($_POST['tgl_registrasi']);
  $tgl_kematian =  filter($_POST['tgl_kematian']);
  $nik_penduduk = filter($_POST['nik_penduduk']);
  $nik_pemohon = filter($_POST['nik_pemohon']);
  $id_user =  $_SESSION['user_id'];

  if ($tgl_registrasi == '' || $tgl_kematian == '' || $nik_pemohon == '' || $nik_penduduk == '' || $nik_pemohon == '') {
    $msg = [
              alert('Harus Diisi','danger'),
            ];
  }else{
    $tabel = 'ap_kematian';
    $data = [
      'tgl_registrasi' => $tgl_registrasi,
      'tgl_kematian' => $tgl_kematian,
      'nik_penduduk' => $nik_penduduk,
      'nik_pemohon' => $nik_pemohon,
      'id_user' => $id_user,
    ];

    $sql = update($tabel,$data, 'kematian_id='.$id);
    
    $query = query($sql);

    if ($query) {
      $msg = [
      'success' => alert('Berhasil Dihapus','success'),
      ];  
    }else{
      $msg = [
      'gagal' => alert('Simpan Gagal','danger'),
      ];  
    }

  }

  echo json_encode($msg);

}

if ($_GET['action'] == 'hapus') {
  $tabel  = "ap_kematian";
  $id     = "kematian_id='".filter($_GET['id'])."'";
  $sql    = delete($tabel,$id);
  $query = query($sql);

  if ($query) {
      $msg = [
      'alert' => alert('Berhasil Dihapus','warning'),
      ];  
    }else{
      $msg = [
      'alert' => alert('Hapus Gagal','danger'),
      ];  
    }

    echo json_encode($msg);
}