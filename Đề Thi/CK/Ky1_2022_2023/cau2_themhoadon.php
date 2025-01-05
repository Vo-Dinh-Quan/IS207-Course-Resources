<?php
  include "connect.php";
  $makh = $_POST["makh"];
  $mahd = $_POST["mahd"];
  $tenhd = $_POST["tenhd"];
  $tongtien = $_POST["tongtien"];
  $sql = "INSERT into HOADON(makh, mahd, tenhd, tongtien) values('$makh', '$mahd', '$tenhd', '$tongtien')";
  $result = $connect->query($sql);
  if($result) {
    echo " insert thanh cong";
  } else {
    echo "insert khong thanh cong";
  }
  $connect->close();
?>