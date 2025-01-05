<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <!-- Liệt kê các khách hàng vào combobox, khi chọn tên khách hàng từ combox "Tên khách hàng" thì chương trình liệt kê các hóa đơn của khách hàng đã chọn vào combobox mã khách hàng. Khi chọn hóa đơn trong combox "Mã hóa đơn" thì liệt kê danh sách các phòng của hóa đơn được chọn vào 1 bảng nằm bên dưới -->
  <span>Tên khách hàng</span> <select id="tenkh" name="makh" class="makh">
    <?php
      include "connect.php";
      $sql = "SELECT * FROM KHACHHANG";
      $result = $connect->query($sql);
      while($row = $result->fetch_row()){
        echo "<option value='$row[0]'>$row[1]</option>";
      }
    ?>
  </select><br>
  <span>Mã hóa đơn</span> <select id="mahd" class="mahd" name="mahd">
  </select><br>
  <h3>Danh sách các phòng trong hóa đơn</h3>
  <div class="danhsachphonghd"></div>
</body>
</html>
<script>
  $(document).ready(function() {
    $('.makh').change(function() {
      var makh = $(this).val();
      $.ajax({
        type: "POST",
        url: "cau5_hienthihoadon.php",
        data: {
          makh: makh
        },
        success: function(data) {
          $('.mahd').html(data);
          $('.mahd').change(function() {
            var mahd = $(this).val();
            $.ajax({
              type: 'POST',
              url: "cau5_danhsachphong.php",
              data: {
                mahd: mahd
              },
              success: function(data) {
                $('.danhsachphonghd').html(data);
              }
            })
          })
        }
      })
    })
  })
</script>
