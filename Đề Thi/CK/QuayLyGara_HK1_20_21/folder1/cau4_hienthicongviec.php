<?php
  include "connect.php";
  $mabd = $_GET['mabd'];
  $sql = "SELECT CONGVIEC.MACV, TENCV, DONGIA FROM CONGVIEC, CT_BD WHERE CT_BD.MACV = CONGVIEC.MACV AND CT_BD.MABD = '$mabd'";
  $result = $connect->query($sql);
  echo "<table border='1' >
    <tr>
      <th>Tên công việc</th>
      <th>Đơn giá</th>
      <th>Chức năng</th>
    </tr>";
  while ($row = $result->fetch_row()) {
    echo "<tr>
      <td>$row[1]</td>
      <td id='dongia'>$row[2]</td>
      <td><button type='button' id='xoacv' value='$row[0]'>Xóa</button></td>
    </tr>";
  }
?>