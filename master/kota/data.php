<?php 
require_once '../konektor.php';

if($admin==0){
  ?>
  <script>location.href="<?=$MASTER?>login/logout.php"</script>
  <?php
}


$hasil = array();

switch($_GET['data']){
  case 'provinsi':
    $sql = "SELECT * FROM ap_provinsi ";
    if($_GET['id']!='') $sql .= " WHERE provinsi_id = '".$_GET['id']."'";

    $data = $koneksi->query($sql);

    if($_GET['id']){
      $hasil = $data->fetch_array();
    }else{
      foreach($data as $key=>$value){
        $isi['no']=$key+1;
        $isi['provinsi']=$value['provinsi_nama'];
        $isi['detail']='<center><a href="kabupaten.php?id_provinsi='.$value['provinsi_id'].'"><i class="dw dw-search2" style="font-size:20px"></i></a></center>';
         $isi['edit']='<center><a href="javascript:;" id="'.$value['provinsi_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
        $isi['hapus']='<center><a href="javascript:;" id="'.$value['provinsi_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
        array_push($hasil,$isi);
      }
    }
    echo json_encode($hasil);
  break;
  case 'kabupaten';
   $where = '1=1';
   $sql = "SELECT * FROM ap_kabupaten WHERE id_provinsi='".$_GET['id_provinsi']."'";

    if($_GET['id']!='') $sql .= " AND kabupaten_id = '".$_GET['id']."'";

    $data = $koneksi->query($sql);
// var_dump($sql);
    if($_GET['id']){
      $hasil = $data->fetch_array();
    }else{
      foreach($data as $key=>$value){
        $isi['no']=$key+1;
        $isi['kabupaten']=$value['kabupaten_nama'];
        $isi['detail']='<center><a href="kecamatan.php?id_kabupaten='.$value['kabupaten_id'].'"><i class="dw dw-search2" style="font-size:20px"></i></a></center>';
         $isi['edit']='<center><a href="javascript:;" id="'.$value['kabupaten_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
        $isi['hapus']='<center><a href="javascript:;" id="'.$value['kabupaten_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
        array_push($hasil,$isi);
      }
    }
    echo json_encode($hasil);
    break;
    case 'kecamatan';
      $where = '1=1';
      $sql = "SELECT * FROM ap_kecamatan WHERE id_kabupaten='".$_GET['id_kabupaten']."'";
      if($_GET['id']!='') $sql .= " AND kecamatan_id = '".$_GET['id']."'";
        $data = $koneksi->query($sql);
    // var_dump($sql);
        if($_GET['id']){
          $hasil = $data->fetch_array();
        }else{
          foreach($data as $key=>$value){
            $isi['no']=$key+1;
            $isi['kecamatan']=$value['kecamatan_nama'];
            $isi['detail']='<center><a href="kelurahan.php?id_kecamatan='.$value['kecamatan_id'].'"><i class="dw dw-search2" style="font-size:20px"></i></a></center>';
             $isi['edit']='<center><a href="javascript:;" id="'.$value['kecamatan_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
            $isi['hapus']='<center><a href="javascript:;" id="'.$value['kecamatan_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
            array_push($hasil,$isi);
          }
        }
        echo json_encode($hasil);
    break;
    case 'kelurahan';
      $where = '1=1';
      $sql = "SELECT * FROM ap_kelurahan WHERE id_kecamatan='".$_GET['id_kecamatan']."'";
      if($_GET['id']!='') $sql .= " AND kelurahan_id = '".$_GET['id']."'";
        $data = $koneksi->query($sql);
    // var_dump($sql);
        if($_GET['id']){
          $hasil = $data->fetch_array();
        }else{
          foreach($data as $key=>$value){
            $isi['no']=$key+1;
            $isi['kelurahan']=$value['kelurahan_nama'];
            // $isi['detail']='<center><a href="kelurahan.php?id_kelurahan='.$value['kelurahan_id'].'"><i class="dw dw-search2" style="font-size:20px"></i></a></center>';
             $isi['edit']='<center><a href="javascript:;" id="'.$value['kelurahan_id'].'" onclick="edit(this.id)"><i class="dw dw-edit2" style="font-size:20px" data-toggle="modal" data-target="#modal"></i></a></center>';
            $isi['hapus']='<center><a href="javascript:;" id="'.$value['kelurahan_id'].'" onclick="return hapus(this.id)"><i class="dw dw-delete-3" style="font-size:20px"></i></a></center>';
            array_push($hasil,$isi);
          }
        }
        echo json_encode($hasil);
    break;
  default:
  break;
}
 ?>
