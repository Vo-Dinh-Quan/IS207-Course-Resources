<?php
  include "connect.php";
  $makh = $_POST['makh'];
  $tenkh = $_POST['tenkh'];
  $diachi = $_POST['diachi'];
  $sdt = $_POST['sdt'];
  $sql = "INSERT INTO KHACHHANG VALUES ('$makh', '$tenkh', '$diachi', '$sdt')";
  $connect->query($sql);
  $connect->close();
?>