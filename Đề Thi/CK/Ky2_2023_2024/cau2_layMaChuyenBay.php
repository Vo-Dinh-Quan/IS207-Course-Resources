<?php
  include "connect.php";
  $ngaybay = $_POST['ngaybay'];
  $sql = "SELECT MACB FROM CHUYENBAY WHERE NGAYBAY = '$ngaybay'";
  $result = $connect->query($sql);
  while($row = $result->fetch_row()) {
    echo "<option value='$row[0]'>$row[0]</option>";
  }
?>