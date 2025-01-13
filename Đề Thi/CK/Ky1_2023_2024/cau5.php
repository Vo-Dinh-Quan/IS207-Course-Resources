<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h2>Liệt kê thông tin xe thuê đã trả</h2>
  Từ ngày <input type="date" id="tungay">
  Đến ngày <input type="date" id="denngay"><br><br>
  Họ tên khách hàng 
  <select id="makhachhang">
    <?php
      include "connect.php";
      $sql = "SELECT MAKH, TENKH FROM KHACHHANG";
      $result = $connect->query($sql);
      while ($row = $result->fetch_row()) {
        echo "<option value='$row[0]'>$row[1]</option>";
      }
    ?>
  </select><br><br>
  <h3>Danh sách xe đã trả</h3>
  <table border="1" cellspacing="0" id="bangxetrathue">
    <tr>
      <th>STT</th>
      <th>Số xe</th>
      <th>Tên xe</th>
      <th>Giá Thuê</th>
    </tr>
  </table>
</body>
</html>
<script>
  $(document).ready(function () {
    $('#makhachhang').change(function () {
      const tungay = $('#tungay').val();
      const denngay = $('#denngay').val();
      const makhachhang = $('#makhachhang').val();
      $.ajax({
        type: 'POST',
        url: 'cau5_lietKeXeTra.php',
        data: { tungay: tungay, denngay: denngay, makhachhang: makhachhang },
        success: function (data) {
          $('#bangxetrathue').html(data); // Cập nhật bảng danh sách xe
        }
      });
    });
  });
</script>
