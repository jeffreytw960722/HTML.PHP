<?php
  function create_connection($Server,$dbname,$username,$Pwd)
  {

    $link = new mysqli($Server,$username,$Pwd,$dbname)
      or die("無法建立資料連接: " . $link->connect_error);
    mysqli_set_charset($link,"utf8");
    return $link;
  }
?>
