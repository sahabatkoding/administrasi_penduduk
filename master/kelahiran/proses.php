<?php  
require_once '../konektor.php';

if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


if ($_GET['action'] == 'simpan' ) {
  $tgl_registrasi =  filter($_POST['tgl_registrasi']);
  $nik_pemohon = filter($_POST['nik_pemohon']);
  $kelahiran_nama = filter($_POST['nama']);
  $kelahiran_jk = filter($_POST['jenis_kelamin']);
  $kelahiran_alamat = filter($_POST['alamat']);
  $kelahiran_agama = filter($_POST['agama']);
  $kelahiran_tempat_lahir = filter($_POST['tempat_lahir']);
  $kelahiran_tanggal_lahir = filter($_POST['tanggal_lahir']);
  $id_user =  $_SESSION['user_id'];

  if ($tgl_registrasi == '' || $nik_pemohon == '' || $kelahiran_nama == '' || $kelahiran_jk == '' || $kelahiran_agama == '' || $kelahiran_tempat_lahir == '' || $kelahiran_tanggal_lahir == '') {
    $msg = [
              alert('Harus Diisi','danger'),
            ];
  }else{
    $tabel = 'ap_kelahiran';
    $data = [
      'tgl_registrasi' => $tgl_registrasi,
      'nik_pemohon' => $nik_pemohon,
      'kelahiran_nama' => $kelahiran_nama,
      'kelahiran_jk' => $kelahiran_jk,
      'kelahiran_alamat' => $kelahiran_alamat,
      'kelahiran_agama' => $kelahiran_agama,
      'kelahiran_tempat_lahir' => $kelahiran_tempat_lahir,
      'kelahiran_tanggal_lahir' => $kelahiran_tanggal_lahir,
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
  $tgl_registrasi = filter($_POST['tgl_registrasi']);
  $nik_pemohon = filter($_POST['nik_pemohon']);
  $kelahiran_nama = filter($_POST['nama']);
  $kelahiran_jk = filter($_POST['jenis_kelamin']);
  $kelahiran_alamat = filter($_POST['alamat']);
  $kelahiran_agama = filter($_POST['agama']);
  $kelahiran_tempat_lahir = filter($_POST['tempat_lahir']);
  $kelahiran_tanggal_lahir = filter($_POST['tanggal_lahir']);
  $id_user =  $_SESSION['user_id'];

  if ($tgl_registrasi == '' || $nik_pemohon == '' || $kelahiran_nama == '' || $kelahiran_jk == '' || $kelahiran_agama == '' || $kelahiran_tempat_lahir == '' || $kelahiran_tanggal_lahir == '') {
    $msg = [
              alert('Harus Diisi','danger'),
            ];
  }else{
    $tabel = 'ap_kelahiran';
    $data = [
      'tgl_update' => date('Y-m-d'),
      'nik_pemohon' => $nik_pemohon,
      'kelahiran_nama' => $kelahiran_nama,
      'kelahiran_jk' => $kelahiran_jk,
      'kelahiran_alamat' => $kelahiran_alamat,
      'kelahiran_agama' => $kelahiran_agama,
      'kelahiran_tempat_lahir' => $kelahiran_tempat_lahir,
      'kelahiran_tanggal_lahir' => $kelahiran_tanggal_lahir,
    ];

    $sql = update($tabel,$data, 'kelahiran_id='.$id);
    
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
  $tabel  = "ap_kelahiran";
  $id     = "kelahiran_id='".filter($_GET['id'])."'";
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