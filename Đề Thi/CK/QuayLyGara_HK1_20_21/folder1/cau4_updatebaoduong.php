<?php
  include "connect.php";
  $ngaytra = date('y-m-d');
  $thanhtien = $_POST['thanhtien'];
  $mabd = $_POST['mabd'];
  $sql = "UPDATE BAODUONG SET NGAYTRA = '$ngaytra', THANHTIEN = '$thanhtien' WHERE MABD = '$mabd'";
  $connect->query($sql);
  $connect->close(); 
?>  