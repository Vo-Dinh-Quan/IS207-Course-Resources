<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <form action="cau2_traxe.php" method="POST">
    Tên khách hàng
    <select name="makh">
      <?php
        include "connect.php";
        $sql = "SELECT MAKH, TENKH FROM KHACHHANG";
        $result = $connect->query($sql);
        while ($row = $result->fetch_row()) {
          echo "<option value='$row[0]'>$row[1]</option>";
        }
      ?>
    </select><br>
    Số xe<input type="text" name="soxe" readonly><br>
    Ngày thuê<input type="date" name="ngaythue" readonly><br>
    Ngày trả<input type="date" name="ngaytra"><br>
    <input type="submit" value="Trả xe">
  </form>
</body>
</html>
