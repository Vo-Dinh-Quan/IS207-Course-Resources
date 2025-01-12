<?php
  include "connect.php";
  $machuyenbay = $_POST['machuyenbay'];
  $sqlCB = "SELECT * FROM CHUYENBAY WHERE MACB = '$machuyenbay'";
  $resultCB = $connect->query($sqlCB);
  $rowCB = $resultCB->fetch_assoc();
  echo "<label>Chuyến:</label><input type='text' readonly value='{$rowCB['CHUYEN']}'>
        <label>Điểm đi:</label><input type='text' readonly value='{$rowCB['DIEMDI']}'>
        <label>Điểm đến:</label><input type='text' readonly value='{$rowCB['DIEMDEN']}'>
        <label>Ngày bay:</label><input type='date' readonly value='{$rowCB['NGAYBAY']}'>
        <label>Giờ đi:</label><input type='text' readonly value='{$rowCB['GIODI']}'>
        <label>Giờ đến:</label><input type='text' readonly value='{$rowCB['GIODEN']}'>";
  $sqlCT_CB = "SELECT HOTEN, DIENTHOAI, LOAIGHE, SOGHE, MAHK FROM CT_CB, HANHKHACH WHERE CT_CB.MACB = '$machuyenbay' AND HANHKHACH.MAHK = CT_CB.MAHK";
  $resultCT_CB = $connect->query($sqlCT_CB);
  echo "<table>
          <tr>
            <th>Họ tên hành khách</th>
            <th>Điện thoại</th>
            <th>Loại ghế</th>
            <th>Số ghế</th>
            <th>Chức năng</th>
          </tr>";
  while ($row = $resultCT_CB->fetch_row()) {
      echo "<tr>
              <td>$row[0]</td> 
              <td>$row[1]</td> 
              <td><input type='text' class='input-loaighe' value='$row[2]'></td>
              <td><input type='text' class='input-soghe' value='$row[3]'></td> 
              <td>
                <button id='xoahanhkhach' mahanhkhach='$row[4]'>Xóa</button>
                <button id='suahanhkhach' mahanhkhach='$row[4]'>Sửa</button>
              </td>
            </tr>";
  }
  echo "</table>";
?>
