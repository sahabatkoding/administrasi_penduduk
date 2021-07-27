<?php

function query($query){
  global $koneksi;
  $sql = $koneksi->query($query)or die($koneksi->error);
  if($sql){
    return $sql;
  }else {
    return false;
  }
}


function insert($table,$data){
  $field  = array_keys($data);
  $values = array_values($data);
  $query  = "INSERT INTO $table ( ".implode(',', $field).") VALUES ('".implode("','", $values)."')";
  return $query;   
}

function update($table,$data,$id){
  $values = array();
  foreach ($data as $keys => $val) {
    $values[] = "$keys = '$val'";
  }
  $query  = "UPDATE $table SET ".implode(',',$values)." WHERE $id";
  return $query;
}

function delete($table,$id){
  $query = "DELETE FROM $table WHERE $id";
  return $query;
}

function select_all($table){
  global $koneksi;
  $values = array();
  $sql = "SELECT * FROM $table";
  $query = mysqli_query($koneksi,$sql)or die(mysqli_error($koneksi));
  foreach($query as $key => $val){
    $values[]=$val;
  }
  return $values;
}

function lastID($table,$id){
  global $koneksi;
  $sql = "SELECT MAX($id) as last FROM $table";
  $query = mysqli_query($koneksi,$sql)or die(mysqli_error($koneksi));
  $data = $query->fetch_array();

  if(!$data['last'])
    return 0;
  else
  return $data['last'];
}

function newID($table,$id){
  $newID = lastID($table,$id);
  return $newID+1;
}

function randomID(){
  $r = rand();
  $u = uniqid(getmypid() . $r . (double)microtime()*1000000,true);
  $m = md5(session_id().$u);
  return($m);  
}

function countData($query){
  global $koneksi;
  $sql   = mysqli_query($koneksi,$query)or die(mysqli_error($koneksi));
  $count = mysqli_num_rows($sql)or die(mysqli_error($koneksi));
  if($count==0){
    return 0;
  }else{
    return $count;
  }
}
?>