<?php
  include "connect.php";
  $makh = $_POST['makh'];
  $soxe = $_POST['soxe'];
  $hangxe = $_POST['hangxe'];
  $namsx = $_POST['namsx'];
  $sql = "INSERT INTO XE VALUES ('$soxe', '$hangxe', '$namsx', '$makh')";
  $connect->query($sql);
  $connect->close();
  
?>