<?php
  include "connect.php";
  $solan = $_GET['solan'];
  $sql = "SELECT KHACHHANG.HOTENKH, XE.SOXE, COUNT(BAODUONG.MABD) AS SOLANBAODUONG
  FROM XE
  JOIN KHACHHANG ON XE.MAKH = KHACHHANG.MAKH
  JOIN BAODUONG ON XE.SOXE = BAODUONG.SOXE
  GROUP BY XE.SOXE, KHACHHANG.HOTENKH
  HAVING SOLANBAODUONG > '$solan'";
$result = $connect->query($sql);
  $result = $connect->query($sql);
  echo "<table border='1'>
          <tr>
            <th>Họ tên khách hàng</th>
            <th>Số xe</th>
            <th>Số lần bảo dưỡng</th>
          </tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['TENKH']}</td>
            <td>{$row['SOXE']}</td>
            <td>{$row['SOLANBAODUONG']}</td>
          </tr>";
  }
  echo "</table>";
?>
