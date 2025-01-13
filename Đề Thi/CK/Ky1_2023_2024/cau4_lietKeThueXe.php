<?php
  include "connect.php";

  $ngaythue = $_POST['ngaythue'];
  $sql = "SELECT KHACHHANG.TENKH, XE.SOXE, XE.TENXE 
          FROM THUE 
          INNER JOIN KHACHHANG ON THUE.MAKH = KHACHHANG.MAKH 
          INNER JOIN XE ON THUE.SOXE = XE.SOXE 
          WHERE THUE.NGAYTHUE = '$ngaythue' AND XE.TINHTRANG = 1";
  $result = $connect->query($sql);
  echo "<tr>
          <th>STT</th><th>Họ tên khách hàng</th>
          <th>Số xe</th><th>Tên xe</th>
        </tr>";
  $stt = 0;
  while ($row = $result->fetch_assoc()) {
    $stt++;
    echo "<tr>
            <td>$stt</td>
            <td>{$row['TENKH']}</td>
            <td>{$row['SOXE']}</td>
            <td>{$row['TENXE']}</td>
          </tr>";
  }
?>
