<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h2>Thuê xe</h2>
  <span>Họ tên khách hàng</span>
  <select id="makhachhang">
    <?php
      include "connect.php";
      $sql = "SELECT MAKH, TENKH FROM KHACHHANG";
      $result = $connect->query($sql);
      while ($row = $result->fetch_row()) {
        echo "<option value='$row[0]'>$row[1]</option>";
      }
    ?>
  </select>
  <span>Ngày thuê</span><input type="date" id="ngaythue"><br><br>
  <h3>Danh sách các xe chưa thuê</h3>
  <table border="1" cellspacing="0" id="bangxechuathue">
    <tr>
      <th>Số xe</th><th>Tên xe</th><th>Hãng xe</th><th>Năm sản xuất</th><th>Số chỗ</th><th>Đơn giá thuê</th><th>Chọn</th>
    </tr>
    <?php
      $sql = "SELECT SOXE, TENXE, HANGXE, NAMSX, SOCHO, DGTHUE FROM XE WHERE TINHTRANG = 0";
      $result = $connect->query($sql);
      while ($row = $result->fetch_row()) {
        echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
                <td><button class='thue' data-soxe='$row[0]'>Thuê</button></td>
              </tr>";
      }
    ?>
  </table>
  <h3>Danh sách các xe đang thuê</h3>
  <table border="1" cellspacing="0" id="bangxedangthue">
    <tr>
      <th>Số xe</th><th>Tên xe</th><th>Ngày thuê</th><th>Chọn</th>
    </tr>
    <?php
      $sql = "SELECT XE.SOXE, TENXE, THUE.NGAYTHUE FROM XE INNER JOIN THUE ON XE.SOXE = THUE.SOXE WHERE TINHTRANG = 1";
      $result = $connect->query($sql);
      while ($row = $result->fetch_row()) {
        echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td><button class='khongthue' data-soxe='$row[0]'>Không Thuê</button></td>
              </tr>";
      } 
    ?>
  </table>
</body>
</html>
<script>
  $(document).ready(function () {
    // Thuê xe
    $(document).on('click', '.thue', function () {
      const soxe = $(this).data('soxe');
      const makhachhang = $('#makhachhang').val();
      const ngaythue = $('#ngaythue').val();
      const row = $(this).closest('tr');
      $.ajax({
        type: 'POST',
        url: 'cau3_xuly.php',
        data: { action: 'thue', soxe: soxe, makhachhang: makhachhang, ngaythue: ngaythue },
        success: function (data) {
          $('#bangxedangthue').append(data); // Thêm vào bảng xe đang thuê
          row.remove(); // Xóa khỏi bảng xe chưa thuê
        }
      });
    });
    // Hủy thuê xe
    $(document).on('click', '.khongthue', function () {
      const soxe = $(this).data('soxe');
      const row = $(this).closest('tr');
      $.ajax({
        type: 'POST',
        url: 'cau3_xuly.php',
        data: { action: 'khongthue', soxe: soxe },
        success: function (data) {
          $('#bangxechuathue').append(data); // Thêm vào bảng xe chưa thuê
          row.remove(); // Xóa khỏi bảng xe đang thuê
        }
      });
    });
  });
</script>
