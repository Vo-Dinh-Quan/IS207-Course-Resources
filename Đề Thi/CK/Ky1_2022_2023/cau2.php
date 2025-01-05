<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <form action="cau2_themhoadon.php" method="POST">
  <span>Tên khách hàng</span>
  <select name="makh">
    <?php
      include "connect.php";
      $sql = "SELECT * FROM KHACHHANG";
      $result = $connect->query($sql);
      while($row = $result->fetch_row()){
        echo "<option value='$row[0]'>$row[1]</option>";
      }
    ?>
  </select><br>
  <span>Mã hóa đơn </span><input type="text" name="mahd"><br>
  <span>Tên hóa đơn</span><input type="text" name="tenhd"><br>
  <span>Tổng tiền</span><input type="text" name="tongtien"><br>
  <input type="submit" name="submit" value="Thêm">
  </form>
</body>
</html>