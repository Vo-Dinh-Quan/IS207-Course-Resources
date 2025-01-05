<?php
  include "connect.php";
  $makh = $_POST['makh'];
  $sql = "SELECT * FROM HOADON WHERE MAKH = '$makh'";
  $result = $connect->query($sql);
  while($row = $result->fetch_row()){
    echo "<option value='$row[0]'>$row[0]</option>";
  }
  $connect->close();
?>