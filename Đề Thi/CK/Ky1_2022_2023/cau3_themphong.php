<?php
  include "connect.php";
  $maphong = $_POST['maphong'];
  $sql = "UPDATE PHONG SET TINHTRANG = 'Co khach' WHERE MAPHONG = '$maphong'";
  $connect->query($sql);
  $connect->close();
?>