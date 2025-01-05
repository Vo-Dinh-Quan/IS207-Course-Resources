<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <span>Mã hóa đơn</span><select id="mahd" name="mahd">
    <?php
      include "connect.php";
      $sql = "SELECT * FROM HOADON";
      $result = $connect->query($sql);
      while($row = $result->fetch_row()){
        echo "<option value='$row[0]'>$row[1]</option>";
      }
    ?>
  </select>
  <h3>Danh sách các phòng còn trống</h3>
  <table border="1" cellspacing="0">
    <tr>
      <th>STT</th>
      <th>Mã phòng</th>
      <th>Tên phòng</th>
      <th>Chức năng</th>
    </tr>
    <?php
      include "connect.php";
      $sql = "SELECT * FROM PHONG WHERE TINHTRANG = 'trong'";
      $result = $connect->query($sql);
      $stt = 0;
      while($row = $result->fetch_row()){
        $stt += 1;
        echo "<tr>
          <td>$stt</td>
          <td>$row[0]</td>
          <td>$row[1]</td>
          <td><button class='them' maphong='$row[0]'>Thêm</button></td>
          </td>
        </tr>";
      }
    ?>
  </table>
  <h3>Danh sách các phòng đã thêm</h3>
  <table border="1" cellspacing='0'>
    <tr>
      <th>STT</th>
      <th>Mã phòng</th>
      <th>Tên phòng</th>
      <th>Chức năng</th>
    </tr>
    <?php
      include "connect.php";
      $sql = "SELECT * FROM PHONG WHERE TINHTRANG = 'Co khach'";
      $result = $connect->query($sql);
      $stt = 0;
      while($row = $result->fetch_row()){
        $stt += 1;
        echo "<tr>
          <td>$stt</td>
          <td>$row[0]</td>
          <td>$row[1]</td>
          <td><button class='xoa' maphong='$row[0]'>Xóa</button></td>
          </td>
        </tr>";
      }
    ?>
  </table>
</body>
</html>
<script>
  $(document).ready(function() {
    $(".them").click(function() {
      mahd = $("mahd").val();
      maphong = $(this).attr('maphong');
      $(this).parent().parent().remove();
      $.ajax({
        type: 'POST',
        url: 'cau3_themphong.php',
        data: {
          mahd: mahd,
          maphong: maphong
        },
        success: function(data, status) {
          $("table:last").append(data);
        }
      })
    })
    $(".xoa").click(function() {
      maphong = $(this).attr('maphong');
      $(this).parent().parent().remove();
      $.ajax({
        type: 'POST',
        url: 'cau3_xoaphong.php',
        data: {
          maphong: maphong
        },
        success: function(data, status) {
          $("table:first").append(data);
        }
      })
    })
  })
</script>