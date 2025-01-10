<?php
  include "connect.php";
  $macv = $_POST['macv'];
  $sql = "DELETE FROM CT_BD WHERE MACV = '$macv'";
  $connect->query($sql);
  $connect->close();
?>
