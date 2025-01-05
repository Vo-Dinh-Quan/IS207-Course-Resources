<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <span>Số lượng khách hàng</span><input type="number" id="soluong" name="soluong">
  <h3> 3 khách hàng có số tiền thuê nhiều nhất</h3>
  <div class="formUpdate"></div>
</body>
</html>
<script>
  $(document).ready(function() {
    $("#soluong").keypress(function(e) {
      if (e.which == 13) {
        soluong = $("#soluong").val();
        $.ajax({
          type: 'POST',
          url: 'cau4_hienthitopkh.php',
          data: {
            soluong: soluong
          },
          success: function(data) {
            $(".formUpdate").html(data);
          }
        });
      }
    });
  });
</script>