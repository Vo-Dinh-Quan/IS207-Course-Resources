<?php
include "connect.php";
$mahanhkhach = $_POST['mahanhkhach'];
$loaighe = $_POST['loaighe'];
$soghe = $_POST['soghe'];
$sql = "UPDATE CT_CB SET LOAIGHE = '$loaighe', SOGHE = '$soghe' WHERE MAHK = '$mahanhkhach'";
$connect->query($sql);
?>
