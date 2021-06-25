<?php
$tanggal=date('Y-m-d');
  function tgl_indo($tanggal){
	$bulan = array (1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
function pecah($tgl){
$pecah=explode(' ', $tgl);
return $pecah['1'].'-'.$pecah[0];
}
function tgl_indo2($tanggal){
	$bulan = array (1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[3] . ' ' . $bulan[ (int)$pecahkan[2] ] . ' ' . $pecahkan[1]. ' ' . $pecahkan[0]." WIB";
}


function pn($pemohon){
   $pecah=explode('-', $pemohon);
    return $pecah[0];

  }


?>