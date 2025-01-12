<?php
  include "connect.php";
  $machuyenbay = $_POST['machuyenbay'];
  $cccd = $_POST['cccd'];
  $loaighe = $_POST['loaighe'];
  $soghe = $_POST['soghe'];

  $sqlCheck = "SELECT MAHK FROM HANHKHACH WHERE CCCD = '$cccd'";
  $resultCheck = $connect->query($sqlCheck);
  $row = $resultCheck->fetch_assoc();
  $mahk = $row['MAHK'] ?? $connect->insert_id;
  if (!$row) {
    $sqlInsertHanhKhach = "INSERT INTO HANHKHACH (CCCD) VALUES ('$cccd')";
    $connect->query($sqlInsertHanhKhach);
    $mahk = $connect->insert_id;
  }
  $sqlInsertCT_CB = "INSERT INTO CT_CB VALUES ('$machuyenbay', '$mahk', '$loaighe', '$soghe')";
  $connect->query($sqlInsertCT_CB);
?>
