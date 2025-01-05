<?php
  include "connect.php";
  $makh = $_POST["makh"];
  $tenkh = $_POST["tenkh"];
  $sdt = $_POST["sdt"];
  $cccd = $_POST["cccd"];
  $sql = "insert into KhachHang(makh, tenkh, sdt, cccd) values('$makh', '$tenkh', '$sdt', '$cccd')";
  $result = $connect->query($sql);
  if($result) {
    echo "insert thanh cong";
  } else {
    echo "insert khong thanh cong";
  }
?>