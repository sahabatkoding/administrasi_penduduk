<?php  
require_once '../konektor.php';

if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


if ($_GET['action'] == 'simpan' ) {
  $tgl_registrasi =  filter($_POST['tgl_registrasi']);
  $tgl_pindah = filter($_POST['tgl_pindah']);
  $nik = filter($_POST['nik']);
  $alamat_pindah = filter($_POST['alamat_pindah']);
  $alasan_pindah = filter($_POST['alasan_pindah']);
  $keterangan = filter($_POST['keterangan']);
  $id_user =  $_SESSION['user_id'];

  if ($tgl_registrasi == '' || $tgl_pindah == '' || $nik == '' || $alasan_pindah == '' || $alamat_pindah == '') {
    $msg = [
              alert('Harus Diisi','danger'),
            ];
  }else{
    $tabel = 'ap_pindah_keluar';
    $data = [
      'tgl_registrasi' => $tgl_registrasi,
      'tgl_pindah' => $tgl_pindah,
      'nik_penduduk' => $nik,
      'pk_alamat_tujuan' => $alamat_pindah,
      'pk_alasan_pindah' => $alasan_pindah,
      'pk_keterangan' => $keterangan,
      'id_user' => $id_user
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
  $tgl_pindah = filter($_POST['tgl_pindah']);
  $nik = filter($_POST['nik']);
  $alamat_pindah = filter($_POST['alamat_pindah']);
  $alasan_pindah = filter($_POST['alasan_pindah']);
  $keterangan = filter($_POST['keterangan']);
  $id_user =  $_SESSION['user_id'];

  if ($tgl_registrasi == '' || $tgl_pindah == '' || $nik == '' || $alasan_pindah == '' || $alamat_pindah == '') {
    $msg = [
              alert('Harus Diisi','danger'),
            ];
  }else{
    $tabel = 'ap_pindah_keluar';
    $data = [
      'tgl_registrasi' => $tgl_registrasi,
      'tgl_pindah' => $tgl_pindah,
      'nik_penduduk' => $nik,
      'pk_alamat_tujuan' => $alamat_pindah,
      'pk_alasan_pindah' => $alasan_pindah,
      'pk_keterangan' => $keterangan,
      'id_user' => $id_user
    ];

    $sql = update($tabel,$data, 'pk_id='.$id);
    
    $query = query($sql);

    if ($query) {
      $msg = [
      'success' => alert('Berhasil Diedit','success'),
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
  $tabel  = "ap_pindah_keluar";
  $id     = "pk_id='".filter($_GET['id'])."'";
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