<?php
  include "connect.php";
  $soluong = $_POST['soluong'];
  $sql = "SELECT kh.TENKH, hd.MAKH, SUM(hd.TONGTIEN) as TIEN FROM HOADON hd JOIN KHACHHANG kh on kh.MAKH = hd.MAKH GROUP BY kh.TENKH, hd.MAKH LIMIT $soluong";
  $result = $connect->query($sql);
  echo "<table border='1' cellspacing='0'>
    <tr>
      <th>STT</th>
      <th>Mã khách hàng</th>
      <th>Tên khách hàng</th>
      <th>Tổng tiền</th>
    </tr>";
  $stt = 0;
  while($row = $result->fetch_row()){
    $stt += 1;
    echo "<tr>
      <td>$stt</td>
      <td>$row[0]</td>
      <td>$row[1]</td>
      <td>$row[2]</td>
    </tr>";
  }
  echo "</table>";
  $connect->close();
?>