<?php 

function anti_inject($kata){
  $filter = stripslashes(stripcslashes(strip_tags(htmlspecialchars($kata,ENT_QUOTES))));
  return $filter;
}

 ?>