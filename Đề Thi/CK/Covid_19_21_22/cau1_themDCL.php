<?php
    include "connect.php";
    $madcl = $_POST["madcl"];
    $tendcl = $_POST["tendcl"];
    $diachi = $_POST["diachi"];
    $succhua = $_POST["succhua"];
    $sql = "insert into DiemCachLy(madiemcachly, tendiemcachly, diachi, succhua) values('$madcl', '$tendcl', '$diachi', '$succhua')";
    $result = $connect->query($sql);
    if($result) {
        echo "insert thanh cong";
    } else {
        echo "insert khong thanh cong";
    }
    $connect->close();
?>

<?php
    include "connect.php";
    $madcl = $_POST('madcl');
    $tendcl = $_POST('tendcl');
    $diachi = $_POST('diachi');
    $succhua = $_POST('succhua');
    $sql = "INSERT INTO DIEMCACHLY(MADIEMCACHLY, TENDIEMCACHLY, DIACHI, SUCCHUA)
    VALUES ('$madcl', '$tendcl', '$diachi', '$succhua')";
    $result = $connect->query($sql);
    if ($result) {
        echo "insert dư lieu thanh cong";
    }else {
        echo "insert dữ liệu không thành công";
    }
?>