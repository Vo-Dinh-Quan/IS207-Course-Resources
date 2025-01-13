<?php
  include "connect.php";
  $makh = $_POST['makh'];
  $soxe = $_POST['soxe'];
  $ngaythue = $_POST['ngaythue'];
  $ngaytra = $_POST['ngaytra'];

  // Tính số ngày thuê
  $datediff = (strtotime($ngaytra) - strtotime($ngaythue)) / (60 * 60 * 24);
  $songaythue = $datediff > 0 ? $datediff : 1;
  $sqlGiaThue = "SELECT DGTHUE FROM XE WHERE SOXE = '$soxe'";
  $resultGiaThue = $connect->query($sqlGiaThue);
  $giaThue = $resultGiaThue->fetch_assoc()['DGTHUE'];

  $tongTien = $songaythue * $giaThue;
  $sqlUpdate = "UPDATE THUE SET NGAYTRA = '$ngaytra', GIATHUE = $tongTien WHERE MAKH = '$makh' AND SOXE = '$soxe'";
  $connect->query($sqlUpdate);
  $connect->close();
?>
