<?php
  include "connect.php";
  $ngaynhan = $_GET['ngaynhan'];  // Sửa lại từ $_GET('ngaynhan') thành $_GET['ngaynhan']
  $sql = "SELECT * FROM BAODUONG WHERE NGAYNHAN = '$ngaynhan'";
  echo "<option value $sql></option>";
  $result = $connect->query($sql);
  while ($row = $result->fetch_row()) {
    echo "<option value='$row[0]'>$row[5]</option>";
  } 
  $connect->close();
?>
