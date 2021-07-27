<?php 
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
       $result =  $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun. ", ". $jam;
       return($result);
       }
 ?>