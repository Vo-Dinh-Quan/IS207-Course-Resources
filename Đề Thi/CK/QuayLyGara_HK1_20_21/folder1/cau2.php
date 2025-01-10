<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <form action="cau2_themxekh.php" method="post">
    <h3>Thêm thông tin xe khách hàng</h3>
    <label>Họ tên khách hàng</label>
    <select name="makh">
      <?php
        include "connect.php";
        $sql = "SELECT * FROM KHACHHANG";
        $result = $connect->query($sql);
        while($row = $result->fetch_row()) {
          echo "<option value='$row[0]'>$row[1]</option>";
        }
      ?>
    </select><br>
    <label>Số xe</label><input type="text" name='soxe'><br>
    <label>Hãng xe</label><select name="hangxe">
      <option value="Toyota">Toyota</option>
      <option value="Honda">Honda</option>
      <option value="Suzuki">Suzuki</option>
    </select><br>
    <label>Năm sản xuất</label><input type="number" name="namsx"><br>
    <input type="submit" value="Thêm">
  </form>
</body>
</html>