<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h2>Thông tin chuyến bay</h2>
  <label>Ngày bay:</label> 
  <input type="date" id="ngaybay">
  <label>Mã chuyến bay:</label> 
  <select id="machuyenbay"></select>
  <button id="lietke">Liệt kê</button>
  <button id="themhanhkhach">Thêm hành khách</button>
  <div id="formlietke"></div>
  <script>
    $(document).ready(function() {
      $('#ngaybay').keydown(function(e) {
        if (e.key === 'Enter') { 
          const ngaybay = $('#ngaybay').val();
          $.ajax({
            type: 'POST',
            url: 'cau2_layMaChuyenBay.php',
            data: { ngaybay: ngaybay },
            success: function(data) {
              $('#machuyenbay').html(data);
            }
          });
        }
      });
      // Câu 3 ý a)
      $('#lietke').click(function() {
        const machuyenbay = $('#machuyenbay').val();
        if (!machuyenbay) {
          alert("Vui lòng chọn mã chuyến bay!");
          return;
        }
        $.ajax({
          type: 'POST',
          url: 'cau3.php',
          data: { machuyenbay: machuyenbay },
          success: function(data) {
            $('#formlietke').html(data);
          }
        });
      });
      // Câu 3 ý b
      $(document).on('click', '#xoahanhkhach', function() {
        const mahanhkhach = $(this).attr('mahanhkhach');
        const row = $(this).closest('tr'); 
        $.ajax({
          type: 'POST',
          url: 'cau3_xoaHanhKhach.php',
          data: { mahanhkhach: mahanhkhach },
          success: function() {
            row.remove(); 
          }
        });
      });

      // Câu 3 ý c
      $(document).on('click', '#suahanhkhach', function() {
        const row = $(this).closest('tr');
        const mahanhkhach = $(this).attr('mahanhkhach');
        const loaighe = row.find('.input-loaighe').val();
        const soghe = row.find('.input-soghe').val();
        $.ajax({
          type: 'POST',
          url: 'cau3_suaThongTin.php',
          data: { mahanhkhach: mahanhkhach, loaighe: loaighe, soghe: soghe },
          success: function() {
          }
        });
      });
      // Câu 4
      $('#themhanhkhach').click(function() {
        const machuyenbay = $('#machuyenbay').val();
        if (!machuyenbay) {
          return;
        }
        window.open(`cau4.php?machuyenbay=${machuyenbay}`, '_blank');
      });
    });
  </script>
</body>
</html>
