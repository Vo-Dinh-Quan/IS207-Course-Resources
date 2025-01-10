<?php
  include "connect.php";
  $soxe = $_POST['soxe'];
  $mabd = $_POST['mabd'];
  $sokm = $_POST['sokm'];
  $noidung = $_POST['noidung'];
  $sql = "INSERT INTO BAODUONG VALUE ('$mabd', now(), null, '$sokm', '$noidung', '$soxe', null)";
  $connect->query($sql);
  $connect->close();
?>