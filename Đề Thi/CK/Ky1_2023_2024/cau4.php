<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  Chọn ngày <input type="date" id="ngaythue"><br><br>
  <h3>Danh sách khách hàng thuê xe</h3>
  <table border="1" cellspacing="0" id="bangthuexe">
    <tr><th>STT</th><th>Họ tên khách hàng</th><th>Số xe</th><th>Tên xe</th></tr>
  </table>
</body>
</html>
<script>
  $(document).ready(function () {
    $('#ngaythue').keydown(function (e) {
      if (e.key === 'Enter') {
        const ngaythue = $('#ngaythue').val();
        $.ajax({
          type: 'POST',url: 'cau4_lietKeThueXe.php',
          data: { ngaythue: ngaythue },
          success: function (data) { $('#bangthuexe').html(data); }
        });
      }
    });
  });
</script>
<?php
  include "connect.php";
  $ngaythue = $_POST['ngaythue'];
  $sql = "SELECT KHACHHANG.TENKH, XE.SOXE, XE.TENXE FROM THUE 
          INNER JOIN KHACHHANG ON THUE.MAKH = KHACHHANG.MAKH 
          INNER JOIN XE ON THUE.SOXE = XE.SOXE 
          WHERE THUE.NGAYTHUE = '$ngaythue' AND XE.TINHTRANG = 1";
  $result = $connect->query($sql);
  echo "<tr>  <th>STT</th><th>Họ tên khách hàng</th>
              <th>Số xe</th><th>Tên xe</th>
        </tr>";
  $stt = 0;
  while ($row = $result->fetch_assoc()) {
    $stt++;
    echo "<tr>
            <td>$stt</td>
            <td>{$row['TENKH']}</td>
            <td>{$row['SOXE']}</td>
            <td>{$row['TENXE']}</td>
          </tr>";
  }
?>

