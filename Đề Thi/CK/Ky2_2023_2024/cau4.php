<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thêm hành khách</title>
</head>
<body>
  <h2>Thêm hành khách vào chuyến bay</h2>
  <?php
    include 'connect.php';
    $machuyenbay = $_GET['machuyenbay'];
    $sql = "SELECT CHUYEN, DIEMDI, DIEMDEN, NGAYBAY, GIODI, GIODEN FROM CHUYENBAY WHERE MACB = '$machuyenbay'";
    $result = $connect->query($sql);
    $flight = $result->fetch_assoc();
  ?>
    <label>Chuyến</label>
    <input type="text" readonly value=" ">
    <label>Điểm đi</label><input type="text" readonly value="<?= $flight['DIEMDI'] ?>">
    <label>Điểm đến</label><input type="text" readonly value="<?= $flight['DIEMDEN'] ?>">
    <label>Ngày bay</label><input type="date" readonly value="<?= $flight['NGAYBAY'] ?>">
    <label>Giờ đi</label><input type="time" readonly value="<?= $flight['GIODI'] ?>">
    <label>Giờ đến</label><input type="time" readonly value="<?= $flight['GIODEN'] ?>">
    <label>CCCD</label><input type="text" id="cccd"  >
    <label>Loại ghế</label>
    <select id="loaighe">
      <option value="Thường">Thường</option>
      <option value="VIP">VIP</option>
    </select>
    <label>Số ghế</label><input type="text" id="soghe">
    <button type="button" id="btnThem">Thêm</button>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#btnThem').click(function() {
        const machuyenbay = "<?= $machuyenbay ?>";
        const cccd = $('#cccd').val();
        const loaighe = $('#loaighe').val();
        const soghe = $('#soghe').val();
        $.ajax({
          type: 'POST',
          url: 'cau4_themHKChuyenBay.php',
          data: {
            machuyenbay: machuyenbay,
            cccd: cccd,
            loaighe: loaighe,
            soghe: soghe
          },
        });
      });
    });
  </script>
</body>
</html>
