<?php
    include "connect.php";
    $cccd = $_POST["cccd"];
    $hoten = $_POST["hoten"];
    $diachi = $_POST["diachi"];
    $dienthoai = $_POST["dienthoai"];
    $sql = "INSERT INTO HANHKHACH VALUES (, '$hoten', '$diachi', '$dienthoai', '$cccd')";
    $result = $connect->query($sql);
    $connect->close();
?>