<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h2>Liệt kê</h2>
  <label >Chọn số lần bảo dưỡng</label>
  <input type="number" id="solanbaoduong" name="solanbaoduong">
  <div id="ketqua"></div>
</body>
</html>
<script>
  $(document).ready(function () {
    $("#solanbaoduong").on("keypress", function (e) {
      if (e.which == 13) { 
        const solan = $(this).val();
        $.ajax({
          method: "GET",
          url: "cau5_lietkesoxe.php",
          data: { solan: solan },
          success: function (data) {
            $("#ketqua").html(data); 
          }
        });
      }
    });
    $('#solanbaoduong').on("keypress", function (e) {
      if (e.which == 13) {
        const solan = $(this).val();
        $.ajax({
          method: "GET",
          url: "cau5_lietkesoxe.php",
          success: function (data) {
            $("ketqua").html(data);
          }
        })
      }
    })
  });
</script>
