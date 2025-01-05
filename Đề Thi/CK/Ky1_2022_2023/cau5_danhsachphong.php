<?php
  include "connect.php";
  $mahd = $_POST['mahd'];
  $sql = "SELECT PHONG.MAPHONG, LOAIPHONG FROM PHONG, THUE WHERE PHONG.MAPHONG = THUE.MAPHONG AND MAHD = '$mahd'";
  $result = $connect->query($sql);
  echo "<table border='1' cellspacing='0'>
        <tr>
        <th>STT</th>
        <th>Mã phòng</th>
        <th>Loại phòng</th></tr>";
  $stt = 0;
  while($row = $result->fetch_row()){
    $stt++;
    echo "<tr><td>$stt</td><td>$row[0]</td><td>$row[1]</td></tr>";
  }
?>