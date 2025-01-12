<?php
include "connect.php";
$mahanhkhach = $_POST['mahanhkhach'];
$sql = "DELETE FROM HANHKHACH WHERE MAHK = '$mahanhkhach'";
$connect->query($sql);
?>
