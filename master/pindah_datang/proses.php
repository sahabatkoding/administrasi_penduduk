<?php  
require_once '../konektor.php';

if(@$admin==0 && @$kasi_1 == 0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


if ($_GET['action'] == 'simpan' ) {
  $tgl_registrasi =  filter($_POST['tgl_registrasi']);
  $tgl_datang = filter($_POST['tgl_datang']);
  $nik = filter($_POST['nik']);
  $nama = filter($_POST['nama']);
  $jenis_kelamin = filter($_POST['jenis_kelamin']);
  $agama = filter($_POST['agama']);
  $tempat_lahir = filter($_POST['tempat_lahir']);
  $tanggal_lahir = filter($_POST['tanggal_lahir']);
  $alamat_asal = filter($_POST['alamat_asal']);
  $alasan_pindah = filter($_POST['alasan_pindah']);
  $keterangan = filter($_POST['keterangan']);
  $id_user =  $_SESSION['user_id'];

  if ($tgl_registrasi == '' || $tgl_datang == '' || $nik == '' || $nama == '' || $jenis_kelamin == '' || $agama == '' || $tempat_lahir == '' || $tanggal_lahir == '' || $alamat_asal == '') {
    $msg = [
              alert('Harus Diisi','danger'),
            ];
  }else{
    $tabel = 'ap_pindah_datang';
    $data = [
      'tgl_registrasi' => $tgl_registrasi,
      'tgl_datang' => $tgl_datang,
      'pd_nik' => $nik,
      'pd_nama' => $nama,
      'pd_jk' => $jenis_kelamin,
      'pd_agama' => $agama,
      'pd_tempat_lahir' => $tempat_lahir,
      'pd_tanggal_lahir' => $tanggal_lahir,
      'pd_alamat_asal' => $alamat_asal,
      'pd_alasan_pindah' => $alasan_pindah,
      'pd_keterangan' => $keterangan,
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
  $tgl_datang = filter($_POST['tgl_datang']);
  $nik = filter($_POST['nik']);
  $nama = filter($_POST['nama']);
  $jenis_kelamin = filter($_POST['jenis_kelamin']);
  $agama = filter($_POST['agama']);
  $tempat_lahir = filter($_POST['tempat_lahir']);
  $tanggal_lahir = filter($_POST['tanggal_lahir']);
  $alamat_asal = filter($_POST['alamat_asal']);
  $alasan_pindah = filter($_POST['alasan_pindah']);
  $keterangan = filter($_POST['keterangan']);
  $id_user =  $_SESSION['user_id'];

  if ($tgl_registrasi == '' || $tgl_datang == '' || $nik == '' || $nama == '' || $jenis_kelamin == '' || $agama == '' || $tempat_lahir == '' || $tanggal_lahir == '' || $alamat_asal == '') {
    $msg = [
              alert('Harus Diisi','danger'),
            ];
  }else{
    $tabel = 'ap_pindah_datang';
    $data = [
      'tgl_registrasi' => $tgl_registrasi,
      'tgl_datang' => $tgl_datang,
      'pd_nik' => $nik,
      'pd_nama' => $nama,
      'pd_jk' => $jenis_kelamin,
      'pd_agama' => $agama,
      'pd_tempat_lahir' => $tempat_lahir,
      'pd_tanggal_lahir' => $tanggal_lahir,
      'pd_alamat_asal' => $alamat_asal,
      'pd_alasan_pindah' => $alasan_pindah,
      'pd_keterangan' => $keterangan,
      'id_user' => $id_user
    ];

    $sql = update($tabel,$data, 'pd_id='.$id);
    
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
  $tabel  = "ap_pindah_datang";
  $id     = "pd_id='".filter($_GET['id'])."'";
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