<?php
  include "connect.php";

  $tungay = $_POST['tungay'];
  $denngay = $_POST['denngay'];
  $makhachhang = $_POST['makhachhang'];

  $sql = "SELECT XE.SOXE, XE.TENXE, THUE.GIATHUE 
          FROM THUE 
          INNER JOIN XE ON THUE.SOXE = XE.SOXE 
          WHERE THUE.MAKH = '$makhachhang' 
            AND THUE.NGAYTRA BETWEEN '$tungay' AND '$denngay'";

  $result = $connect->query($sql);
  echo "<tr>
          <th>STT</th>
          <th>Số xe</th>
          <th>Tên xe</th>
          <th>Giá Thuê</th>
        </tr>";
  $stt = 0;
  while ($row = $result->fetch_assoc()) {
    $stt++;
    echo "<tr>
            <td>$stt</td>
            <td>{$row['SOXE']}</td>
            <td>{$row['TENXE']}</td>
            <td>{$row['GIATHUE']}</td>
          </tr>";
  }
  $connect->close();
?>
