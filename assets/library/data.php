<?php

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



function query($query){
  global $koneksi;
  return mysqli_query($koneksi, $query)or die(mysqli_error($koneksi));
}

?>