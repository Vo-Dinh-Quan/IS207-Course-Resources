<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <form action="cau3_thembaoduong.php" method="post">
  <h3>Thêm bảo dưỡng</h3>
  <label>Số xe</label>
  <select id='soxe' name="soxe">
    <?php
      include "connect.php";
      $sql = "SELECT * FROM XE";
      $result = $connect->query($sql);
      while ($row = $result->fetch_row()) {
        echo "<option value='$row[0]'>$row[0]</option>";
      }
    ?>
  </select><br>
  <label>Họ tên khách hàng</label>
  <select id="hotenkh" name="hotenkh" class="hotenkh">
  </select><br>
  <label>Mã bảo dưỡng</label> <input type="text" name="mabd"><br>
  <label>Số KM</label><input type="number" name="sokm"><br>
  <label>Nội dung</label><input type="text" name="noidung"><br>
  <input type="submit" value="Thêm">
  </form>
</body>
</html>
<script>
$(document).ready(function() {
    $('#soxe').change(function () {
      const soxe = $('#soxe').val();
      $.ajax({
        url: "cau3_gettenkh.php",
        type: "GET",
        data: {soxe: soxe},
        success: function(result) {
          $('#hotenkh').html(result);
        }
      });
    });
  });
</script>