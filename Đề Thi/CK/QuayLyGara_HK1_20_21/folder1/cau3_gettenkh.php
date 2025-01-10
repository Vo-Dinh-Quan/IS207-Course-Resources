<?php
  include "connect.php";
  $soxe = $_GET['soxe'];
  $sql = "SELECT KHACHHANG.MAKH, KHACHHANG.HOTENKH FROM KHACHHANG, XE WHERE XE.MAKH = KHACHHANG.MAKH AND XE.SOXE = '$soxe'";
  $result = $connect->query($sql);
  while ($row = $result->fetch_row()) {
    echo "<option value='$row[0]'>$row[1]</option>";
  } 
?>
