<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <form action="cau4_updatebaoduong.php">
    <h2>Thanh toán</h2>
    <label>Số xe</label> <select id="soxe" name="soxe"></select>
    <label>Ngày nhận xe</label> <input type="date" id="ngaynhan" name="ngaynhan">
    <label>Thành tiền</label> <input type="text" id="thanhtien" name="thanhtien">
    <div id="danhsachcongviec"></div>
    <input type="submit" value="Thanh toán">
  </form>
</body>
</html>
<script>
  $(document).ready(function() {
    $("#ngaynhan").change(function() {
      const ngaynhan = $(this).val();
      $.ajax({
        method: "GET",
        url: "cau4_getsoxe.php",
        data: { ngaynhan: ngaynhan },
        success: function(data) {
          $('#soxe').html(data); 
        }
      })
    })
    $('#soxe').change(function () {
      const mabd = $(this).val();
      $.ajax({
        method: "GET",
        url: "cau4_hienthicongviec.php",
        data: { mabd: mabd },
        success: function(data) {
          $("#danhsachcongviec").html(data);
          let sum = 0;
          $("#dongia").each(function(){
            sum += Number($(this).text());
          });    
          $("#thanhtien").val(sum);
        }
      })
    })
    $(document).on('click', '#xoacv', function() {
      const macv = $(this).val();
      $.ajax({
        method: "POST",
        url: "cau4_xoacongviec.php",
        data: { macv: macv },
        success: function(data) {
          $("#soxe").trigger("change"); 
        }
      });
    });
  })
</script>
